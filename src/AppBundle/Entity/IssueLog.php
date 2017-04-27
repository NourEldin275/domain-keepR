<?php
/**
 * Created by PhpStorm.
 * User: noureldin
 * Date: 4/27/17
 * Time: 10:18 AM
 */

namespace AppBundle\Entity;

//use Doctrine\Orm\Mapping as ORM;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class IssueLog
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="issues_log")
 * @ORM\HasLifecycleCallbacks()
 */
class IssueLog
{

    /**
     * @var
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    private $log_date;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $log_message;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Issue", inversedBy="logs")
     * @ORM\JoinColumn(name="issue", referencedColumnName="id", onDelete="CASCADE")
     */
    private $issue;


    /**
     * IssueLog constructor.
     */
    public function __construct()
    {
        $this->setLogDate(new \DateTime());
    }

    /**
     * @ORM\PrePersist()
     */
    public function updateLogDate(){
        $this->setLogDate(new \DateTime());
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
     * Set logDate
     *
     * @param \DateTime $logDate
     *
     * @return IssueLog
     */
    public function setLogDate($logDate)
    {
        $this->log_date = $logDate;

        return $this;
    }

    /**
     * Get logDate
     *
     * @return \DateTime
     */
    public function getLogDate()
    {
        return $this->log_date;
    }

    /**
     * Set logMessage
     *
     * @param string $logMessage
     *
     * @return IssueLog
     */
    public function setLogMessage($logMessage)
    {
        $this->log_message = $logMessage;

        return $this;
    }

    /**
     * Get logMessage
     *
     * @return string
     */
    public function getLogMessage()
    {
        return $this->log_message;
    }

    /**
     * Set issue
     *
     * @param \AppBundle\Entity\Issue $issue
     *
     * @return IssueLog
     */
    public function setIssue(\AppBundle\Entity\Issue $issue = null)
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * Get issue
     *
     * @return \AppBundle\Entity\Issue
     */
    public function getIssue()
    {
        return $this->issue;
    }
}
