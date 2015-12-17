--------------------------------------------------------
--  Ref Constraints for Table AA_EACHBOOK
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."AA_EACHBOOK" ADD CONSTRAINT "AA_EACHBOOK_FK1" FOREIGN KEY ("ISBN")
	  REFERENCES "SYSTEM"."AA_BOOK" ("ISBN") ENABLE;
