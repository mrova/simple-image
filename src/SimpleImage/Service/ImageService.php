<?php
/**
 * SimpleSoft (http://simplesoft.pl)
 *
 * @link      https://github.com/mrova/simple-image
 * @copyright Copyright (c) 2014 SimpleSoft (http://simplesoft.pl)
 * @license   New BSD License
 */

namespace SimpleImage\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use PHPThumb\Plugins;
use PHPThumb\GD as PHPThumb;

class ImageService implements ServiceLocatorAwareInterface
{
	/**
	 * @var ServiceLocatorInterface
	 */
	protected $serviceLocator;

	/**
	 * Project path
	 *
	 * @var string
	 */
	private $_absolutePath = '/path/to/project/';

	/**
	 * Relative path to directory with generated images
	 *
	 * @var string
	 */
	private $_localPath = 'local/image/path/';

	/**
	 * Absolute path to directory with oryginal images
	 *
	 * @var string
	 */
	private $_orgPath = '/path/to/source/images/';

	/**
	 * Content Delivery Network
	 *
	 * @var string
	 */
	private $_cdn = 'http://cdn.example.com/';

	public function get($id, $hash, $name, $width, $height, $options = array('resizeUp' => false), $method = 'adaptiveResize', array $plugins = array())
	{
		$this->_init();

		$filename = $name . '_' . $width . 'x' . $height . '_' . $id .'.jpg';
		$localfilename = $this->_localPath . $filename;

		// generate image if not exists
		if (!file_exists($this->_absolutePath . $localfilename)) {

			// absolute path to oryginal image
			$orgImagePath = $this->_orgPath . $hash;

			// if oryginal image does not exists
			if (empty($hash) || !file_exists($orgImagePath)) {
				#TODO: send email to administrator
				return false;
			}

			$thumb = new PHPThumb($orgImagePath, $options, $plugins);

			// zmieniamy rozmiar
			$thumb->$method($width, $height);

			// zapisujemy na dysku
			$thumb->save($this->_absolutePath . $localfilename);
		}

		return $this->_cdn . $filename;
	}

	private function _init()
	{
		if ($this->getServiceLocator()->has('config')) {
			$config = $this->getServiceLocator()->get('config');
			if (isset($config['Images'])) {
				foreach  ($config['Images'] as $key => $val) {
					$this->$key = $val;
				}
			}
		}
	}

	/**
	 * Set service locator
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 */
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
		return $this;
	}

	/**
	 * Get service locator
	 *
	 * @return ServiceLocatorInterface
	 */
	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}
}
