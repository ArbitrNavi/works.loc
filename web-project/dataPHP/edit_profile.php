<?php

require ('function.php');

$currentID = $_GET['id'];

setUserField($currentID, 'name', $_POST['name']);
setUserField($currentID, 'job', $_POST['job']);
setUserField($currentID, 'phone', $_POST['phone']);
setUserField($currentID, 'address', $_POST['address']);

$_SESSION['flesh-message'] = 'Профиль успешно обновлён.';
$_SESSION['alert'] = 'success';

redirect_to('../page_profile.php?id=' . $currentID);