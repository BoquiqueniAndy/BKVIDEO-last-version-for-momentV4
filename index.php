<?php
// Cela signifie que vous ne souhaitez pas voir le résultat de votre script mis une fois pour toutes en cache, 
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Cache-Control: no-cache");
 header("Pragma: no-cache");

 require_once("./templateOTD/header.php");

 echo     "<meta charset='utf-8' />";
 echo     "<figure class='image is-128x128'>";
 echo     "<img class= 'logo' src='./StyleOTD/LOGO-BKVIDEO.png' alt=''>";
 echo     "</figure>";
 echo     "<link rel='stylesheet' href='./StyleOTD/style.css'>";

 //Dispatcheur
 try{

    if (isset($_REQUEST['action']))
    {
        require_once("./controlerOTD/controler.php");
        $produits = new Produits();
        require_once("./controlerOTD/Cpanier.php");
        $panier = new Panier();

        if($_GET['action'] == 'produits'){
            $tproduits = $produits->ProdGlob();
            require "./VueOTD/produits.php";
        }




        if($_GET['action'] == 'panier'){
            if(!in_array($panier,array('ajout', 'suppression', 'refresh')))
            $erreur=true;

            //récuperation des variables en POST ou GET
            $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
            $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
            $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

            //Suppression des espaces verticaux
            $l = preg_replace('#\v#', '',$l);
            //On verifie que $p soit un float
            $p = floatval($p);

            //On traite $q qui peut etre un entier simple ou un tableau d'entier
                
            if (is_array($q)){
                $QteArticle = array();
                $i=0;
                foreach ($q as $contenu){
                    $QteArticle[$i++] = intval($contenu);
                }
            }
                
            $erreur = false;

            if (!$erreur){
                switch($panier)
                {
                    Case "ajout":
                        ajouterArticle($l,$q,$p);
                        break;

                    Case "suppression":
                        supprimerArticle($l);
                        break;

                    Case "refresh" :
                        for ($i = 0 ; $i < count($QteArticle) ; $i++)
                        {
                            modifierQTeArticle($_SESSION['numpa']['nomprod'][$i],round($QteArticle[$i]));
                        }
                        break;

                    Default:
                        break;
                }
            }
            
            $q = intval($q);
            require "./VueOTD/Vpanier.php";
        }




        if($_GET['action'] == 'ps3'){
            $tproduits = $produits->ProdPS3();
            require "./VueOTD/ps3.php";
        }

        if($_GET['action'] == 'ps4'){
            $tproduits = $produits->ProdPS4();
            require "./VueOTD/ps4.php";
        }

        if($_GET['action'] == 'pc'){
            $tproduits = $produits->ProdPC();
            require "./VueOTD/pc.php";
        }

        if($_GET['action'] == 'xboxone'){
            $tproduits = $produits->ProdXBOXONE();
            require "./VueOTD/xboxone.php";
        }

        if($_GET['action'] == 'xbox360'){
            $tproduits = $produits->ProdXBOX360();
            require "./VueOTD/xbox360.php";
        }




        if($_GET['action'] == 'New1'){
            $tproduits = $produits->ProdPS3N();
            require "./VueOTD/New1.php";
        }

        if($_GET['action'] == 'New2'){
            $tproduits = $produits->ProdPS4N();
            require "./VueOTD/New2.php";
        }

        if($_GET['action'] == 'New3'){
            $tproduits = $produits->ProdPCN();
            require "./VueOTD/New3.php";
        }

        if($_GET['action'] == 'New4'){
            $tproduits = $produits->ProdXBOXONEN();
            require "./VueOTD/New4.php";
        }

        if($_GET['action'] == 'New5'){
            $tproduits = $produits->ProdXBOX360N();
            require "./VueOTD/New5.php";
        }




        if($_GET['action'] == 'OI1'){
            $tproduits = $produits->ProdPS3OI();
            require "./VueOTD/OI1.php";
        }

        if($_GET['action'] == 'OI2'){
            $tproduits = $produits->ProdPS4OI();
            require "./VueOTD/OI2.php";
        }

        if($_GET['action'] == 'OI3'){
            $tproduits = $produits->ProdPCOI();
            require "./VueOTD/OI3.php";
        }

        if($_GET['action'] == 'OI4'){
            $tproduits = $produits->ProdXBOXONEOI();
            require "./VueOTD/OI4.php";
        }

        if($_GET['action'] == 'OI5'){
            $tproduits = $produits->ProdXBOX360OI();
            require "./VueOTD/OI5.php";
        }




        if($_GET['action'] == 'RM1'){
            $tproduits = $produits->ProdPS3RM();
            require "./VueOTD/RM1.php";
        }

        if($_GET['action'] == 'RM2'){
            $tproduits = $produits->ProdPS4RM();
            require "./VueOTD/RM2.php";
        }

        if($_GET['action'] == 'RM3'){
            $tproduits = $produits->ProdPCRM();
            require "./VueOTD/RM3.php";
        }

        if($_GET['action'] == 'RM4'){
            $tproduits = $produits->ProdXBOXONERM();
            require "./VueOTD/RM4.php";
        }

        if($_GET['action'] == 'RM5'){
            $tproduits = $produits->ProdXBOX360RM();
            require "./VueOTD/RM5.php";
        }
   


        if ($_REQUEST['action'] == 'Inscription') {
            include "./controlerOTD/controleur.php";
            $employe = new Employes();
            $employe->setAdd($_POST);
            include "./VueOTD/vueInscription.php"; 

        } 

    

        if ($_REQUEST['action'] == 'Rechercher') {
            include "./controlerOTD/controleur.php";
            $employe = new Employes();
            $tblEmp = $employe->Search($_POST);
            include "./VueOTD/vue.php";
        }

        if ($_GET['action'] == 'Co') {
      
            session_start();
        }

        if (!empty($_SESSION['userId'])) {
            include "./controlerOTD/controleur.php";
            $employe = new Employes();
            $tblEmp = $employe->getSelect();
      
            include "./VueOTD/vueDashboard.php"; 

        }else {

        include "./VueOTD/vueLogin.php";         

        }
    

        if ($_GET['action'] == 'Util') {
            include "./VueOTD/vueLogin.php";
        }

        if ($_GET['action'] == 'Login') {
        session_start();
        $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        
        require_once "./controlerOTD/membre.php";
        require_once  "./controlerOTD/controleur.php";
        $membre = new Membre();
        $employe = new Employes();
        $tblEmp = $employe->getSelect();
        
        $isLoggedIn = $membre->verifLogin($username, $password);


        if (! $isLoggedIn) {
            $_SESSION["erreurMessage"] = "Les informations d'identification sont invalides !";
            include "./VueOTD/vueLogin.php";
            exit();
        }
        exit();
    
        }

        if ($_GET['action'] == 'Accueil') {
            include "./VueOTD/accueil.php";
            include "./VueOTD/vue.php";
        } 
    
        

        if ( $_GET['action'] == 'Deco') {

            session_start();

            session_destroy();

        }



        if ($_REQUEST['action'] == 'supprimer') {
            $produits->setdelete(intval($_POST['idprod']));
            include "./VueOTD/vueConnect.php";
        }

        if ($_REQUEST['action'] == 'modifier') {
            $_POST['idprod']=intval($_POST['idprod']);
            $produits->setUpdate($_POST);
            include "./VueOTD/vueConnect.php";
        }

        if ($_GET['action'] == 'admin') {
            require_once("./controlerOTD/controler.php");
            $produits = new Produits();
            $tproduits = $produits->ProdGlob2();
            include "./VueOTD/vueco.php";
        }  
  
          if ($_GET['action'] == 'connect') {
            session_start();
            $adname = filter_var($_POST["adname"], FILTER_SANITIZE_STRING);
            $adpassword = filter_var($_POST["adpassword"], FILTER_SANITIZE_STRING);
            require_once("./controlerOTD/admin.php");
            $admin = new admin();
            require_once("./controlerOTD/controler.php");
            $produits = new Produits();
            $tproduits = $produits->ProdGlob2();
            $isLoggedIn = $admin->veriflogad($adname, $adpassword);
            if (! $isLoggedIn) {
                $_SESSION["erreurMessage"] = "Les informations d'identification sont invalides";
                exit();
            }
            include "./VueOTD/vueConnect.php";
            exit();
          }  

    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}

    
?> 
