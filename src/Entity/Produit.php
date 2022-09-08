<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Veuillez saisir un titre")
     * @Assert\Length(
     * min=5,
     * max=30,
     * minMessage="Saisir au moins 5 caractères",
     * maxMessage="Saisir moins de 30 caractères"
     * )
     */
    private $titre;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="Veuillez saisir un prix")
     * @Assert\Positive(message="Veuillez saisir un prix supérieur à zéro")
     */
    private $prix;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     * max=200,
     * maxMessage="Saisir moins de 200 caractères"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}