<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialityRepository::class)]
class Speciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Patient::class, mappedBy: 'speciality')]
    private Collection $id_Speciality;

    #[ORM\Column(length: 255)]
    private ?string $SpecialityName = null;

    public function __construct()
    {
        $this->id_Speciality = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Patient>
     */
    public function getIdSpeciality(): Collection
    {
        return $this->id_Speciality;
    }

    public function addIdSpeciality(Patient $idSpeciality): static
    {
        if (!$this->id_Speciality->contains($idSpeciality)) {
            $this->id_Speciality->add($idSpeciality);
            $idSpeciality->setSpeciality($this);
        }

        return $this;
    }

    public function removeIdSpeciality(Patient $idSpeciality): static
    {
        if ($this->id_Speciality->removeElement($idSpeciality)) {
            // set the owning side to null (unless already changed)
            if ($idSpeciality->getSpeciality() === $this) {
                $idSpeciality->setSpeciality(null);
            }
        }

        return $this;
    }

    public function getSpecialityName(): ?string
    {
        return $this->SpecialityName;
    }

    public function setSpecialityName(string $SpecialityName): static
    {
        $this->SpecialityName = $SpecialityName;

        return $this;
    }
}
