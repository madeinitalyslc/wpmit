<?php

/**
 * Plugin interface.
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

/**
 * Interface PluginInterface
 *
 * @package WPMit\Contracts\Plugin
 */
interface PluginInterface
{
    /**
     * Retrieve the relative path to the main plugin file from the main plugin
     * directory.
     *
     * @return string
     */
    public function basename();

    /**
     * Retrieve the plugin directory.
     *
     * @return string
     */
    public function directory();

    /**
     * Retrieve the path to a file in the plugin.
     *
     * @param string $path Optional. Path relative to the plugin root.
     *
     * @return string
     */
    public function path($path = '');

    /**
     * Retrieve the absolute path for the main plugin file.
     *
     * @return string
     */
    public function filename();

    /**
     * Retrieve the plugin identifier.
     *
     * @return string
     */
    public function slug();

    /**
     * Retrieve the URL for a file in the plugin.
     *
     * @param string $path Optional. Path relative to the plugin root.
     *
     * @return string
     */
    public function url($path = '');

    /**
     * @return string
     */
    public function version();
}
