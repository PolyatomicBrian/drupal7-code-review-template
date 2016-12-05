# block_titlelink


## Review Metadata

    Requested By: Jeff Lyons
    Reviewed By: Clay
    Completed On: Nov 21, 2016
    Result: Uses PHP eval. Jeff is OK with not using this module.
            He has an alternative solution.
    

## Project Information

    Maintenance status: Actively maintained
    Development status: Under active development
    Module categories:  Content Display, Theme Enhancements
    Reported installs:  17,666 sites currently report using this module.


## Description

Block Title Link is a simple module that creates a link field in the Block
Admin page. It works by creating new template variables in the $block
object. It then uses hook_preprocess_block to wrap a link around the
block->subject variable. There is a also a configuration parameter on a per
block basis that disables the link from rendering in the title. This is
useful for using the link elsewhere on the block template. This module
provides the following variables to the $block object:

$block->title_link:
    
- The path stored with each block.

$block->title_link_title:

- The title attribute of the link. By default this is rendered as a
  ```"<a> title"``` attribute.


## Results & Summary

PHP eval() is used by this module.

---

## General Items & Threat Model

Below is a list of things to look for. Feel free to remove this once complete.

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

For details see block_titlelink-static-full.txt


### Install/Uninstall ###

- If a table is created is it removed when the module is uninstalled?

    NA
    
- Are global variables used?

    Yes, uninstalls block_titlelink_%

### Arbitrary Code Execution ###

The following items, if found, will prevent a module from being approved, full
stop. Depending on the module, use-case, and need, we may patch the module and
remove the dangerous functionality. Any patches will need to be fully tested.

- Is eval() or php_eval() functions used?

    Yes, ??? not sure why this is necessary

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