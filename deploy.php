<?php

/**
 * This file deploys Flarum.
 * - If `./flarum install --help` returns command not found, we assume Flarum has been installed
 * - If `/flarum install --help` is an available command, we install Flarum using $installCommand below.
 */

$flarumConfigPath = 'config_base.php';
$tmpInstallStorage = require_once($flarumConfigPath);
$tmpInstallStorage['databaseConfiguration'] = $tmpInstallStorage['database'];

unset($tmpInstallStorage['database']);

file_put_contents('storage/config.json', json_encode($tmpInstallStorage));

exec('./flarum install --help 2>&1', $installCheckOutput);

$isInstalled = preg_replace("/[^A-Za-z0-9 ]/", "", trim(implode($installCheckOutput))) === 'Command install is not defined';

$configPhpContent = file_get_contents($flarumConfigPath);

if (!$isInstalled) {
  $exitStatus = 0;
    $installCommand = './flarum install --file storage/config.json -c config.php';
    passthru($installCommand, $exitStatus);
  if($exitStatus !== 0) {
    exit($exitStatus);
  }
}

file_put_contents(
  'config.php',
  $configPhpContent
);
