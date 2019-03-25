<?php

/**
 * Config Provider.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Provider\Service;

use Illuminate\Config\Repository;
use Psr\Container\ContainerInterface;
use WPMit\Contracts\Service\AbstractServiceProvider;

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
        $container = $this->getContainer();

        $container['config'] = function (ContainerInterface $c) {
            if ($c->has('config.defaults')) {
                $defaults = $c->get('config.defaults');
            } else {
                $defaults = [];
            }

            return new Repository($defaults);
        };
    }
}
