<?php
/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 22.10.2016
 * Time: 13:20
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 *
 */
class Contact
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $birthdey;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $skype;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vk;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $stackoverflow;

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }



    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getBirthdey()
    {
        return $this->birthdey;
    }

    /**
     * @param mixed $birthdey
     */
    public function setBirthdey($birthdey)
    {
        $this->birthdey = $birthdey;
    }

    /**
     * @return mixed
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * @param mixed $skype
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;
    }

    /**
     * @return mixed
     */
    public function getVk()
    {
        return $this->vk;
    }

    /**
     * @param mixed $vk
     */
    public function setVk($vk)
    {
        $this->vk = $vk;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return mixed
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @param mixed $linkedin
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    /**
     * @return mixed
     */
    public function getStackoverflow()
    {
        return $this->stackoverflow;
    }

    /**
     * @param mixed $stackoverflow
     */
    public function setStackoverflow($stackoverflow)
    {
        $this->stackoverflow = $stackoverflow;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }




}