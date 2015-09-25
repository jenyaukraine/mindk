<?php
// Load
require_once('../framework/Loader.php');
// Register SPL loading
spl_autoload_register('Loader::autoload');
// Run routings
new Routing();
?>