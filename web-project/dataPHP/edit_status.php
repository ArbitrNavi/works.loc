<?php

require ('function.php');

$currentStatus = $_POST['status'];

setUserField($_GET['id'], 'status', $currentStatus);

redirect_to('../users.php');
