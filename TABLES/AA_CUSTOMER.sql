--------------------------------------------------------
--  DDL for Table AA_CUSTOMER
--------------------------------------------------------

  CREATE TABLE "SYSTEM"."AA_CUSTOMER" 
   (	"ID" NUMBER, 
	"FNAME" VARCHAR2(30 BYTE), 
	"LNAME" VARCHAR2(30 BYTE), 
	"ADDRESS" LONG, 
	"TEL" VARCHAR2(11 BYTE), 
	"BIRTHDAY" DATE, 
	"GENDER" VARCHAR2(6 BYTE), 
	"E_MAIL" VARCHAR2(40 BYTE), 
	"USERNAME" VARCHAR2(30 BYTE), 
	"PASSWORD" VARCHAR2(20 BYTE), 
	"ACCOUNT_ADMIN" NUMBER(1,0)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
