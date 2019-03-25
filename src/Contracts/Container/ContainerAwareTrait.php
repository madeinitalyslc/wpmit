<?php

/**
 * Container aware trait.
 *
 * Container implementation courtesy of Slim 3.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 *
 * @see https://github.com/slimphp/Slim/blob/e80b0f8b4d23e165783e8bf241b31c35272b0e28/Slim/App.php
 *
 * @copyright Copyright (c) 2015 Cedaro, LLC
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Contracts\Container;


use Psr\Container\ContainerInterface;

/**
 * Container aware trait.
 *
 * @package WPMit
 */
trait ContainerAwareTrait
{
    /**
     * Container.
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Enable access to the DI container by plugin consumers.
     *
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * Set the container.
     *
     * @param ContainerInterface $container dependency injection container
     *
     * @throws \InvalidArgumentException when no container is provided that implements ContainerInterface
     *
     * @return $this
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;

        return $this;
    }
}
