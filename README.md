# Larashorturl

## Description:
A web app where users can generate short url redirect links.  Built with [Laravel](http://www.laravel.com).

## Installation:
Note: I wrote these instructions for systems with docker installed because it removes most of the hassle of obtaining dependencies and configuration.

If you already have [Laravel dependencies](https://laravel.com/docs/5.6#server-requirements), installed [composer globally](https://getcomposer.org/doc/00-intro.md#globally), and a laravel supported [database](https://laravel.com/docs/5.6/database#introduction), 
then just follow step 1, configure the `.env` file with your database credentials, do step 8 and `php artisan serve`

### Installation with docker
#### Requirements:
[docker](https://docs.docker.com/install/) and [docker-compose](https://docs.docker.com/compose/install/) working in your host system

#### Follow these steps in your host terminal:
1. clone this repo, goto the directory and rename the env file: 
    ```console
    user@host:~$ git clone https://github.com/cruzken/larashorturl.git && cd larashorturl && cp .env.example .env
    ```

1. clone laradock repo, goto the directory and rename the env file:
    ```console
    user@host:~/larashorturl$ git clone https://github.com/laradock/laradock/ && cd laradock && cp env-example .env
    ```

1. change the line `MYSQL_VERSION=latest` in `laradock/.env` to: `MYSQL_VERSION=5.7`

1. Open `linkin/.env` and set `DB_HOST` value to:
`mysql`
    1. for `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` match the values set in `laradock/.env`
    `MYSQL_DATABASE`, `MYSQL_USER`, `MYSQL_PASSWORD`

1. start building the containers:
    ```console
    user@host:~/larashorturl/laradock$ docker-compose up -d nginx mysql workspace
    ```

1. access the workspace container:
    ```console
    user@host:~/larashorturl/laradock$ docker-compose exec workspace bash
    ```

1. in the workspace container initialize the app:
    ```console
    root@foo:/var/www# composer install && php artisan key:generate && php artisan migrate
    ```

## Usage
- If installed without docker, run `php artisan serve` in the project directory.
- Go to the local address that the app is served in the browser (usually [localhost](http://localhost) or [localhost:8000](http://localhost:8000))
- Enter the url that you want to shorten in the input field and you'll receive a generated redirect link.

## Contributing
There is no contributing guide (yet?) Feel free to submit pull requests for fixes, features, etc.

## Credits
Thanks to the [Laravel](http://www.laravel.com) team for their amazing framework.
Thanks to the [Laradock](http://laradock.io/) team for their docker environment configuration.

## License
This is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).