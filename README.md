# CakePHP Container

An easy way to add a good dependency injection container to Cakephp 2 applications.

This installs League's Container, injects it into controllers, and adds it into CakeRegistry so you can access it as a singleton from anywhere else you may need it.

## Why?

I support a number of legacy CakePHP applications, and the lack of a container or a nice way to do DI was annoying.

## How?

Install with composer. You'll need to specify the repository until I put it on packagist.
```
    "require": {
        "burriko/cake-container": "*"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/burriko/cakephp-container.git"
        }
    ],
```

Load the plugin in Config/bootstrap.php. Bootstrap needs to be set to true.
```
CakePlugin::loadAll(['CakeContainer' => ['bootstrap' => true]]);
```

Create a file at Config/container.php to contain your container config. In here you can specify anything from the [League Container docs](http://container.thephpleague.com). For example, to load a service provider your config file would contain something like:
```
<?php
$container->addServiceProvider(new Jobsoc\ServiceProvider\DocumentManagementServiceProvider);
```

You can access the container from within a controller by calling `$this->getContainer()`. So to get an instance of a class named DocumentManagement that was set up by your service provider you could do this in your controller.
```
$this->getContainer()->get(Jobsoc\DocumentSearch\DocumentManagement::class);
```

If you really need to use the container outside of a controller you can get an instance of it from the ClassRegistry.
```
ClassRegistry::getObject('container')->get('Jobsoc\DocumentSearch\DocumentManagement');
```

Check the [League Container docs](http://container.thephpleague.com) for more useful examples.
