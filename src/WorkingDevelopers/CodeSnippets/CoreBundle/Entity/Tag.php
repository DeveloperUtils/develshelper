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
}