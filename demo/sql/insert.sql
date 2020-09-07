
INSERT INTO MEMBER(ID, Password, Name, Email, Phone, Birth, Gender, Position, Address)
            VALUE('admin', '$2y$11$vxjirN5/fwYJvowt.weK/ODHr5YUduifWuMJMVzvq/y/egfov3ZPK', '管理員', 'admin@gmail.com', '0912345678', '2020-10-10', 'M', 'A','台中市西屯區市政北二路二段238號'),
            ('staff', '$2y$11$BfHGppHdH.3.8pz58AXqBeqtBhk.ykI/xWdt80Cce7OygtXgmt2ia', '廢物員工', 'staff@gmail.com', '0912345678', '2020-10-10', 'M', 'S', '台中市西屯區市政北二路二段238號');


INSERT INTO CATEGORY(Name) Value('飲料'),('布丁'),('泡麵');

INSERT INTO PRODUCT (Name, Price, State, Stock, CategoryName, Info, Img)
VALUE('純喫茶綠茶', 25, 'in_stock', 999, '飲料', '採集新鮮茶葉進行炒菁，呈現茶葉鮮綠與清香，搭配柔和的茉莉綠茶，口味清爽不甜膩，新鮮暢飲最過癮!', 'http://www.pecos.com.tw/tmp/image/20140409/20140409202153_39623.jpg'),
('統一布丁', 10, 'in_stock', 999, '布丁', '統一布丁自1979年推出後，就是大朋友、小朋友們的開心寶物；它是阿公阿嬤哄孫子的美味點心、學生課後的開心補給、爸媽鼓勵孩子時的甜蜜獎勵、更是全家人飯後聊天時的必要配備，它不但乘載著親子間的美好記憶，更能串起不同世代間的情感連結。統一布丁獨特焦糖風味與香Q滑嫩口感成就經典口味的國民甜點，不管是舀著吃、攪著吃、冰凍吃或邊玩邊吃，吃統一布丁的時候，就是最開心的時候！', 'https://www.pecos.com.tw/tmp/image/20150401/20150401092514_47176.jpg'),
('麻辣鍋牛肉麵[碗]', 70, 'in_stock', 999, '泡麵', '麻辣鍋精華湯底，以濃厚的牛肉原湯與酒釀的甘甜味感相互調和，拉扯出嗆麻香辣、鮮美回甘的濃郁滋味!', 'https://www.pecos.com.tw/tmp/image/20200214/20200214102358_40245.jpg');
