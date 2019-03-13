<?php

/**
 * Var Dump Server Provider.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit\Provider\Service;

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Dumper\ServerDumper;
use Symfony\Component\VarDumper\VarDumper;
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
        if (!class_exists(VarCloner::class)) {
            throw new \Exception('Missing symfony/var-dumper package.');
        }
        
        $cloner = new VarCloner();
        $fallbackDumper = \in_array(\PHP_SAPI, array('cli', 'phpdbg')) ? new CliDumper() : new HtmlDumper();

        $host = $this->getContainer()->has('var_dump_server.host') ? (string) $this->getContainer()->get('var_dump_server.host') : 'tcp://127.0.0.1:9912';

        $dumper = new ServerDumper($host, $fallbackDumper, [
            'cli' => new CliContextProvider(),
            'source' => new SourceContextProvider(),
        ]);

        VarDumper::setHandler(function ($var) use ($cloner, $dumper) {
            $dumper->dump($cloner->cloneVar($var));
        });
    }
}
