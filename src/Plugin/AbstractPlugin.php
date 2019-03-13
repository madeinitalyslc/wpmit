<?php

/**
 * Common plugin functionality.
 *
 * @author John P. Bloch
 * @author Brady Vercher
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 *
 * @see https://github.com/johnpbloch/wordpress-dev
 *
 * @copyright Copyright (c) 2015 Cedaro, LLC
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Plugin;

use WPMit\Container;

/**
 * Class AbstractPlugin
 *
 * @package WPMit\Plugin
 */
abstract class AbstractPlugin extends Container implements PluginInterface
{
    /**
     * AbstractPlugin constructor.
     *
     * @param string $slug
     * @param string $filename
     */
    public function __construct(string $slug, string $filename)
    {
        $defaults = [
            'plugin.basename' => plugin_basename($filename),
            'plugin.directory' => plugin_dir_path($filename),
            'plugin.filename' => $filename,
            'plugin.slug' => $slug,
            'plugin.url' => plugin_dir_url($filename)
        ];
        
        parent::__construct($defaults);
    }
    
    /**
     * Retrieve the absolute path for the main plugin file.
     *
     * @return string
     */
    public function basename(): string
    {
        return $this->get('plugin.basename');
    }

    /**
     * Retrieve the plugin directory.
     *
     * @return string
     */
    public function directory(): string
    {
        return $this->get('plugin.directory');
    }

    /**
     * Retrieve the path to a file in the plugin.
     *
     * @param string $path Optional. Path relative to the plugin root.
     *
     * @return string
     */
    public function path($path = ''): string
    {
        return $this->get('plugin.directory') . ltrim($path, '/');
    }

    /**
     * Retrieve the absolute path for the main plugin file.
     *
     * @return string
     */
    public function filename(): string
    {
        return $this->get('plugin.filename');
    }
    
    /**
     * Retrieve the plugin identifier.
     *
     * @return string
     */
    public function slug(): string
    {
        return $this->get('plugin.slug');
    }

    /**
     * Retrieve the URL for a file in the plugin.
     *
     * @param string $path Optional. Path relative to the plugin root.
     *
     * @return string
     */
    public function url($path = ''): string
    {
        return $this->get('plugin.url') . ltrim($path, '/');
    }

    /**
     * @return string
     */
    public function version(): string
    {
        return $this->get('plugin.version');
    }
}
