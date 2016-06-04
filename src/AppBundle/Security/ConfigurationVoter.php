<?php

namespace AppBundle\Security;

use AppBundle\Entity\ProjectStatus;
use AppBundle\Entity\ProjectType;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ConfigurationVoter extends Voter
{
    const MANAGE = 'manage';

    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, [self::MANAGE])) {
            return false;
        }

        if ($subject instanceof ProjectStatus || $subject instanceof ProjectType) {
            return true;
        }

        return false;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {

        /** @var User $user */
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        foreach ($user->getGroups() as $group) {
            foreach ($group->getPermissions() as $permission) {
                if ($permission->getName() == 'manage configuration') {
                    return true;
                }
            }
        }

        return false;
    }
}
