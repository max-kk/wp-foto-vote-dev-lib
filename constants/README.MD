#### wp-foto-vote-dev-lib
# Constants, that allow override default behavior
You must add following constant's to wp-config.php.

### Change FULL description field size [*from version 2.2.375]:
```php
define('FV_FULL_DESCRIPTION_SIZE', 3000);
```
*Please note - need define it before install plugin.
If you installed after - need open file wp-foto-vote.php and increase "FV_DB_VERSION" (+1)*
Example:
`define('FV_DB_VERSION', '1.5.204');`
to
`define('FV_DB_VERSION', '1.5.205');`

### Put FULL description field to JS (by default disabled for do not pull a lot of data to page content) [*from version 2.2.375]:
```php
define('FV_PUBLIC_PUT_FULL_DESCRIPTION_TO_JS', 1);
```

### If you would like to disable multiply users Page editing locker (Settings, addons, etc)
```php
define('FV_DISABLE_PAGE_LOCKER', 1);
```

### By default photo meta are lazy loaded if no {meta_*} tags used in Name & Description temlpates. Use this for Requre always load meta for photos list.
```php
define('FV_LIST_PRE_GET_META', 1);
```

### If you wish disable plugin & addons updater - use this constant.
```php
define('FV_DISABLE_UPDATER', 1);
```

### If you wish disable notice about nev versions of some addons [*from version 2.2.504]
Example: "WP Foto Vote Notice! For addon "FvAddon_LightboxInspired" seems have more updated version (installed version 1.3)! ..."
```php
define('FV_HIDE_ADDONS_HAVE_UPDATES_MESSAGE', 1);
```

### If you wish to change count of Pages & Posts that queried at generaling list values for "Page, where contest are placed" (Contest Config). If you have more than 2000 posts & good hosting - you can increase this values.
```php
Default values:
define('FV_GET_MAX_POSTS', 1500);
define('FV_GET_MAX_PAGES', 800);
```


