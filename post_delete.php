<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

postDelete($_GET['id']);
redirect("post_list.php");