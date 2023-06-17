create table  locality(
  	locaID int primary key not null auto_increment,
  	locality varchar(100),
  	country varchar(30));

create table wstatus(
  	stID int primary key not null auto_increment,
  	status varchar(20),
  	forwhat varchar(20));

create table wine (	
	wineID int auto_increment not null primary key,
 	name varchar(100),
 	locaID int,
 	kind varchar(32),
 	color varchar(8),
	vintage int,
	price int,
	picture varchar(150),
	comment text,
	stID int,
	foreign key(locaID) references locality(locaID),
	foreign key(stID) references wstatus(stID));

create table wineSet(
	setID varchar(20) not null primary key,
 	name varchar(32),
	comment text,
	stID int,
	foreign key(stID) references wstatus(stID));

create table setDetail(
	id int primary key auto_increment,
 	setID varchar(20),
 	wineID int,
 	quantity int,
 	foreign key(setID) references wineSet(setID),
 	foreign key(wineID) references wine(wineID));

create table idpw(
	email varchar(150) primary key not NULL, 
	password varchar(20), 
	updateTime datetime);

create table customer( 
	customerID varchar(10) primary key not NULL, 
	firstName varchar(30), 
	lastName varchar(16), 
	email varchar(150), 
	phone varchar(20), 
	postcode char(8),
	address varchar(300),
	status char(10),
	regDateTime datetime,
	foreign key (email) references idpw(email));
create table cusOrder(
	orderID int primary key auto_increment,
	customerID varchar(10),
	orderTime datetime,
	deliveryDay date,
	deliveryPostcode char(8),
	deliveryAddr varchar(300),
	receiverName varchar(60),
	status char(10),
	foreign key (customerID) references customer(customerID));

create table orderWine(
	id int primary key auto_increment,
	ordID int,
	wID int,
	qty int,
	foreign key (ordID) references cusOrder(orderID),
	foreign key (wID) references wine(wineID));

create table orderWineSet(
	id int primary key auto_increment,
	ordID int,
	setID varchar(20),
	qty int,
	foreign key (ordID) references cusOrder(orderID),
	foreign key (setID) references wineSet(setID));

create table bill(
	billID int primary key not null auto_increment,
	cID varchar(10),
	ordID int,
	reqDay datetime,
	deadline datetime,
	payAmount int,
	status varchar(100),
	foreign key (cID) references customer(customerID),
	foreign key (ordID) references cusOrder(orderID));






