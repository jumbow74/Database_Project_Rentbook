--------------------------------------------------------
--  Constraints for Table AA_TYPEBOOK
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."AA_TYPEBOOK" ADD CONSTRAINT "AA_TYPEBOOK_PK" PRIMARY KEY ("ID_TYPE")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "SYSTEM"."AA_TYPEBOOK" MODIFY ("ID_TYPE" NOT NULL ENABLE);
