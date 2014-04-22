<?php
/**
 * SimpleSoft (http://simplesoft.pl)
 *
 * @link      https://github.com/mrova/simple-image
 * @copyright Copyright (c) 2014 SimpleSoft (http://simplesoft.pl)
 * @license   New BSD License
 */

namespace SimpleImage;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

/**
 * SimpleImage Module for Zend Framework 2
 *
 * @author Michal Mrowiec <michal.mrowiec@simplesoft.pl>
 */
class Module implements
	AutoloaderProviderInterface,
	ConfigProviderInterface,
	ServiceProviderInterface
{

	/**
	 * @return array
	 */
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
			// if we're in a namespace deeper than one level we need to fix the \ in the path
					__NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
				),
			),
		);
	}

	/**
	 * @return array
	 */
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	/**
	 * @return array
	 */
	public function getViewHelperConfig()
	{
		return array(
			'factories' => array(
				'image' => function ($sm) {
					$locator = $sm->getServiceLocator();
					$viewHelper = new View\Helper\Image;
					return $viewHelper;
				}
			),
		);

	}
}
