<?php
/* Les variables suivantes doivent être personnalisées selon vos besoins */
$email_paypal = 'sb-43li4c5211489@business.example.com';/*email associé au compte paypal du vendeur*/
$item_numero = '04AAA'; /*Numéro du produit en vente*/
$item_prix   = '40';    /*prix du produit*/
$item_nom    = 'nom de l\'item'; /*Nom du produit*/
$url_retour = 'http://localhost:8888/aze/paypalThanks.php?id=10';/*page de remerciement à créer*/
$url_cancel = 'http://localhost:8888/aze/paypalCancel.php?id=10'; /*page d'annulation d'achat*/
$url_confirmation = 'http://localhost:8888/aze/paypalConfirm.php?id=10';/*page de confirmation d'achat*/
/* fin déclaration des variables */
?>

<form action="https://sandbox.paypal.com" method="post">

    <input type="hidden" name="cmd" value="_xclick" />
    <input type="hidden" name="business" value="<?php echo $email_paypal ?>" />
    <input type="hidden" name="item_name" value="<?php echo $item_nom ?>" />
    <input type="hidden" name="item_number" value="<?php echo $item_numero ?>" />
    <input type="hidden" name="amount" value="<?php echo $item_prix ?>" />
    <input type="hidden" name="currency_code" value="EUR" />
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="no_shipping" value="0" />
    <input type="hidden" name="lc" value="FR" />
    <input type="hidden" name="notify_url" value="<?php echo $url_confirmation ?>" />
    <input type="hidden" name="cancel_return" value="<?php echo $url_cancel ?>">
    <input type="hidden" name="return" value="<?php echo $url_retour ?>">
    <input align="right" valign="center" type="image" alt="Paiement par Paypal" src=" https://www.paypal.com/fr_FR/i/bnr/horizontal_solution_PP.gif" border="0" name="submit" alt="Paiement sécurisé par paypal" />

</form>