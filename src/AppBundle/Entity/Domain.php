<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Class Domain
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="domains")
 * @UniqueEntity (fields={"domain"}, message="The domain you entered is already kept!")
 */
class Domain
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
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank()
     */
    private $domain;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Registrar", inversedBy="domains")
     * @ORM\JoinColumn(name="registrar", referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Registrar")
     * @Assert\Valid()
     */
    private $registrar;

    /**
     * @var
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $renewal_date;

    /**
     * @var
     * @ORM\Column(type="boolean")
     * 
     */
    private $notification_status;

    /**
     * @var
     * @ORM\Column(type="json_array", nullable=TRUE)
     */
    private $notification;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="domains")
     * @ORM\JoinColumn(name="client", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\Type(type="AppBundle\Entity\Client")
     * @Assert\Valid()
     */
    private $client;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="Hosting", mappedBy="domain")
     *
     */
    private $hosting;

    /**
     * @var
     * @ORM\Column(type="date")
     */
    private $date_added;


    /**
     * @var
     * @ORM\Column(type="boolean")
     */
    private $auto_renew;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Issue", mappedBy="domains")
     */
    private $issues;

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
     * Set domain
     *
     * @param string $domain
     *
     * @return Domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set renewalDate
     *
     * @param \DateTime $renewalDate
     *
     * @return Domain
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
     * @return Domain
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return Domain
     */
    public function setDateAdded($dateAdded)
    {
        $this->date_added = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Domain
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
     * Set notificationStatus
     *
     * @param boolean $notificationStatus
     *
     * @return Domain
     */
    public function setNotificationStatus($notificationStatus)
    {
        $this->notification_status = $notificationStatus;
    
        return $this;
    }

    /**
     * Get notificationStatus
     *
     * @return boolean
     */
    public function getNotificationStatus()
    {
        return $this->notification_status;
    }

    /**
     * Set autoRenew
     *
     * @param boolean $autoRenew
     *
     * @return Domain
     */
    public function setAutoRenew($autoRenew)
    {
        $this->auto_renew = $autoRenew;

        return $this;
    }

    /**
     * Get autoRenew
     *
     * @return boolean
     */
    public function getAutoRenew()
    {
        return $this->auto_renew;
    }

    /**
     * Set registrar
     *
     * @param \AppBundle\Entity\Registrar $registrar
     *
     * @return Domain
     */
    public function setRegistrar(\AppBundle\Entity\Registrar $registrar = null)
    {
        $this->registrar = $registrar;
    
        return $this;
    }

    /**
     * Get registrar
     *
     * @return \AppBundle\Entity\Registrar
     */
    public function getRegistrar()
    {
        return $this->registrar;
    }

    /**
     * Set hosting
     *
     * @param \AppBundle\Entity\Hosting $hosting
     *
     * @return Domain
     */
    public function setHosting(\AppBundle\Entity\Hosting $hosting = null)
    {
        $this->hosting = $hosting;
    
        return $this;
    }

    /**
     * Get hosting
     *
     * @return \AppBundle\Entity\Hosting
     */
    public function getHosting()
    {
        return $this->hosting;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->issues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add issue
     *
     * @param \AppBundle\Entity\Issue $issue
     *
     * @return Domain
     */
    public function addIssue(\AppBundle\Entity\Issue $issue)
    {
        $this->issues[] = $issue;

        return $this;
    }

    /**
     * Remove issue
     *
     * @param \AppBundle\Entity\Issue $issue
     */
    public function removeIssue(\AppBundle\Entity\Issue $issue)
    {
        $this->issues->removeElement($issue);
    }

    /**
     * Get issues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIssues()
    {
        return $this->issues;
    }
}
