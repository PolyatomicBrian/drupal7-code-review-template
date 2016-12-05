Static Report for og
Search type: filter

---

## filter_xss

Found Occurrences (3 usages found)


### Unclassified occurrence  (3 usages found)

```
og/og_ui  (3 usages found)
    og_ui.admin.inc  (3 usages found)
        933$options[$entity_name][$entity_type . ':' . $bundle_name] = filter_xss($bundle['label']);
        947$options[$type_name][$field_name] = filter_xss($field['instance']['label']);
        1033filter_xss($og_fields[$field_name]['description']),
```


## check_plain

Found Occurrences  (31 usages found)

### Unclassified occurrence  (19 usages found)

```
og  (7 usages found)
    og.module  (7 usages found)
        1160throw new OgException('Group membership type ' . check_plain($name) . ' already exists.');
        2468$return[$entity_type] = check_plain($entity_value['label']);
        2491$return[$entity_type][$bundle] = check_plain($bundle_value['label']);
        2513$return[$entity_type] = check_plain($entity_value['label']);
        2536$return[$entity_type][$bundle] = check_plain($bundle_value['label']);
        3397$return[$name] = check_plain($info['label']);
        3414$type = check_plain($info->type);
og/includes/views/handlers  (1 usage found)
    og_handler_field_user_roles.inc  (1 usage found)
        65return check_plain($item['role']);
og/og_context  (1 usage found)
    og_context.admin.inc  (1 usage found)
        75$table_form['title'][$id] = array('#markup' => check_plain($provider['name']));
og/og_ui  (9 usages found)
    og_ui.admin.inc  (6 usages found)
        452$row[] = array('data' => check_plain($entity_info['label'] . ' - ' . $bundle_label));
        648$rows[] = array(check_plain($name), l(t('edit role'), "$path/role/$rid/edit"), $permissions);
        651$rows[] = array(check_plain($name), t('locked'), $permissions);
        802$form['role_names'][$rid] = array('#markup' => check_plain($name), '#tree' => TRUE);
        932$entity_name = check_plain("$entity_info[label] ($entity_type)");
        1032check_plain($og_fields[$field_name]['instance']['label']),
    og_ui.module  (3 usages found)
        505$title = str_replace('@role', check_plain($role->name), $title);
        510$title = str_replace('@type', check_plain($entity_info['label']), $title);
        511$title = str_replace('@bundle', check_plain($entity_info['bundles'][$bundle]['label']), $title);
og/plugins/content_types/node_create_links  (1 usage found)
    node_create_links.inc  (1 usage found)
        74$options[$type->type] = check_plain($type->name);
```

### Usage in string constants  (12 usages found)

```
og/og_ui/tests  (4 usages found)
    drupal-6.og-ui.database.php  (4 usages found)
        7058'title_callback' => 'check_plain',
        7080'title_callback' => 'check_plain',
        7102'title_callback' => 'check_plain',
        7124'title_callback' => 'check_plain',
og/tests  (8 usages found)
    drupal-6.og.database.php  (4 usages found)
        7230'title_callback' => 'check_plain',
        7252'title_callback' => 'check_plain',
        7274'title_callback' => 'check_plain',
        7296'title_callback' => 'check_plain',
    og-7.x-1.x.database.php  (4 usages found)
        21465'title_callback' => 'check_plain',
        21490'title_callback' => 'check_plain',
        21515'title_callback' => 'check_plain',
        21540'title_callback' => 'check_plain',
```

## 