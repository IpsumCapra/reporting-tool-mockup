# Reporting tool mockup
Mockup for a reporting tool for third year internship of Comp Sci Engineering.
# Installation guide - Ubuntu
* Install the following packages: `sudo apt install apache2 php php-dom mysql-server composer`
* Clone the repo in the correct place:
```
cd /var/www/html
git clone https://github.com/IpsumCapra/reporting-tool-mockup.git
```
* Install composer dependencies: `composer install`
* Copy `.env.example` to `.env`
* Create the file `/etc/apache2/sites-available/reporting-tool.conf` with super user privileges.
```
# Reporting Tool vhosts

<VirtualHost *:80>
    ServerName reporting-tool.local
    DocumentRoot "/var/www/html/reporting-tool-mockup/public"
</VirtualHost>

<VirtualHost *:80>
    ServerName www.reporting-tool.local
    Redirect permanent / http://reporting-tool.local/
</VirtualHost>
```
- Enable the site

    ```
    sudo a2ensite reporting-tool
    ```
* Edit this line in `/etc/apache2/apache2.conf` at `AllowOverride` to `All` as a super user

    ```
    <Directory /var/www/>
        ...
        AllowOverride All
        ...
    </Directory>
    ```
* Enable the Apache rewrite module

    ```
    sudo a2enmod rewrite
    ```
* Restart apache

    ```
    sudo service apache2 restart
    ```
* Add following lines to `/etc/hosts` with super user privileges

    ```
    # Reporting Tool local domains
    127.0.0.1 reporting-tool.local
    127.0.0.1 www.reporting-tool.local
    ```
* Create MySQL user and database
* Fill in MySQL user, password and database information in `.env`
* Create database tables
    ```
    php artisan migrate
    ```
* Done! Site is locally available at `reporting-tool.local`
# Manual
## First login
* When visiting the site click the _login_ button, and log in using the default admin account using the login: `admin@a.a` with password `admin`. It is advised to change the password of this account, or remove it.
## Creating new accounts
Only administrator accounts can create new users.
* While logged in as an administrator click the _Admin_ button on the navbar.
* Click on the _Users_ button. This is also where all users can be viewed, and searched through.
* Click on _Create new user_.
* Fill out the presented form, confirm by pressing the _Create new user_ button.
## Editing, deleting or hijacking users
* In the _Users_ admin section click on the name of the user of choice.
* Use the buttons to either edit, delete or hijack a user.
### Editing a user
You are presented with a menu to change user details. Press _Edit user_ to save.
### Deleting a user
When pressing the delete button, an account is instantly and permanently deleted.
### Hijacking a user
When hijacking a user, your session is altered to log you in as said user.
## Changing settings
All logged in users can change settings by pressing the settings button.
* While on the settings menu make desired changes.
* When normal details were changed, press _Change details_ to save.
* When the password was changed, press _Change password_ to save.
## Logout
Whilst logged in, press the _Logout_ button to log out.
