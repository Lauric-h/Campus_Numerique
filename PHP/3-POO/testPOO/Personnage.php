<?php
class Personnage {
    private $id;
    private $nom;
    private $forcePerso;
    private $degats;
    private $niveau;
    private $experience;

    public function __construct($data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = 'set'.ucfirst($key); // $method = set + première lettre uppercase + $key
            if (method_exists($this, $method)) {
                $this->$method($value);
            };
        }
    }

    // setters
    public function setId($id) {
        if (is_string($id)) {
            $this->id = $id;
        }
    }
    public function setnom($nom) {
        if (is_string($nom)) {
            $this->nom = $nom;
        }
    }
    public function setforcePerso($forcePerso) {
        $forcePerso = (int)$forcePerso;
        if ($forcePerso >= 1 && $forcePerso <= 100) {
            $this->forcePerso = $forcePerso;
        }
    }
    public function setdegats($degats) {
        $degats = (int)$degats;
        if ($degats >= 0 && $degats <= 100) {
            $this->degats = $degats;
        }
    }
    public function setniveau($niveau) {
        $niveau = (int)$niveau;
        if ($niveau >= 1 && $niveau <= 100) {
            $this->niveau = $niveau;
        }
    }
    public function setExperience($experience) {
        $experience = (int)$experience;
        if ($experience >= 1 && $experience <= 100) {
            $this->experience = $experience;
        }
    }

    // getters
    public function id() {
        return $this->id;
    }
    public function nom() {
        return $this->nom;
    }
    public function forcePerso() {
        return $this->forcePerso;
    }
    public function degats() {
        return $this->degats;
    }
    public function niveau() {
        return $this->niveau;
    }
    public function experience() {
        return $this->experience;
    }
}

?>