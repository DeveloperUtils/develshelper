<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Repository;


use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
    public function count()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(t.id) FROM WdCsCoreBundle:Tag t')
            ->getSingleScalarResult();
    }

}