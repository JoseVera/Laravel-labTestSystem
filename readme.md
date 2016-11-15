Laboratory report test system

   this is a simple system that allow patients consults his previous reports of test analisys, the system have two type of users operators and users.

   Operators:
 * test Exams  (CRUD)
 * reports (CRUD)
 * asociate multiple test to a report
 * Users (CRUD)

   Patients:
 * check a list of reports
 * consult the detail of report and test included
 * download a PDF of detail report
 
  technologies used.
  * LARAVEL 5.3
  * Bootrap
  * JQuery
  * DOMPDF
  * Swift Mailer

/******** HOW TO START  ********/

1.- INSTALL DB
	the app was setup with a database call "lab", so let setup a new MYSQL DB, after let import the follow file "lab.sql"
    DB conexion setting are:
		
		'host' =>  'localhost',
		'port' => '3306',
        'database' =>'lab',
        'username' => 'root',
        'password' => '',
		
2.- PREPARE TO BUILD YOUR APP
	
	2.1	this app was developed in Laravel 5.3 framework, in this order you to have proper laravel configuration setup, please refer to.
	https://laravel.com/docs/5.3/installation
	
	2.2 	Once ready your environment lets unzip “lab.zip” and place its content in your webserver.
	
	2.3 	Go to your app directory /lab/ from a command console and type 
		Php artisan serve
			This is necessary to start your app
	
	2.4 	finally open your web browser and go to http://localhost:8000/

3.- USERS

     Operator User
     email: kaderu@gmail.com
     pass:  123456


     Pacient User
     email: kaderu2003@yahoo.com
     pass:  123456	