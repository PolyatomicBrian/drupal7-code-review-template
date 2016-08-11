# Template

TODO: update me

Copy this directory and all of it's files to a new directory. The name should
match the Contrib module's name.


Requested By:

Reviewed By:

Date Completed:


## Security Controls

Things to look for:

- If a table is created is it removed when the module is uninstalled?
- Is user input properly sanitized?
- If there is an admin menu is it properly protected?

Note that all Drupal functions which return URLs (url(), request_uri(), etc.)
output plain URLs which have not been HTML escaped in any way (in other words,
they are plain-text). Remember to use check_url() to escape them when
outputting HTML (or XML). Don't use check_url() in situations where a real URL
is expected, e.g. in the HTTP Location: ... header.

**The above note is why we search for url and uri in drupal-static-review. We
need to make sure check_url is used when outputting HTML or XML.**

Review sanitization functions listed on the following page.

https://api.drupal.org/api/drupal/includes!common.inc/group/sanitization/7.x


## Code Review Notes 

Make any notes here.

