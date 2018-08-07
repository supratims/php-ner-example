<?php
include 'vendor/autoload.php';

$ner = new \StanfordTagger\CRFClassifier();
$ner->setOutputFormat($ner::OUTPUT_FORMAT_TSV);

$file = $argv[1];
if (empty($file)){
    throw new Exception("Must provide a file with text to parse as argument 1".PHP_EOL);
}
if (!file_exists($file)){
    throw new Exception("File does not exist: {$file}".PHP_EOL);
}

echo "-- Parsing file {$file}  --".PHP_EOL;

$output = $ner->tag(file_get_contents($file));

var_export($output.PHP_EOL); 



