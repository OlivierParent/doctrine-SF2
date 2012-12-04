<?php

namespace Ahs\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ahs\DemoBundle\Entity\Address
 *
 * @ORM\Table(name="Address")
 * @ORM\Entity
 */
class Address
{
    /**
     * @var integer $adrId
     *
     * @ORM\Column(name="adr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adrId;

    /**
     * @var string $adrStreet
     *
     * @ORM\Column(name="adr_street", type="string", length=255, nullable=false)
     */
    private $adrStreet;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="adr")
     */
    private $usr;

    /**
     * @var City
     *
     * @ORM\ManyToOne(targetEntity="City", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cty_id", referencedColumnName="cty_id")
     * })
     */
    private $cty;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usr = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get adrId
     *
     * @return integer
     */
    public function getAdrId()
    {
        return $this->adrId;
    }

    /**
     * Set adrStreet
     *
     * @param string $adrStreet
     * @return Address
     */
    public function setAdrStreet($adrStreet)
    {
        $this->adrStreet = $adrStreet;

        return $this;
    }

    /**
     * Get adrStreet
     *
     * @return string
     */
    public function getAdrStreet()
    {
        return $this->adrStreet;
    }

    /**
     * Add usr
     *
     * @param Ahs\DemoBundle\Entity\User $usr
     * @return Address
     */
    public function addUsr(\Ahs\DemoBundle\Entity\User $usr)
    {
        $this->usr[] = $usr;

        return $this;
    }

    /**
     * Remove usr
     *
     * @param Ahs\DemoBundle\Entity\User $usr
     */
    public function removeUsr(\Ahs\DemoBundle\Entity\User $usr)
    {
        $this->usr->removeElement($usr);
    }

    /**
     * Get usr
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUsr()
    {
        return $this->usr;
    }

    /**
     * Set cty
     *
     * @param Ahs\DemoBundle\Entity\City $cty
     * @return Address
     */
    public function setCty(\Ahs\DemoBundle\Entity\City $cty = null)
    {
        $this->cty = $cty;

        return $this;
    }

    /**
     * Get cty
     *
     * @return Ahs\DemoBundle\Entity\City
     */
    public function getCty()
    {
        return $this->cty;
    }
}