-- 會員資料;
CREATE TABLE MEMBER(
  ID VARCHAR(20) PRIMARY KEY,
  Password VARCHAR(128) NOT NULL,
  Name VARCHAR(12) NOT NULL,
  Email VARCHAR(30) NOT NULL,
  Phone VARCHAR(10) NOT NULL,
  RegDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Birth DATE,
  Gender ENUM('M', 'F', 'N'),
  Address VARCHAR(100),
  Position ENUM('S', 'A', 'C') NOT NULL
);

-- 商品;
CREATE TABLE PRODUCT(
  ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(30) NOT NULL,
  State ENUM('in_stock', 'out_of_stock', 'removed_from_shelves'),
  Stock INT(7) UNSIGNED NOT NULL,
  Price INT(10) UNSIGNED NOT NULL,
  Img VARCHAR(100) NOT NULL,
  Info VARCHAR(300),
  DID INT(7) UNSIGNED,
  CategoryID INT(7) UNSIGNED NOT NULL
);

-- 商品類型;
CREATE TABLE CATEGORY(
    ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(10) NOT NULL UNIQUE
);

-- 訂單;
CREATE TABLE ORDER_LIST (
  ID VARCHAR(8) PRIMARY KEY,
  Date DATETIME NOT NULL,
  FinalCost INT(7) UNSIGNED NOT NULL,
  State ENUM('submitted', 'processed', 'delivered', 'completed') NOT NULL DEFAULT 'submitted',
  CID VARCHAR(20) NOT NULL,
  DID INT(7) UNSIGNED,
  SID VARCHAR(20)
);

-- 訂單和商品的特殊性關係;
CREATE TABLE ORDER_LIST_RECORD (
  OID VARCHAR(8) NOT NULL,
  PID INT(7) UNSIGNED NOT NULL,
  Quantity INT(7) UNSIGNED NOT NULL,
  PRIMARY KEY (OID, PID)
);

-- 購物車;
CREATE TABLE CART (
  ID VARCHAR(8) PRIMARY KEY,
  Date DATETIME NOT NULL
);

-- 購物車和商品的特殊性關係;
CREATE TABLE CART_RECORD (
  ID VARCHAR(8),
  PID INT(7) UNSIGNED,
  Quantity INT(5) UNSIGNED NOT NULL,
  PRIMARY KEY(ID,PID)
);

-- 評論;
CREATE TABLE COMMENT (
  ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  CID VARCHAR(20) NOT NULL,
  PID INT(7) UNSIGNED NOT NULL,
  Star INT(1) NOT NULL,
  Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Comment VARCHAR(100) NOT NULL
);

-- 折扣;
CREATE TABLE DISCOUNT (
  ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Type ENUM('shipping', 'seasoning', 'event'),
  PeriodFrom DATE NOT NULL,
  PeriodTo DATE NOT NULL,
  Requirement INT(7) UNSIGNED,
  Rate DOUBLE(3,3) NOT NULL,
  Info VARCHAR(100) NOT NULL,
  EventType ENUM('BOGO', 'discount')
);

-- VIEW 視界;

DROP VIEW IF EXISTS PRODUCT_VIEW;

-- 為了簡化在php中的查詢指令，建此VIEW把 PRODUCT, CATEGORY, DISCOUNT 合併成一表。;
-- PPrice: 原始價格 / PPriceDiscount: 折扣後價格，如果沒有折扣或者在期限外則為NULL;
-- PPriceF: 加入逗號的原始價格 / PPriceDiscount: 加入逗號的折扣後價格，同上。;

CREATE VIEW PRODUCT_VIEW
AS SELECT P.ID PID ,P.Name PName, P.Info PInfo, P.Img PImg, P.Stock PStock, P.State PState,
          C.Name CName, C.ID CID, D.ID DID, D.Rate DRate, D.EventType DEvent,
          (CASE WHEN ((D.PeriodTo >= NOW() AND D.PeriodFrom <= NOW()) AND D.EventType='BOGO')
                THEN 'BOGO'
                WHEN ((D.PeriodTo >= NOW() AND D.PeriodFrom <= NOW()) AND D.EventType='Discount')
                THEN 'Discount'
                ELSE NULL END) DEventType,
          P.Price PPrice,
            (CASE WHEN ((D.PeriodTo >= NOW() AND D.PeriodFrom <= NOW()) AND D.EventType='Discount')
                THEN (P.Price * D.Rate)
                ELSE NULL END) PPriceDiscount,
          FORMAT(P.Price,0) PPriceF,
          FORMAT((CASE WHEN ((D.PeriodTo >= NOW() AND D.PeriodFrom <= NOW()) AND D.EventType='Discount')
                THEN (P.Price * D.Rate)
                ELSE NULL END),0) PPriceDiscountF
           FROM PRODUCT P
           INNER JOIN CATEGORY C ON P.CategoryID = C.ID
           LEFT JOIN DISCOUNT D ON P.DID = D.ID
           WHERE P.CategoryID = C.ID
           ORDER BY PID;

-- 結合了 product的名字與照片 與 ORDER_LIST_RECORD ;

CREATE VIEW ORDER_LIST_RECORD_VIEW AS
SELECT ORDER_LIST_RECORD.OID, ORDER_LIST_RECORD.PID, ORDER_LIST_RECORD.Quantity, PRODUCT.Name, PRODUCT.Img
FROM ORDER_LIST_RECORD, PRODUCT
WHERE ORDER_LIST_RECORD.PID = PRODUCT.ID;


DROP VIEW IF EXISTS ORDER_LIST_VIEW;

-- 結合了 member(又分收件人與員工) discount ORDER_LIST_RECORD 的 view ;
CREATE VIEW ORDER_LIST_VIEW AS
SELECT O.*, mem.Name "memName", mem.Email, mem.Phone, mem.Address, stf.Name "stfName", d.Info
FROM ORDER_LIST O
LEFT JOIN MEMBER stf ON O.SID = stf.ID
LEFT JOIN MEMBER mem ON O.CID = mem.ID
LEFT JOIN DISCOUNT d ON O.DID = d.ID;