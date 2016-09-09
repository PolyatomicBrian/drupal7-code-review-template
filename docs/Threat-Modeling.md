# Threat Modeling - Drupal7 Contrib

We'll be producing a threat model report for a Drupal7 contributed module.


## What we are looking for

- Where does user input occur?

	- forms and files?

- What database queries take place?

	- which files?

- What permissions are used? Who can do what
	- authenticated users?
	- drupal site admin
	- drupal groups?


## Sanitization Functions

Comments at includes/common.inc, line 1353
    Common functions that many Drupal modules will need to reference.

Located in the following files

- includes/common.inc
- modules/filter/filter.module
- includes/bootstrap.inc

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

## Use Cases

Create a script to create these from the review file.

find reports/views-static-full.txt -exec grep -H check_markup {} \; > views-check_markup.txt

find reports/views-static-full.txt -exec grep -H check_url {} \; > views-check_url.txt

find reports/views-static-full.txt -exec grep -H get_t {} \; > views-get_t.txt

find reports/views-static-full.txt -exec grep -H _filter_xss {} \;

find reports/views-static-full.txt -exec grep -H field_filter_xss {} \;

find reports/views-static-full.txt -exec grep -H format_string {} \;

find reports/views-static-full.txt -exec grep -H filter_xss_bad {} \;

find reports/views-static-full.txt -exec grep -H filter_xss_admin {} \; > views-filter_xss_admin.txt

find reports/views-static-full.txt -exec grep -H drupal_strip {} \;



The idea here is to find use case for each of the santization functions within
well established contrib modules. A mix of large, small, complex, and simple
will be sampled for maximum coverage.

Sample cases:

- ctools
- quicktabs
- views
- menu_block
- inline_entity_form

Organize samples by similar use cases. This will make patterns easier to see.


Notes:

- .inc files include HTML tags. check_plain should be used where appropriate.

### check_plain

$desc = check_plain($context->identifier);

$desc = check_plain($argument['identifier']);

$desc = check_plain($context['identifier']);

$desc = check_plain($relationship['identifier']);

$desc = check_plain($context->identifier);

$desc = check_plain($argument['identifier']);

$desc = check_plain($context['identifier']);

$desc = check_plain($relationship['identifier']);

$display_fields[$field] = '"<em>' . check_plain($fields[$field]) . '</em>"';

$list[$item->$export_key] = check_plain($string);

'#markup' => check_plain($item['identifier']),
'#markup' => check_plain($plugin_definition['description']),
'#markup' => '<a href="'. $href .'">'. check_plain($this->quickset->translateString($tab->getTitle(), 'tab', $i)) .'</a>',
'#markup' => '<div class="description">' . check_plain($form_state['plugin']['ruleset']->admin_description) . '</div>',

$matches[$result['label'] . " [id: $entity_id]"] = '<span class="autocomplete_title">' . check_plain($result['label']) . '</span>';
$matches[$result['label'] . " [id: $entity_id]"] .= isset($result['bundle']) ? ' <span class="autocomplete_bundle">(' . check_plain($result['bundle']) . ')</span>' : '';

$output .= '<a href="#" class="ctools-dropdown-link ctools-dropdown-text-link">' . check_plain($vars['title']) . '</a>';
$output .= "  \${$export['identifier']}s['" . check_plain($object->$export['key']) . "'] = \${$export['identifier']};\n\n";

'bundle' => !empty($entity_info['entity keys']['bundle']) ? check_plain($entity->{$entity_info['entity keys']['bundle']}) : NULL,
'bundle' => !empty($entity_info['entity keys']['bundle']) ? check_plain($entity->{$entity_info['entity keys']['bundle']}) : NULL,
'bundle' => !empty($entity_info['entity keys']['bundle']) ? check_plain($entity->{$entity_info['entity keys']['bundle']}) : NULL,

$title .= ' (' . check_plain($handler->options['label']) . ')';
$title = (str_replace('%title', check_plain($item->{$export_key}), $title));
$this->rows[$name]['data'][] = array('data' => check_plain($item->{$this->plugin['export']['admin_title']}), 'class' => array('ctools-export-ui-title'));
$this->rows[$name]['data'][] = array('data' => check_plain($name), 'class' => array('ctools-export-ui-name'));
$this->rows[$name]['data'][] = array('data' => check_plain($item->{$schema['export']['export type string']}), 'class' => array('ctools-export-ui-storage'));
$title = str_replace('@role', check_plain($role->name), $title);
$title = str_replace('@type', check_plain($entity_info['label']), $title);
$title = str_replace('@bundle', check_plain($entity_info['bundles'][$bundle]['label']), $title);
'#title' => check_plain($argument['label']),
'#title' => check_plain($argument['label']),
$title .= ' (' . check_plain($handler->options['label']) . ')';
$title = (str_replace('%title', check_plain($item->{$export_key}), $title));
$title = str_replace('@role', check_plain($role->name), $title);
$title = str_replace('@type', check_plain($entity_info['label']), $title);
$title = str_replace('@bundle', check_plain($entity_info['bundles'][$bundle]['label']), $title);
'title' => check_plain($item->admin_description),
'title' => check_plain($item->admin_description),

