silex-skeleton
==============

This is a working skeleton used to rapidly develop a new Silex site.

###Included Packages
* Twig 1.12 (twig/twig)
* Doctrine ORM Provider (taluu/doctrine-orm-provider)
* Twitter Bootstrap installed is in 'web' directory. The requisite CSS and JS includes are in the views/base.twig.html template. Extend the base template in other Twig files if you want to use Bootstrap.

###Installation
1. From the silex-skeleton directory:

```
php composer.phar install
```

2. Change the title in views/base.twig.html so that is shows your site name.
3. If you need a database, open index.php and uncomment the lines that register Doctrine DBAL and edit the connection parameters there.
4. Create your routes as needed in index.php, and your views in the 'views' directory.

**Package includes *.htaccess* used for removing 'index.php' from url!**

For examples, see comments in index.php.
