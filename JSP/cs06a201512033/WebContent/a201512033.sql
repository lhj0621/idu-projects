//사용자 생성
create user ja_033 identified by "cometrue";
//사용자 권한 부여
grant connect, resource to ja_033

//사용자 생성
create user csa_201512033 identified by "cometrue";
//사용자 권한 부여
grant connect, resource to ja_033

create table  csa_member (
	a_email	varchar2(30) not null primary key,
	a_pw	varchar2(20) not null,
	a_name	varchar2(20),
	a_phone varchar2(20),
	a_image	varchar2(50),
	a_birthday date
);

select * from csa_member;

insert into csa_member(a_email,a_pw,a_name,a_phone,a_birthday) values('hsh@induk.ac.kr','cometrue','한성현','1133','1988-10-1'); 
insert into csa_member(a_email,a_pw,a_name,a_phone,a_image,a_birthday) values('hsh@induk.ac.kr4','cometrue','한성현4','1133','abc,jpg','1988-10-1');
drop table csa_member;

create table csa_product (
	pno		number(7) not null primary key,
	name	varchar2(30) not null,
	price	number(10) not null,
	cno		varchar2(10) not null,
	color	varchar2(20),
	psize	varchar2(20),
	regdate date,
	image	varchar2(50)
);

insert into csa_product(pno, name, price, cno, image) 
values(p_seq.nextval, 'itme01', 50000, 'kids', 'bridge1.png');

select * from csa_product;

select * from tab;

create table ja_033_product (
	pno		number(7) not null primary key,
	name	varchar2(30) not null,
	price	number(10) not null,
	cno		varchar2(10) not null,
	color	varchar2(20),
	psize	varchar2(20),
	regdate date,
	image	varchar2(50)
);
select * from ja_033_product;
drop table ja_033_product;

select * from (select rownum rnum, pno, name,price,cno,image from ja_033_product) 
a where a.rnum between 2 and 3;

update ja_033_product set name=? price=? Cno=? image=? 
where pno = ?;

select * from ja_033_product where pno='1000001';

select pno, name, price, cno, image from ja_033_product;

create sequence p_seq INCREMENT BY 1 START WITH 1000000; // auto_increment
drop sequence p_seq;

insert into ja_033_product(pno, name, price, cno, image) 
values(p_seq.nextval, 'itme01', 50000, 'kids', 'bridge1.png');

drop table ja_033_member;

create table  ja_033_member (
	email	varchar2(30) not null primary key,
	pw		varchar2(20) not null,
	name	varchar2(20),
	phone   varchar2(20)
);

update ja_033_member set name='lee.hj', phone='7625' where email='abcde621@naver.com'; 

update ja_033_member set name='lee.hj', phone='7624' where email='abcde621@naver.com'; 
insert into ja_033_member(email,pw,name) values('abcde621@naver.com','cometrue','이현준');
insert into ja_033_member(email,pw,name) values('lhj0621@gmail.com','cometrue','홍길동');
insert into ja_033_member(email,pw,name) values('hsh@induk.ac.kr','cometrue','한성현');

 
select * from ja_033_member where email='abcde621@naver.com' and pw='cometrue';

select *from (select rownum rnum,pno,name,price,cno,regdate,image from ja_033_product order by name asc) b where b.rnum between 1 and 3;

delete from ja_033_product where pno = 1000002;

create table  ja_033_member (
	a_email	varchar2(30) not null primary key,
	a_pw		varchar2(20) not null,
	name	varchar2(20),
	phone   varchar2(20)
);