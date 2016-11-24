<?php


namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;


class UserProfile
{
    /**
     * @Assert\NotBlank()
     */
    private $first_name;

    /**
     * @Assert\NotBlank()
     */
    private $last_name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;


    /**
     * @return mixed
     */
    public function getFirstName(){
        return $this->first_name;
    }

    /**
     * @param $first_name
     * @return $this
     */
    public function setFirstName($first_name){
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName(){
        return $this->last_name;
    }

    /**
     * @param $last_name
     * @return $this
     */
    public function setLastName($last_name){
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
}