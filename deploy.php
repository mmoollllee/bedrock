<?php

namespace Deployer;

require 'vendor/deployer/deployer/recipe/common.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/prepare.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/bedrock_db.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/bedrock_env.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/bedrock_misc.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/common.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/filetransfer.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/sage.php';
require 'vendor/mmoollllee/bedrock-deployer/recipe/trellis.php';

// Configuration
set('bin/composer', function () { return 'composer'; });
// set('bin/composer', function () { return '/usr/bin/php7.3-cli ~/composer.phar'; });

// Common Deployer config
set( 'repository', 'git@github.com:vendor/example.com.git' );
set( 'shared_dirs', [
	'web/app/uploads'
] );

// Bedrock DB config
set( 'vagrant_dir', dirname( __FILE__ ) . '/../trellis' );
set( 'vagrant_root', '/srv/www/example.com/current' );

// Bedrock DB and Sage config
set( 'local_root', dirname( __FILE__ ) );;
set( 'theme_path', 'web/app/themes/template' );

// File transfer config
set( 'sync_dirs', [
	dirname( __FILE__ ) . '/web/app/uploads/' => '{{deploy_path}}/shared/web/app/uploads/',
] );


// Hosts

set( 'default_stage', 'staging' );

host( 'stage.your-host.com' )
	->stage( 'staging' )
	->user( 'your-username' )
	->set( 'deploy_path', '~/stage/deploy' );
// Set Webspace-Path to stage.example.com/deploy/current/web/

host( 'your-host.com' )
	->stage( 'production' )
	->user( 'your-username' )
	->set( 'deploy_path', '~/httpdocs/deploy' );


// Tasks

// Deployment flow
// ToDo adapt sage:vendors...
desc( 'Deploy whole project' );
task( 'deploy', [
	'bedrock:prepare',
	'deploy:lock',
	'deploy:release',
	'deploy:update_code',
	'trellis:remove',
	'deploy:shared',
	'deploy:writable',
	'deploy:symlink',
	'bedrock:env',
	'bedrock:vendors',
	'deploy:clear_paths',
	'push:db',
	'push:files-no-bak',
	'deploy:unlock',
	'cleanup',
	'success',
] );

desc( 'Deploy only app' );
task( 'push', [
	'bedrock:prepare',
	'deploy:lock',
	'deploy:release',
	'deploy:update_code',
	'trellis:remove',
	'deploy:shared',
	'deploy:writable',
	'bedrock:env',
	'bedrock:vendors',
	'deploy:clear_paths',
	'deploy:symlink',
	'deploy:unlock',
	'cleanup',
	'success',
] );

task( 'pull', [
	'pull:db',
	'pull:files-no-bak',
] );

// [Optional] if deploy fails automatically unlock.
after( 'deploy:failed', 'deploy:unlock' );
