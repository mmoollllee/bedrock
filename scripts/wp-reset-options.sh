#!/bin/bash
# Set Wordpress Options

# Install & Activate German
wp language core install de_DE && wp site switch-language de_DE
wp option update blogdescription ''
wp option delete ping_sites
wp option update default_pingback_flag false
wp option update default_pingback_flag false
wp option update default_ping_status false
wp option update default_comment_status false
wp option update show_avatars false
wp option update date_format 'j. F Y'
wp option update time_format 'G:i'
wp option update timezone_string Europe/Berlin
exit