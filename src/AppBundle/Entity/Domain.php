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
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
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
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Url()
     */
    private $cp_url;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $cp_username;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $cp_password;

    /**
     * @var
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
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
     * @ORM\JoinColumn(name="client", referencedColumnName="id")
     * @Assert\Type(type="AppBundle\Entity\Client")
     * @Assert\Valid()
     */
    private $client;

    /**
     * @var
     * @ORM\Column(type="date")
     */
    private $date_added;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $hosting_package;

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
     * Set registrar
     *
     * @param string $registrar
     *
     * @return Domain
     */
    public function setRegistrar($registrar)
    {
        $this->registrar = $registrar;

        return $this;
    }

    /**
     * Get registrar
     *
     * @return string
     */
    public function getRegistrar()
    {
        return $this->registrar;
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
        $this->renewal_date = $renewalDate;

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
     * Set cpUrl
     *
     * @param string $cpUrl
     *
     * @return Domain
     */
    public function setCpUrl($cpUrl)
    {
        $this->cp_url = $cpUrl;

        return $this;
    }

    /**
     * Get cpUrl
     *
     * @return string
     */
    public function getCpUrl()
    {
        return $this->cp_url;
    }

    /**
     * Set cpUsername
     *
     * @param string $cpUsername
     *
     * @return Domain
     */
    public function setCpUsername($cpUsername)
    {
        $this->cp_username = $cpUsername;

        return $this;
    }

    /**
     * Get cpUsername
     *
     * @return string
     */
    public function getCpUsername()
    {
        return $this->cp_username;
    }

    /**
     * Set cpPassword
     *
     * @param string $cpPassword
     *
     * @return Domain
     */
    public function setCpPassword($cpPassword)
    {
        $this->cp_password = $cpPassword;

        return $this;
    }

    /**
     * Get cpPassword
     *
     * @return string
     */
    public function getCpPassword()
    {
        return $this->cp_password;
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
     * Set hostingPackage
     *
     * @param string $hostingPackage
     *
     * @return Domain
     */
    public function setHostingPackage($hostingPackage)
    {
        $this->hosting_package = $hostingPackage;

        return $this;
    }

    /**
     * Get hostingPackage
     *
     * @return string
     */
    public function getHostingPackage()
    {
        return $this->hosting_package;
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
}
