## In practice

All the rules mentioned in 'Handle text in a secure fashion' can be summed up
quite easily: no piece of user-submitted content should ever be placed into
HTML. If you are unsure of whether this is the case, you can always test it by
submitting a piece of text like <u>xss</u> into your module's fields. If the
text comes out underlined or mangles existing tags, you know you have a
problem.

Here are some examples of good and bad code. $title, $body and $url are assumed
to be user-submitted fields containing a title, a piece of marked up text and a
URL respectively. They are fresh from the database and thus contain exactly
what the user submitted without any changes.

Bad:

```
<?php print '<tr><td>$title</td><td>'; ?>
<?php print '<a href="/..." title="$title">view node</a>'; ?>
```

Good (the title is plain-text and may not be placed into HTML as is):

```
<?php print '<tr><td>'. check_plain($title) .'</td></tr>'; ?>
<?php print '<a href="/..." title="'. check_plain($title) .'">view node</a>'; ?>
```

Bad:

```
<?php print l(check_plain($title), 'node/'. $nid); ?>
```

Good (l() already contains a check_plain() call by default):

```
<?php print l($title, 'node/'. $nid); ?>
```

Bad:

```
<?php print '<a href="/$url">'; ?>
<?php print '<a href="/'. check_plain($url) .'">'; ?>
```

Good (URLs must be checked with check_url()):

```
<?php print '<a href="/'. check_url($url) .'">'; ?>
```


## Writing filters

When writing a filter which translates from another markup language into HTML,
you need to ensure you don't open any holes yourself. Generally, the same rules
apply: check URLs with check_url() and ensure no literal HTML can be injected
by escaping appropriately using check_plain().

