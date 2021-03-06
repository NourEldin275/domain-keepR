<?php
/**
 * Created by PhpStorm.
 * User: Nour Eldin
 * Date: 12/23/2016
 * Time: 3:45 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Registrar
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="registrars")
 * @UniqueEntity(fields={"name", "url"}, message="The registrar is already in the database")
 */
class Registrar
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
     * @ORM\Column(type="string")
     * @Assert\Url()
     */
    private $url;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $username;


    /**
     * @var
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Email()
     */
    private $email;


    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $password;


    /**
     * @var
     * @ORM\OneToMany(targetEntity="Domain", mappedBy="registrar")
     */
    private $domains;


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
     * @return Registrar
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
     * Set url
     *
     * @param string $url
     *
     * @return Registrar
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
     * @return Registrar
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
     * @return Registrar
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
     * @return Registrar
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
     * Constructor
     */
    public function __construct()
    {
        $this->domains = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add domain
     *
     * @param \AppBundle\Entity\Domain $domain
     *
     * @return Registrar
     */
    public function addDomain(\AppBundle\Entity\Domain $domain)
    {
        $this->domains[] = $domain;
    
        return $this;
    }

    /**
     * Remove domain
     *
     * @param \AppBundle\Entity\Domain $domain
     */
    public function removeDomain(\AppBundle\Entity\Domain $domain)
    {
        $this->domains->removeElement($domain);
    }

    /**
     * Get domains
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDomains()
    {
        return $this->domains;
    }
}
