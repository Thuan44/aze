<?php
$sellerEmail = 'sb-43li4c5211489@business.example.com';/*email associé au compte paypal du vendeur*/
$cartId = '04AAA'; /*Numéro du produit en vente*/
$totalToPay   = '40';    /*prix du produit*/
$item_nom    = 'nom de l\'item'; /*Nom du produit*/
$url_retour = 'http://localhost:8888/aze/paypalThanks.php?id=10';/*page de remerciement à créer*/
$url_cancel = 'http://localhost:8888/aze/paypalCancel.php?id=10'; /*page d'annulation d'achat*/
$url_confirmation = 'http://localhost:8888/aze/paypalConfirm.php?id=10';/*page de confirmation d'achat*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZE</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<div class="card border-secondary mb-3 card-payment" style="max-width: 20rem;">

    <div class="card-header">Finalisation de votre commande</div>

    <div class="d-flex flex-column justify-content-center align-items-center">

        <div class="card-body">
            <h4 class="card-title">Votre méthode de paiement</h4>
            <small class="card-text">Cher client, nous vous informons que de nouveaux moyens de paiement serons bientôt disponibles. Merci pour votre patience !</small>
        </div>

        <form action="https://sandbox.paypal.com" method="POST">

            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="business" value="<?php echo $sellerEmail ?>" />
            <input type="hidden" name="item_name" value="<?php echo $item_nom ?>" />
            <input type="hidden" name="item_number" value="<?php echo $cartId ?>" />
            <input type="hidden" name="amount" value="<?php echo $totalToPay ?>" />
            <input type="hidden" name="currency_code" value="EUR" />
            <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="no_shipping" value="0" />
            <input type="hidden" name="lc" value="FR" />
            <input type="hidden" name="notify_url" value="<?php echo $url_confirmation ?>" />
            <input type="hidden" name="cancel_return" value="<?php echo $url_cancel ?>">
            <input type="hidden" name="return" value="<?php echo $url_retour ?>">
            <input align="right" valign="center" type="image" alt="Paiement par Paypal" src=" https://www.paypal.com/fr_FR/i/bnr/horizontal_solution_PP.gif" border="0" name="submit" alt="Paiement sécurisé par paypal" />

        </form>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>