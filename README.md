silex-skeleton
==============

This is a working skeleton used to rapidly develop a new Silex site, with Twitter Bootstrap, Twig, and a Doctrine ORM provider installed and registered.

###Included Packages
* Twig 1.12 (twig/twig)
* Doctrine ORM Provider (taluu/doctrine-orm-provider)
* Twitter Bootstrap installed is in 'web' directory. The requisite CSS and JS includes are in the views/base.twig.html template. Extend the base template in other Twig files if you want to use Bootstrap.

###Installation using [Composer](http://getcomposer.org)
1. From the web root:
```
composer create-project --stability="dev" smith981/silex-skeleton silex
```
2. Or, if you haven't renamed composer.phar:
```
php composer.phar create-project --stability="dev" smith981/silex-skeleton silex
```  
This will create the installation in the 'silex' directory.
2. Change the title in views/base.twig.html so that it shows your site name.
3. If you need a database, open index.php and uncomment the lines that register Doctrine DBAL and edit the connection parameters there.
4. Create your routes as needed in index.php, and your views in the 'views' directory.

**Package includes *.htaccess* used for removing 'index.php' from url!** Be sure .htaccess overrides are allowed by your httpd.conf settings.

I have not attempted to run this under IIS, pull requests are welcome on this.

For examples, see comments in index.php.

## Doctrine DBAL

Uncomment the following code in /index.php and set your database parameters:

```php
<?php

// /index.php

// ...

/**
 * Register Doctrine DBAL if needed
 */
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(

    // Doctrine DBAL settings goes here
    'db.options' => array(
      	'driver'   => 'pdo_mysql',
  		'user'     => 'username',
  		'password' => 'pass',
  		'dbname'   => 'dbname',
  		'host'	   => 'localhost'
  	)
));
```

### Doctrine Console  
The doctrine console is located in '/bin'
```
cd bin
./doctrine
```

### Super-Quick Console Configuration
Just plug your connection parameters into /bin/boostrap_doctrine.php. Everything else is done!

```php
<?php

// /bin/bootstrap_doctrine.php

// ...

/**
 * database configuration parameters for Doctrine console
 */
$conn = array(
    'driver'   => 'pdo_mysql',
    'dbname'   => 'test',
    'user'     => 'testuser',
    'password' => 'secret',
    'host'     => 'localhost',
);
```

## Using the Doctrine ORM

While you are welcome to simply use the Doctrine DBAL, the Doctrine ORM is available as well.

### Entities
By default, this package supports mapping info via annotations. See [Doctrine 2 documentation](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html).

Your entity models go in /entities. *Any .php file in that directory will be included automatically.*
The three sample entities from the [Doctrine 2 documentation](http://docs.doctrine-project.org/en/latest/tutorials/getting-started.html) are included.

To remove the sample entities, delete those files and recreate the schema:  
```
cd bin
./doctrine orm:schema-tool:drop --force
./doctrine orm:schema-tool:create
```

Add your own entity files in /entities and create or update the schema:  
```
./doctrine orm:schema-tool:update
```

