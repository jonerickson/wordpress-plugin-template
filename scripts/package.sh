#!/bin/bash

SOURCE_DIR="src"
ZIP_FILE="yourplugin.zip"
DEST_DIR="vendor"

# Zip the source directory
zip -r "$ZIP_FILE" "$SOURCE_DIR"

# Zip the vendor directory
zip -r "$ZIP_FILE" "$DEST_DIR"

# Update the existing zip file
zip -r "$ZIP_FILE" yourplugin.php

echo "Package complete."
