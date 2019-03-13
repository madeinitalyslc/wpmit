<?php

/**
 * Var Dump Server Provider.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Provider\Service;

use WPMit\AbstractServiceProvider;

/**
 * Class VarDumpServerProvider
 *
 * @package WPMit\Provider\Service
 */
class VarDumpServerProvider extends AbstractServiceProvider
{
    /**
     * Register Service Provider
     */
    public function register()
    {
        if (!class_exists('\Symfony\Component\VarDumper\Cloner\VarCloner')) {
            throw new \Exception('Missing symfony/var-dumper package.');
        }
        
        $cloner = new \Symfony\Component\VarDumper\Cloner\VarCloner();
        $fallbackDumper = \in_array(\PHP_SAPI, array('cli', 'phpdbg')) ? new \Symfony\Component\VarDumper\Dumper\CliDumper() : new \Symfony\Component\VarDumper\Dumper\HtmlDumper();

        $dumper = new \Symfony\Component\VarDumper\Dumper\ServerDumper(env('VAR_DUMP_SERVER_HOST', 'tcp://127.0.0.1:9912'), $fallbackDumper, [
            'cli' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider(),
            'source' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider(),
        ]);

        \Symfony\Component\VarDumper\VarDumper::setHandler(function ($var) use ($cloner, $dumper) {
            $dumper->dump($cloner->cloneVar($var));
        });
    }
}
