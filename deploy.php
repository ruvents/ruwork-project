<?php

declare(strict_types=1);

namespace Deployer;

require __DIR__.'/vendor/ruwork/ruwork-bundle/deploy.php';
require __DIR__.'/vendor/deployer/recipes/recipe/cachetool.php';

// Repository

set('repository', 'repository');

set('branch', 'master');

// Hosts

host('prod')
    ->hostname('hostname')
    ->user('user')
    ->set('deploy_path', 'deploy_path')
    ->set('cachetool', 'cachetool_path');

// Events

//before('assets:install', 'ckeditor:install');

after('deploy:symlink', 'cachetool:clear:opcache');

after('deploy:failed', 'deploy:unlock');
