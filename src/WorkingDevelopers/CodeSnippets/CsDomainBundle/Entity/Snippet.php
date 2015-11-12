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
 * Class Snippet
 *
 * @ORM\Table(name="snippet")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 *
 * @package WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity
 * @author Christoph Graupner <ch.graupner@workingdeveloper.net>
 */
class Snippet
{
    use UpdateTraceableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="name", type="text", length=100)
     * @var string
     */
    protected $snippet;

    /**
     * @var ProgrammingLanguage
     */
    protected $language;

    /**
     * @var Author
     */
    protected $author;

    /**
     * @var
     */
    protected $tags;
}