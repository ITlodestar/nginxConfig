<?php
require_once('../db.php');

$db = new MyDB();

$db->exec('CREATE TABLE IF NOT EXISTS domain (id INTEGER PRIMARY KEY, name STRING, status STRING, date STRING);');
// $db->exec("INSERT INTO domain (name, status, date) VALUES ('This is a test', '123', '123')");

$sql = "SELECT *  FROM `domain`";
// $db->exec("INSERT INTO domain (bar) VALUES ('This is a test')");

$result = $db->query($sql);
// echo "result";
// var_dump($result->fetchArray());
$data = [];
while ($fetch = $result->fetchArray()) {
    $data[] = $fetch;
}
print_r(json_encode($data));
?>