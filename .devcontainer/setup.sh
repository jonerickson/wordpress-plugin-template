#! /bin/bash

# Apache
sudo chmod 777 /etc/apache2/sites-available/000-default.conf
sudo sed "s@.*DocumentRoot.*@\tDocumentRoot $PWD/wordpress@" .devcontainer/000-default.conf > /etc/apache2/sites-available/000-default.conf
update-rc.d apache2 defaults
service apache2 start

# WordPress core install
wp core download --locale=en_US --path=wordpress
cd /workspace/wordpress
wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database
LINE_NUMBER=`grep -n -o 'stop editing!' wp-config.php | cut -d ':' -f 1`
sed -i "${LINE_NUMBER}r ../.devcontainer/wp-config.txt" wp-config.php && sed -i -e "s/CODESPACE_NAME/$CODESPACE_NAME/g"  wp-config.php
wp core install --url=https://$(CODESPACE_NAME) --title="Wordpress Plugin Template" --admin_user=wordpress --admin_password=wordpress --admin_email=mail@example.com

# Enable debug mode
wp config set WP_DEBUG true --raw

# Manage plugins
wp plugin delete akismet
wp plugin install show-current-template --activate

# Symlink plugin
mkdir -p "/workspace/wordpress/wp-content/plugins/yourplugin"
cd /workspace/wordpress/wp-content/plugins/yourplugin
ln -s /workspace/src
ln -s /workspace/vendor
ln -s /workspace/yourplugin.php
cd /workspace/wordpress

# Import demo content
wp plugin install wordpress-importer --activate
curl https://raw.githubusercontent.com/WPTT/theme-unit-test/master/themeunittestdata.wordpress.xml > demo-content.xml
wp import demo-content.xml --authors=create
rm demo-content.xml

# Xdebug
echo xdebug.log_level=0 | sudo tee -a /usr/local/etc/php/conf.d/xdebug.ini

# Install dependencies
cd /workspace
yarn install
composer install

# Build app
npm run build

# Activate the plugin
wp plugin activate yourplugin