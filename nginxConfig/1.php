<?php
error_reporting(E_ALL);
set_time_limit(0);

$cmd = "sudo -S /usr/sbin/nginx -s reload 2>&1";

$output = array();
$status = -1;

// Execute the Certbot command
exec($cmd, $output, $status);
echo "<pre>" . implode("\n", $output) . " " . $status;

?>
