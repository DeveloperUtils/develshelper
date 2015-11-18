<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WorkingDevelopers\CodeSnippets\CoreBundle\Entity\Tag;
use WorkingDevelopers\CodeSnippets\CoreBundle\Entity\UpdateTraceableTrait;

/**
 * Class Snippet
 *
 * @ORM\Table(name="snippet")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 *
 * @ORM\Entity(repositoryClass="\WorkingDevelopers\CodeSnippets\CsDomainBundle\Repository\SnippetRepository")
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
     * @ORM\ManyToMany(targetEntity="ProgrammingLanguage", inversedBy="fk_programming_language")
     * @ORM\JoinTable(name="snippets_languages",
     *      joinColumns={@ORM\JoinColumn(name="fk_snippet", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="fk_programming_language", referencedColumnName="id")}
     * )
     * @var ProgrammingLanguage
     */
    protected $language;

    /**
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumn(name="fk_author", referencedColumnName="id")
     * @var Author
     */
    protected $author;

    /**
     * @ORM\ManyToMany(targetEntity="\WorkingDevelopers\CodeSnippets\CoreBundle\Entity\Tag", inversedBy="fk_tag")
     * @ORM\JoinTable(name="snippet_tags",
     *      joinColumns={@ORM\JoinColumn(name="fk_snippet", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="fk_tag", referencedColumnName="id")}
     * )
     * @var Tag
     */
    protected $tags;

    /**
     * @return string
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param string $snippet
     * @return Snippet
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     * @return Snippet
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Snippet
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     * @return Snippet
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    
}