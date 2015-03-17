<?php

/**
 *
 * Here are basic sql query tests
 *
 */


require_once 'DBHelper.class.php';

$db = new DBHelper();

$select = $db->select("cars", array());
echo json_encode($select);

?>