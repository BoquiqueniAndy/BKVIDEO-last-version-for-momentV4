<?php

require_once("./modelOTD/model.php");

class Employes extends dbotd {

  function getSelect(){
    return $this->Requete("SELECT * FROM `utilisateur`");
  }

 //Fonction Inscription
 function setAdd($tblcli){
	  
  
 
  
  $strSQL = 'INSERT INTO utilisateur (pseudo,mail,mdp) 
              VALUES (?,?,?);';

              $tabValeur = array(
              $tblcli['pseudo'],
               $tblcli['mail'],
              sha1 ($tblcli['mdp'])
            
              );
   $ins = $this->Requete($strSQL, $tabValeur);
   return $ins;
} 

//Fonction recherche

function Search($tblemp){

  $strSQL = "SELECT * FROM produit
              WHERE nompro LIKE  :nom  ";

   empty($tblemp['nom'])     ? $tblemp['nom']    = '*' : $tblemp['nom']; 
  
$tabValeur = array(
        
        'nom'   => "%".$tblemp['nom']."%", 
        
      );

  $sch = $this->Requete($strSQL, $tabValeur);
  return $sch;
 
  }


    } 
  

?>