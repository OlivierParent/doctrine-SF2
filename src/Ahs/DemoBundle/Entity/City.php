<?php

namespace Ahs\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ahs\DemoBundle\Entity\City
 *
 * @ORM\Table(name="City")
 * @ORM\Entity
 */
class City
{
    /**
     * @var integer $ctyId
     *
     * @ORM\Column(name="cty_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ctyId;

    /**
     * @var string $ctyPostcode
     *
     * @ORM\Column(name="cty_postcode", type="string", length=15, nullable=false)
     */
    private $ctyPostcode;

    /**
     * @var string $ctyName
     *
     * @ORM\Column(name="cty_name", type="string", length=255, nullable=false)
     */
    private $ctyName;



    /**
     * Get ctyId
     *
     * @return integer 
     */
    public function getCtyId()
    {
        return $this->ctyId;
    }

    /**
     * Set ctyPostcode
     *
     * @param string $ctyPostcode
     * @return City
     */
    public function setCtyPostcode($ctyPostcode)
    {
        $this->ctyPostcode = $ctyPostcode;
    
        return $this;
    }

    /**
     * Get ctyPostcode
     *
     * @return string 
     */
    public function getCtyPostcode()
    {
        return $this->ctyPostcode;
    }

    /**
     * Set ctyName
     *
     * @param string $ctyName
     * @return City
     */
    public function setCtyName($ctyName)
    {
        $this->ctyName = $ctyName;
    
        return $this;
    }

    /**
     * Get ctyName
     *
     * @return string 
     */
    public function getCtyName()
    {
        return $this->ctyName;
    }
}