<?php

/**
 * Plugin Factory.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Plugin;

/**
 * Plugin factory class.
 *
 * @package WPMit\Plugin
 */
class PluginFactory
{
    /**
     * @param string $slug
     * @param string|null $filename
     * @return Plugin
     * @throws \Exception
     */
    public static function create(string $slug, string $filename = null)
    {
        // Use the calling file as the main plugin file.
        if (!$filename) {
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
            $filename = $backtrace[0]['file'];
        }
        
        return new Plugin($slug, $filename);
    }
}
