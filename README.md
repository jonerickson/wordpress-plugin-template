# Wordpress Plugin Template (Laravel)

The following Wordpress plugin template utilizes the [Acorns](https://github.com/roots/acorn) library to provide a Laravel-like developer experience.

Before you start, you should search the project and replace every instance of `yourplugin` with your designed plugin name. This includes `yourplugin.php` located in the root folder.

## Starting Wordpress

Start and initialize the Docker containers.

`docker-compose up --build`

## Installing Wordpress

Run the bash script that will automatically install Wordpress and activate the plugin.

`docker-compose run --rm cli install-wordpress`

**Admin Details**<br>
Username: wordpress<br>
Password: wordpress

## Starting Development Server

Compile and run the Vite development server. Vite will utilize hot reloading to show you the latest updates when a file is saved.

`npm run dev`

## Building For Production

Compile your assets for production.

`npm run build`

Package the plugin.

`npm run plugin-zip`

## Accessing Wordpress

Be default, the Wordpress installation will be available at `http://lvh.me`. For Mac users, this automatically defaults to localhost. For Windows or Linux users, you may need to edit your `/etc/hosts` file or change the server name in the Nginx configuration located at `nginx/conf.d/site.conf`.

The plugin can be accessed at `http://lvh.me/hello-world`

## CLI

The WP-CLI can be accessed using the following commands:

#### WP-CLI

`docker-compose run --rm cli wp [command]`

#### Laravel Artisan

`docker-compose run --rm cli wp acorn [artisan:command]`