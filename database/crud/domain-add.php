<?php
require_once('../db.php');

$db = new MyDB();
// var_dump($db);
$names = $_POST['names'];
$status = $_POST['status'];
$date = date("Y/m/d");
$result = true;
foreach ($names as &$name) {
    $sql = "IF NOT EXISTS(SELECT COUNT(*) AS NUM_ROW FROM domain WHERE NAME='$name')
    BEGIN 
    INSERT INTO domain (name, status, date) VALUES ('$name', '$status', '$date');
    END";
    // $sql = "INSERT INTO domain (name, status, date) VALUES ('$name', '$status', '$date');";
    try {
        $db = new MyDB();
        $result = $result && $db->exec($sql);
    } catch (Exception $e) {

    }
    echo $sql;
    // var_dump($name);
}
// exit;
// echo $sql;
// exit;

if ($result) {
    $response = [
        'status' => 'ok',
        'success' => true,
        'message' => 'Record created successfully!'
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