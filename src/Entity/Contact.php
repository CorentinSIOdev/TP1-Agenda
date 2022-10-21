<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $age = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @Assert\NotBlank(message = "Il ne peut pas être vide.")
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @Assert\NotBlank(message = "Il ne peut pas être vide.")
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @Assert\NotBlank(message = "Il ne peut pas être vide.")
     */
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * @Assert\NotBlank(message = "Il ne peut pas être vide.")
     */
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * @Assert\NotBlank(message = "Il ne peut pas être vide.")
     */
    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @Assert\NotBlank(message = "Il ne peut pas être vide.")
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
