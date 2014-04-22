<?php
/**
 * SimpleSoft (http://simplesoft.pl)
 *
 * @link      https://github.com/mrova/simple-image
 * @copyright Copyright (c) 2014 SimpleSoft (http://simplesoft.pl)
 * @license   New BSD License
 */

/**
 * Do not write your custom settings into this file
 */
return array(
    'di' => array(
        'definition' => array(
            'compiler' => array(
                __DIR__ . '/../data/di/definition.php',
            ),
        ),
        'instance' => array(
            'alias' => array(
               'SimpleImage' => 'SimpleImage\SimpleImage',
           ),
        ),
    ),
);
