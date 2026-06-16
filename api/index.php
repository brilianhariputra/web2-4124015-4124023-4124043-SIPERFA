<?php

$basePath = dirname(__DIR__);

echo "<pre>";
echo "basePath: " . $basePath . "\n";
echo "autoload exists: " . (file_exists($basePath . '/vendor/autoload.php') ? 'YES' : 'NO') . "\n";
echo "bootstrap exists: " . (file_exists($basePath . '/bootstrap/app.php') ? 'YES' : 'NO') . "\n";
echo "views exists: " . (file_exists($basePath . '/resources/views') ? 'YES' : 'NO') . "\n";
echo "</pre>";