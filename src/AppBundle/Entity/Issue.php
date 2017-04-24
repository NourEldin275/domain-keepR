<?php
/**
 * Created by PhpStorm.
 * User: noureldin
 * Date: 4/23/17
 * Time: 11:38 AM
 */

namespace AppBundle\Entity;

use Doctrine\Orm\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Issue
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="issues")
 * @ORM\HasLifecycleCallbacks()
 */
class Issue
{
    /**
     * @var
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Holds reference to the ticket identifier in the service's support system.
     * @var
     * @ORM\Column(type="string", nullable=TRUE)
     */
    private $ticket_reference;


    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Choice(choices={"Open", "On Hold", "Solved", "Closed"})
     */
    private $status;


    /**
     * Date created on service's support system.
     * @var
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $date_created;


    /**
     * User who created the issue on domain keeper.
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="issues_created")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    private $created_by;


    /**
     * Issue creation date on domain keeper.
     * @var
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $issue_creation_date;


    /**
     * Date the issue is modified at on domain keeper.
     * @var
     * @ORM\Column(type="datetime")
     */
    private $modified_at;


    /**
     * Issue constructor.
     */
    public function __construct()
    {
        $this->setIssueCreationDate(new \DateTime());

        if ( $this->getModifiedAt() == NULL ){
            $this->setModifiedAt(new \DateTime());
        }
    }


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate
     */
    public function updateModifiedDatetime() {
        // update the modified time
        $this->setModifiedAt(new \DateTime());
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
     * Set ticketReference
     *
     * @param string $ticketReference
     *
     * @return Issue
     */
    public function setTicketReference($ticketReference)
    {
        $this->ticket_reference = $ticketReference;

        return $this;
    }

    /**
     * Get ticketReference
     *
     * @return string
     */
    public function getTicketReference()
    {
        return $this->ticket_reference;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Issue
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Issue
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set issueCreationDate
     *
     * @param \DateTime $issueCreationDate
     *
     * @return Issue
     */
    public function setIssueCreationDate($issueCreationDate)
    {
        $this->issue_creation_date = $issueCreationDate;

        return $this;
    }

    /**
     * Get issueCreationDate
     *
     * @return \DateTime
     */
    public function getIssueCreationDate()
    {
        return $this->issue_creation_date;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return Issue
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modified_at = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     *
     * @return Issue
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->created_by = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }
}
