<?php
/**
 * Image (http://simplesoft.pl)
 *
 * @link        https://github.com/mrova/simple-image
 * @copyright   Copyright (c) 2014 SimpleSoft (http://simplesoft.pl)
 * @author      Michal Mrowiec <michal.mrowiec@simplesoft.pl>
 * @license     New BSD License
 */

namespace Image;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Image Module
 *
 * @author Michal Mrowiec <michal.mrowiec@simplesoft.pl>
 */
class Module implements
	AutoloaderProviderInterface,
	ConfigProviderInterface
{
	/**
	 * @return array
	 */
	public function getConfig()
	{
		return include __DIR__ . '/../../config/module.config.php';
	}

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
					__NAMESPACE__ => __DIR__,
				),
			),
		);
	}
}
