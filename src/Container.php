<?php

/**
 * Container.
 *
 * @author Pereira Pulido Nuno Ricardo <r.pereira@madeinitalyslc.it>
 * @copyright 2019 Made In Italy SLC
 */

namespace WPMit;

use Pimple\Container as PimpleContainer;

/**
 * Container class.
 *
 * @package WPMit
 */
class Container extends PimpleContainer implements ContainerInterface
{
    /**
     * @param string $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->offsetGet($id);
    }
    
    /**
     * @param string $id
     *
     * @return bool
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }
    
    /**
     * @param HookProviderInterface|ServiceProviderInterface $provider
     * @param array $values
     * @throws \Exception
     */
    public function register($provider, array $values = [])
    {
        if (!$provider instanceof ServiceProviderInterface or !$provider instanceof HookProviderInterface) {
            throw new \Exception('Accept only ServiceProviderInterface or HookProviderInterface implementation of <' . (string) $provider . '>.');
        }
        
        if ($values) {
            foreach ($values as $k => $v) {
                $this->offsetSet($k, $v);
            }
        }
        
        if ($provider instanceof ContainerAwareInterface) {
            $provider->setContainer($this);
        }
        
        $provider->register();
    }
}
