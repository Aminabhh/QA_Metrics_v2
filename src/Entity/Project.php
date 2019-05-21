<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Created;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Id_testlink;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Id_mantis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Creator;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDate_Created(): ?\DateTimeInterface
    {
        return $this->Date_Created;
    }

    public function setDateCreated(\DateTimeInterface $Date_Created): self
    {
        $this->Date_Created = $Date_Created;

        return $this;
    }

    public function getIdTestlink(): ?string
    {
        return $this->Id_testlink;
    }

    public function setIdTestlink(string $Id_testlink): self
    {
        $this->Id_testlink = $Id_testlink;

        return $this;
    }

    public function getIdMantis(): ?string
    {
        return $this->Id_mantis;
    }

    public function setIdMantis(string $Id_mantis): self
    {
        $this->Id_mantis = $Id_mantis;

        return $this;
    }

    public function getCreator(): ?User
    {
        return $this->Creator;
    }

    public function setCreator(?User $Creator): self
    {
        $this->Creator = $Creator;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }
}
