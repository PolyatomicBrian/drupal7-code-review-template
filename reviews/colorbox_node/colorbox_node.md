# review template


## Review Metadata

    Requested By: Ann
    Reviewed By: Clay, Tristan
    Completed On:
    Updates:
    Result:
    

## Project Information

Modules in alpha, beta, dev or any other release other than production will not
be approved for use in production environments.

    Maintenance status: Actively maintained
    Development status: Under active development
    Module categories: Content Display, Theme Enhancements
    Reported installs: 29,670


## Description

TODO by reviewer


## Summary Results

TODO by reviewer

---

## General Items & Threat Model

Below is a list of things to look for when performing a code review. Keep in
mind that when performing a code review it's not only important to review and
validate the correctness of existing code, it's also important to consider
if security control or mechanism is not being implemented when it should be.

Feel free to remove this when the review is complete. However, this should
remain as part of template.md.


### Install/Uninstall ###

- If a table is created is it removed when the module is uninstalled?

    TODO: answer
    
- Are global variables used?

    TODO: answer

### Arbitrary Code Execution ###

The following items, if found, will prevent a module from being approved, full
stop. Depending on the module, use-case, and developer need, we may patch the
module and remove the dangerous functionality. Any patches will need to be
fully tested.

- Is eval() or php_eval() functions used?

    TODO: answer

- Is preg_replace being used?

    TODO: answer

    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/using-php-with-eval-or-drupal_eval
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/do-not-use-e-in-preg_replace-use-preg_replace_callback-instead


### XSS ###

```
Note that all Drupal functions that return URLs (url(), request_uri(), etc.)
output plain URLs which have not been HTML escaped in any way (in other words,
they are plain-text).

Remember to use check_url() to escape them when outputting HTML (or XML). Don't
use check_url() in situations where a real URL is expected, e.g. in the HTTP
Location: ... header.

**The above note is why we search for url and uri in drupal-static-review. We
need to make sure check_url is used when outputting HTML or XML.**

Review sanitization functions listed on the following page.

https://api.drupal.org/api/drupal/includes!common.inc/group/sanitization/7.x

In order to identify most, if not all, of the following, run the drupal static
review script available on github at the link below

https://github.com/clayball/drupal7-static-review

Include the output from drupal-static-review.py.
```

- Is user input properly sanitized/Are validation functions used?

    TODO: answer
    
- Is output properly encoded?

    TODO: answer
    
- Is text handled in a secure way? 

    TODO: answer
    
    References:
    - https://www.drupal.org/node/28984
    - https://www.drupal.org/docs/7/security/writing-secure-code/handle-user-input-with-care
    - https://www.drupal.org/node/28984
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/avoid-using-data-from-form_stateinput


### SQLi ###

- Are all queries parameterized?

    TODO: answer
    
    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code/overview
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/database-access


### Authorization ###

- Are permissions properly applied?
 
    TODO: answer
    
### CSRF ###

- Does the module use the Form API for all requests that modify data?

    TODO: answer
    
- Does the module properly follow the Form API documentation?

    TODO: answer
    
    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code/create-forms-in-a-safe-way-to-avoid-cross-site-request-forgeries


### Error Handling ###

- Ensure that all method/function calls that return a value have proper error
  handling and return value checking. 

    TODO: answer

    References:
    - https://api.drupal.org/api/drupal/includes%21errors.inc/7.x
