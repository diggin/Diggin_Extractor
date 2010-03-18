<?php
namespace diggin\loader;

/**
 * Diggin - Simplicity PHP Library
 * 
 * LICENSE
 *
 * This source file is subject to the new BSD license.
 * It is also available through the world-wide-web at this URL:
 * http://diggin.musicrider.com/LICENSE
 * 
 * @category   Diggin
 * @package    Diggin_Loader
 * @copyright  2006-2009 sasezaki (http://diggin.musicrider.com)
 * @license    http://diggin.musicrider.com/LICENSE     New BSD License
 */

/** Zend_Loader_PluginLoader */
require_once 'Zend/Loader/PluginLoader.php';

/**
 * @category   Diggin
 * @package    Diggin_Loader
 * @copyright  2006-2009 sasezaki (http://diggin.musicrider.com)
 * @license    http://diggin.musicrider.com/LICENSE     New BSD License
 */
class PluginLoader extends \Zend_Loader_PluginLoader
{
    private static $_namespaceSeparator = '_';

    private static $_namespaceSet = false;

    /**
     * override Zend_Loader_PluginLoader's method
     *
     * @param $prefix string
     */
    protected function _formatPrefix($prefix)
    {
        if($prefix == "") {
            return $prefix;
        }
        return rtrim($prefix, static::$_namespaceSeparator) . static::$_namespaceSeparator;
    }

    /**
     * set Namespace-Seaprator
     *
     * @param $separator string
     */
    public static function setNamespaceSeparator($separator)
    {
        if (self::$_namespaceSet) {
            //require_once 'Diggin/Loader/Exception.php';
            //throw new \Diggin_Loader_Exception('Namespace-Separator is already set!');
            throw new \Exception('Namespace-Separator is already set!');
        } else {
            self::$_namespaceSet = true;
        }

        static::$_namespaceSeparator = $separator;
    }
}
