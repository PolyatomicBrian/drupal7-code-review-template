# feed_import

## Review Metadata

    Requested By: Michael Prell
    Reviewed By: Clay, Hunter
    Completed On: Nov 11, 2016
    Updates:


## Project Information

    Maintenance status: Seeking co-maintainer(s)
    Development status: Under active development
    Module categories:  Import/Export
    Reported installs:  5,677 sites currently report using this module.


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

The following are the things we need to look for and verify.

In order to identify most, if not all, of the following run the drupal static
review scriptm see gitlab:infosec/drupal-static-review for details.


### General ###

- If a table is created is it removed when the module is uninstalled?


### Arbitrary Code Execution ###

The following items, if found, will prevent a module from being approved, full
stop. Depending on the module, use-case, and need, we may patch the module and
remove the dangerous functionality. Any patches will need to be fully tested.

- Is eval() or php_eval() functions used?

    **NOTES** eval() is used. The functionality has been removed and feed_import
    has been added to gitlab:web.

- Is preg_replace being used?

    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/using-php-with-eval-or-drupal_eval
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/do-not-use-e-in-preg_replace-use-preg_replace_callback-instead


### XSS ###

- Is user input properly sanitized?
- Is output properly encoded?
- Is text handled in a secure way? 

    References:
    - https://www.drupal.org/node/28984
    - https://www.drupal.org/docs/7/security/writing-secure-code/handle-user-input-with-care
    - https://www.drupal.org/node/28984
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/avoid-using-data-from-form_stateinput


### SQLi ###

- Are all queries parameterized?

    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code/overview
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/database-access

### Authorization ###

- Are permissions properly applied?
 

### CSRF ###

- Does the module use the Form API for all requests that modify data?
- Does the module properly follow the Form API documentation?

    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code/create-forms-in-a-safe-way-to-avoid-cross-site-request-forgeries


## Results & Summary

- Removed use of eval. See gitlab:web/feed_import

    This needs to be tested by Michael.

- An existing issue exists for a CSRF vulnerability (see Issue Queue above).

    This will likely prevent this module from being installed on production
    servers.
    
    TODO: we should verify this and maybe offer a patch if our team finds this
    module to be very useful.
    
- Plugins consist of various 1 or 2 function files and some classes to use
  functionality of other modules.

- Form alterations exist, but are secure.

    TODO: needs to be confirmed

