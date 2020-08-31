
INSERT INTO MEMBER(ID, Password, Name, Email, Phone, Birth, Gender, Position, Address)
            VALUE('admin', '21232f297a57a5a743894a0e4a801fc3', '管理員', 'admin@gmail.com', '0912345678', '1911-10-10', 'M', 'A','台中市西屯區市政北二路二段238號');


INSERT INTO CATEGORY(Name) Value('飲料');

INSERT INTO PRODUCT (Name, Price, State, Stock, DID, CategoryID, Info, Img)
VALUE('純喫茶綠茶', 25, 'in_stock', 999, 4, 1, '採集新鮮茶葉進行炒菁，呈現茶葉鮮綠與清香，搭配柔和的茉莉綠茶，口味清爽不甜膩，新鮮暢飲最過癮!', 'http://www.pecos.com.tw/tmp/image/20140409/20140409202153_39623.jpg');