<?php

class PersonnagesManager {
    private $db; // instance de PDO

    public function __construct($db) {
        $this->setDb($db);
    }

    public function add(Personnage $perso) {
        // préparation de la requête d'insertion
        // assignation des valeurs pour le nom, force, dégats etc.
        // execution de la requête
        $query = $this->db->prepare('INSERT INTO perso_list(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');
        $query->bindValue(':name', $perso->name());
        $query->bindValue(':forcePerso', $perso->strength());
        $query->bindValue(':degats', $perso->damage());
        $query->bindValue(':niveau', $perso->level());
        $query->bindValue(':experience', $perso->experience());
    }

    public function delete(Personnage $perso) {
        // requête Delete
        $this->db->exec('DELETE FROM perso_list WHERE id = '.$perso->id());
    }

    public function get($id) {
        // select avec Where et retourne un objet personnage
        $id = (int) $id;
        $query = $this->db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM perso_list WHERE id = '.$id);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return new Personnage($data);
    }

    public function getList() {
        // retourne la liste de tous les perso
        $persos = [];
        $query = $this->db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM pers_list ORDER BY nom');
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $persos[] = new Personnage($data);
        }
        return $persos;
    }

    public function update(Personnage $perso) {
        // prépare une requêete update
        // assgne des valeurs à la requête
        // exécute la requête
        $query = $this->db->prepare()
    }

    public function setDb(PDO $db) {
        $this->db = $db;
    }
}

?>