<?php

namespace WPMit\Contracts\Addon;

use Psr\Container\ContainerInterface as PsrContainer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WPMit\Contracts\Service\HookProviderInterface;
use WPMit\Contracts\Service\ServiceProviderInterface;

/**
 * Interface AddonInterface
 *
 * @package WPMit\Contracts\Addon
 */
interface AddonInterface extends PsrContainer
{
    /**
     * @param ServiceProviderInterface $provider
     * @param array $values
     * @return mixed
     */
    public function registerService(ServiceProviderInterface $provider, array $values = []);
    
    /**
     * @param HookProviderInterface $provider
     * @param array $values
     * @return mixed
     */
    public function registerHook(HookProviderInterface $provider, array $values = []);
    
    /**
     * @return string
     */
    public function filename(): string;
    
    /**
     * @return string
     */
    public function slug(): string;
}
