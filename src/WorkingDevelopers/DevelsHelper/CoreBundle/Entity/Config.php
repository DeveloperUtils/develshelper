<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 * Date: 8/25/15
 * Time: 8:54 AM
 * Copyright (c) WorkingDevelopers.NET
 */

namespace WorkingDevelopers\DevelsHelper\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Config
 *
 * @ORM\Table(name="config")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 *
 * @package WorkingDevelopers\DevelsHelper\CoreBundle\Entity
 * @author Christoph Graupner <ch.graupner@workingdeveloper.net>
 * @since 2015-08-25
 */
class Config
{
    use UpdateTraceableTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="keyname", type="string", length=255)
     */
    private $keyname;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set keyname
     *
     * @param string $keyname
     * @return Config
     */
    public function setKeyname($keyname)
    {
        $this->keyname = strtolower($keyname);

        return $this;
    }

    /**
     * Get keyname
     *
     * @return string
     */
    public function getKeyname()
    {
        return $this->keyname;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Config
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}