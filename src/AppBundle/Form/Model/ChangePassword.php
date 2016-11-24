<?php

namespace AppBundle\Form\Model;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePassword
{
    /**
     * @SecurityAssert\UserPassword(
     *     message = "Wrong value for the current password"
     * )
     *
     */

    protected $oldPassword;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    protected $newPassword;


    /**
     * @return mixed
     */
    public function getOldPassword(){
        return $this->oldPassword;
    }


    /**
     * @param $oldPassword
     * @return $this
     */
    public function setOldPassword($oldPassword){
        $this->oldPassword = $oldPassword;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNewPassword(){
        return $this->newPassword;
    }


    /**
     * @param $newPassword
     * @return $this
     */
    public function setNewPassword($newPassword){
        $this->newPassword = $newPassword;
        return $this;
    }

}