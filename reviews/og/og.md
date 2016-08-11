# Organic Groups, OG

## Review Metadata

Requested By: Michael Prell

Reviewed By: Clay, Hunter, Hoang

Review Completed On: Aug 9, 2016

Review Updates: Aug 10-12, 2016

- Adding static review results
- Running fuzzer, adding results
- Adding code inspection results

Last SA Update: May 7, 2014

	SA-CONTRIB-2014-049 - Organic Groups (OG) - Access Bypass

	Security risk: Moderately critical
	Exploitable from: Remote
	Vulnerability: Access bypass


## Module Description

Organic groups (OG) enables users to create and manage their own 'groups'.
Each group can have subscribers, and maintains a group home page where
subscribers communicate amongst themselves.


## Attack Surface

- Input: og-static-input.md
- Sanitization: og-static-sanitization.md
- SQL: og-static-sql.md


## Security Controls

Things to look for:

- If a table is created is it removed when the module is uninstalled?
- Is user input properly sanitized?
- Is output properly encoded?
- Are permissions properly applied?


## Code Review Notes

Plugins consist of various 1 or 2 function files and some classes to use functionality
of other modules. Form alterations exist, but are secure.
