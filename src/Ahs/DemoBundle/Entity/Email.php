<?php

namespace Ahs\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ahs\DemoBundle\Entity\Email
 *
 * @ORM\Table(name="Email")
 * @ORM\Entity
 */
class Email
{
    /**
     * @var integer $emlId
     *
     * @ORM\Column(name="eml_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emlId;

    /**
     * @var string $emlAddress
     *
     * @ORM\Column(name="eml_address", type="string", length=45, nullable=false)
     */
    private $emlAddress;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="email")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usr_id", referencedColumnName="usr_id")
     * })
     */
    private $usr;

    /**
     * Get emlId
     *
     * @return integer
     */
    public function getEmlId()
    {
        return $this->emlId;
    }

    /**
     * Set emlAddress
     *
     * @param string $emlAddress
     * @return Email
     */
    public function setEmlAddress($emlAddress)
    {
        $this->emlAddress = $emlAddress;

        return $this;
    }

    /**
     * Get emlAddress
     *
     * @return string
     */
    public function getEmlAddress()
    {
        return $this->emlAddress;
    }

    /**
     * Set usr
     *
     * @param Ahs\DemoBundle\Entity\User $usr
     * @return Email
     */
    public function setUsr(\Ahs\DemoBundle\Entity\User $usr = null)
    {
        $this->usr = $usr;

        return $this;
    }

    /**
     * Get usr
     *
     * @return Ahs\DemoBundle\Entity\User
     */
    public function getUsr()
    {
        return $this->usr;
    }
}