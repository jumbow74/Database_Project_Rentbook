--------------------------------------------------------
--  Ref Constraints for Table AA_BOOK
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."AA_BOOK" ADD CONSTRAINT "AA_BOOK_FK1" FOREIGN KEY ("ID_TYPE")
	  REFERENCES "SYSTEM"."AA_TYPEBOOK" ("ID_TYPE") ENABLE;
  ALTER TABLE "SYSTEM"."AA_BOOK" ADD CONSTRAINT "AA_BOOK_FK2" FOREIGN KEY ("ID_COMPANY")
	  REFERENCES "SYSTEM"."AA_COMPANY" ("ID_COMPANY") ENABLE;
