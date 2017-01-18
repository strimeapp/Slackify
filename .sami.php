<?php

include 'vendor/autoload.php';

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Tests')
    ->in($dir = 'src')
;

return new Sami($iterator, array(
    'title'                => 'Slackify API',
    'theme'                => 'default',
    'build_dir'            => __DIR__.'/docs/source/API/API',
    'cache_dir'            => __DIR__.'/docs/source/API/API/cache',
    'default_opened_level' => 2,
));
