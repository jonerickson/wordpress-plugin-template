#!/bin/bash

SOURCE_DIR="src"
VENDOR_DIR="vendor"
PLUGIN_FILE="yourplugin.php"
ZIP_FILE="build/yourplugin.zip"

# Move source over to build directory
cp -r $SOURCE_DIR $VENDOR_DIR $PLUGIN_FILE build/

# Change to build directory
cd build

## Remove all files from the storage directories
rm -rf src/storage/framework/cache/*
rm -rf src/storage/framework/sessions/*
rm -rf src/storage/framework/views/*

## Create the zip archive, ignoring any log files
zip -r $ZIP_FILE * -x '*.log'

# Clean up files
rm -r $SOURCE_DIR
rm -r $VENDOR_DIR
rm -r $PLUGIN_FILE

echo "Package complete."