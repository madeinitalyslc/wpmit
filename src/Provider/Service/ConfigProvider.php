<?php

/**
 * Config Provider.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Provider\Service;

use Adbar\Dot;
use WPMit\AbstractServiceProvider;
use WPMit\ContainerInterface;

/**
 * Class ConfigProvider
 *
 * @package WPMit\Provider\Service
 */
class ConfigProvider extends AbstractServiceProvider
{
    /**
     * Register Provider
     */
    public function register()
    {
        if (!class_exists(Dot::class)) {
            debug('Missing composer package <adbario/php-dot-notation>');
            return;
        }

        $container = $this->getContainer();

        $container['config'] = function (ContainerInterface $c) {
            if ($c->has('config.defaults')) {
                $defaults = $c->get('config.defaults');
            } else {
                $defaults = [];
            }

            return new Dot($defaults);
        };
    }
}
