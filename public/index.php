<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

// ,
// "post-install-cmd": [
//     "@auto-scripts"
// ],
// "post-update-cmd": [
//     "@auto-scripts"
// ]

// {
//     "name": "symfony/apache-pack",
//     "version": "v1.0.1",
//     "source": {
//         "type": "git",
//         "url": "https://github.com/symfony/apache-pack.git",
//         "reference": "3aa5818d73ad2551281fc58a75afd9ca82622e6c"
//     },
//     "dist": {
//         "type": "zip",
//         "url": "https://api.github.com/repos/symfony/apache-pack/zipball/3aa5818d73ad2551281fc58a75afd9ca82622e6c",
//         "reference": "3aa5818d73ad2551281fc58a75afd9ca82622e6c",
//         "shasum": ""
//     },
//     "type": "symfony-pack",
//     "notification-url": "https://packagist.org/downloads/",
//     "license": [
//         "MIT"
//     ],
//     "description": "A pack for Apache support in Symfony",
//     "support": {
//         "issues": "https://github.com/symfony/apache-pack/issues",
//         "source": "https://github.com/symfony/apache-pack/tree/master"
//     },
//     "time": "2017-12-12T01:46:35+00:00"
// },

// zlm9m66Du8[Q