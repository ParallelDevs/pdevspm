<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjectStatusRepository extends EntityRepository
{
    public function findAllProjectStatus()
    {
        return $this->createQueryBuilder('project_status')
          ->addOrderBy('project_status.sortOrder', 'ASC')
          ->getQuery()
          ->execute();
    }
}