<?php
require_once('../db.php');

$db = new MyDB();

$names = $_POST['names'];
$status = $_POST['status'];
$date = date("Y/m/d");
$result = true;
foreach ($names as &$name) {
    $sql = "INSERT INTO domain (name, status, date) VALUES ('$name', '$status', '$date');";
    $result = $result && $db->exec($sql);
    // var_dump($name);
}
// exit;
// echo $sql;
// exit;

if ($result) {
    $response = [
        'status' => 'ok',
        'success' => true,
        'message' => 'Record created succesfully!'
    ];
    print_r(json_encode($response));
} else {
    $response = [
        'status' => 'ok',
        'success' => false,
        'message' => 'Record created failed!'
    ];
    print_r(json_encode($response));
}
?>