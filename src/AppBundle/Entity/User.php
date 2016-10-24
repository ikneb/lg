<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;


    /**
     * @ORM\Column(type="string")
     */
    private $roles;

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @ORM\OneToOne(targetEntity="Contact")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;

    /**
     * @ORM\OneToOne(targetEntity="Objective")
     * @ORM\JoinColumn(name="objective_id", referencedColumnName="id")
     */
    private $objective;

    /**
     * @ORM\OneToMany(targetEntity="Skill", mappedBy="user")
     */
    private $skill;


    /**
     * @ORM\OneToMany(targetEntity="Practice", mappedBy="user")
     */
    private $practice;

    /**
     * @ORM\OneToMany(targetEntity="Certificate", mappedBy="user")
     */
    private $certificate;

    /**
     * @ORM\OneToMany(targetEntity="Education", mappedBy="user")
     */
    private $education;

    /**
     * @ORM\OneToMany(targetEntity="Language", mappedBy="user")
     */
    private $language;

    /**
     * @ORM\OneToOne(targetEntity="Info")
     * @ORM\JoinColumn(name="info_id", referencedColumnName="id")
     */
    private $info;


    public function __construct()
    {
        $this->isActive = true;
        $this->skill = new ArrayCollection();
        $this->practice = new ArrayCollection();
        $this->certificate = new ArrayCollection();
        $this->education = new ArrayCollection();
        $this->language = new ArrayCollection();
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }


    /**
     * @return mixed
     */
    public function getObjective()
    {
        return $this->objective;
    }

    /**
     * @param mixed $objective
     */
    public function setObjective($objective)
    {
        $this->objective = $objective;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function getRoles()
    {
        return array($this->roles);
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            //$this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            //$this->salt,
            ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * Get new skill for this user
     */
    public function addSkill(Skill $skill)
    {
        $this->skill->add($skill);
        $skill->setUser($this);
    }

    public function removeSkill(Skill $skill)
    {
        $this->skill->removeElement($skill);
    }

    public function addPractice(Practice $practice)
    {
        $this->practice->add($practice);
        $practice->setUser($this);
    }

    public function removePractice( $practice)
    {
        $this->skill->removeElement($practice);
    }

    public function addCertificate(Certificate $certificate)
    {
        $this->certificate->add($certificate);
        $certificate->setUser($this);
    }

    public function removeCertificate( $certificate)
    {
        $this->certificate->removeElement($certificate);
    }

    public function addEducation(Education $education)
    {
        $this->education->add($education);
        $education->setUser($this);
    }

    public function removeEducation( $education)
    {
        $this->education->removeElement($education);
    }


    public function addLanguage(Language $language)
    {
        $this->language->add($language);
        $language->setUser($this);
    }

    public function removeLanguage( $language)
    {
        $this->language->removeElement($language);
    }
}
