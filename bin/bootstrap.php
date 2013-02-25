<?php
if (!class_exists("Doctrine\Common\Version", false)) {
    require_once "bootstrap_doctrine.php";
}

/**
 * Require each file in "entities"
 */
foreach (new DirectoryIterator(__DIR__ . '/../src/smith981/silex-skeleton/entities') as $fileInfo) {
    if($fileInfo->isDot() || $fileInfo->isDir()) continue;
    if ($fileInfo->getExtension() == 'php') {
    	require_once($fileInfo->getPathname());
    }
}