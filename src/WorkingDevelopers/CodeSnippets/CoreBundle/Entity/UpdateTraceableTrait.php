<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.de>.
 * Date: 8/25/15
 * Time: 8:44 AM
 * Copyright (c) WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class UpdateTraceableTrait
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 *
 *
 * @package WorkingDevelopers\CodeSnippets\CoreBundle\Entity
 * @author Christoph Graupner <ch.graupner@workingdeveloper.net>
 * @since 2015-08-25
 */
trait UpdateTraceableTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetimetz")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetimetz")
     */
    protected $updatedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function _onPrePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function _onPreUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}