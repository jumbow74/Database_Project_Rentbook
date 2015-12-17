--------------------------------------------------------
--  Ref Constraints for Table AA_RENT
--------------------------------------------------------

  ALTER TABLE "SYSTEM"."AA_RENT" ADD CONSTRAINT "AA_RENT_FK1" FOREIGN KEY ("ID_EBOOK")
	  REFERENCES "SYSTEM"."AA_EACHBOOK" ("ID") ENABLE;
  ALTER TABLE "SYSTEM"."AA_RENT" ADD CONSTRAINT "AA_RENT_FK2" FOREIGN KEY ("ID_CUSTOMER")
	  REFERENCES "SYSTEM"."AA_CUSTOMER" ("ID") ENABLE;
