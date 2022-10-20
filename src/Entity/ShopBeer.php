<?php

namespace App\Entity;

use App\Repository\ShopBeerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopBeerRepository::class)]
class ShopBeer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $price_quantity;

    #[ORM\ManyToOne(targetEntity: Beer::class, inversedBy: 'shopBeers')]
    #[ORM\JoinColumn(nullable: false)]
    private $beer;

    #[ORM\ManyToOne(targetEntity: Shop::class, inversedBy: 'shopBeers')]
    private $shop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPriceQuantity(): ?string
    {
        return $this->price_quantity;
    }

    public function setPriceQuantity(string $price_quantity): self
    {
        $this->price_quantity = $price_quantity;

        return $this;
    }

    public function getBeer(): ?Beer
    {
        return $this->beer;
    }

    public function setBeer(?Beer $beer): self
    {
        $this->beer = $beer;

        return $this;
    }

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }
}
