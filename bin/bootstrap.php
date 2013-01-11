<?php
if (!class_exists("Doctrine\Common\Version", false)) {
    require_once "bootstrap_doctrine.php";
}

/**
 * Require each file in "entities"
 */
foreach (new DirectoryIterator('../entities') as $fileInfo) {
    if($fileInfo->isDot() || $fileInfo->isDir()) continue;
    if ($fileInfo->getExtension() == 'php') {
    	require_once($fileInfo->getPathname());
    }
}