<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers.NET
 */

namespace WorkingDevelopers\DevelsHelper\CoreBundle\Repository;


use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
    public function count()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(t.id) FROM DhCoreBundle:Tag t')
            ->getSingleScalarResult();
    }

}