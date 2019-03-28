# :dove: Project Vireo

[中文说明](README_ZH_CN.md)

Project Vireo is a open-source blog system based on Lumen (Laravel) 5.8.

It is designed to replace Hexo as a slim yet highly extendable and customizable dynamic blog system.

## Setup a Server

1. Buy a server and a domain (if you want)
2. Prepare the environment (If you are not familiar with this, I suggest using [the LAMP script](https://lamp.sh)):
   - Linux: CentOS 7 or Ubuntu 18.04 recommended
   - Apache httpd 2 (Nginx not recommended)
   - MariaDB 10 (MySQL also acceptable)
   - PHP 7.2.18+
3. Fork this repository and clone it to the server, then run `composer install` to install dependencies.
4. Make up your own configuration in `.env` file (copy one from `.env.example`), including a random Webhook key, the longer the better (32-char is OK).
5. Setup MariaDB with the user, password and database as you edited in `.env`.
6. Run `php artisan migrate` to migrate database tables.
7. Run `php artisan key:generate` to generate storage keys.
8. Run `sudo chgrp -R www-data .` to change owner to the project folder. Please notice in some distributions the Apache user is called `apache` instead of `www-data`.
9. Run `sudo chmod +x auto-deploy.sh` to give it execute privilege.
10. Setup your apache virtual host and add webhook `https://your_site.com/deploy` using the key in `.env` to your remote code repository.

## Write and Deploy

1. Clone your forked repository to your local environment. (It is supposed to have PHP7.2+ and MariaDB installed.) You will find the posts and docs in `/recources` folder.
2. Run `php -S localhost:8000 -t public` to start a development server.
3. To write a post, run `php artisan vireo:post` and enter details, the post will be generated as `/resources/posts/date-slug/content.md`.
4. To write a document, run `php artisan vireo:document` and enter details, the document will be generated as `/resources/docs/category-date-slug/content.md`.
5. To add images or files, just put them in the same folder where `contend.md` lies.
6. Run `php artisan vireo:cache` to let Vireo read the files and put them in the database.
7. Refresh the page and you can see the new pages.

## Extend and Customize

- You can add more pages or functions by adding controllers, views and routes. Detailed methods can be found in [Laravel documentation](https://laravel.com).
- All pages are renderred using Laravel blade template. You can edit them in `/resources/views` folder. More usage can be found in Laravel documentation.
- You can modify CSS stylesheet or JS scripts in `/resources/views/layouts/html_base` folder.

## License

Vireo can be distributed under the MIT License.

Used libraries are (through CDN):

- Bootstrap
- CookieBanner
- Fancybox
- FontAwesome5
- JQuery
- MathJax
- MDBootstrap