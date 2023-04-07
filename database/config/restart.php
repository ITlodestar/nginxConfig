<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


//$restart_result = `sudo -S systemctl restart nginx`;
//echo $restart_result;
// echo "restarting nginx<br>\n";
// ob_flush();
// flush();

$output = array();
$status = -1;
$command = "sudo -S /usr/bin/systemctl restart nginx";
// Execute the Certbot command
exec($command, $output, $status);

// Check the output and status of the command
if ($status == 0) {
    echo "Nginx restart: command executed successfully.\n" . implode("\n", $output);
    echo implode("\n", $output);
} else {
    echo "Nginx restart: executing command failed.\n" . implode("\n", $output);
    echo implode("\n", $output);
}
?>