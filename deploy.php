<?php

declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;

require 'recipe/common.php';
require __DIR__.'/vendor/deployer/recipes/recipe/cachetool.php';

function symfony(string $command): void
{
    run(sprintf('{{release_path}}/bin/console %s --no-interaction', $command));
}

// Hosts

host('prod')
    ->hostname('hostname')
    ->user('user')
    ->set('deploy_path', 'deploy_path')
    ->set('cachetool', 'cachetool_path');

// Repository

set('repository', 'repository');

set('branch', 'master');

// Facts

set('host', static function (): string {
    return (string) Context::get()->getHost();
});

// Configuration

set('composer_options', 'install --no-dev --no-suggest --no-scripts --verbose --prefer-dist --no-progress --no-interaction --classmap-authoritative');

set('shared_dirs', [
    'public/media',
    'public/uploads',
    'var/log',
]);

set('shared_files', [
    'config/parameters.yaml',
]);

// Tasks

task('assets:install', static function (): void {
    symfony('assets:install {{release_path}}/public');
});

task('cache:warmup', static function (): void {
    symfony('cache:warmup');
});

task('ckeditor:install', static function (): void {
    symfony('ckeditor:install --release=full --clear=drop');
});

task('doctrine:database:migrate', static function (): void {
    symfony('doctrine:migrations:migrate --allow-no-migration');
});

task('gulp:build', static function (): void {
    runLocally('node node_modules/gulp/bin/gulp.js build');
    runLocally('scp -r public/build/ {{host}}:{{release_path}}/public');
});

task('yarn:install', static function (): void {
    runLocally('yarn install');
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
    //'ckeditor:install',
    'assets:install',
    'yarn:install',
    'gulp:build',
    'doctrine:database:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);

// Events

after('deploy:failed', 'deploy:unlock');

after('deploy:symlink', 'cachetool:clear:opcache');
