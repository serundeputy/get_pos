Get Language Translation files.
----

Requirements
---
The script gets the array of languages Backdrop knows about from `standard.inc` file.
So you need to modify the `require_once` statement on line `5` of the get_pos.php
file to point to a Backdrop 1.x code base on your computer.

Usage
---
The command:

```php
php get_pos.php
```

will download the `*.po` files from: https://ftp.drupal.org/files/translations/7.x/drupal/
to the current working directory.
