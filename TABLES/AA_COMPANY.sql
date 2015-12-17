--------------------------------------------------------
--  DDL for Table AA_COMPANY
--------------------------------------------------------

  CREATE TABLE "SYSTEM"."AA_COMPANY" 
   (	"ID_COMPANY" NUMBER, 
	"NAME" VARCHAR2(100 BYTE), 
	"PHONE" VARCHAR2(11 BYTE), 
	"ADDRESS" VARCHAR2(300 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
