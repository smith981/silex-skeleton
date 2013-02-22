<?php

namespace smith981\SilexSkeleton;

/**
 * PHPUnit unit tests - run with "php ..\vendor\EHER\PHPUnit\bin\phpunit [this filename, no brackets]" 
 * 
 */
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

/**
 * Test case for smith981/FormGenerator
 *
 * @author Ed Smith <ed_smith@baylor.edu>
 * @package smith981/form-generator
 */
class CrudTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * Create any needed class variables here. Runs before every method is executed.
	 * 
	 * @return type
	 */
	public function setUp() {
		require_once('../src/smith981/silex-skeleton/entities/Sample/Bug.php');
		require_once('../src/smith981/silex-skeleton/entities/Sample/Product.php');
		require_once('../src/smith981/silex-skeleton/entities/Sample/User.php');
	}

	/**
	 * Destroy anything you've created in the test cases here. Runs after every method is executed.
	 * 
	 * @return type
	 */
	public function tearDown() {

	}

	/**
	 * Test generating CRUD forms from a Zend\Code\Reflection\FileReflection	
	 * 
	 * @return void
	 */
	public function testGenerateFromReflection() {
		$reflection = new \Zend\Code\Reflection\FileReflection('../src/smith981/silex-skeleton/entities/Sample/Bug.php');

		$createForm = \smith981\FormGenerator\FormGenerator::generateCreateFormFromFileReflection($reflection);

		/**
		 * @todo add methods for retrieveById, update, delete
		 */
		print_r($createForm->getElements());
	}

	
}