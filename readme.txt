######## Installation ########

1. Make sure you have PHP 5+ and MySQL 4.1+ installed. Also, Apache module mod_rewrite should be enabled.

2. Create a new database and import __db/jobberbase.sql into it.

3. Rename config.default.php into config.php

4. Open config.php and update the following constants so they suit your environment:
   - DB_HOST, DB_USER, DB_PASS, DB_NAME, JOBBER_URL, _APP_MAIN_DIR, NOTIFY_EMAIL, ADMIN_EMAIL, SITE_NAME

5. Following directories need write access:
   /uploads            (uploaded resumes are temporary stored here)
   /_templates/_cache  (smarty cache)

6. If you can't see the .htaccess file or actually don't have it, rename htaccess.txt into .htaccess.

7. If your host doesn't offer the mysqli PHP extension (find out from phpinfo()), you can use a mysql wrapper instead. Open config.php and just replace <require_once '_includes/class.Db.php'> with <require_once '_includes/class.Db.MySql.php'>.

8. That's it, open a browser and type in the URL (e.g. http://localhost/jobberbase/).

=========================================================================================================

######## If it still doesn't work ########

You may e-mail the author at me@filipcte.ro. But please don't forget to write a detailed description of 
what you tried to do and what doesn't work. Thaaaaaank you! :)

=========================================================================================================

######## Disclaimer, bugs and other issues ########

1. There might be some rendering issues on Internet Explorer.
2. Some JavaScript doesn't work on Internet Explorer. I'm too lazy and ignorant to fix them. Will you?
3. If you find bugs, try fixing them. If you manage to fix them, I'd love to hear from you!

=========================================================================================================

######## Author contact info ########

You may find me on the web at http://www.filipcte.ro/ or via e-mail: me@filipcte.ro

=========================================================================================================

-- last updated: October 30, 08:00am