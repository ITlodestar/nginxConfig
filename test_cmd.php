<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cmd = "/usr/bin/certbot  certonly -n --agree-tos --no-redirect --nginx --register-unsafely-without-email -d servicecuaea.com -w /var/www/servicecuaea.com  --config-dir /var/www/nginxConfig/certificates
";


echo $cmd;
echo "<hr><pre>";
//echo shell_exec("date; ./1.sh " . ' 2>&1 > out.log');

$domain = 'servicecuaea.com'; // Replace with your actual domain name
$command = 'sudo -S /usr/bin/certbot  certonly -n --agree-tos --no-redirect --nginx --register-unsafely-without-email -d $domain -w /var/www/$domain --config-dir /var/www/nginxConfig/certificates --work-dir /var/www/nginxConfig/certificates --logs-dir /var/www/nginxConfig/certificates';

$output = array();
$status = -1;

// Execute the Certbot command
exec($command, $output, $status);

// Check the output and status of the command
if ($status === 0) {
    echo "Certbot command executed successfully.\n";
    echo implode("\n", $output);
} else {
    echo "Error executing Certbot command.\n";
    echo implode("\n", $output);
}


/*
/var/www/nginxConfig/certificates
--config-dir /var/www/nginxConfig/certificates --work-dir /var/www/nginxConfig/certificates --logs-dir /var/www/nginxConfig/certificates


 __          ____     __ _____  _____  _   _ __          ____     __ _____ 
 \ \        / /\ \   / // ____||_   _|| \ | |\ \        / /\ \   / // ____|
  \ \  /\  / /  \ \_/ /| (___    | |  |  \| | \ \  /\  / /  \ \_/ /| |  __ 
   \ \/  \/ /    \   /  \___ \   | |  | , ` |  \ \/  \/ /    \   / | | |_ |
    \  /\  /      | |   ____) | _| |_ | |\  |   \  /\  /      | |  | |__| |
     \/  \/       |_|  |_____/ |_____||_| \_|    \/  \/       |_|   \_____|
                                                                           
  @rq666 Разработка автоматизации, лендинги, интеграции API, телеграм боты
  
<pre>
██╗    ██╗██╗   ██╗███████╗██╗███╗   ██╗██╗    ██╗██╗   ██╗ ██████╗ 
██║    ██║╚██╗ ██╔╝██╔════╝██║████╗  ██║██║    ██║╚██╗ ██╔╝██╔════╝ 
██║ █╗ ██║ ╚████╔╝ ███████╗██║██╔██╗ ██║██║ █╗ ██║ ╚████╔╝ ██║  ███╗
██║███╗██║  ╚██╔╝  ╚════██║██║██║╚██╗██║██║███╗██║  ╚██╔╝  ██║   ██║
╚███╔███╔╝   ██║   ███████║██║██║ ╚████║╚███╔███╔╝   ██║   ╚██████╔╝
 ╚══╝╚══╝    ╚═╝   ╚══════╝╚═╝╚═╝  ╚═══╝ ╚══╝╚══╝    ╚═╝    ╚═════╝ 
@rq666 Разработка автоматизации, интеграции API, телеграм боты, лендинги
@rq666 Full stack development and more.
</pre>


disable button - start config gen
green raw if ip and files are OK
ignore duplicate error
empty domain
link to domain (to check)



docker


chown www-data:www-data /var/www/nginxConfig/certificates -R
chown www-data:www-data /var/www/nginxConfig/nginx-configs -R

cat /etc/sudoers.d/certbot-nopasswd
www-data ALL = NOPASSWD: /usr/bin/certbot
www-data ALL = NOPASSWD: /usr/bin/systemctl restart nginx
www-data ALL = NOPASSWD: /usr/sbin/nginx -t
www-data ALL = NOPASSWD: /usr/bin/systemctl status nginx


echo "include 
*/
