<?php
/**
 * Created by PhpStorm.
 * User: Nour Eldin
 * Date: 12/11/2016
 * Time: 1:38 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class WebsiteCredential
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="website_credentials")
 */
class WebsiteCredential
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
     * @Assert\Choice(choices={"Developer", "Client", "Support", "Dummy"})
     * @Assert\NotBlank()
     */
    private $scope;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\Choice(choices={"Live", "Development", "Testing"})
     * @Assert\NotBlank()
     */
    private $environment;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\Url(message="Please enter a valid URL")
     * @Assert\NotBlank()
     */
    private $login_url;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\Email(message="Enter a valid email address")
     */
    private $email;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @var
     * @ORM\Column(type="string", nullable=true)
     */
    private $ftp_ip;

    /**
     * @var
     * @ORM\Column(type="string", nullable=true)
     */
    private $ftp_username;

    /**
     * @var
     * @ORM\Column(type="string", nullable=true)
     */
    private $ftp_password;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Website", inversedBy="credentials")
     * @ORM\JoinColumn(name="website", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\Type(type="AppBundle\Entity\Website")
     * @Assert\Valid()
     */
    private $website;


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
     * Set scope
     *
     * @param string $scope
     *
     * @return WebsiteCredential
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    
        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set environment
     *
     * @param string $environment
     *
     * @return WebsiteCredential
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    
        return $this;
    }

    /**
     * Get environment
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set loginUrl
     *
     * @param string $loginUrl
     *
     * @return WebsiteCredential
     */
    public function setLoginUrl($loginUrl)
    {
        $this->login_url = $loginUrl;
    
        return $this;
    }

    /**
     * Get loginUrl
     *
     * @return string
     */
    public function getLoginUrl()
    {
        return $this->login_url;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return WebsiteCredential
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return WebsiteCredential
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set ftpIp
     *
     * @param string $ftpIp
     *
     * @return WebsiteCredential
     */
    public function setFtpIp($ftpIp)
    {
        $this->ftp_ip = $ftpIp;
    
        return $this;
    }

    /**
     * Get ftpIp
     *
     * @return string
     */
    public function getFtpIp()
    {
        return $this->ftp_ip;
    }

    /**
     * Set ftpUsername
     *
     * @param string $ftpUsername
     *
     * @return WebsiteCredential
     */
    public function setFtpUsername($ftpUsername)
    {
        $this->ftp_username = $ftpUsername;
    
        return $this;
    }

    /**
     * Get ftpUsername
     *
     * @return string
     */
    public function getFtpUsername()
    {
        return $this->ftp_username;
    }

    /**
     * Set ftpPassword
     *
     * @param string $ftpPassword
     *
     * @return WebsiteCredential
     */
    public function setFtpPassword($ftpPassword)
    {
        $this->ftp_password = $ftpPassword;
    
        return $this;
    }

    /**
     * Get ftpPassword
     *
     * @return string
     */
    public function getFtpPassword()
    {
        return $this->ftp_password;
    }

    /**
     * Set website
     *
     * @param \AppBundle\Entity\Website $website
     *
     * @return WebsiteCredential
     */
    public function setWebsite(\AppBundle\Entity\Website $website = null)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return \AppBundle\Entity\Website
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return WebsiteCredential
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
