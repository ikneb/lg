<?php
/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 22.10.2016
 * Time: 19:45
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="practice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PracticeRepository")
 **/
class Practice
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $cource;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     *
     */
    private $begin_date;

    /**
     * @ORM\Column(type="datetime")
     *
     */
    private $end_date;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $demo_code;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sourse_code;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="practice")
     * @ORM\JoinColumn( referencedColumnName="id")
     */
    private $user;

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

    /**
     * @return mixed
     */
    public function getCource()
    {
        return $this->cource;
    }

    /**
     * @param mixed $cource
     */
    public function setCource($cource)
    {
        $this->cource = $cource;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getBeginDate()
    {
        return $this->begin_date;
    }

    /**
     * @param mixed $begin_date
     */
    public function setBeginDate($begin_date)
    {
        $this->begin_date = $begin_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     * @return mixed
     */
    public function getDemoCode()
    {
        return $this->demo_code;
    }

    /**
     * @param mixed $demo_code
     */
    public function setDemoCode($demo_code)
    {
        $this->demo_code = $demo_code;
    }

    /**
     * @return mixed
     */
    public function getSourseCode()
    {
        return $this->sourse_code;
    }

    /**
     * @param mixed $sourse_code
     */
    public function setSourseCode($sourse_code)
    {
        $this->sourse_code = $sourse_code;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }






}