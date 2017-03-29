<?php

// Get drupal translation files.
require_once "/Users/geoff/sites/flat/drupal-7.53/includes/iso.inc";

$language_list = _locale_get_predefined_list();

foreach ($language_list as $key => $l) {
  print "\t$key\n";
  passthru("wget https://ftp.drupal.org/files/translations/7.x/drupal/drupal-7.54.$key.po");
}
$count = exec("ls -1 | wc -l");
print "\n\ndone: $count files downloaded.\n";
