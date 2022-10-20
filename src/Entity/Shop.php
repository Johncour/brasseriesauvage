<?php

namespace App\Entity;

use App\Repository\ShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopRepository::class)]
class Shop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'shops')]
    private $user;

    #[ORM\Column(type: 'integer')]
    private $order_status;

    #[ORM\Column(type: 'datetime')]
    private $order_date;

    #[ORM\Column(type: 'date')]
    private $shipping_date;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $price_order;

    #[ORM\OneToMany(mappedBy: 'shop', targetEntity: ShopBeer::class)]
    private $shopBeers;

    public function __construct()
    {
        $this->shopBeers = new ArrayCollection();
        $this->beer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOrderStatus(): ?int
    {
        return $this->order_status;
    }

    public function setOrderStatus(int $order_status): self
    {
        $this->order_status = $order_status;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getShippingDate(): ?\DateTimeInterface
    {
        return $this->shipping_date;
    }

    public function setShippingDate(\DateTimeInterface $shipping_date): self
    {
        $this->shipping_date = $shipping_date;

        return $this;
    }

    public function getPriceOrder(): ?string
    {
        return $this->price_order;
    }

    public function setPriceOrder(string $price_order): self
    {
        $this->price_order = $price_order;

        return $this;
    }

    /**
     * @return Collection<int, ShopBeer>
     */
    public function getShopBeers(): Collection
    {
        return $this->shopBeers;
    }

    public function addShopBeer(ShopBeer $shopBeer): self
    {
        if (!$this->shopBeers->contains($shopBeer)) {
            $this->shopBeers[] = $shopBeer;
            $shopBeer->setShop($this);
        }

        return $this;
    }

    public function removeShopBeer(ShopBeer $shopBeer): self
    {
        if ($this->shopBeers->removeElement($shopBeer)) {
            // set the owning side to null (unless already changed)
            if ($shopBeer->getShop() === $this) {
                $shopBeer->setShop(null);
            }
        }

        return $this;
    }

}