$vars['ctools_template_identifier'] = check_plain($vars['node']->ctools_template_identifier);
$vars['theme_hook_suggestions'][] = 'node__panel__' . check_plain($vars['node']->ctools_template_identifier);
$vars['ctools_template_identifier'] = check_plain($vars['node']->ctools_template_identifier);
$vars['theme_hook_suggestions'][] = 'node__panel__' . check_plain($vars['node']->ctools_template_identifier);
$vars['title'] = ($vars['title'] ? check_plain($vars['title']) : t('open'));

array('data' => check_plain($this->style_plugin['title']), 'class' => array('ctools-export-ui-base')),
array('data' => check_plain($item->type), 'class' => array('ctools-export-ui-storage')),
array('data' => check_plain($item->name), 'class' => array('ctools-export-ui-name')),
array('data' => check_plain($item->admin_title), 'class' => array('ctools-export-ui-title')),
array('data' => check_plain($item->category), 'class' => array('ctools-export-ui-category')),
array('data' => check_plain($item->name), 'class' => array('ctools-export-ui-name')),

check_plain($keyword),
check_plain($item->admin_title),

foreach (ctools_context_get_converters('%' . check_plain($context->keyword) . ':', $context) as $keyword => $title) {
eplace("_", " ", $subtype));
data' => check_plain($item->admin_title), 'class' => array('ctools-export-ui-title')),
$plugin['title'] = check_plain($item->admin_title);
$plugin['description'] = check_plain($item->admin_description);

$list[$handler->name] = check_plain("$handler->task: $title ($handler->name)");
$list[$handler->name] = check_plain("$handler->task: ($handler->name)");
$code .= "  \${$export['identifier']}s['" . check_plain($object->$export['key']) . "'] = \${$export['identifier']};\n\n";
$cache->subtask['admin title'] = check_plain($form_state['values']['admin_title']);
$cache->subtask['admin title'] = check_plain($form_state['values']['admin_title']);
$row[] = '%' . check_plain($form['argument'][$key]['#keyword']);
$row[] = check_plain($form['argument'][$key]['#position']);
'admin title' => check_plain($page->admin_title),

$options[$type] = check_plain($info['label']);
$names[] = check_plain($entity['bundles'][$type]['label']);
$paths[] = check_plain($path);

$options[$voc->machine_name] = check_plain($voc->name);
$names[] = check_plain($vocabulary->name);
$options[$type] = check_plain($info->name);
$names[] = check_plain($types[$type]->name);
$missing_types[] = check_plain($type);
$names[] = check_plain($roles[$rid]);
$block->title = check_plain($node->title);

'title' => check_plain($content->admin_title),
'description' => check_plain($content->admin_description),
'category' => $content->category ? check_plain($content->category) : t('Miscellaneous'),
$block->content = '<pre>' . check_plain($settings['body']) . '</pre>';
foreach (ctools_context_get_converters('%' . check_plain($context->keyword) . ':', $context) as $keyword => $title) {
check_plain($keyword),
// strip_tags used because it goes through check_plain and that
$title = check_plain($block[$delta]['info']);
$block->title = check_plain(format_username($account));
$block->title = check_plain($account->name);
$block->title = check_plain($vocab->name);
$content = !empty($conf['link']) ? l($term->name, 'taxonomy/term/' . $term->tid) : check_plain($term->name);
$block->content = !empty($conf['link']) ? theme('username', array('account' => $user, 'link_path' => 'user/' . $node->uid)) : check_plain(format_username($node));
'title' => check_plain($term->name),
$terms[] = check_plain($term->name);
$content = !empty($conf['link']) ? l($node->title, 'node/' . $node->nid) : check_plain($node->title);
$context->title = ($conf) ? check_plain($data['identifier']) : check_plain($data);

$message = str_replace('%title', check_plain($item->{$export_key}), $this->plugin['strings']['confirmation'][$form_state['op']]['success']);
$message = str_replace('%title', check_plain($item->{$export_key}), $this->plugin['strings']['confirmation'][$form_state['op']]['fail']);
$message = str_replace('%title', check_plain($item->{$export_key}), $this->plugin['strings']['confirmation'][$form_state['op']]['success']);
$question = str_replace('%title', check_plain($item->{$export_key}), $plugin['strings']['confirmation'][$form_state['op']]['question']);
$names[] = check_plain($roles[$rid]);
$block->title = check_plain("No-context content type");

$options[$type->type] = check_plain($type->name);
$table_form['title'][$id] = array('#markup' => check_plain($provider['name']));

$row[] = array('data' => check_plain($entity_info['label'] . ' - ' . $bundle_label));
check_plain($og_fields[$field_name]['instance']['label']),
array('data' => check_plain($qt->title)),
$block['subject'] = check_plain($qt['#title']);
'#prefix' => '<h3><a href= "#'. $qsid . '_' . $key .'">'. check_plain($quickset->translateString($item->getTitle(), 'tab', $key)) .'</a></h3><div>',

return check_plain($plugin['ruleset']->admin_description);
return check_plain($plugin['ruleset']->admin_title);
return check_plain($handler->conf['title']);
return check_plain($node->title);
return !empty($conf['description']) ? check_plain($conf['description']) : t('No description');
$return[$entity_type][$bundle] = check_plain($bundle_value['label']);
return check_plain($item['role']);
return check_plain($context->data);
return ucwords(str_replace('-', ' ', check_plain($context->data)));
return check_plain($title);
'#return_value' => check_plain($key),


## filter_xss


