# TODO-List-App

Anthony Lemmon - eu6623

Simple TODO list web app built using WAMP stack, using Bitnami WAMP stack.  

## Installation
Download Bitnami WAMP version 7.0.22-1: https://bitnami.com/stack/wamp/installer

Follow the installation instructions.  When prompted to create a password, use `root`.  You are able to change the password later, but this is the password I used.  The username for phpMyAdmin is also `root` by default.  

Once downloaded, clone this repository, and open the `Code` folder.  Move the `index1.php` file to the `Bitnami\wampstack-7.0.22-1\apache2\htdocs` folder.  

Login to phpMyAdmin using `root` as your username and password.  Go to the `Import` tab, and choose the `todoapp.sql` file.  Make sure the format is set to `SQL`, and click `GO` to import the database for the TODO App.  

Open the Bitnami application, and go to the `manage servers` tab.  Make sure `MySQL Database` and `Apache Web Server` are both running.  

In your broser, go to `localhost/index1.php` to open the TODO List App.  

## How to use the App
The application is pretty self-explanitory.  There is a text box where you can type your task (255 char max).  To add the task, press the `Add Task` button.  To delete a task, click `delete` to the right of the task.  

## Changing your phpMyAdmin password
If you would like to change your password, do the following steps:

In index1.php, go to line 4 and change it to `$password = "YOUR_NEW_PASSWORD"`.  
Next, open the command prompt and type `/opt/bitnami/mysql/bin/mysqladmin -p -u root password YOUR_NEW_PASSWORD`.  You will be prompted to enter your old password, which is `root`.  

