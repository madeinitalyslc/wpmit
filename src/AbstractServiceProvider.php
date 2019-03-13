<?php

/**
 * Abstract Service Provider
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit;

/**
 * Class AbstractServiceProvider
 *
 * @package WPMit
 */
abstract class AbstractServiceProvider implements ServiceProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;
    
    /**
     * Register Service Provider
     */
    abstract public function register();
}
