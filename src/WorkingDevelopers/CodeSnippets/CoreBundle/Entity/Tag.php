<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.de>.
 * Date: 8/25/15
 * Time: 8:43 AM
 * Copyright (c) WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Tag
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 *
 * @ORM\Entity(repositoryClass="\WorkingDevelopers\CodeSnippets\CoreBundle\Repository\TagRepository")
 *
 * @package WorkingDevelopers\CodeSnippets\CoreBundle\Entity
 * @author Christoph Graupner <ch.graupner@workingdeveloper.net>
 * @since
 */
class Tag
{
    use UpdateTraceableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="keyname", type="string", length=100)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    protected $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="hierarchy_lft", type="integer", nullable=true)
     */
    protected $hierarchyLft;

    /**
     * @var integer
     *
     * @ORM\Column(name="hierarchy_rgt", type="integer", nullable=true)
     */
    protected $hierarchyRgt;

    /**
     * @var Tag
     *
     * @ORM\OneToOne(targetEntity="Tag")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Tag
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     * @return Tag
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return int
     */
    public function getHierarchyLft()
    {
        return $this->hierarchyLft;
    }

    /**
     * @param int $hierarchyLft
     * @return Tag
     */
    public function setHierarchyLft($hierarchyLft)
    {
        $this->hierarchyLft = $hierarchyLft;
        return $this;
    }

    /**
     * @return int
     */
    public function getHierarchyRgt()
    {
        return $this->hierarchyRgt;
    }

    /**
     * @param int $hierarchyRgt
     * @return Tag
     */
    public function setHierarchyRgt($hierarchyRgt)
    {
        $this->hierarchyRgt = $hierarchyRgt;
        return $this;
    }

    /**
     * @return Tag
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Tag $parent
     * @return Tag
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    function __toString()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}