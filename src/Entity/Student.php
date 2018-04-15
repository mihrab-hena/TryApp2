<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $department;

    /**
     * @ORM\Column(type="integer")
     */
    private $rollNumber;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Gender;

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getlastName(){
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getDepartment(){
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getRollNumber(){
        return $this->rollNumber;
    }

    public function setrollNumber($rollNumber)
    {
        $this->rollNumber = $rollNumber;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(?string $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }
}
