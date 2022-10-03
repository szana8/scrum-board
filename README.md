## Laravel Application Skeleton 

This project contains a default configured Laravel application with MySQL and Redis.
The application has been packed by a docker container.

Out of the box the project contains: <br>
* Laravel 9.x
* MySQL latest version
* Redis latest version

### Up and running the project

Before you can run the docker-compose up command you need to copy the .env-example file
to a .env file and setup the name of your application. <br>
Docker and Nginx uses the .env file to create the containers and set the URL.
You need to change the APP_NAME in the .env file whatever your application name is.
Based on this name the containers will be created.<br>
After you finished your .env setup you can run the `docker-compose up -d`

After the docker finished the build you can find the containers in your docker
client. One more thing you need to do before you can start the work. You have to add
the application url into you hosts file. Depends on which operating system used you
can find the hosts file in `/etc/hosts` or `Windows/System32/Drivers/hosts`

Add the application your application url and the localhost ip into this file run a
composer install in the workspace, and now ready to go.

### MySQL access

You can have access your MySQL database in the localhost:3306 with the username and password
in the .env file
