<?php

class Komentar {
    private $naziv;
    private $cena;
    private $opis;
    private $korId;
    private $datum;
  
    public function getNaziv() {
      return $this->naziv;
    }
  
    public function setNaziv($naziv) {
      $this->naziv = $naziv;
    }
  
    public function getDatum() {
      return $this->datum;
    }
  
    public function setDatum($datum) {
      $this->datum = $datum;
    }
  
    public function getCena() {
      return $this->cena;
    }
  
    public function setCena($cena) {
      $this->cena = $cena;
    }
  
    public function getOpis() {
      return $this->opis;
    }
  
    public function setOpis($opis) {
      $this->opis = $opis;
    }
  
    public function getKorId() {
      return $this->korId;
    }
  
    public function setKorId($korId) {
      $this->korId = $korId;
    }
  }
  

?>