# Template

Requested By: Michael Prell

Reviewed By: Hunter Kippen

Date Completed: 08/03/2016


## Security Controls

Things to look for:

- If a table is created is it removed when the module is uninstalled?
- Is user input properly sanitized?
- If there is an admin menu is it properly protected?


## Code Review Notes

og_register alters the registration query to insert a user into a group.
queries made in the submodule only take values from the existing query. There is
not direct user input. Form alterations do not contain user input.

og_field_access deals with permissions, no queries or user input involved. uses
properly sanitized display text.

---

### Files

**og_register**

 + og_register.info

 + og_register.module

   - Allows a user to add themselves to a group upon making an account.


**og_field_access**

  + og_field_access.info

  + og_field_access.module

    - Defines whether or not members/nonmembers of a group can access certain fields

  + og_field_access.test
