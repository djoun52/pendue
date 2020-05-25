<?php
require_once "Entity.php";

class Player extends Entity {
  // Properties

    private $nom;
    private $prenom;
    private $pseudo;
    private $partie;
    private $partieWin;




    public function __construct($c_donnes)
    {
       parent::hydrate($c_donnes);
    }

    
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getPartie()
    {
        return $this->partie;
    }
    public function getPartieWin()
    {
        return $this->partieWin;
    }


    public function setNom($p_nom)
    {
        $this->nom = $p_nom;
    }
    public function setPrenom($p_prenom)
    {
        $this->prenom = $p_prenom;
    }
    public function setPseudo($p_pseudo)
    {
        $this->pseudo = $p_pseudo;
    }
    public function setPartie($p_partie)
    {
        $this->partie = $p_partie;
    }
    public function setPartieWin($p_partieWin)
    {
        $this->partieWin = $p_partieWin;
    }

    public function addPartie($a_partie)
    {
        $this->partie = $this->partie + $a_partie;
    }
    public function addPartieWin($a_partieWin)
    {
        $this->partieWin = $this->partieWin + $a_partieWin;
    }

   

    public function infoplayer()
    {


        if ($this->getPartieWin() !=0){
            $r=100/($this->getPartie()/$this->getPartieWin() );
          $stat=round($r,2);
          }else{
            $stat=0;
          }


       $s= "";
       $s.="<h1>Profile Joueurs</h1> <br>";
       $s.="<p>pseudo joueur : " .  $this->getPseudo()  . " </p>";
       $s.="<p>nom joueur : ".  $this->getNom()  ."  </p>";
       $s.="<p>prenom joueur :  ".  $this->getPrenom()  ."</p>";
       $s.= "<br><br>";
       
       $s.="<h2>Statistique</h2>";
       $s.="<p>partie joué :  ".  $this->getPartie()  ." </p>";
    //    $s.="<p>partie gagné :  ".  $this->getPartieWin()  ." </p>";
       $s.="<p>pourcentage de victoire : $stat </p>";
       
          return $s;

    }
    
}

$pler= new Player( $_SESSION['user']);
