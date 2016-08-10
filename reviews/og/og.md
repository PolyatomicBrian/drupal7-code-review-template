# Organic Groups, OG



Requested By: Michael Prell

Reviewed By: Clay, Hunter, Hoang

Date Completed:

Last SA Update:

	SA-CONTRIB-2014-049 - Organic Groups (OG) - Access Bypass

	Security risk: Moderately critical
	Exploitable from: Remote
	Vulnerability: Access bypass

## Module Description

Organic groups (OG) enables users to create and manage their own 'groups'.
Each group can have subscribers, and maintains a group home page where
subscribers communicate amongst themselves.


## Attack Surface

- Input: og-static-input.txt
- SQL: og-static-sql.txt
- Full: og-static-full.txt

## Security Controls

Things to look for:

- If a table is created is it removed when the module is uninstalled?
- Is user input properly sanitized?
- If there is an admin menu is it properly protected?


## Code Review Notes

Plugins consist of various 1 or 2 function files and some classes to use functionality
of other modules. Form alterations exist, but are secure.
