# Review Template

TODO: update me

Copy this directory and all of it's files to a new directory. The name should
match the Contrib module's name.

## Review Metadata

    Requested By: 
    Reviewed By: 
    Completed On: 
    Updates:
    Result:
    

## Project Information

    Maintenance status: 
    Development status: 
    Module categories:  
    Reported installs:  


## Description

TODO


## Results & Summary

TODO by reviewer

---

## General Items & Threat Model

Below is a list of things to look for.

Note that all Drupal functions which return URLs (url(), request_uri(), etc.)
output plain URLs which have not been HTML escaped in any way (in other words,
they are plain-text). Remember to use check_url() to escape them when
outputting HTML (or XML). Don't use check_url() in situations where a real URL
is expected, e.g. in the HTTP Location: ... header.

**The above note is why we search for url and uri in drupal-static-review. We
need to make sure check_url is used when outputting HTML or XML.**

Review sanitization functions listed on the following page.

https://api.drupal.org/api/drupal/includes!common.inc/group/sanitization/7.x


In order to identify most, if not all, of the following run the drupal static
review scripts see gitlab:infosec/drupal-static-review for details.


### Install/Uninstall ###

- If a table is created is it removed when the module is uninstalled?
- Are global variables used?


### Arbitrary Code Execution ###

The following items, if found, will prevent a module from being approved, full
stop. Depending on the module, use-case, and need, we may patch the module and
remove the dangerous functionality. Any patches will need to be fully tested.

- Is eval() or php_eval() functions used?

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


### Error Handling ###

- Ensure that all method/function calls that return a value have proper error
  handling and return value checking. 

    References:
    - https://api.drupal.org/api/drupal/includes%21errors.inc/7.x