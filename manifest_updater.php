
<?php

/**
 * Simple script to update manifest version / date.
 */


$INPUT_FILE = "manifest.template.php";
$OUTPUT_FILE = "manifest.php";

$warning = "// DO NOT MODIFY THIS FILE... THIS FILE IS AUTOGENERATED FROM $INPUT_FILE during build_zip.sh script!";
$warning = "$warning\n$warning\n$warning\n$warning\n$warning\n$warning\n";




$manifest = file_get_contents( $INPUT_FILE );

if( empty($manifest) ) {
    print "NO MANIFEST";
    die("Unable to read the input manifest file!");
}
//print $manifest;

if( $argc > 1 ) {

    $manifestOutput = str_replace( array("@@VERSION@@", "@@PUBLISH_DATE@@","@@WARNING@@"),
             array($argv[1], date("Y-M-d H:m"), $warning),
             $manifest
            );

}
else {
    print "ERROR: no version argment provided.";

}

print $manifestOutput;


file_put_contents( $OUTPUT_FILE, $manifestOutput);

?>