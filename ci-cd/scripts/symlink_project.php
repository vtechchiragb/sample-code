#!/usr/bin/env php
<?php
// phpcs:ignoreFile

/**
 * @file
 * Symlink the files from this project into Drupal's modules/custom directory.
 */

use Symfony\Component\Filesystem\Filesystem;

require __DIR__ . '/vendor/autoload.php';
$project_name = isset($argv[1]) ? $argv[1] : getenv('CI_PROJECT_NAME');
if (empty($project_name)) {
  throw new RuntimeException('Unable to determine project name.');
}
$fs = new Filesystem();

// Directory where the root project is being created.
$projectRoot = getcwd();
$webRoot = getenv('_WEB_ROOT') ?: 'web';
$moduleRoot = $projectRoot . '/' . $webRoot . "/modules/custom/$project_name";

// Prepare directory for current module.
if ($fs->exists($moduleRoot)) {
  $fs->remove($moduleRoot);
}
$fs->mkdir($moduleRoot);
foreach (scandir($projectRoot) as $item) {
  if (!in_array($item, ['.', '..', '.git', '.idea', 'vendor', $webRoot, 'symlink_project.php'])) {
    $rel = $fs->makePathRelative($projectRoot, $moduleRoot);
    $fs->symlink($rel . $item, $moduleRoot . "/$item");
  }
}
