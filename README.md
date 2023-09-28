## Barangay Online System (Dynamic)

### Barangay Source Code at  [Barangay Online System Repository](https://github.com/vonypeto/barangay)
 
This system require a list of program to function and run on the local device
.

## Installation for local server

### Requirement:

1. Download the software composer from this [composer](https://getcomposer.org/download/) and git bash from this [git](https://git-scm.com/downloads) choose the appropriate OS

    You can also download the composer installer from a terminal

    ```
    wget https://getcomposer.org/Composer-Setup.exe
    ```

2. After Installation of composer and git bash, Open git terminal and clone the repository.

    ```
    git clone https://github.com/vonypeto/barangay.git
    ```

    On Windows, you'll have to create a folder first then go to that directory and there you can clone the repository.

3. After cloning the repository you'll need to go to that repository:
    ```
    cd barangay
    ```	
4. Install the dependency using composer
    ```
    composer update && composer install
    ```
    note: if you have slow net and the installation failed, just repeat the process
5. Install Xampp from this [link](https://www.apachefriends.org/index.html) 
 

## Usage

1. Run Xampp first by going to the directory where you installed it and open this `xampp-control.exe` and run the `mysql service` and `apache service`

2. Create a database for the barangay system before creating table.
    go to the url

    ```
    http://localhost/phpmyadmin/server_sql.php
    ```	
    type this command
    ```
    CREATE DATABASE barangay
    ```	

3. After installation process, run the following command on the directory where you clone the source code:

    ```
    php artisan serve && php artisan migrate && php artisan db:seed
    ```	
note: Xampp mysql service must be running 

4. Visit the link provided by the terminal such as `127.0.0.1:8000`  
note: to run the website on localhost for developing testing just run this on the terminal where the code is `php artisan serve`

To access the Server Side panel we provided a seed generated account

    ```
    Username: giann@gmail.com
    Password: giann
    Usertype: Admin
    ```	

## Advanced details

### Dependencies

The following libraries are required

   Laravel 8.X
   composer 2.X 
   Git Bash 2.2X.X 
   Xampp = 3.2.X
   Mysql 8.X (~8< below don't work)
   DomPDF 5.X (4.X laravel don't work)
  

