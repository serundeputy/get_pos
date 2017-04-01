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

// iso.inc needs this definition.
define('LANGUAGE_RTL', 1);

// Drupal path.
$drupal_path = "/Users/geoff/sites/flat/drupal-7.53";

// Get Drupal translation languages.
require_once "$drupal_path/includes/iso.inc";
$language_list = _locale_get_predefined_list();

// There are some languages misssing from iso.inc
// @see https://github.com/serundeputy/get_pos/issues/1
$missing = array(
  'tvy' => array(0 => 'Tuvan'),
  'prs' => array(0 => 'Afghanistan Persian'),
);
foreach ($missing as $key => $m) {
  $language_list[$key] = $m;
}

// Determine what project you are getting the translation files for, i.e.
// Drupal, views, etc.  Default to Drupal.
$project = readline("\n\tEnter the project name (like drupal or views): ");
$project = strtolower($project);
if ($project == '' || $project == NULL) {
  $project = 'drupal';
}
$version = readline("\n\tEnter the versio of the project (like 7.53 or 7.x-3.0-alpha1): ");
$version = strtolower($version);
if ($version == '' || $version == NULL) {
  $version = '7.54';
}

passthru("mkdir -p lang-files/$project-$version");

foreach ($language_list as $key => $l) {
  print "\t$key\n";
  passthru("wget --directory-prefix=lang-files/$project-$version https://ftp.drupal.org/files/translations/7.x/$project/$project-$version.$key.po");
}
$count = exec("ls lang-files/$project-$version/*.po -1 | wc -l");
print "\n\n\tdone: $count files downloaded.\n\n";
