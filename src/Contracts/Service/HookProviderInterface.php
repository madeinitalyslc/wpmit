<?php

/**
 * Hook provider interface.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright Copyright (c) 2015 Cedaro, LLC
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Contracts\Service;

/**
 * Hook provider interface.
 *
 * @package WPMit
 */
interface HookProviderInterface
{
    /**
     * Hook Provider Registration
     */
    public function register();
}
