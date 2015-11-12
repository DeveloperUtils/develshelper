<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity;

use WorkingDevelopers\CodeSnippets\CoreBundle\Entity\UpdateTraceableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 *
 * @package WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity
 * @author Christoph Graupner <ch.graupner@workingdeveloper.net>
 */
class Author
{
    use UpdateTraceableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}