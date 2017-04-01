<?php

/**
 * @file
 * Download translation files from ftp.drupal.org.
 *
 * Be sure to modify the $drupal_path variable to point at the source code
 * of a Drupal site on your computer.
 *
 * Usage: php get_pos.php
 */

// Drupal path.
$drupal_path = "/Users/geoff/sites/flat/drupal-7.53";

// Get drupal translation files.
require_once "$drupal_path/includes/iso.inc";

$language_list = _locale_get_predefined_list();

passthru("mkdir -p lang-files");

foreach ($language_list as $key => $l) {
  print "\t$key\n";
  passthru("wget --directory-prefix=lang-files https://ftp.drupal.org/files/translations/7.x/drupal/drupal-7.54.$key.po");
}
$count = exec("ls lang-files/*.po -1 | wc -l");
print "\n\n\tdone: $count files downloaded.\n\n";
