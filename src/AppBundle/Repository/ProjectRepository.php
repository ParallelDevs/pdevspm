<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class ProjectRepository extends EntityRepository
{
    public function findAllOwnProjects(User $user)
    {
        return $this->createQueryBuilder('project')
          ->orWhere('project.createdBy = :user')
          ->orWhere('team = :user')
          ->leftJoin('project.team', 'team')
          ->setParameter('user', $user)
          ->getQuery()
          ->execute();
    }
}
