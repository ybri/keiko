<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

 /**
 * @ApiResource(
 *     normalizationContext={"groups"={"pokemon_read"}}
 * )
 * @ORM\Entity()
 */
class Pokemon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"pokemon_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pokemon_read"})
     * @Assert\NotNull
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"pokemon_read"})
     * @Assert\NotNull
     * @Assert\GreaterThan(0)
     */
    private $weight;

    /**
     * @ORM\ManyToMany(targetEntity="Ability")
     * @Groups({"pokemon_read"})
     */
    private $abilities;

    public function __construct() {
        $this->abilities = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string $name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int $weight
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int $abilities
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * @param int $abilities
     */
    public function setAbilities($abilities): void
    {
        $this->abilities = $abilities;
    }
}
