<?php
/**
 * Created by PhpStorm
 * Date: 5/24/16
 *
 * Find all Drupal _hook() functions the module uses.
 * - we may be able to use this in an automated and intelligent way
 *
 */


$MODULENAME = $argv[1];

print "######################################################################\n";
print "[+] Scanning module: " . $MODULENAME . "\n";


// Parse modulename.module
$MODULEFILE = $MODULENAME . ".module";

// Check if file exists and handle any errors gracefully.
$does_exist = file_exists($MODULEFILE);

print "[debug] does_exist: " . $does_exist . "\n";

print "[+] Scanning file: " . $MODULEFILE . "\n";



?>
