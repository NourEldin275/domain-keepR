<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class Domain
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="domains")
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
     * @ORM\Column(type="string")
     */
    private $domain;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $registrar;

    /**
     * @var
     * @ORM\Column(type="date")
     */
    private $renewal_date;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $cp_url;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $cp_username;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $cp_password;

    /**
     * @var
     * @ORM\Column(type="json_array", nullable=TRUE)
     */
    private $notification;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="id")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client_id;

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
     * Set clientId
     *
     * @param \AppBundle\Entity\Client $clientId
     *
     * @return Domain
     */
    public function setClientId(\AppBundle\Entity\Client $clientId = null)
    {
        $this->client_id = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClientId()
    {
        return $this->client_id;
    }
}