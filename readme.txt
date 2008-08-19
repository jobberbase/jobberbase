######## Useful links ########

The blog: http://www.jobberbase.com/blog/
The community (bug reports, fixes, etc.): http://www.jobberbase.com/forum/
jobberBase on Google Code: http://code.google.com/p/jobberbase/


######## Installation ########

1. Make sure you have PHP 5+ and MySQL 4.1+ installed. Also, Apache module mod_rewrite should be enabled.

2. Create a new database and import __db/jobberbase.sql into it.

3. Open config.php and update the following constants so they suit your environment:
   - DB_HOST, DB_USER, DB_PASS, DB_NAME, NOTIFY_EMAIL, ADMIN_EMAIL, SITE_NAME

4. Following directories need write access:
   /uploads            (uploaded resumes are temporary stored here)
   /_templates/_cache  (smarty cache)

5. If your host doesn't offer the mysqli PHP extension (find out from phpinfo()), 
you can use a mysql wrapper instead. 
Open config.php and just replace <require_once '_includes/class.Db.php'> with 
<require_once '_includes/class.Db.MySql.php'>.

6. That's it, open a browser and type in the URL (e.g. http://localhost/jobberbase/).

7. The admin panel is available at http://localhost/admin/ with the default username "admin" and password "admin".

=========================================================================================================

######## If it still doesn't work ########

You may e-mail the author at filipcte@gmail.com. But please don't forget to write a detailed description of 
what you tried to do and what doesn't work. Thaaaaaank you! :)

=========================================================================================================

######## Disclaimer, bugs and other issues ########

1. There might be some rendering and JavaScript issues on Internet Explorer. :)
2. If you find any bugs (cause there are), try fixing them. If you do fix them, I'd love to hear from you!

=========================================================================================================

######## Author contact info ########

You may find me on the web at http://www.filipcte.ro/ or via e-mail: filipcte@gmail.com

P.S. your donations via PayPal are very much appreciated!

=========================================================================================================

-- last updated: 2am, August 20, 2008