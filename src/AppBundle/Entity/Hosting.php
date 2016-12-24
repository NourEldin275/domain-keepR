<?php
/**
 * Created by PhpStorm.
 * User: Nour Eldin
 * Date: 12/24/2016
 * Time: 8:39 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Hosting
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="hosting")
 */
class Hosting
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
     */
    private $name;

    /**
     * @var
     * @ORM\Column(type="boolean")
     */
    private $status;


    /**
     * @var
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $renewal_date;


    /**
     * @var
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $notification;

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    private $creation_date;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="hosting")
     * @ORM\JoinColumn(name="client", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\Type(type="AppBundle\Entity\Client")
     * @Assert\Valid()
     */
    private $client;


    /**
     * @var
     * @ORM\OneToOne(targetEntity="Domain", inversedBy="hosting")
     */
    private $domain;


    /**
     * @var
     * @ORM\OneToMany(targetEntity="HostingCredential", mappedBy="hosting")
     */
    private $credentials;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="HostingPackage", inversedBy="hosting")
     * @ORM\JoinColumn(name="package", referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\HostingPackage")
     * @Assert\Valid()
     */
    private $package;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credentials = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set status
     *
     * @param boolean $status
     *
     * @return Hosting
     */
    public function setStatus($status = false)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set renewalDate
     *
     * @param \DateTime $renewalDate
     *
     * @return Hosting
     */
    public function setRenewalDate($renewalDate)
    {
        $this->renewal_date = clone $renewalDate;
    
        return $this;
    }

    /**
     * Get renewalDate
     *
     * @return \DateTime
     */
    public function getRenewalDate()
    {
        return $this->renewal_date;
    }

    /**
     * Set notification
     *
     * @param array $notification
     *
     * @return Hosting
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;
    
        return $this;
    }

    /**
     * Get notification
     *
     * @return array
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Hosting
     */
    public function setCreationDate($creationDate)
    {
        $this->creation_date = clone $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Hosting
     */
    public function setClient(\AppBundle\Entity\Client $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set domain
     *
     * @param \AppBundle\Entity\Domain $domain
     *
     * @return Hosting
     */
    public function setDomain(\AppBundle\Entity\Domain $domain = null)
    {
        $this->domain = $domain;

        $this->setName($domain->getDomain());
        $this->setClient($domain->getClient());

        return $this;
    }

    /**
     * Get domain
     *
     * @return \AppBundle\Entity\Domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Add credential
     *
     * @param \AppBundle\Entity\HostingCredential $credential
     *
     * @return Hosting
     */
    public function addCredential(\AppBundle\Entity\HostingCredential $credential)
    {
        $this->credentials[] = $credential;
    
        return $this;
    }

    /**
     * Remove credential
     *
     * @param \AppBundle\Entity\HostingCredential $credential
     */
    public function removeCredential(\AppBundle\Entity\HostingCredential $credential)
    {
        $this->credentials->removeElement($credential);
    }

    /**
     * Get credentials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Set package
     *
     * @param \AppBundle\Entity\HostingPackage $package
     *
     * @return Hosting
     */
    public function setPackage(\AppBundle\Entity\HostingPackage $package = null)
    {
        $this->package = $package;
    
        return $this;
    }

    /**
     * Get package
     *
     * @return \AppBundle\Entity\HostingPackage
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Hosting
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
}
