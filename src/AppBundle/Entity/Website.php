<?php
/**
 * Created by PhpStorm.
 * User: Nour Eldin
 * Date: 12/11/2016
 * Time: 1:18 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Website
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="websites")
 */
class Website
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
    private $website_name;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\Choice(choices={"Live", "Under Development", "Under Maintenance"}, message="Choose a valid website status")
     * @Assert\NotBlank()
     */
    private $status;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\Choice(choices={"WordPress", "Magento", "Custom Framework", "Drupal"})
     * @Assert\NotBlank()
     */
    private $technology;


    /**
     * @var
     * @ORM\Column(type="string", unique=true)
     * @Assert\Url(message="Please enter a valid URL for the website")
     * @Assert\NotBlank()
     */
    private $url;

    /**
     * @var
     * @ORM\Column(type="string", unique=true, nullable=true)
     * @Assert\Url(message="Please enter a valid URL for the website")
     */
    private $development_url;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="websites")
     * @ORM\JoinColumn(name="client", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\Type(type="AppBundle\Entity\Client")
     * @Assert\Valid()
     */
    private $client;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="WebsiteCredential", mappedBy="website")
     */
    private $credentials;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Issue", mappedBy="website")
     */
    private $issues;

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
     * @param string $status
     *
     * @return Website
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set technology
     *
     * @param string $technology
     *
     * @return Website
     */
    public function setTechnology($technology)
    {
        $this->technology = $technology;
    
        return $this;
    }

    /**
     * Get technology
     *
     * @return string
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Website
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Website
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
     * Add credential
     *
     * @param \AppBundle\Entity\WebsiteCredential $credential
     *
     * @return Website
     */
    public function addCredential(\AppBundle\Entity\WebsiteCredential $credential)
    {
        $this->credentials[] = $credential;
    
        return $this;
    }

    /**
     * Remove credential
     *
     * @param \AppBundle\Entity\WebsiteCredential $credential
     */
    public function removeCredential(\AppBundle\Entity\WebsiteCredential $credential)
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
     * Set websiteName
     *
     * @param string $websiteName
     *
     * @return Website
     */
    public function setWebsiteName($websiteName)
    {
        $this->website_name = $websiteName;
    
        return $this;
    }

    /**
     * Get websiteName
     *
     * @return string
     */
    public function getWebsiteName()
    {
        return $this->website_name;
    }

    /**
     * Set developmentUrl
     *
     * @param string $developmentUrl
     *
     * @return Website
     */
    public function setDevelopmentUrl($developmentUrl)
    {
        $this->development_url = $developmentUrl;
    
        return $this;
    }

    /**
     * Get developmentUrl
     *
     * @return string
     */
    public function getDevelopmentUrl()
    {
        return $this->development_url;
    }

    /**
     * Add issue
     *
     * @param \AppBundle\Entity\Issue $issue
     *
     * @return Website
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
