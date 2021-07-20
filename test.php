<?php

$longString = "I have a code snippet written in PHP that pulls a block of text.";
$truncated = substr($longString,0,strpos($longString,' ',1));

echo $truncated;