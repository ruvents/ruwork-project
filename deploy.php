<?php

declare(strict_types=1);

namespace Deployer;

require __DIR__.'/vendor/ruwork/ruwork-bundle/deploy.php';
require __DIR__.'/vendor/deployer/recipes/recipe/cachetool.php';

// Repository

set('repository', 'repository');

set('branch', 'master');

// Tasks

task('yarn:build', static function (): void {
    runLocally('yarn build');
});

task('frontend:upload', static function (): void {
    runLocally('scp -r public/build/ {{host}}:{{release_path}}/public');
});

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:clear_paths',
    'deploy:shared',
    'deploy:vendors',
    'cache:warmup',
    'assets:install',
    'yarn:install',
    'yarn:build',
    'frontend:upload',
    'doctrine:database:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);

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
