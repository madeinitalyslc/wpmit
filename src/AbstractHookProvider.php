<?php

/**
 * Abstract Hook Provider
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit;

/**
 * Class AbstractHookProvider
 *
 * @package WPMit
 */
abstract class AbstractHookProvider implements HookProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait, HooksTrait;

    /**
     * Registers hooks.
     */
    abstract public function register();
}
