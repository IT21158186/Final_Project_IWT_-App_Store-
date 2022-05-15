create table reg_Users(
email VARCHAR(50),
first_name VARCHAR(20),
last_name VARCHAR(20) ,
password VARCHAR(50),
mobile_no INT,
CONSTRAINT user_pk1 primary key (email)
);

CREATE TABLE developer(
developer_id INT,
company_name VARCHAR(30),
about VARCHAR(50),
email VARCHAR(50) not null,
password VARCHAR(50) not null,
CONSTRAINT developer_pk PRIMARY KEY(developer_id)
);

CREATE TABLE catergory(
cat_id INT,
cat_name VARCHAR(30),
CONSTRAINT cat_pk PRIMARY KEY(cat_id)
);

CREATE TABLE apps(
app_id INT NOT NULL AUTO_INCREMENT,
app_name VARCHAR(40),
description VARCHAR(50) ,
developer_id INT,
cat_id INT,
file_path VARCHAR(80),
app_image VARCHAR(80),
CONSTRAINT apps_pk primary key (app_id),
CONSTRAINT apps_fk FOREIGN KEY (developer_id) references developer(developer_id),
CONSTRAINT apps_fk2 FOREIGN KEY (cat_id) references catergory(cat_id)
);


CREATE TABLE review(
app_id INT,
email VARCHAR(50),
rating INT,
comment VARCHAR(40),
CONSTRAINT review_pk PRIMARY KEY(app_id,email),
CONSTRAINT review_fk_1 FOREIGN KEY (app_id) references apps(app_id),
CONSTRAINT review_fk_2 FOREIGN KEY (email) references reg_Users(email)
);

CREATE TABLE administrator(
admin_id INT,
admin_name VARCHAR(20),
email VARCHAR(50),
password VARCHAR(50),
CONSTRAINT adminis_pk PRIMARY KEY (admin_id)
);

INSERT INTO reg_Users VALUES ('mahagedara@mail.com','Nimsara','Mahagedara','Nimsara1122','0763355762');
INSERT INTO reg_Users VALUES ('pinidiya96@mail.com','Uresh','Pinidiya','Uresh1122','0712342433');
INSERT INTO reg_Users VALUES ('pinsara@mail.com','Deneth','Pinsara','Deneth1122','0769379809');
INSERT INTO reg_Users VALUES ('vimansa@mail.com','Sandali','Vimansa','Sandali1122','0732434433');
INSERT INTO reg_Users VALUES ('hearth@mail.com','Dewmi','Herath','Dewmi1122','0781232123');

INSERT INTO developer VALUES ('0001','SLIIT','Professional App Maker Focused on Desiging Apps','0001sliit@mail.com','sliit1122');
INSERT INTO developer VALUES ('0002','CINEC','Android App developer','0002cinec@mail.com','cinec1122');
INSERT INTO developer VALUES ('0003','NSBM','Game developer','0003nsbm@mail.com','nsbm1122');
INSERT INTO developer VALUES ('0004','NIBM','Computer architecture','0004nibm@mail.com','nibm1122');
INSERT INTO developer VALUES ('0005','SIBA','Cyber sequrity App Maker','0005siba@mail.com','siba1122');

INSERT INTO catergory VALUES ('100','Apps');
INSERT INTO catergory VALUES ('200','Games');
INSERT INTO catergory VALUES ('300','Commercial');
INSERT INTO catergory VALUES ('400','Educational');
INSERT INTO catergory VALUES ('500','Media');

INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES ('Snapchat','Photo Editors Filters','0001','100','1.apk','1.png');
INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES ('Whatsapp','Lets Whatsapp each other','0002','100','2.apk','2.png');
INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES ('Facebook','Lets Connect the world together','0003','100','3.apk','3.png');
INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES ('Clash Of Clans','Group and play','0004','200','4.apk','4.png');
INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES ('BAPP','Bank With us','0005','300','5.apk','5.png');
INSERT INTO apps(app_name,description,developer_id,cat_id,file_path,app_image) VALUES ('EduAPP','Education together','0005','400','6.apk','6.png');

INSERT INTO review VALUES ('1','mahagedara@mail.com','4','it is a very Cool App');
INSERT INTO review VALUES ('2','pinidiya96@mail.com','5','Super chat app');
INSERT INTO review VALUES ('3','pinsara@mail.com','3','Takes long time to open');
INSERT INTO review VALUES ('4','vimansa@mail.com','2','Not good');
INSERT INTO review VALUES ('5','hearth@mail.com','4','Not bad');

INSERT INTO administrator VALUES('101','Ad.Pinsara','pinsara@gmail.com','Pinsara1234');
INSERT INTO administrator VALUES('202','Ad.Dewmi','dewmi@gmail.com','dewmi1234');
INSERT INTO administrator VALUES('303','Ad.Uresh','uresh@gmail.com','uresh1234');
INSERT INTO administrator VALUES('404','Ad.Nimsara','nimsara@gmail.com','nimsara1234');
INSERT INTO administrator VALUES('505','Ad.Sandali','sandali@gmail.com','sandali1234');

ALTER TABLE `developer`
ADD UNIQUE (email);
ALTER TABLE `developer`
ADD `mobile` varchar(255); 


select *
from reg_Users
select *
from review
select *
from administrator
select *
from apps
select *
from catergory
