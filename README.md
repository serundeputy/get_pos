Get Language Translation files.
----

Requirements
---
The script gets the array of languages drupal knows about from `iso.inc` file.
So you need to modify `$drupal_path` on line `17` of the get_pos.php
file to point to a Drupal 7.x code base on your computer.

Usage
---
`php get_pos.php` will download the `*.po` files from: https://ftp.drupal.org/files/translations/7.x/drupal/
