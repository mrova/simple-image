<?php

namespace SimpleImage\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;

class Image extends AbstractHelper
{
// 	protected $imageService;

	public function __invoke($id, $hash, $name, $width, $height)
	{
		return 'I am view helper!';
// 		return $this->getImageService()->getImage($obj, $name, $width, $height);
	}

// 	/**
// 	 * Set \SimpleImage\Service\Image instance
// 	 *
// 	 * @param \SimpleImage\Service\Image $imageService
// 	 * @return \SimpleImage\Service\Image
// 	 */
// 	public function setImageService(SimpleImage $imageService)
// 	{
// 		$this->imageService = $imageService;
// 		return $this;
// 	}

// 	/**
// 	 * Get \SimpleImage\Service\Image instance
// 	 *
// 	 * @return \SimpleImage\Service\Image
// 	 */
// 	public function getImageService()
// 	{
// 		return $this->imageService;
// 	}
}
