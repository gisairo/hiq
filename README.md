# hiq
# heroku url
https://shrouded-anchorage-28823.herokuapp.com
Adds frontend and starts backend setup by following these steps

###clone the repository to folder of your choice from [Github](git@github.com:gisairo/hiq.git)

###Create a database on your development environment for this project. 
###I recommend laragon, available on windows and mac or lamp on linux
### After cloning successfully to the folder, open your preferred terminal or shell client - bash - console - command-promnt and navigate to the project folder.
###Install composer from their website
###Run the following command 

        composer install

##Duplicate the .env.example to a file name .env, and edit the database details to match the database create in the previous step. 
##Then create the application key by running the following command 

    php artisan key:generate

## This will create an application key required to run the application

## Run the database migration using the following command 

    php artisan migrate

## Then seed the database using the seeder file by running the following command 

    php artisan db:seed

## Navigate to the project on your browser on choice e.g I type demo.test on my browser to run the project 





