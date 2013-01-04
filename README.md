silex-skeleton
==============

This is a working skeleton used to rapidly develop a new Silex site.

###Included Packages
* Twig 1.12 (twig/twig)
* Doctrine ORM Provider (taluu/doctrine-orm-provider)
* Twitter Bootstrap installed is in 'web' directory. The requisite CSS and JS includes are in the views/base.twig.html template. Extend the base template in other Twig files if you want to use Bootstrap.

###Installation
From the silex-skeleton directory:

```
php composer.phar install
```

**Package includes *.htaccess* used for removing 'index.php' from url!**

For examples, see comments in index.php.
