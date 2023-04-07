<?php
require_once('../db.php');

$ip = $_GET["ip"];
// echo $ip;
// function start($argv)
// {
$db = new MyDB();

// $db->exec('CREATE TABLE IF NOT EXISTS domain (id INTEGER PRIMARY KEY, name STRING, status STRING, date STRING);');
// $db->exec("INSERT INTO domain (name, status, date) VALUES ('This is a test', '123', '123')");

$sql = "SELECT *  FROM `domain`";
// $db->exec("INSERT INTO domain (bar) VALUES ('This is a test')");

$result = $db->query($sql);
$data = [];
while ($fetch = $result->fetchArray()) {
	$data[] = $fetch;
}
// echo "result";
// var_dump($result->fetchArray());

// `notepad`;

if (strlen($ip) == 0) {
	die("destination ip NOT set php start.php 1.2.3.4\n");
}

// create directories from domainlist.txt
// $domains = $data;
$serverIP = trim(`hostname -I | awk '{print $1}'`);
$nginx_path = "/etc/nginx/sites-enabled/reverse-proxy.conf";

$vhost_header = file_get_contents("../../vhost-header.txt");
$vhost = str_replace("DESTINATIONIP", $ip, $vhost_header);
$goodCount = 0;
$out = "";

foreach ($data as $fetch) {
	// var_dump($fetch);
	$d = $fetch["name"];
	// echo $d . "testing";

	// check if domains are pointed to server IP

	// echo "$d\n";

	if (gethostbyname($d) == $serverIP) {

		@mkdir("/var/www/" . $d);
		// generate certificate
		//
		$cmd = "certbot certonly -n --agree-tos --no-redirect --nginx --register-unsafely-without-email -d $d -w /var/www/$d\n";
		$result1 = `certbot certonly -n --agree-tos --no-redirect --nginx --register-unsafely-without-email -d servicecuaea.com -w /var/www/servicecuaea.com`;
		echo shell_exec("certbot help");
		$result = `$cmd`;

		// Check if /etc/letsencrypt/live/DOMAIN/fullchain.pem and /etc/letsencrypt/live/DOMAIN/privkey.pem exist
		$exist_pem = file_exists("/etc/letsencrypt/live/$d/fullchain.pem") && file_exists("/etc/letsencrypt/live/$d/privkey.pem");
		$exist_str = $exist_pem ? "exist" : "not exist";
		if (!strstr($result, "fail") && $exist_pem) {

			// add domain config to $vhost
			//
			$tmpl = file_get_contents("/vhost-template.txt");
			$tmpl = str_replace("DOMAIN", $d, $tmpl);
			$tmpl = str_replace("DESTINATIONIP", $ip, $tmpl);

			$vhost .= "\n\n" . $tmpl;
			$goodCount++;

			$out .= $d . "\n";
			file_put_contents("/etc/nginx/sites-enabled/$d.conf", $tmpl);
			echo "Domain $d is successful\n";
		} else {
			echo "Domain $d is failed\n$cmd\n$exist_str\n$result1\n$result\n";
		}
	} else {
		echo "Domain $d is not pointed to $serverIP\n";
	}
}
echo "End!\n";

if ($goodCount > 0) {
	// save nginx config
	file_put_contents($nginx_path, $vhost);

	// test & restart nginx
	$test_result = `nginx -t`;
	echo $test_result;
	// `systemctl restart nginx`;
}
?>