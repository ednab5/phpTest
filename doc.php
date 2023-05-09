<?php
require("vendor/autoload.php");

$openapi = \OpenApi\Generator::scan(['C:\Bitnami\wampstack-8.1.4-0\apache2\htdocs\phpTest\api']);

header('Content-Type: application/json');
echo $openapi->toJson();
?>