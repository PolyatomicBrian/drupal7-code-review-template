# Feed_import

## Review Metadata

Requested By: Michael Prell

Reviewed By: Clay, Hunter

Review Completed On: Sep X, 2016

Review Updates: Sep 6-, 2016



Last SA Update: Unsure



## Module Description

Feed Import allows to import content into entities (like nodes, users, taxonomy
terms, ...) from various file or database types.

Also can monitor feed items for changes to update imported entities,
can set an expire time to entities to deleted expired ones when cron runs
or can be used as one time import.
All settings can be made from an easy to use interface. 


## Attack Surface

- Input: feed_import-static-input.md
- Sanitization: feed_import-static-sanitization.md
- SQL: feed_import-static-sql.md


## Security Controls

Things to look for:

- If a table is created is it removed when the module is uninstalled?
- Is user input properly sanitized?
- Is output properly encoded?
- Are permissions properly applied?


## Code Review Notes

Removing use of eval.

Plugins consist of various 1 or 2 function files and some classes to use
functionality of other modules. Form alterations exist, but are secure.


