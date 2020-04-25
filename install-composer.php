<?php

declare(strict_types=1);

copy('https://getcomposer.org/installer', 'composer-setup.php');
$hash = trim(file_get_contents('https://composer.github.io/installer.sig'));

if (hash_file('SHA384', 'composer-setup.php') === $hash) {
    echo 'Installer verified';
} else {
    echo 'Installer corrupt';
    unlink('composer-setup.php');
    exit(1);
}

echo PHP_EOL;
passthru('php composer-setup.php');
unlink('composer-setup.php');
