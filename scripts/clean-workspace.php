#!/usr/bin/php
<?php
/*rename('composer.dist.json', 'composer.json');
unlink('composer.lock');
unlink('scripts/clean-workspace.php');
unlink('scripts/generate-env-file.php');*/

if (count(scandir('./scripts')) === 2) { // ['.', '..']
  rmdir('./scripts');
}
