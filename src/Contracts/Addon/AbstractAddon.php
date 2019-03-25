<?php

namespace WPMit\Contracts\Addon;

use Pimple\Container as PimpleContainer;
use WPMit\Contracts\Container\ContainerAwareInterface;
use WPMit\Contracts\Service\HookProviderInterface;
use WPMit\Contracts\Service\ServiceProviderInterface;

/**
 * Class AbstractAddon
 *
 * @package WPMit
 */
abstract class AbstractAddon extends PimpleContainer implements AddonInterface
{
    /**
     * @param string $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->offsetGet($id);
    }
    
    /**
     * @param string $id
     * @return bool
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }
    
    /**
     * Retrieve the absolute path for the main plugin file.
     *
     * @return string
     */
    public function filename(): string
    {
        return $this->get('filename');
    }
    
    /**
     * Retrieve the plugin identifier.
     *
     * @return string
     */
    public function slug(): string
    {
        return $this->get('slug');
    }
    
    /**
     * @param ServiceProviderInterface $provider
     * @param array $values
     * @return mixed
     */
    public function registerService(ServiceProviderInterface $provider, array $values = [])
    {
        if ($values) {
            foreach ($values as $k => $v) {
                $this->offsetSet($k, $v);
            }
        }
        
        if ($provider instanceof ContainerAwareInterface) {
            $provider->setContainer($this);
        }
        
        $provider->register();
        
        return $this;
    }
    
    /**
     * @param HookProviderInterface $provider
     * @param array $values
     * @return mixed
     */
    public function registerHook(HookProviderInterface $provider, array $values = [])
    {
        if ($values) {
            foreach ($values as $k => $v) {
                $this->offsetSet($k, $v);
            }
        }
    
        if ($provider instanceof ContainerAwareInterface) {
            $provider->setContainer($this);
        }
    
        $provider->register();
    
        return $this;
    }
}
