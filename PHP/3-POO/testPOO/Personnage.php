<?php
class Personnage {
    private $id;
    private $name;
    private $strength;
    private $damage;
    private $level;
    private $experience;

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
    public function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        }
    }
    public function setStrength($strength) {
        $strength = (int)$strength;
        if ($strength >= 1 && $strength <= 100) {
            $this->strength = $strength;
        }
    }
    public function setDamage($damage) {
        $damage = (int)$damage;
        if ($damage >= 0 && $damage <= 100) {
            $this->damage = $damage;
        }
    }
    public function setLevel($level) {
        $level = (int)$level;
        if ($level >= 1 && $level <= 100) {
            $this->level = $level;
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
    public function name() {
        return $this->name;
    }
    public function strength() {
        return $this->strength;
    }
    public function damage() {
        return $this->damage;
    }
    public function level() {
        return $this->level;
    }
    public function experience() {
        return $this->experience;
    }
}

?>