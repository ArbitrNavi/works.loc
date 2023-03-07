<?php

use classes\Session;

session_start();

require_once("classes/Session.php");



echo Session::flash('success');