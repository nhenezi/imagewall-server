ImageWall backend. [Live demo](http://nikola.henezi.com/imagewall/src)


Installation instruction:
* clone/copy git repository
* copy application/config/database.example.php to
   application/config/database.php
*  Adjust database.php settings and create new database
* If you want sample data, run `mysql -u username -p database_name <
   database/imagewall.sql`.
* open application/controllers/upload.php and uncomment index.php to enable
  file uploads
