## Description
This is pet project. After added sentence, on each sentence words will be added random delay between 1 and 3 seconds. Once you can see sentences in home route. By choosing sentence you can play highlighting word by word. 



## GUIDE "How to run this app"

1. `cd <project-name>`
2. setup your own .env file **and** create database
3. `composer install`
4. `npm install && npm run dev` 
5. `php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"`  (publish assets and config)
6. `php artisan admin:install` (Open http://localhost/admin/ in browser,use username **admin** and password **admin** to login.)
7. `php artisan migrate` to migrate to your selected DB
8. In Admin panel choose **Menu** option `>` Add new Menu `>`  Select **Admin** in Parent selection `>` Write menu title ex **Sentences** > URI of menu must be **auth/sentence** `>` Rolse and Permission you can leave it blank `>` After that refresh admin panel `>` Choose Sentence menu and add sentence
9. `php serve artisan` and voila! 

