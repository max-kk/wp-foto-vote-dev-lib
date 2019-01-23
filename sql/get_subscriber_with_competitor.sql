SELECT s.*, c.name FROM `wp_fv_subscribers` s
LEFT JOIN `wp_fv_competitors` c ON c.id = s.contestant_id;

## NOTE - replace "wp_" to your database prefix
