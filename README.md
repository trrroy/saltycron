# saltycron
Uses saltstack to run Drupal cron through drush on a single server within a dynamic cluster of salt minion servers.

I run this script in the crontab for the user that can run salt commands (root).

*/5 * * * * php /srv/salt/saltycron/saltycron.php dev.salt.example.com >/dev/null

Every 5 minutes the script runs. It checks for the currently responding minions which have a minion id including the string from the command arg. It uses the first one it finds and then runs the drush cron command only on that machine.

Make sure you customize the settings as needed for your environment, ie. not example.com in the cron command. Comments are in the php file too.

