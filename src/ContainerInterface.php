<?php

/**
 * Container Interface
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit;

use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * Interface ContainerInterface
 *
 * @package WPMit
 */
interface ContainerInterface extends PsrContainerInterface
{
    /**
     * @param ServiceProviderInterface|HookProviderInterface $provider
     * @param array $values
     */
    public function register($provider, array $values = []);
}