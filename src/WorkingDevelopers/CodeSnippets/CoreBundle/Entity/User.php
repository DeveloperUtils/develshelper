<?php

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Entity;

/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers
 */

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(
 *          name="username",
 *          column=@ORM\Column(
 *              nullable = false,
 *              length   = 100
 *          )
 *      ),
 *      @ORM\AttributeOverride(
 *          name="usernameCanonical",
 *          column=@ORM\Column(
 *              name     = "username_canonical",
 *              nullable = false,
 *              unique   = true,
 *              length   = 100
 *          )
 *      ),
 *      @ORM\AttributeOverride(
 *          name="password",
 *          column=@ORM\Column(
 *              nullable = true,
 *              unique   = false,
 *              length   = 100
 *          )
 *      ),
 *      @ORM\AttributeOverride(
 *          name="salt",
 *          column=@ORM\Column(
 *              nullable = true,
 *              unique   = false,
 *              length   = 100
 *          )
 *      ),
 * })
 */
class User extends BaseUser
{
    use UpdateTraceableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
