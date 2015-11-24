<?php 

if ($argv[1] <> "") {
	$address_mask = $argv[1];
	$return = shell_exec('salt-run manage.up');
	$machines = str_getcsv($return, "\n");
	foreach ($machines as $machine) {
	  if (strpos($machine, $address_mask) !== FALSE) {
	    echo "running drush cron on " . $machine . "\n";
            // The following command may need to be adjusted for your local setup.
            // For the drush path: "whereis drush" might help
            // user is the user drush should run as
            // cwd is the path of the website root
	    $drush_output = shell_exec("salt '" . $machine . "' cmd.run '/usr/local/share/drush/drush cron' user=ec2-user cwd=/var/app/current");
	    echo $drush_output;
	    break;
	  }
	}
}
else {
  echo "cli needs machine name mask as arg \n";
}

?>
