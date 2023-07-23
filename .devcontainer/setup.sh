#! /bin/bash
REPO_FOLDER="/workspace/$RepositoryName"

# Apache
sudo chmod 777 /etc/apache2/sites-available/000-default.conf
sudo sed "s@.*DocumentRoot.*@\tDocumentRoot $PWD/wordpress@" .devcontainer/000-default.conf > /etc/apache2/sites-available/000-default.conf
update-rc.d apache2 defaults
service apache2 start

# WordPress Core Install
wp core download --locale=en_us --path=wordpress
cd wordpress
wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database
wp core install --url=https://$(CODESPACE_NAME) --title="Wordpress Plugin Template" --admin_user=wordpress --admin_password=wordpress --admin_email=mail@example.com

# Manage Plugins
wp plugin delete akismet
wp plugin install show-current-template --activate
wp plugin activate yourplugin

# Import Demo Content
wp plugin install wordpress-importer --activate
curl https://raw.githubusercontent.com/WPTT/theme-unit-test/master/themeunittestdata.wordpress.xml > demo-content.xml
wp import demo-content.xml --authors=create
rm demo-content.xml

# Xdebug
echo xdebug.log_level=0 | sudo tee -a /usr/local/etc/php/conf.d/xdebug.ini

# Symlink Plugin
cd $REPO_FOLDER/wordpress/wp-content/plugins
ln -s $REPO_FOLDER/src yourplugin

# Install Dependencies
cd $REPO_FOLDER
npm install
composer install