<?php

namespace ParallelDevs\ProjectManagementBundle\Security;

use KnpU\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class FormLoginAuthenticator extends AbstractFormLoginAuthenticator
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getCredentials(Request $request)
    {

    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {

    }

    public function checkCredentials($credentials, UserInterface $user)
    {

    }

    protected function getLoginUrl()
    {

    }

    protected function getDefaultSuccessRedirectUrl()
    {

    }
}
