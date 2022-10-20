<?php

namespace App\Entity;

use App\Repository\PressRessourceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PressRessourceRepository::class)]
class PressRessource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $media_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $date_public;

    #[ORM\Column(type: 'text')]
    private $link;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMediaName(): ?string
    {
        return $this->media_name;
    }

    public function setMediaName(string $media_name): self
    {
        $this->media_name = $media_name;

        return $this;
    }

    public function getDatePublic(): ?string
    {
        return $this->date_public;
    }

    public function setDatePublic(string $date_public): self
    {
        $this->date_public = $date_public;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
