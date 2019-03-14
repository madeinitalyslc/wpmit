<?php

/**
 * PHP Dot Env Service Provider.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Provider\Service;

use Dotenv\Dotenv;
use WPMit\AbstractServiceProvider;

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
        if (!class_exists(Dotenv::class)) {
            throw new \Exception('Missing vlucas/phpdotenv package.');
        }

        if ($this->getContainer()->has('php_dot_env.directory')) {
            $dotenv = Dotenv::create($this->getContainer()->get('php_dot_env.directory'));

            $dotenv->load();
        }
    }
}
