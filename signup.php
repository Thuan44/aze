<?php
include_once 'admin/pdo.php';
include_once 'admin/functions.php';
?>

<?php
$nameError = $emailError = $passwordError = "";
$isSuccess = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') { // if the request method used is POST

    // Sign up
    $name = verifyInput($_POST['name']);
    $email = verifyInput($_POST['email']);
    $password = verifyInput($_POST['password']);
    $isSuccess =  true;

    if (empty($name)) {
        $nameError = "J'ai besoin de connaître votre nom !";
        $isSuccess = false;
    }
    if (!isEmail($email)) { // If $email is not valid
        $emailError = "Êtes-vous sûr de l'email ?";
        $isSuccess = false;
    }
    if ($isSuccess) {
        signUp($name, $email, $password);
    }

    // Mailing
    if ($isSuccess) {
        $fromEmail = 'aze@creation.com';
        $toEmail = $email;
        $subjectName = 'Création de compte AZE';

        $to = $toEmail;
        $subject = $subjectName;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ' . $fromEmail . '<' . $fromEmail . '>' . "\r\n" . 'Reply-To: ' . $fromEmail . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $message =
            '<!doctype html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Document</title>
                </head>

                <body>
                    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">' . "Votre message" . '</span>
                    <div class="container">
                            ' . "Félicitations ! Nous vous confirmons que vous compte AZE a bien été créé. Vous pouvez désormais effectuer vos achats en cliquant sur le lien ci-dessous" . '<br/>
                                <a href="https://tuan.webarinfonantes.com/login.php">Lien vers la boutique</a> <br/><br/>
                                À très vite !<br/><br/>
                            ' . "Topaze" . '
                    </div>
                </body>

            </html>';
        $result = @mail($to, $subject, $message, $headers);

        echo '<script>alert("Compté crée avec succès ! Vous pouvez désormais vous connecter avec vos identifiants.")</script>';
        echo '<script>window.location.href="login.php";</script>';
    }
}

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

<body style="background-color: #fff">

    <h1 class="rounded border p-2 m-4 text-center text-white bg-primary text-uppercase">AZE CRÉATION</h1>

    <div class="heading">
        <h2 class="text-center mb-3 mt-5">Inscription</h2>
    </div>

    <div class="container shadow-sm rounded" style="max-width: 600px;">

        <div class="row justify-content-center border rounded p-5 mb-5">
            <div class="col-lg-10 col-lg-offset-1">
                <form action="#" id="signup-form" method="POST" role="form">

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-12 mb-3">
                            <label for="name">Votre nom*</label>
                            <input type="text" id="name" name="name" class="form-control" value="" aria-label="rgpd" title="Name" aria-required="true">
                            <p class="comments text-danger"><?php echo $nameError; ?></p>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12 mb-3">
                            <label for="email">Email*</label>
                            <input type="text" id="email" name="email" class="form-control" value="" aria-label="email" title="Email">
                            <p class="comments text-danger"><?php echo $emailError; ?></p>
                        </div>

                        <!-- Password-->
                        <div class="col-md-12 mb-3">
                            <label for="password">Choisissez un mot de passe*</label>
                            <input type="password" id="password" name="password" class="form-control" value="" aria-label="password" title="Password">
                            <p class="comments"><?php echo $passwordError; ?></p>
                        </div>

                        <!-- Required info -->
                        <div class="col-md-12 mb-3">
                            <p class="font-italic">*Ces champs sont requis</p>
                        </div>

                        <!-- RGPD -->
                        <div class="col-md-12 mb-3 d-flex align-items-start">
                            <input type="checkbox" id="rgpd" class="mr-2" required aria-label="rgpd" title="RGPD">
                            <small><label for="rgpd">J'ai lu la <a href="privacyPolicy.php">charte de confidentialité</a> et en accepte les termes</label></small>
                        </div>

                        <!-- Submit -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary p-2 w-100" value="Créer compte" name="create_account">
                        </div>


                    </div>

                </form>

                <a href="login.php" class="text-center d-block" style="color: #979797"><small>Retour à la connexion</small></a>

            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>