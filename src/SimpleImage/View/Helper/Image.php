<?php
/**
 * SimpleSoft (http://simplesoft.pl)
 *
 * @link      https://github.com/mrova/simple-image
 * @copyright Copyright (c) 2014 SimpleSoft (http://simplesoft.pl)
 * @license   New BSD License
 */

namespace SimpleImage\View\Helper;

use Zend\View\Helper\AbstractHelper;
use SimpleImage\Service\ImageService;

class Image extends AbstractHelper
{
	protected $_imageService;

	public function __invoke($id, $hash, $name, $width, $height)
	{
		return $this->getImageService()->get($id, $hash, $name, $width, $height);
	}

	/**
	 * Set SimpleImage\Service\Image instance
	 *
	 * @param SimpleImage\Service\Imagee $imageService
	 * @return SimpleImage\Service\Image
	 */
	public function setImageService(ImageService $imageService)
	{
		$this->_imageService = $imageService;
		return $this;
	}

	/**
	 * Get SimpleImage\Service\Image instance
	 *
	 * @return SimpleImage\Service\Image
	 */
	public function getImageService()
	{
		return $this->_imageService;
	}
}
