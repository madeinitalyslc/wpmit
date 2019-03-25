<?php

/**
 * PHP Dot Env Service Provider.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Provider\Service;

use Symfony\Component\Dotenv\Dotenv;
use WPMit\Contracts\Service\AbstractServiceProvider;

/**
 * Class PhpDotEnvProvider
 *
 * @package WPMit\Provider\Service
 */
class PhpDotEnvProvider extends AbstractServiceProvider
{
    /**
     * Register Service Provider
     *
     * @throws \Exception
     */
    public function register()
    {
        $container = $this->getContainer();

        if ($container->has('php_dot_env.directory')) {
            (new Dotenv())->load($container->get('php_dot_env.directory') . '.env');
        }
    }
}
