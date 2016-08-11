# SQL strings

Search for query and mysql

- mysql: Found Occurrences, 0 
- query: Found Occurrences, 110 usages found

## query

### Usage in comments (20 usages found)

We don't care about these but are including for completeness.


### Unclassified occurrence  (30 usages found)

```
og/includes/migrate  (1 usage found)
    og.migrate.inc  (1 usage found)
        27$this->source = new MigrateSourceSQL($this->query);
og/includes/migrate/7000  (11 usages found)
    og_content.inc  (2 usages found)
        29$this->query = $query;
        49$this->source = new MigrateSourceSQL($this->query);
    og_group.inc  (2 usages found)
        32$this->query = $query;
        40$this->source = new MigrateSourceSQL($this->query);
    og_ogur.migrate.inc  (5 usages found)
        21$this->query = db_select('d6_og_users_roles', 'ogur');
        22$this->query->join('role', 'r', 'ogur.rid = r.rid');
        23$this->query->join('og_role', 'ogr', 'r.name = ogr.name');
        25$this->query->fields('ogur', array('gid', 'uid'))
        50$this->source = new MigrateSourceSQL($this->query);
    og_user.inc  (2 usages found)
        23$this->query = db_select('d6_og_uid', 'ogu')
        40$this->source = new MigrateSourceSQL($this->query);
og/includes/migrate/7200  (3 usages found)
    og_og_membership.migrate.inc  (1 usage found)
        34$this->query = $query;
    og_roles.migrate.inc  (1 usage found)
        40$this->query = $query;
    og_user_roles.migrate.inc  (1 usage found)
        49$this->query = $query;
og/includes/views/handlers  (11 usages found)
    og_handler_field_og_membership_link_delete.inc  (1 usage found)
        43function query() {
    og_handler_field_og_membership_link_edit.inc  (1 usage found)
        43function query() {
    og_handler_field_user_roles.inc  (5 usages found)
        8function query() {
        11foreach ($this->query->relationships as $alias => $info) {
        26$this->aliases['uid'] = $this->query->add_field($user_table_alias, 'uid');
        29$this->aliases['group_type'] = $this->query->add_field($og_membership_table_alias, 'group_type');
        31parent::query();
    og_handler_relationship.inc  (2 usages found)
        19function query() {
        60parent::query();
    og_handler_relationship_membership_roles.inc  (2 usages found)
        13function query() {
        19parent::query();
og/og_ui/includes/migrate/7000  (4 usages found)
    populate_field.inc  (2 usages found)
        32$this->query = $query;
        40$this->source = new MigrateSourceSQL($this->query);
    set_roles.inc  (2 usages found)
        35$this->query = $query;
        43$this->source = new MigrateSourceSQL($this->query);
```


### Usage in string constants (60 usages found)

