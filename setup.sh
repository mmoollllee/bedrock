#!/bin/bash

# === FUNCTIONS ===

PROJECT_NAME=$(basename "$PWD")

function env_file() {
  if [ ! -f .env ]; then
    cat > .env <<EOL
DB_HOST='127.0.0.1'
DB_NAME='${PROJECT_NAME}'
DB_PASSWORD=
DB_USER='root'
DISABLE_WP_CRON='True'
DOMAIN_CURRENT_SITE='${PROJECT_NAME}.test'
WP_DEBUG_LOG='${PWD}/logs/debug.log'
WP_ENV='development'
WP_HOME='http://${PROJECT_NAME}.test'
WP_SITEURL='http://${PROJECT_NAME}.test/wp'

EOL
    echo ".env file created successfully."
  fi

  read -p "Check .env file if you want... Ready?"

  # Read all variables from .env
  export $(grep -v '^#' .env | xargs)
  echo "Environment variables loaded from .env file."
}

function create_mysql_database() {
  echo "Creating MySQL database..."
  if mysql -u $DB_USER -h $DB_HOST -e "DROP DATABASE IF EXISTS \`$DB_NAME\`;" && \
    mysql -u $DB_USER -h $DB_HOST -e "CREATE DATABASE \`$DB_NAME\`;"
  then
    echo "Database '$DB_NAME' created successfully."
  else
    echo "Error: Failed to create database '$DB_NAME'."
  fi
}

# === MAIN SCRIPT ===

# Setup .env if not exists
env_file

# Create MySQL database
create_mysql_database

echo "Installing WordPress via wp-cli..."

if ! command -v wp &> /dev/null
then
    echo "wp-cli not found. Installing wp-cli..."
    if read -p "Do you want to install wp-cli? (y/n): " -n 1 -r && [[ $REPLY =~ ^[Yy]$ ]]; then
      echo
    else
        echo "\nPlease install wp-cli first!"
        exit 1
    fi
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    php wp-cli.phar --info # Test it
    chmod +x wp-cli.phar
    sudo mv wp-cli.phar /usr/local/bin/wp
    echo "wp-cli installed successfully!"
fi

read -p "Don't forget to setup a auth.json for ACF PRO, before running composer install. Ready?"

composer install

read -p "Enter site title (default: 'My WordPress Site'): " SITE_TITLE
SITE_TITLE=${SITE_TITLE:-'My WordPress Site'}
read -p "Enter site blogdescription (default: ''): " BLOGDESCRIPTION
BLOGDESCRIPTION=${BLOGDESCRIPTION:-''}
read -p "Enter admin username (default: 'admin'): " ADMIN_USER
ADMIN_USER=${ADMIN_USER:-'admin'}
read -p "Enter admin password (default: 'admin'): " ADMIN_PASSWORD
ADMIN_PASSWORD=${ADMIN_PASSWORD:-'admin'}
read -p "Enter admin email (default: 'admin@example.com'): " ADMIN_EMAIL
ADMIN_EMAIL=${ADMIN_EMAIL:-'admin@example.com'}

wp core install --url="$WP_HOME" --title="$SITE_TITLE" --admin_user="$ADMIN_USER" --admin_password="$ADMIN_PASSWORD" --admin_email="$ADMIN_EMAIL"

wp language core install de_DE && wp site switch-language de_DE
wp option update blogdescription "$BLOGDESCRIPTION"
wp option delete ping_sites
wp option update default_pingback_flag false
wp option update default_pingback_flag false
wp option update default_ping_status false
wp option update default_comment_status false
wp option update show_avatars false
wp option update date_format 'j. F Y'
wp option update time_format 'G:i'
wp option update timezone_string Europe/Berlin

echo "WordPress installed successfully!"

# Done!
echo "Project setup complete!"
echo "You can now login at: $WP_HOME/wp-admin"
if read -p "Should I delete myself? (y/n): " -n 1 -r && [[ $REPLY =~ ^[Yy]$ ]]; then
    echo
    rm -- "$0"
fi
