<?php

namespace App\Entity;

use App\Repository\BeerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeerRepository::class)]
class Beer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'beers')]
    #[ORM\JoinColumn(nullable: false)]
    private $category;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $p1;

    #[ORM\Column(type: 'text', nullable: true)]
    private $p2;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $alcool;

    #[ORM\Column(type: 'string', length: 255)]
    private $color;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $price;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $volume;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\OneToMany(mappedBy: 'beer', targetEntity: ShopBeer::class, orphanRemoval: true)]
    private $shopBeers;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'favoris')]
    private $users;

    #[ORM\OneToMany(mappedBy: 'beer', targetEntity: Notice::class)]
    private $notices;

    public function __construct()
    {
        $this->shopBeers = new ArrayCollection();
        $this->shops = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->notices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getP1(): ?string
    {
        return $this->p1;
    }

    public function setP1(string $p1): self
    {
        $this->p1 = $p1;

        return $this;
    }

    public function getP2(): ?string
    {
        return $this->p2;
    }

    public function setP2(?string $p2): self
    {
        $this->p2 = $p2;

        return $this;
    }

    public function getAlcool(): ?string
    {
        return $this->alcool;
    }

    public function setAlcool(string $alcool): self
    {
        $this->alcool = $alcool;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(string $volume): self
    {
        $this->volume = $volume;

        return $this;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
            $shopBeer->setBeer($this);
        }

        return $this;
    }

    public function removeShopBeer(ShopBeer $shopBeer): self
    {
        if ($this->shopBeers->removeElement($shopBeer)) {
            // set the owning side to null (unless already changed)
            if ($shopBeer->getBeer() === $this) {
                $shopBeer->setBeer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addFavori($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeFavori($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Notice>
     */
    public function getNotices(): Collection
    {
        return $this->notices;
    }

    public function addNotice(Notice $notice): self
    {
        if (!$this->notices->contains($notice)) {
            $this->notices[] = $notice;
            $notice->setBeer($this);
        }

        return $this;
    }

    public function removeNotice(Notice $notice): self
    {
        if ($this->notices->removeElement($notice)) {
            // set the owning side to null (unless already changed)
            if ($notice->getBeer() === $this) {
                $notice->setBeer(null);
            }
        }

        return $this;
    }
}
