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

namespace WPMit\Contracts\Plugin;

use Symfony\Component\OptionsResolver\OptionsResolver;
use WPMit\Contracts\Addon\AbstractAddon;

/**
 * Class AbstractPlugin
 *
 * @package WPMit\Contracts\Plugin
 */
abstract class AbstractPlugin extends AbstractAddon implements PluginInterface
{
    public function __construct(array $values = array())
    {
        $values = array_merge([
            'plugin.basename' => plugin_basename($values['filename']),
            'plugin.directory' => plugin_dir_path($values['filename']),
            'plugin.url' => plugin_dir_url($values['filename'])
        ], $values);
        
        parent::__construct($values);
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
