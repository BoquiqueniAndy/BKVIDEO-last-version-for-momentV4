
<?php
class Panier extends Produits 
{

    /**
     * Verifie si le panier existe, le créé sinon
     * @return booleen
     */
    function creationPanier(){
    if (!isset($_SESSION['numpa'])){
        $_SESSION['numpa']=array();
        $_SESSION['numpa']['nomprod'] = array();
        $_SESSION['numpa']['qteProduit'] = array();
        $_SESSION['numpa']['prix'] = array();
    }
    return true;
    }


    /**
     * Ajoute un article dans le panier
     * @param string $libelleProduit
     * @param int $qteProduit
     * @param float $prixProduit
     * @return void
     */
    function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
        //Si le produit existe déjà on ajoute seulement la quantité
        $positionProduit = array_search($libelleProduit,  $_SESSION['numpa']['nomprod']);

        if ($positionProduit !== false)
        {
            $_SESSION['numpa']['qteProduit'][$positionProduit] += $qteProduit ;
        }
        else
        {
            //Sinon on ajoute le produit
            array_push( $_SESSION['numpa']['nomprod'],$libelleProduit);
            array_push( $_SESSION['numpa']['qteProduit'],$qteProduit);
            array_push( $_SESSION['numpa']['prix'],$prixProduit);
        }
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }



    /**
     * Modifie la quantité d'un article
     * @param $libelleProduit
     * @param $qteProduit
     * @return void
     */
    function modifierQTeArticle($libelleProduit,$qteProduit){
    //Si le panier éxiste
    if (creationPanier() && !isVerrouille())
    {
        //Si la quantité est positive on modifie sinon on supprime l'article
        if ($qteProduit > 0)
        {
            //Recharche du produit dans le panier
            $positionProduit = array_search($libelleProduit,  $_SESSION['numpa']['nomprod']);

            if ($positionProduit !== false)
            {
                $_SESSION['numpa']['qteProduit'][$positionProduit] = $qteProduit ;
            }
        }
        else
        supprimerArticle($libelleProduit);
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    /**
     * Supprime un article du panier
     * @param $libelleProduit
     * @return unknown_type
     */
    function supprimerArticle($libelleProduit){
    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
        //Nous allons passer par un panier temporaire
        $tmp=array();
        $tmp['nomprd'] = array();
        $tmp['qteProduit'] = array();
        $tmp['prix'] = array();

        for($i = 0; $i < count($_SESSION['numpa']['nomprd']); $i++)
        {
            if ($_SESSION['numpa']['nomprd'][$i] !== $libelleProduit)
            {
                array_push( $tmp['nomprd'],$_SESSION['numpa']['nomprd'][$i]);
                array_push( $tmp['qteProduit'],$_SESSION['numpa']['qteProduit'][$i]);
                array_push( $tmp['prix'],$_SESSION['numpa']['prix'][$i]);
            }

        }
        //On remplace le panier en session par notre panier temporaire à jour
        $_SESSION['numpa'] =  $tmp;
        //On efface notre panier temporaire
        unset($tmp);
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }


    /**
     * Montant total du panier
     * @return int
     */
    function MontantGlobal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['numpa']['nomprod']); $i++)
    {
        $total += $_SESSION['numpa']['qteProduit'][$i] * $_SESSION['numpa']['prix'][$i];
    }
    return $total;
    }


    /**
     * Fonction de suppression du panier
     * @return void
     */
    function supprimePanier(){
    unset($_SESSION['numpa']);
    }


    /**
     * Compte le nombre d'articles différents dans le panier
     * @return int
     */
    function compterArticles()
    {
    if (isset($_SESSION['numpa']))
    return count($_SESSION['numpa']['nomprod']);
    else
    return 0;

    }
}