```
og  (20 usages found)
    og.module  (3 usages found)
        3499'query' => array($field_name => $gid),
        3503$options['query']['destination'] = $destination;
        3506$options['query'] += drupal_get_destination();
    og.test  (17 usages found)
        1356'name' => 'OG audience fields query',
        1491$this->assertEqual(array_keys($result['node']), array($node->nid), 'Single group audience query is correct.');
        1502$this->assertEqual(array_keys($result['node']), array($node->nid), 'Multiple group audience query is correct.');
        1513$this->assertEqual(array_keys($result['node']), array($node->nid), 'Single group audience first, with another non-audience field query is correct.');
        1524$this->assertEqual(array_keys($result['node']), array($node->nid), 'Non-audience field first, with single group audience query is correct.');
        1534$this->assertEqual(array_keys($result['node']), array($node->nid), 'Multiple entity types in entityCondition() query is correct.');
        1543$this->assertEqual(array_keys($result['node']), array($node->nid), 'No entity property query is correct.');
        1552$this->assertEqual(array_keys($result['entity_test']), array($entity_test->pid), 'Non-node entity without revision table query is correct.');
        1565$this->assertEqual(array_keys($result['user']), $expected_values, 'Non-node entity without revision table and without bundles query is correct.');
        1576$this->assertEqual($result, 1, 'Count query is correct.');
        1588'name' => 'OG field condition query',
        1710$this->assertEqual(count($result['node']), 2, "The correct number of nodes was returned for the query with only the plain field.");
        1720$this->assertEqual(count($result['node']), 1, "The correct number of nodes was returned for the query with only the OG field condition.");
        1731$this->assertEqual(count($result['node']), 1, "The correct number of nodes was returned for the query with the OG field condition first.");
        1743$this->assertEqual(count($result['node']), 1, "The correct number of nodes was returned for the query with the OG field condition second.");
        2042'description' => 'Grant access to non members users publishing content with the group passed in the query string.',
        2099$this->drupalPost('node/add/group-content', array('title' => 'foo'), t('Save'), array('query' => array('og_group_ref' => $this->group->nid)));
og/includes/views  (8 usages found)
    og.views_default.inc  (8 usages found)
        24$handler->display->display_options['query']['type'] = 'views_query';
        25$handler->display->display_options['query']['options']['query_comment'] = FALSE;
        137$handler->display->display_options['query']['type'] = 'views_query';
        138$handler->display->display_options['query']['options']['query_comment'] = FALSE;
        243$handler->display->display_options['query']['type'] = 'views_query';
        244$handler->display->display_options['query']['options']['query_comment'] = FALSE;
        405$handler->display->display_options['query']['type'] = 'views_query';
        406$handler->display->display_options['query']['options']['query_comment'] = FALSE;
og/includes/views/handlers  (2 usages found)
    og_handler_field_og_membership_link_delete.inc  (1 usage found)
        76$this->options['alter']['query'] = drupal_get_destination();
    og_handler_field_og_membership_link_edit.inc  (1 usage found)
        69$this->options['alter']['query'] = drupal_get_destination();
og/og_ui  (5 usages found)
    og_ui.module  (2 usages found)
        670$links['options'] = array('query' => array('destination' => $url));
        681$links['options'] = array('query' => array('destination' => $url));
    og_ui.pages.inc  (3 usages found)
        60query
        63query
        63query
og/og_ui/includes/views  (2 usages found)
    og_ui.views_default.inc  (2 usages found)
        26$handler->display->display_options['query']['type'] = 'views_query';
        27$handler->display->display_options['query']['options']['query_comment'] = FALSE;
og/og_ui/plugins/content_types/membership_links  (1 usage found)
    membership_links.inc  (1 usage found)
        56$options['query']['destination'] = $subscribe_path;
og/tests  (22 usages found)
    og-7.x-1.x.database.php  (22 usages found)
        24146'filename' => 'includes/database/query.inc',
        24377'filename' => 'includes/database/query.inc',
        24384'filename' => 'includes/database/sqlite/query.inc',
        25259'filename' => 'includes/database/query.inc',
        25266'filename' => 'includes/database/mysql/query.inc',
        25273'filename' => 'includes/database/pgsql/query.inc',
        25280'filename' => 'includes/database/sqlite/query.inc',
        25357'filename' => 'includes/database/query.inc',
        25973'filename' => 'includes/database/query.inc',
        25980'filename' => 'includes/database/query.inc',
        25987'filename' => 'includes/database/query.inc',
        26001'filename' => 'includes/database/query.inc',
        26547'filename' => 'includes/database/query.inc',
        26554'filename' => 'includes/database/mysql/query.inc',
        26561'filename' => 'includes/database/sqlite/query.inc',
        26582'filename' => 'includes/database/query.inc',
        26589'filename' => 'includes/database/pgsql/query.inc',
        26596'filename' => 'includes/database/sqlite/query.inc',
        26892'filename' => 'includes/database/mysql/query.inc',
        26908'filename' => 'includes/database/pgsql/query.inc',
        26924'filename' => 'includes/database/query.inc',
        26944'filename' => 'includes/database/sqlite/query.inc',
```
