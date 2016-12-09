# Review of Scheduler 7.x-1.5

## Review Metadata

    Requested By: TBA
    Reviewed By: Hunter Kippen
    Completed On: Saturday December 3rd, 2016
    Updates:
    Result:
    

## Project Information

    Maintenance status: Actively Maintained
    Development status: Under Active Development
    Module categories:  Administration, Content
    Reported installs:  79,055


## Description

Scheduler gives content editors the ability to schedule nodes to be published
and unpublished at specified dates and times in the future.

Dates can be entered either as plain text or with calendar popups. To use
calendar popups in Drupal 7 you need to install the Date Popup module,
which is part of the Date module. In Drupal 8 this is built into Core. 


## Results & Summary

I would recommend for this module to be tentatively Approved, there are
some uses of unsafe functions that need to be looked at to make sure their
use is safe. I looked at them, and they seem fine in context, but the fact
that they exist may be grounds to bar approval.

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

- Uses hook_schema() table is automatically installed and uninstalled.
- Has a plethora of global variables. Are all deleted on uninstall.


### Arbitrary Code Execution ###

The following items, if found, will prevent a module from being approved, full
stop. Depending on the module, use-case, and need, we may patch the module and
remove the dangerous functionality. Any patches will need to be fully tested.

- Is eval() or php_eval() functions used?
  - No, only use of 'eval' is in a comment in the word 'evaluation'
- Is preg_replace being used?
  - Yes, in multiple instances. However, the /e flag is not used.

    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/using-php-with-eval-or-drupal_eval
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/do-not-use-e-in-preg_replace-use-preg_replace_callback-instead


### XSS ###

- Is user input properly sanitized?
  - Mostly, liberal use of filter_xss() and t(), Yet there are multiple uses
    of form_state('input'), which could end up causing a problem
- Is output properly encoded?
  - Yes
- Is text handled in a secure way? 
  - Yes

    References:
    - https://www.drupal.org/node/28984
    - https://www.drupal.org/docs/7/security/writing-secure-code/handle-user-input-with-care
    - https://www.drupal.org/node/28984
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/avoid-using-data-from-form_stateinput


### SQLi ###

- Are all queries parameterized?
  - Yes

    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code/overview
    - https://www.drupal.org/docs/7/security/writing-secure-code-0/database-access


### Authorization ###

- Are permissions properly applied?
  - Yes
- Are any users able to input executable code?
  - No
 

### CSRF ###

- Does the module use the Form API for all requests that modify data?
  - Yes
- Does the module properly follow the Form API documentation?
  - Yes

    References:
    - https://www.drupal.org/docs/7/security/writing-secure-code/create-forms-in-a-safe-way-to-avoid-cross-site-request-forgeries


### Error Handling ###

- Ensure that all method/function calls that return a value have proper error
  handling and return value checking. 

    References:
    - https://api.drupal.org/api/drupal/includes%21errors.inc/7.x
