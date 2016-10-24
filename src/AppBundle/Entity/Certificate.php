<?php
/**
 * Created by PhpStorm.
 * User: ikneb
 * Date: 22.10.2016
 * Time: 20:05
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="certificate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CertificateRepository")
 **/
class Certificate
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $large_foto;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $small_foto;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="certificate")
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
    public function getLargeFoto()
    {
        return $this->large_foto;
    }

    /**
     * @param mixed $large_foto
     */
    public function setLargeFoto($large_foto)
    {
        $this->large_foto = $large_foto;
    }

    /**
     * @return mixed
     */
    public function getSmallFoto()
    {
        return $this->small_foto;
    }

    /**
     * @param mixed $small_foto
     */
    public function setSmallFoto($small_foto)
    {
        $this->small_foto = $small_foto;
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