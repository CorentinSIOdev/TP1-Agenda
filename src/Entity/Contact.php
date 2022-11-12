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
    
    // /**
    //  * @Assert\Length(
    //  *      min = 2
    //  *      minMessage = "Nom invalide"
    //  * )
    //  */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;


        return $this;
    }

    // /**
    //  * @Assert\Length(
    //  *      min = 2
    //  *      minMessage = "Prénom invalide"
    //  * )
    //  */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    // /**
    //  * @Assert\NotBlank(message ="Ce champs ne peut être vide")
    //  */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    // /**
    //  * @Assert\NotBlank(message = "Ce champs ne peut être vide")
    //  */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    // /**
    //  * @Assert\NotBlank(message = "Ce champs ne peut être vide")
    //  */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
    
    // /**
    //  * @Assert\NotBlank(message = "Ce champs ne peut être vide")
    //  * @Assert\GreaterThanOrEqual(
    //  *  value: 15
    //  *  message = "Au minimum 15 ans"
    //  * )
    //  * @Assert\LessThan(
    //  *  value: 120
    //  *  message: "Au maximum "120"
    //  * )
    //  */
    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
