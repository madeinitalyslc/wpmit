<?php

/**
 * Service Provider Interface
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Contracts\Service;

/**
 * Interface ServiceProviderInterface
 *
 * @package WPMit
 */
interface ServiceProviderInterface
{
    /**
     * Service Provider Registration
     */
    public function register();
}
