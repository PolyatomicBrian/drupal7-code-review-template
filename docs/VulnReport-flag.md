Date:
7/21/13

Author:
James Davis

Module Description:
Flag is a flexible flagging system that is completely customizable by
the administrator. Using this module, the site administrator can
provide any number of flags for nodes, comments, users, and any other
type of entity. Some possibilities include bookmarks, marking
important, friends, or flag as offensive. With extensive views
integration, you can create custom lists of popular content or keep
tabs on important content.

Vulnerability Description and Potential Impact:
A XSS vulnerability was found in the Drupal Flag 7.x-3.0 module. This
vulnerability allows an attacker to inject malicious client-side code
to an unsuspecting end user.The end user thinks that this code is from
a trusted source, which allows the attacker to potentially access the
users cookies, session tokens, or other sensitive information. This
vulnerability is the required flag title field. Here a user can input
malicious code to be executed. After the vulnerable Flag 7.x-3.0
module is added to the Drupal site, the vulnerability can be accessed
through the structure, flags menu (/admin/structure/flags). Here the
vulnerability can be exploited by either creating a new flag or
editing an existing one. Through either avenue, the flag title can be
altered to exploit the XSS vulnerability that exists.

Systems Affected:
Flag Module 7.x-3.0

Mitigating Factors:
One of the mitigating factors of this vulnerability is the fact that
the malicious user first needs to have administrator rights to the
Drupal site. The url that the vulnerability is accessed at is
site_name/admin/structure/flags. Without the administrator
permissions, a malicious user will not have the ability to exploit
this vulnerability.

Proof of Concept:
1) Login as the administrator to your Drupal site
2) Once logged in, if the vulnerable flag module is not already
installed, install it. Flag 7.x-3.0 Module
3) Now that the flag module is installed access it by clicking the
structure tab on the administrator bar
4) A popup window will open where "Flags" is a selectable option.
Click on the "Flags" link
5) Click the "Add flag" link and then click continue
6) Then a form will appear, which is where all the flag information is
to be entered
7) The first field, the "Title" field, which is a required field is
where the vulnerability is
8) In the title field enter a malicious script for example
"alert('title')"
9) Once this is done, save the new flag. Every time now that you go
back into the flags menu to edit or create new flags, a popup will appear

