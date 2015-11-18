<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WorkingDevelopers\CodeSnippets\CoreBundle\Entity\UpdateTraceableTrait;

/**
 * Class Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 *
 * @ORM\Entity(repositoryClass="\WorkingDevelopers\CodeSnippets\CsDomainBundle\Repository\AuthorRepository")
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