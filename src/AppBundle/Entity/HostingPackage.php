<?php
/**
 * Created by PhpStorm.
 * User: Nour Eldin
 * Date: 12/24/2016
 * Time: 9:10 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class HostingPackage
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="hosting_packages")
 * @UniqueEntity (fields={"name"}, message="Package name must be unique!")
 */
class HostingPackage
{
    /**
     * @var
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;


    /**
     * @var
     * @ORM\Column(type="float")
     * @Assert\Type(type="float", message="Please enter a number!")
     * @Assert\NotBlank()
     */
    private $space;


    /**
     * @var
     * @ORM\Column(type="float")
     * @Assert\Type(type="float", message="Please enter a number!")
     * @Assert\NotBlank()
     */
    private $fees;


    /**
     * @var
     * @ORM\OneToMany(targetEntity="Hosting", mappedBy="package")
     */
    private $hosting;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hosting = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return HostingPackage
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set space
     *
     * @param float $space
     *
     * @return HostingPackage
     */
    public function setSpace($space)
    {
        $this->space = $space;
    
        return $this;
    }

    /**
     * Get space
     *
     * @return float
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * Set fees
     *
     * @param float $fees
     *
     * @return HostingPackage
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
    
        return $this;
    }

    /**
     * Get fees
     *
     * @return float
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Add hosting
     *
     * @param \AppBundle\Entity\Hosting $hosting
     *
     * @return HostingPackage
     */
    public function addHosting(\AppBundle\Entity\Hosting $hosting)
    {
        $this->hosting[] = $hosting;
    
        return $this;
    }

    /**
     * Remove hosting
     *
     * @param \AppBundle\Entity\Hosting $hosting
     */
    public function removeHosting(\AppBundle\Entity\Hosting $hosting)
    {
        $this->hosting->removeElement($hosting);
    }

    /**
     * Get hosting
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHosting()
    {
        return $this->hosting;
    }
}
