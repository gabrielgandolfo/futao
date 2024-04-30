<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'app');

// Project repository
set('repository', 'git@github.com:gabrielgandolfo/futao.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('production')
    ->hostname('gabriel_aws')
    ->set('branch', 'main')
    ->set('deploy_path', '/var/www/futao.gabrielgandolfo.com.br/public_html');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
