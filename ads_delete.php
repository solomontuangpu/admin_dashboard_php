<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

adsDelete($_GET['id']);
redirect("ads_list.php");