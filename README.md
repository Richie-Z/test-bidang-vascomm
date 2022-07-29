# Test Bidang Viscomm

## Screenshoot

![erd](./screenshoot/erd.png)

![Pengaduan Slug](./screenshoot/home.png)

![Admin](./screenshoot/admin.png)

## Installation 

-   Execute hthttps://github.com/Richie-Z/test-bidang-vascomm.git on your terminal to download this project.
-   Go to the project root directory and execute composer install
-   Create a file named as .env and copy the content of .env.example to newly created .env file
-   Configure .env db according to your setting
-   Execute php artisan migrate and php artisan db:seed ('password' is the default password for admin & customer)
-   Then execute php artisan key:generate on your terminal/cmd to generate environment key
-   Then execute php artisan serve


