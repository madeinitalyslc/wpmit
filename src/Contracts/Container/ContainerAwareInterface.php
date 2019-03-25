<?php

/**
 * Container aware interface.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Contracts\Container;

use Psr\Container\ContainerInterface;

/**
 * Interface ContainerAwareInterface.
 *
 * @package WPMit
 */
interface ContainerAwareInterface
{
    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container);

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface;
}
