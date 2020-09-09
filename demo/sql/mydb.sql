CREATE DATABASE mydb;
-- 會員資料;
CREATE TABLE MEMBER(
  ID VARCHAR(20) PRIMARY KEY,
  Password VARCHAR(128) ,
  Name VARCHAR(12) ,
  Email VARCHAR(30) ,
  Phone VARCHAR(10) ,
  RegDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Birth DATE,
  Gender ENUM('M', 'F', 'N'),
  Address VARCHAR(100),
  Position ENUM('S', 'A', 'C') 
);

-- 商品;
CREATE TABLE PRODUCT(
  ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(30) ,
  State ENUM('in_stock', 'out_of_stock', 'removed_from_shelves'),
  Stock INT(7) UNSIGNED ,
  Price INT(10) UNSIGNED ,
  Img VARCHAR(100) ,
  Info VARCHAR(300),
  CategoryName VARCHAR(30)
);

-- 商品類型;
CREATE TABLE CATEGORY(
    ID INT(7) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(10)  UNIQUE
);

-- 訂單;
CREATE TABLE ORDER_LIST (
  ID VARCHAR(8) PRIMARY KEY,
  Date DATETIME ,
  FinalCost INT(7) UNSIGNED,
  State ENUM('submitted', 'processed', 'delivered', 'completed')  DEFAULT 'submitted',
  CID VARCHAR(20),
  oName VARCHAR(12) ,
  oPhone VARCHAR(10) ,
  Address VARCHAR(100)
);

-- 訂單和商品的特殊性關係;
CREATE TABLE ORDER_LIST_RECORD (
  OID VARCHAR(8) ,
  PID INT(7) UNSIGNED ,
  Quantity INT(7) UNSIGNED ,
  Date DATETIME ,
  PRIMARY KEY (OID, PID)
);

-- 購物車;
CREATE TABLE CART (
  ID VARCHAR(8) PRIMARY KEY,
  Date DATETIME 
);

-- 購物車和商品的特殊性關係;
CREATE TABLE CART_RECORD (
  ID VARCHAR(8),
  PID INT(7) UNSIGNED,
  Quantity INT(5) UNSIGNED ,
  PRIMARY KEY(ID,PID)
);



-- VIEW 視界;

DROP VIEW IF EXISTS PRODUCT_VIEW;

-- 為了簡化在php中的查詢指令，建此VIEW把 PRODUCT, CATEGORY, DISCOUNT 合併成一表。;
-- PPrice: 原始價格 / PPriceDiscount: 折扣後價格，如果沒有折扣或者在期限外則為NULL;
-- PPriceF: 加入逗號的原始價格 / PPriceDiscount: 加入逗號的折扣後價格，同上。;

CREATE VIEW PRODUCT_VIEW
AS SELECT P.ID PID ,P.Name PName, P.Info PInfo, P.Img PImg, P.Stock PStock, P.State PState,
          C.Name CName, C.ID CID, 
          P.Price PPrice

           FROM PRODUCT P
           INNER JOIN CATEGORY C ON P.CategoryName = C.Name
           WHERE P.CategoryName = C.Name
           ORDER BY PID;

-- 結合了 product的名字與照片 與 ORDER_LIST_RECORD ;
DROP VIEW IF EXISTS ORDER_LIST_RECORD_VIEW;

CREATE VIEW ORDER_LIST_RECORD_VIEW AS
SELECT ORDER_LIST_RECORD.OID, ORDER_LIST_RECORD.PID, ORDER_LIST_RECORD.Quantity,ORDER_LIST_RECORD.Date, PRODUCT.Name, PRODUCT.Img
FROM ORDER_LIST_RECORD, PRODUCT
WHERE ORDER_LIST_RECORD.PID = PRODUCT.ID;




