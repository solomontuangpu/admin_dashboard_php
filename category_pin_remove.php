<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

categoryRemovePin();
redirect("category_add.php");