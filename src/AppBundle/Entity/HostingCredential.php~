<?php
/**
 * Created by PhpStorm.
 * User: Nour Eldin
 * Date: 12/24/2016
 * Time: 8:57 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class HostingCredential
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="hosting_credentials")
 */
class HostingCredential
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
     * @Assert\Choice(choices={"Developer", "Client"})
     * @Assert\NotBlank()
     */
    private $scope;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\Url(message="Enter a valid URL")
     * @Assert\NotBlank()
     */
    private $url;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $username;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\Email()
     * @Assert\NotBlank()
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
     * @ORM\ManyToOne(targetEntity="Hosting", inversedBy="credentials")
     * @ORM\JoinColumn(name="hosting", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\Type(type="AppBundle\Entity\hosting")
     * @Assert\Valid()
     */
    private $hosting;


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
     * @return HostingCredential
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
     * Set url
     *
     * @param string $url
     *
     * @return HostingCredential
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
     * Set username
     *
     * @param string $username
     *
     * @return HostingCredential
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
     * Set email
     *
     * @param string $email
     *
     * @return HostingCredential
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

    /**
     * Set password
     *
     * @param string $password
     *
     * @return HostingCredential
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
     * Set hosting
     *
     * @param \AppBundle\Entity\Hosting $hosting
     *
     * @return HostingCredential
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
}
