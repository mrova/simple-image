<?php
/**
 * SimpleSoft (http://simplesoft.pl)
 *
 * @link      https://github.com/mrova/simple-image
 * @copyright Copyright (c) 2014 SimpleSoft (http://simplesoft.pl)
 * @license   New BSD License
 */

namespace SimpleImage\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use PHPThumb\Plugins;
use PHPThumb\GD as PHPThumb;

/**
 * SimpleImage service
 *
 * Image thumbnailer powered by PHPThumb (https://github.com/masterexploder/PHPThumb)
 *
 * @author Michal Mrowiec <michal.mrowiec@simplesoft.pl>
 */
class Image implements ServiceLocatorAwareInterface
{
// 	/**
// 	 * Create image thumbnail object
// 	 *
// 	 * @param  string $filename
// 	 * @param  array $options
// 	 * @param  array $plugins
// 	 * @return PHPThumb
// 	 */
// 	public function create($filename = null, array $options = array(), array $plugins = array())
// 	{
// 		try {
// 			$thumb = new PHPThumb($filename, $options, $plugins);
// 		} catch (\Exception $exc) {
// 			throw new Exception\RuntimeException($exc->getMessage(), $exc->getCode(), $exc);
// 		}

// 		return $thumb;
// 	}

// 	/**
// 	 * Create reflection plugin
// 	 *
// 	 * @param int $percent
// 	 * @param int $reflection
// 	 * @param int $white
// 	 * @param bool $border
// 	 * @param string $borderColor hex
// 	 * @return Plugins\ReflectionPlugin
// 	 */
// 	public function createReflection($percent, $reflection, $white, $border, $borderColor)
// 	{
// 		return new Plugins\Reflection($percent, $reflection, $white, $border, $borderColor);
// 	}


	public function test()
	{
		echo 'I am service!';die;
	}
}
