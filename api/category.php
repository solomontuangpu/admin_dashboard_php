<?php

header("Content-type: application/json; charset=utf-8");

require_once "../core/base.php";
require_once "../core/functions.php";

$sql = "SELECT * FROM categories";
$row = fetchAll($sql);

echo apiOutput($row);