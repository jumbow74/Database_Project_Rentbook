--------------------------------------------------------
--  File created - Tuesday-December-15-2015   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table AA_BOOK
--------------------------------------------------------

  CREATE TABLE "SYSTEM"."AA_BOOK" 
   (	"ISBN" VARCHAR2(17 BYTE), 
	"BOOKNAME" VARCHAR2(200 BYTE), 
	"PRICERENT" NUMBER, 
	"TOTAL" NUMBER, 
	"REMAIN" NUMBER, 
	"ID_TYPE" NUMBER, 
	"ID_COMPANY" NUMBER, 
	"WRITER" VARCHAR2(200 BYTE), 
	"NUM_PAGE" NUMBER, 
	"DETAIL" LONG, 
	"DATE_ADD" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
REM INSERTING into SYSTEM.AA_BOOK
SET DEFINE OFF;
Insert into SYSTEM.AA_BOOK (ISBN,BOOKNAME,PRICERENT,TOTAL,REMAIN,ID_TYPE,ID_COMPANY,WRITER,NUM_PAGE,DETAIL,DATE_ADD) values ('9875268444','Vocabulary & Colours สัตว์เลี้ยงและสัตว์ป่า  ',15,10,9,300,4443,'บก. อดิศรา เตชะกิจจาทร ',368,'พบกับสารพันความรู้ สุดยอดเรื่องราวอันน่าทึ่ง ที่ถูกถ่ายทอดได้อย่างสนุกสนานขั้นเทพ ในแบบที่ไม่มีใครเหมือนและไม่เหมือนใคร',to_date('22-NOV-15','DD-MON-RR'));
Insert into SYSTEM.AA_BOOK (ISBN,BOOKNAME,PRICERENT,TOTAL,REMAIN,ID_TYPE,ID_COMPANY,WRITER,NUM_PAGE,DETAIL,DATE_ADD) values ('7965213648','การ์ตูน นุ่น The Series 3 ',10,15,15,300,4441,'จ๊อด8ริ้ว',265,'"จ๊อด8ริ้ว" กลับมาอีกครั้งกับการ์ตูนกระแทกสังคมที่อ่านเอามันส์ก็มันส์ อ่านไปคิดไปก็ได้สาระ เรื่องราวของ "นุ่น" และแก๊งเพื่อนที่มาพร้อมเรื่องราววุ่นๆ เมื่อมีคนแอบปล่อยคลิปเด็ด จนเป็นเรื่องเป็นราวใหญ่โต',to_date('22-NOV-15','DD-MON-RR'));
Insert into SYSTEM.AA_BOOK (ISBN,BOOKNAME,PRICERENT,TOTAL,REMAIN,ID_TYPE,ID_COMPANY,WRITER,NUM_PAGE,DETAIL,DATE_ADD) values ('5847456985','สรุปเข้ม Vocab พร้อมแนวข้อสอบ',15,10,10,400,4441,'ดร. ศุภวัฒน์ พุกเจริญ ',327,'หนังสือเล่มนี้สรุปคำศัพท์ภาษาอังกฤษกว่า 1,500 คำ ที่มักออกข้อสอบในระดับมัธยมศักษาตอนปลายและมหาวิทยาลัย',to_date('22-NOV-15','DD-MON-RR'));
Insert into SYSTEM.AA_BOOK (ISBN,BOOKNAME,PRICERENT,TOTAL,REMAIN,ID_TYPE,ID_COMPANY,WRITER,NUM_PAGE,DETAIL,DATE_ADD) values ('4569773216','สุดยอดความรู้รอบตัว ',20,20,19,500,4441,'ฝ่ายวิชาการภาษาไทย บริษัท ซีเอ็ดยูเคชั่น จำกัด (มหาชน) ',345,'พบกับสารพันความรู้ สุดยอดเรื่องราวอันน่าทึ่ง ที่ถูกถ่ายทอดได้อย่างสนุกสนานขั้นเทพ ในแบบที่ไม่มีใครเหมือนและไม่เหมือนใคร',to_date('22-NOV-15','DD-MON-RR'));
Insert into SYSTEM.AA_BOOK (ISBN,BOOKNAME,PRICERENT,TOTAL,REMAIN,ID_TYPE,ID_COMPANY,WRITER,NUM_PAGE,DETAIL,DATE_ADD) values ('4589685872','รักตัวน้อยตัวนิด',10,25,25,100,4442,'ชณชาดิ์',304,'เพราะความไว้เนื้อเชื่อใจในอดีต ทำให้ ‘รฐา’ ประสบกับเหตุการณ์ที่ยากจะลืมเลือน เธอจึงไม่เคยเปิดใจให้ใครง่ายๆ อีก กระทั่ง ‘พัชร’ อดีตผู้เข้าร่วมแข่งขันรายการ ‘Really Fake รวมพลคนโกหก’ ร่วมกับเธอได้บังเอิญมาเจอและช่วยเหลือเธอจากแก๊งรถตู้ลักเด็ก',to_date('22-NOV-15','DD-MON-RR'));
--------------------------------------------------------
--  DDL for Index AA_BOOK_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "SYSTEM"."AA_BOOK_PK" ON "SYSTEM"."AA_BOOK" ("ISBN") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  Constraints for Table AA_BOOK
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."AA_BOOK" ADD CONSTRAINT "AA_BOOK_PK" PRIMARY KEY ("ISBN")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "SYSTEM"."AA_BOOK" MODIFY ("ISBN" NOT NULL ENABLE);
