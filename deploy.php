<?php

declare(strict_types=1);

namespace Deployer;

use Deployer\Task\Context;

require 'recipe/common.php';

function console(string $command): void
{
    run(sprintf('{{release_path}}/bin/console %s --no-interaction', $command));
}

// Hosts

host('prod')
    ->hostname('127.0.0.1')
    ->user('ruwork')
    ->set('deploy_path', '/home/projects/ruwork-project');

// Config

set('repository', 'git@github.com:ruvents/ruwork-project.git');

set('branch', 'master');

set('shared_dirs', [
    'public/cache',
    'public/uploads',
    'var/log',
]);

set('shared_files', [
    'config/parameters.yaml',
]);

set('composer_options', 'install --no-dev --no-suggest --no-scripts');

// Tasks

task('deploy:assets:install', function () {
    console('assets:install {{release_path}}/public');
});

task('deploy:cache:warmup', function () {
    console('cache:warmup');
});

task('deploy:ckeditor:install', function () {
    console('ckeditor:install --release=full --clear=drop');
});

task('deploy:database:migrate', function () {
    console('doctrine:migrations:migrate --allow-no-migration');
});

task('deploy:gulp:build', function () {
    runLocally('node node_modules/gulp/bin/gulp.js build');
});

task('deploy:frontend:upload', function () {
    $host = Context::get()->getHost();
    runLocally("scp -r public/build/ $host:{{release_path}}/public");
});

task('deploy:yarn:install', function () {
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
    'deploy:cache:warmup',
    'deploy:ckeditor:install',
    'deploy:assets:install',
    'deploy:yarn:install',
    'deploy:gulp:build',
    'deploy:frontend:upload',
    'deploy:database:migrate',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);

// Events

after('deploy:failed', 'deploy:unlock');
