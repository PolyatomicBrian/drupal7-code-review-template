# Threat Modeling - Drupal Contrib Modules

Using these methods we'll produce a threat model report for the Drupal
contributed modules and themes that we'll be reviewing.


## What we are looking for

This is module specific. In this context we aren't concerned about headers,
login form, or core level threats.

- Locate entry points
    
    - where does user input occur?

- Locate database queries

	- where are queries located (which urls and files)?
    - what actions call these queries?

- Trust levels
    
    What permissions are used? Who can do what?

	- authenticated users?
	- site admin?
	- groups?


## Sanitization Functions

Comments at includes/common.inc, line 1353
    Common functions that many Drupal modules will need to reference.

Located in the following files

- $DRUPAL_ROOT/includes/common.inc
- $DRUPAL_ROOTmodules/filter/filter.module
- $DRUPAL_ROOTincludes/bootstrap.inc

---

check_markup 	modules/filter/filter.module
	Runs all the enabled filters on a piece of text.

check_plain 	includes/bootstrap.inc
	Encodes special characters in a plain-text string for display as HTML.

check_url 	includes/common.inc 
	Strips dangerous protocols from a URI and encodes it for output to HTML.

drupal_attributes 	includes/common.inc 
	Converts an associative array to an XML/HTML tag attribute string.

drupal_strip_dangerous_protocols 	includes/common.inc 
	Strips dangerous protocols (e.g. 'javascript:') from a URI.

filter_xss 	includes/common.inc 
	Filters HTML to prevent cross-site-scripting (XSS) vulnerabilities.

filter_xss_admin 	includes/common.inc 
	Applies a very permissive XSS/HTML filter for admin-only use.

filter_xss_bad_protocol 	includes/common.inc 
	Processes an HTML attribute value and strips dangerous protocols from URLs.

format_string 	includes/bootstrap.inc 
	Formats a string for HTML display by replacing variable placeholders.

get_t 	includes/bootstrap.inc 
	Returns the name of the proper localization function.

st 	includes/install.inc 
	Translates a string when some systems are not available.

t 	includes/bootstrap.inc 
	Translates a string to the current language or to a given language.

_filter_xss_attributes 	includes/common.inc 
	Processes a string of HTML attributes.

_filter_xss_split 	includes/common.inc 
	Processes an HTML tag. 

---


