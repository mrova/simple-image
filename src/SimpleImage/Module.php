<?php
/**
 * SimpleSoft (http://simplesoft.pl)
 *
 * @link      https://github.com/mrova/simple-image
 * @copyright Copyright (c) 2014 SimpleSoft (http://simplesoft.pl)
 * @license   New BSD License
 */

namespace SimpleImage;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
	ConfigProviderInterface,
	AutoloaderProviderInterface,
	ServiceProviderInterface
{

	/**
	 * {@inheritDoc}
	 */
	public function getConfig()
	{
		return include __DIR__ . '/../../config/module.config.php';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getAutoloaderConfig()
	{
		return [
			'Zend\Loader\ClassMapAutoloader' => [
				__DIR__ . '/../../autoload_classmap.php',
			],
			'Zend\Loader\StandardAutoloader' => [
				'namespaces' => [
					__NAMESPACE__ => __DIR__,
				],
			],
		];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getServiceConfig()
	{
		return [
			'factories' => [
				'SimpleImage\ImageService' => 'SimpleImage\Factory\ImageServiceFactory'
			],
		];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getViewHelperConfig()
	{
		return [
				'factories' => [
						'image' => function ($sm) {
							$locator = $sm->getServiceLocator();
							$imageService = $locator->get('SimpleImage\ImageService');
							$viewHelper = new View\Helper\Image;
							$viewHelper->setImageService($imageService);
							return $viewHelper;
						}
				],
		];

	}
}