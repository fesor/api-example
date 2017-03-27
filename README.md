Dummy Api
=====================

TBD

## Setup Dev Environment

First of all we need to install dependencies using composer

```
composer install --skip-platform-reqs
```

Then you could run `composer start`.

### XDebug

Unleas you running container using `SYMFONY_ENV=prod` xdebug extension is enabled by default. It uses remote_connect_back option so 
you should add server with name `_` in your IDE. You also need to add server and setup [path mappings](https://www.jetbrains.com/help/phpstorm/2016.3/override-server-path-mappings-dialog.html).

As for CLI scripts, you may use `docker/shortcuts/php` as entripoint for all your CLI scripts. This entrypoint 
checking `REMOTE_DEBUG_IP` env variable which should contain IP address of your host machine to connect. 
