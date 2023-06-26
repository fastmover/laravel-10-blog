<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel 10 Blog

### Quickstart with Sail

First, ensure [Docker Desktop](https://www.docker.com/products/docker-desktop/) is installed and running.

Navigate to into the directory that this repository was copied to and run the following command to install Sail and all other composer dependencies.

    docker run --rm \  
        -u "$(id -u):$(id -g)" \  
        -v "$(pwd):/var/www/html" \  
        -w /var/www/html \  
        laravelsail/php82-composer:latest \  
        composer install --ignore-platform-reqs  

Once composer is done installing (assuming there were no errors) you can start the website: 
`./vendor/bin/sail up`

Next create the database and seed it with test data:

`./vendor/bin/sail artisan migrate:fresh --seed`

Now navigate to [http://localhost/]

You can log in with the follow credentials:
Email: test@example.com
Password: password