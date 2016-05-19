<?php

namespace AppBundle\Security;

use AppBundle\Entity\Permission;
use AppBundle\Entity\Project;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ProjectVoter extends Voter
{
    const CREATE = 'create';
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';


    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::VIEW, self::EDIT))) {
            return false;
        }

        // only vote on Post objects inside this voter
        if (!$subject instanceof Project) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        // you know $subject is a Post object, thanks to supports
        /** @var Project $project */
        $project = $subject;

        switch($attribute) {
            case self::VIEW:
                 return $this->checkPermission(self::VIEW, $user);
            case self::EDIT:
                return $this->checkPermission(self::EDIT, $user);
            case self::CREATE:
                return $this->checkPermission(self::CREATE, $user);
            case self::DELETE:
                return $this->checkPermission(self::DELETE, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    /**
     * Check the user permission based on their roles
     *
     * @param string $action
     * @param \AppBundle\Entity\User $user
     * @return bool
     */
    private function checkPermission($action, User $user)
    {
        /** @var \Doctrine\Common\Collections\Collection $groups */
        $groups = $user->getGroups();
        foreach ($groups as $group) {
            foreach ($group->getPermissions()->toArray() as $permission) {
                if ($permission->getName() == $action . ' project')
                {
                    return true;
                }
            }
        }

        return false;
    }

}