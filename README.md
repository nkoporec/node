## About Node

A demo Drupal app that exposes GraphQL endpoints to be used with a Nextjs frontend.

## Techonologies
 - Drupal
 - GraphQL
 - Next.js
 
## Developing

You need to have a working LAMP stack.The most straightforward way is to use [DDEV](https://github.com/drud/ddev).

Steps for setting up the project using DDEV:
 - Install DDEV
 - Go to project
 - Run `ddev start`
 - If running for the first time:
    - Run `ddev composer install`
    - Set config folder in settings.php to `$settings['config_sync_directory'] = '../config';`
    - Run `ddev drush cim -y`
 - Visit `http://node.ddev.site`
