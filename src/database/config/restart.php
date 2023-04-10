<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//$restart_result = `sudo -S systemctl restart nginx`;
//echo $restart_result;
echo "Restarting nginx\n";

// Restart 
$cmd = "sudo -S /usr/sbin/nginx -s reload";

$output = array();
$status = -1;

// Execute the Certbot command
exec($cmd, $output, $status);
echo implode("\n", $output);


// GET status
$cmd = "sudo -S /usr/bin/systemctl status nginx";

$output1 = array();
$status = -1;

// Execute the Certbot command
exec($cmd, $output1, $status);
echo implode("\n", $output1);

// Check the output and status of the command
if ($status === 0) {
    echo "Nginx restart: command executed successfully.\n";
    echo implode("\n", $output);
} else {
    echo "Nginx restart:  executing command failed.\n";
    echo implode("\n", $output);
}

?>