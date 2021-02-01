<?php

require_once 'Compteur.php';

class DoubleCompteur extends Compteur{
    
    public function get(): int 
    {
        return 2 * parent::get();
    }
}

?>