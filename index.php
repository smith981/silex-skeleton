<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

//error_reporting(E_ALL);
//ini_set('display_erors', 1);

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use \Doctrine\Common\Cache\ApcCache;
use \Doctrine\Common\Cache\ArrayCache;

$app = new Silex\Application;

//$app['debug'] = true;

/**
 * Register Doctrine DBAL if needed
 */
/*
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(

    // Doctrine DBAL settings goes here
    'db.options' => array(
  		'driver'   => 'pdo_mysql',
  		'user'     => 'username',
  		'password' => 'pass',
  		'dbname'   => 'dbname',
  		'host'	 => 'localhost'
  	)
));
*/

// Register Twig
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
	'twig.path'		=> __DIR__ . '/views',
));


/**
 * Set default values and various validations for certain variables. These are only examples.
 */
/*
$app['controllers']
    ->value('format', 'html')         //default value for format param is html
    ->assert('pidm', '\d+')           //make sure pidm param is digits only
    ->assert('format', 'html|json');  //make sure param format is html or json only
*/

/**
 * Register URL handlers here. Specific routes must come first, and most general come later!
 */ 

/**
 * Route for Page 2 (a sample page)
 */
$app->get('/page2', function() use($app) { 
    /**
     * Execute a query, if needed
     */
    //$sql = 'select * from blah where field1 = ?';
    //$data = $app['db']->executeQuery($sql, array('somevalue'));
    //$response = $app['twig']->render('home.twig.html'); //use this line and comment the next one when we no longer need the "coming soon" page
    $response = $app['twig']->render('page2.twig.html'); //$data would be in the second param array, if needed
    return $response;
});

/**
 * ...other routes go here
 */

/**
 * Route for Home page
 */
$app->get('/', function() use($app) { 
    /**
     * Execute a query, if needed
     */
    //$sql = 'select * from blah where field1 = ?';
    //$data = $app['db']->executeQuery($sql, array('somevalue'));
    //$response = $app['twig']->render('home.twig.html'); //use this line and comment the next one when we no longer need the "coming soon" page
    $response = $app['twig']->render('home.twig.html'); //$data would be in the second param array, if needed
    return $response;
});

//Run the app. This should be the last line, except for functions.
$app->run();