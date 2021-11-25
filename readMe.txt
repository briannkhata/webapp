Local Server
-------------------------------------------------------------------------

1.Download Laragon from https://laragon.org/download/.
2.Follow steps on https://laragon.org/docs/index.html to install it and how to use
3.Create a new blank quik blank project by using Laragon and name it webapp
4.Download the webapp project from my github account.
5.Navigate to the project folder you created using laragon and extract the downloaded project files to that folder. 
  C:\laragon\www\webapp
6.Make sure you start all the services on Laragon 
7.Start cmd and navigate to the project folder directory
8.On the cmd type php artisan optimize and then php artisan serve. It should give you the link from where to access the app. Type that linkon the web browser and press enter.
9.It should bring the Login window. Enter briannkhata@gmail.com as username and password000122 as password


If this step fails

1. Create a new Laravel project in laragon and name it webapp
2. Copy the folders
		- app
		- public
		- routes
		- resources
		- config
		- readMe.txt
	from the project that you download from the github and paste them in the new created webapp project and replace 
	with the existing files and folder
3. and go to step 6 above.


Online deployment
---------------------
1.Compress project folder and create a zip file.
2.Open hosting cPanel and then follow the below steps:
	a. Click on ‘File Manager’
	b. Click on public_html
	c. Then Click on ‘Upload’
	d. Then upload the created zip file into the root directory. In side public_html direcotry.
3. After successfully uploaded the project zip file, Now you need to extract this file inside public_html folder 
   on web server.
4. Navigate to the public_html folder and find index.php file. Then open this file by right click on it and select 
   Code Edit from the menu and update index.php with

   require __DIR__.'/../bootstrap/autoload.php';
   $app = require_once __DIR__.'/../bootstrap/app.php';
	to:
	require __DIR__.'/bootstrap/autoload.php';
	$app = require_once __DIR__.'/bootstrap/app.php';
5.Then access the app using either domain url or subdmain url by typing the url on the browser 
  and then click enter



