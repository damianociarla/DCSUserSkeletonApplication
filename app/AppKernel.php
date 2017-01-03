<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),

            new DCS\User\CoreBundle\DCSUserCoreBundle(),
            new DCS\User\Persistence\ORMBundle\DCSUserPersistenceORMBundle(),

            new DCS\Security\CoreBundle\DCSSecurityCoreBundle(),
            new DCS\Security\Auth\FormBundle\DCSSecurityAuthFormBundle(),

            new DCS\Role\CoreBundle\DCSRoleCoreBundle(),
            new DCS\Role\Provider\ORMBundle\DCSRoleProviderORMBundle(),

            new DCS\PasswordReset\CoreBundle\DCSPasswordResetCoreBundle(),
            new DCS\PasswordReset\Persistence\ORMBundle\DCSPasswordResetPersistenceORMBundle(),
            new DCS\PasswordReset\Explain\ViewBundle\DCSPasswordResetExplainViewBundle(),

            new DCS\UserBundle\DCSUserBundle(),
            new DCS\RoleBundle\DCSRoleBundle(),
            new DCS\PasswordResetBundle\DCSPasswordResetBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
