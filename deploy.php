<?php

namespace Deployer;

require 'recipe/laravel.php';

// Configuration

set('repository', 'git@https://github.com/rufhausen/bands.git');

add('shared_files', []);
add('shared_dirs', []);

add('writable_dirs', []);

// Servers

server('production', 'rufserver.com')
    ->user('gtaylor')
    ->identityFile('~/.ssh/id_rsa_gtaylor@electricwerks.com.pub', '~/.ssh/id_rsa_gtaylor@electricwerks.com')
    ->set('deploy_path', '/var/www/vhosts/bands.rufserver.com');

task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
});

// Tasks
task('foo', function () {
    writeln('foo');
});
desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});

after('deploy:symlink', 'php-fpm:restart');
