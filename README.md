# mobile-app-CRUD
mobile centric build using jQuery mobile, PHP, and MySQL

A few different things going on in this project. 
First I was to develop a pay calculator
  This is a form built into the index.html that sends the info to emp-pay.php. I then created a class for the object creation and methods for calculating an employess pay and returns it to the page as a table. I used jQuery to disable fields depending on what type of employee pay is selected.
  
  I then created a CRUD application that uses php to access a database to create, read, update, and delete records, I also created a tracker on the id number for the read that checks the database for matches and returns them as you are typing the id number you are searching for. This required the use of JSON, an sql query, and a callback function sent to gethint.js then to hint.php.
  
  For a working example of my app here is the link :
  
  http://cisweb.bristolcc.edu/~jfletcher17/jQuery/public/index.html
  
  
  In order for you to be able to run your own copy of this program you will need to have access to your own mysql database, username and password, update the configuration file config.php
  
 

**jquery is included from cdn
