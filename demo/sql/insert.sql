
INSERT INTO MEMBER(ID, Password, Name, Email, Phone, Birth, Gender, Position, Address)
            VALUE('admin', '$2y$11$vxjirN5/fwYJvowt.weK/ODHr5YUduifWuMJMVzvq/y/egfov3ZPK', '管理員', 'admin@gmail.com', '0912345678', '2020-10-10', 'M', 'A','台中市西屯區市政北二路二段238號'),
            ('staff', '$2y$11$BfHGppHdH.3.8pz58AXqBeqtBhk.ykI/xWdt80Cce7OygtXgmt2ia', '廢物員工', 'staff@gmail.com', '0912345678', '2020-10-10', 'M', 'S', '台中市西屯區市政北二路二段238號');


INSERT INTO CATEGORY(Name) Value('飲料'),('蛋糕'),('冰沙'),('布丁'),('泡麵');

INSERT INTO PRODUCT (Name, Price, State, Stock, CategoryName, Info, Img)
VALUE
('純喫茶綠茶', 25, 'in_stock', 999, '飲料', '採集新鮮茶葉進行炒菁，呈現茶葉鮮綠與清香，搭配柔和的茉莉綠茶，口味清爽不甜膩，新鮮暢飲最過癮!', 'http://www.pecos.com.tw/tmp/image/20140409/20140409202153_39623.jpg'),
('純喫茶紅茶', 25, 'in_stock', 999, '飲料', '以焙炒大麥搭配紅茶，調製出濃香十足的台灣味紅茶，滿足你對新鮮的期望！', 'https://www.pecos.com.tw/tmp/image/20140409/20140409202109_56209.jpg'),
('巧克力蛋糕', 45, 'in_stock', 999, '蛋糕', '鬆軟綿密巧克力蛋糕，採用進口可可粉，搭配優質巧克力餡夾心。香濃滋味，雙重享受!', 'https://www.pecos.com.tw/tmp/image/20191211/20191211151815_13581.jpg'),
('濃情可可巧酥冰沙', 55, 'in_stock', 999, '冰沙', '午後來杯海洋戀曲樂冰鯊！細緻的冰沙、濃郁的可可，搭配巧酥脆片，給您不一樣的雙重午茶享受。', 'https://www.pecos.com.tw/tmp/image/20180416/20180416140437_17188.png'),
('統一布丁', 10, 'in_stock', 999, '布丁', '統一布丁獨特焦糖風味與香Q滑嫩口感成就經典口味的國民甜點，不管是舀著吃、攪著吃、冰凍吃或邊玩邊吃，吃統一布丁的時候，就是最開心的時候！', 'https://www.pecos.com.tw/tmp/image/20150401/20150401092514_47176.jpg'),
('麻辣鍋牛肉麵[碗]', 70, 'in_stock', 999, '泡麵', '麻辣鍋精華湯底，以濃厚的牛肉原湯與酒釀的甘甜味感相互調和，拉扯出嗆麻香辣、鮮美回甘的濃郁滋味!', 'https://www.pecos.com.tw/tmp/image/20200214/20200214102358_40245.jpg');
