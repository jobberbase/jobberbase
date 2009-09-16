######## Useful info ########

The blog: http://www.jobberbase.com/blog/
The community (bug reports, fixes, etc.): http://www.jobberbase.com/forum/
Wiki (customisation guide, installation problems, faqs and themes details): http://www.jobberbase.com/wiki/
jobberBase on Google Code: http://code.google.com/p/jobberbase/
Follow us on twitter: http://twitter.com/jobberbase
E-mail us at: hello@jobberbase.com

=========================================================================================================

######## Installation ########

1. Make sure you have PHP 5+ and MySQL 4.1+ installed. Also, Apache module mod_rewrite should be enabled.

2. Before setting up the database, there are some things that you should be aware of.

2.1 Some hostings don't allow you to have more than one database (usually in case of low-end (very cheap or free) hosting plans). 
If you know that this is your case, then please follow these steps:

- you must decide for a string (you can use jb_, for example) which will be prepended to every jobberbase table name. 
You will have to set this string in the DB_PREFIX field that is described in step 3.
- open jobberbase.sql in a text editor of your choice and use its find & replace feature as follows:

(Hint: in the find & replace dialog, there's usually a button (Replace All, in case of Notepad) for replacing all the occurrences at once.)
- replace all occurrences of CREATE TABLE IF NOT EXISTS ` (note the ` char ) with CREATE TABLE IF NOT EXISTS `THE_STRING_THAT_YOU_DECIDED_ON 
(for example, CREATE TABLE IF NOT EXISTS `jb_)
- replace all occurrences of INSERT INTO ` with INSERT INTO `THE_STRING_THAT_YOU_DECIDED_ON (for example, INSERT INTO `jb_)
- save your changes and then open phpmyadmin, select your database and then import your jobberbase.sql file

Skip step 2.2 and continue with step 3. 

2.2 If you know that you can create more that one database, then please do as follows. Create a new database 
and import /_db/jobberbase.sql into it (usually done from within phpmyadmin). 

3. Rename config_default.php to config.php and update the following constants so they suit your environment:
   - DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME, DB_PREFIX
   
Note: some users are having trouble setting the DB_HOST. To find out your database host, either ask your 
hosting company or login to phpmyadmin and you should have somewhere in the upper area the string Server 
and next to it an URL or IP. That's what you should put as database host.
If you're running jobberbase on your local machine, then set the above values in the block 
following the if ($_SERVER['SERVER_NAME'] == 'localhost') line.
If you're testing on a live website, then put these values in the block following the else line. 
   
4. Upload the content of the app folder to your server. Some users make the mistake that they upload the 
app folder, but instead you should upload the files and folders contained in the app folder. 

5. Following directories need write access:
   /uploads                  (uploaded resumes are temporary stored here)
   /_templates/default/_cache        (smarty cache)
   /admin/_templates/_cache  (smarty cache)

6. If your host doesn't offer the mysqli PHP extension (find out from phpinfo()), 
you can use a mysql wrapper instead. 
Open config.php and just replace <require_once '_includes/class.Db.php'> with 
<require_once '_includes/class.Db.MySql.php'>.

7. That's it, open a browser and type in the URL (e.g. http://localhost/jobberbase/).

8. The admin panel is available at http://localhost/admin/ with the default username "admin" and password "admin". 
Make sure you change your password after logging into your admin panel.

=========================================================================================================

ENJOY!

-- last updated: 6:58AM (GMT), September 15, 2009