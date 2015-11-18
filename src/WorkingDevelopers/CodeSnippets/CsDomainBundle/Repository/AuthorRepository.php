<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository
{
    public function count()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(a.id) FROM WdCsDomainBundle:Author a')
            ->getSingleScalarResult();
    }

}