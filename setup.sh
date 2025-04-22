#!/bin/bash

# === FUNCTIONS ===

PROJECT_NAME=$(basename "$PWD")

function env_file() {
  cat > .env <<EOL
DB_HOST='localhost'
DB_NAME='${PROJECT_NAME}'
DB_PASSWORD=
DB_USER='root'
DISABLE_WP_CRON='True'
DOMAIN_CURRENT_SITE='${PROJECT_NAME}.test'
WP_DEBUG_LOG='${PWD}/logs/debug.log'
WP_ENV='development'
WP_HOME='http://${PROJECT_NAME}.test'
WP_SITEURL='http://${PROJECT_NAME}.test/wp'

DEP_HOSTNAME='xy.de'
DEP_REPO='git@github.com:mmoollllee/repo.git'
DEP_BRANCH='main'
DEP_DIR='~/httpdocs/deploy'
DEP_STAGE_DIR='~/stage.xy.de/deploy'
DEP_USERNAME='asdf'
DEP_STAGE_USERNAME='asdf'
DEP_THEME_PATH='web/app/themes/template'
DEP_KEEP_RELEASES=2

EOL

  echo ".env file created successfully."
}

function create_mysql_database() {
  echo "Creating MySQL database..."
  if mysql -u root -e "DROP DATABASE IF EXISTS \`$PROJECT_NAME\`;" && \
    mysql -u root -e "CREATE DATABASE \`$PROJECT_NAME\`;"
  then
    echo "Database '$PROJECT_NAME' created successfully."
  else
    echo "Error: Failed to create database '$PROJECT_NAME'."
  fi
}

# === MAIN SCRIPT ===

# Setup .env if not exists
if [ ! -f .env ]; then
  env_file
else
  echo ".env already exists, skipping setup."
fi

# Create MySQL database
create_mysql_database

# Done!
echo "Project setup complete!"
echo "Don't forget to setup a auth.json for ACF PRO, then run composer install."