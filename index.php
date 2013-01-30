<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

error_reporting(E_ALL);
ini_set('display_erors', 1);
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Cache\ArrayCache;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

$app = new Silex\Application;

$app['debug'] = true;

/**
 * Register Doctrine DBAL if needed
 */
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(

    // Doctrine DBAL settings goes here
    'db.options' => array(
  		'driver'   => 'pdo_mysql',
  		'user'     => 'testuser',
  		'password' => 'secret',
  		'dbname'   => 'test',
  		'host'	 => 'localhost'
  	)
));

/**
 * Register the ORM if needed
 */
$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => "/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            // Using actual filesystem paths
            array(
                "type" => "annotation",
                "namespace" => "Sample",
                "path" => __DIR__."/entities",
            ),
            /**
             * Add other mapping arrays here, just as above, for each namespace
             */
          
            // Using PSR-0 namespaceish embedded resources
            // (requires registering a PSR-0 Resource Locator
            // Service Provider)
            /*
            array(
                "type" => "annotation",
                "namespace" => "Baz\Entities",
                "resources_namespace" => "Baz\Entities",
            ),
            array(
                "type" => "xml",
                "namespace" => "Bar\Entities",
                "resources_namespace" => "Bar\Resources\mappings",
            ),
            */
        ),
    )
));

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
 * Route for User (a sample page using the ORM)
 */
$app->get('/user', function() use($app) { 
    /**
     * Execute a query using the DBAL, if needed
     */
    /*
    $sql = 'select * from users';
    $stmt = $app['db']->executeQuery($sql);
    $data = $stmt->fetchAll();
    //echo '<pre>' . print_r($data, true) . '</pre>';
    */

    /**
     * Or use the ORM
     */
    $dql = 'select u from Sample\User u';
    $stmt = $app['orm.em']->createQuery($dql);
    $users = $stmt->getResult();
    $response = $app['twig']->render('user.index.twig.html', array('users' => $users));
    return $response;
});

/**
 * ...other routes go here
 */

/**
 * Route for Home page
 */
$app->get('/', function() use($app) { 
    $response = $app['twig']->render('home.twig.html'); //$data would be in the second param array, if needed
    return $response;
});

//Run the app. This should be the last line, except for functions.
$app->run();
