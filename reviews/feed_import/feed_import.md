# feed_import

## Review Metadata

    Requested By: Michael Prell
    Reviewed By: Clay, Hunter
    Review Completed On: Sep X, 2016
    Review Updates: Sep 6-, 2016


## Project Information

    Maintenance status: Seeking co-maintainer(s)
    Development status: Under active development
    Module categories: Import/Export
    Reported installs: 5,677 sites currently report using this module.
    Downloads: 41,145


## Description

Feed Import allows to import content into entities (like nodes, users, taxonomy
terms, ...) from various file or database types.

Also can monitor feed items for changes to update imported entities,
can set an expire time to entities to deleted expired ones when cron runs
or can be used as one time import.
All settings can be made from an easy to use interface. 


## Issue Queue

Any critical issues worth noting?

- CSRF-Cross-site request forgery found in your module

  https://www.drupal.org/node/2450859

        Status:   Active
        Priority: Critical 
        Category: Bug report 
        Version:  7.x-3.4 
        Updated:  1 year 8 months 
        Created:  1 year 8 months 


## Attack Surface

Input: 
- feed_import-static-input.txt
- feed_import-static-sanitization.txt

SQL:
- feed_import-static-sql.txt

URLs:
- feed_import-urls.txt


## Security Controls

Things to look for.

### General

- If a table is created is it removed when the module is uninstalled?

### XSS

- Is user input properly sanitized?
- Is output properly encoded?
    - https://www.drupal.org/node/28984
    - https://www.drupal.org/docs/7/security/writing-secure-code/handle-user-input-with-care

- Is text handled in a secure way? 
    - https://www.drupal.org/node/28984
  
### SQLi 

References:

- Are all queries parameterized?


### Authorization

- Are permissions properly applied?


### CSRF

- Does the module use the Form API for all requests that modify data?
- Does the module properly follow the Form API documentation?


## Code Review Notes

- Removed use of eval. See gitlab:web/feed_import

    This needs to be tested by Michael.

Plugins consist of various 1 or 2 function files and some classes to use
functionality of other modules. Form alterations exist, but are secure.

