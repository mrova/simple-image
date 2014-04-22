<?php
namespace SimpleImage\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use SimpleImage\Service\UserRegistrationService;
use SimpleImage\Service\ImageService;

class ImageServiceFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$service = new ImageService();
		$service->setServiceLocator($serviceLocator);

		return $service;
	}
}