<?php

/**
 * I18n Hook Provider.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Provider\Hook;

use WPMit\AbstractHookProvider;

/**
 * Class I18n
 *
 * @package WPMit\Provider\Hook
 */
class I18n extends AbstractHookProvider
{
    /**
     * Register hooks.
     *
     * Loads the text domain during the `plugins_loaded` action.
     */
    public function register()
    {
        if (did_action('plugins_loaded')) {
            $this->loadTextDomain();
        } else {
            $this->addAction('plugins_loaded', 'loadTextDomain');
        }
    }

    /**
     * Load the text domain to localize the plugin.
     */
    protected function loadTextDomain()
    {
        if ($this->getContainer()->has('i18n.basename') and $this->getContainer()->has('i18n.slug')) {
            $plugin_rel_path = dirname($this->getContainer()->get('i18n.basename')) . '/languages';
    
            load_plugin_textdomain($this->getContainer()->get('i18n.slug'), false, $plugin_rel_path);
        }
    }
}
