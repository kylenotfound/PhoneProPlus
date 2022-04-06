# PhoneProPlus
A neat CRUD app where a user has the ability to search and filter PhoneBook type records from PhoneProPluses public database. It also allows a user to create an account, and submit their own entries to the public database. Or, they can submit private records to serve as a backup to the user's contact list on their phone.

## Instalation Guide

> git clone (repo)

Set up your database schema in the MySql Workbench:
Your schemea can be titled whatever you like, I named mine: "phone_book"

### Configure your .env
> cp .env.example .env

> Set your "DB_USERNAME", "DB_PASSWORD", "DB_DATABASE" values

### Now that your database is setup, run the following commands:
>composer install

If on windows, you may need to run 
>composer install --ignore-platform-reqs

Then run:

> npm install && npm run dev

> php artisan migrate

> php artisan db:seed

> php artisan key:generate

## To launch the devlopment server:

>php artisan serve

In your web browser of choice, go to: http://localhost:8000 and you should see the main landing page.
