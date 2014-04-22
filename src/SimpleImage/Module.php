<?php
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
}