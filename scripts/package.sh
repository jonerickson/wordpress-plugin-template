#!/bin/bash

SOURCE_DIR="./build"
PLUGIN_FILE="yourplugin.php"
ZIP_FILE="yourplugin.zip"
DEST_DIR="../../build"

# Delete existing zip file in the build directory
if [ -f "$DEST_DIR/$ZIP_FILE" ]; then
  rm -r "$DEST_DIR/$ZIP_FILE"
fi

# Change to the source directory
cd "$SOURCE_DIR" || exit

# Update the autoloader to PHP-Scoper
sed -i '' 's/\/autoload.php/\/scoper-autoload.php/g;' $PLUGIN_FILE

# Remove all files from the storage directories
rm -rf storage/framework/cache/*
rm -rf storage/framework/sessions/*
rm -rf storage/framework/views/*

# Create the zip archive, ignoring any log files or env variables
zip -r $ZIP_FILE * -x '*.log' '*.env'

# Move the zip archive to the destination directory
mv "$ZIP_FILE" "$DEST_DIR/"

# Remove the build directory
cd .. && rm -rf build

echo "Package complete."