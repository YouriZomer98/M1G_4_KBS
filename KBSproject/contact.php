<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><img src="WWI.png" width="160" height="48" class="d-inline-block align-top" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="home.php">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">PRODUCTEN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../loginregister.php">INLOGGEN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="viewCart.php">WINKELWAGEN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="contact.php">CONTACT</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" name="search" method="get" action="searchresults.php">
            <input class="form-control mr-sm-2" name="search" placeholder="zoek" >
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" action="searchresults.php" value="search">Zoeken</button>
        </form>
    </div>
</nav>


<?php
$valid = true;
$errors = array();

$contact = array(
    'name' => null,
    'email' => null,
    'onderwerp' => null,
    'message' => null
);

// Check if the form has been posted
if (isset($_POST['name'], $_POST['email'], $_POST['onderwerp'], $_POST['message'])) {
    $contact = filter_input_array(INPUT_POST, array(
        'name'   => FILTER_SANITIZE_STRING,
        'email'   => FILTER_SANITIZE_STRING,
        'onderwerp'   => FILTER_SANITIZE_STRING,
        'message'   => FILTER_SANITIZE_STRING,
    ), true);
    if (empty($contact['name'])) {
        $valid = false;
        $errors['name'] = "- Naam is verplicht!";
    }
    if (empty($contact['onderwerp'])) {
        $valid = false;
        $errors['onderwerp'] = "- Onderwerp is verplicht!";
    }
    if (empty($contact['email'])) {
        $valid = false;
        $errors['email'] = "- E-mailadres is verplicht!";
    } elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $errors['email'] = "- Voer een geldige e-mailadres in!";
    }
    if (empty($contact['message'])) {
        $valid = false;
        $errors['message'] = "- Bericht is verplicht!";
    }
    if ($valid) {
        // The email address the email will be sent to
        $to = "info@blackeagle75.nl";
        // The email subject
        $subject = "Contact formuliergegevens";
        // Set the from and reply-to address for the email
        $headers = "From: " . $contact['email'] . "\r\n"
            . "Reply-To: " . $contact['email'] . "\r\n"
            . "X-Mailer: PHP/" . phpversion();
        // Build the body of the email
        $mailbody = "Het contactformulier is ingevuld.\n\n"
            . "Naam: " . $contact['name'] . "\n"
            . "Email: " . $contact['email'] . "\n"
            . "Onderwerp: " . $contact['onderwerp'] . "\n"
            . "Bericht: " . $contact['message'];
        // Send the email
        mail($to, $subject, $mailbody, $headers);
        // Go to the thank you page
        header("location: bedanktpagina.php");
        exit;
    }
}

?>
<link rel="stylesheet" type="text/css" href="css/layout.css">
<style>
    .errors
    {
        font-family: sans-serif;
        color: #E70000;
        font-size: 16px;
        line-height: 19px;
    }
    .contact-block
    {
        padding-top: 100px;
    }
</style>
<div class="col-md-12 contact-block">
    <div class="container">
        <section>
            <div class="row">
                <div class="form">
                    <div data-edit-type="heading" class="vbi-row-edit">
                        <h4 class="contact-form-title text-center">Contact</h4>
                        <p>Heb je een vraag, opmerking of probleem? Neem dan contact met ons op via het formulier hieronder:</P>
                    </div>
                    <form name="contactform" action="contact.php" method="post" accept-charset="utf-8">
                        <fieldset>
                            <?php if (!$valid): ?>
                                <div class="errors mb-2">
                                    <?php foreach($errors as $message):?>
                                        <div><?php echo htmlspecialchars($message);?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="row ">
                                <div class="col-md-6">
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Uw naam" value="<?php echo htmlspecialchars($contact['name']);?>">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input id="email" type="text" name="email" class="form-control" placeholder="Email Adres" value="<?php echo htmlspecialchars($contact['email']);?>">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input id="onderwerp" class="form-control" name="onderwerp" placeholder="Onderwerp" value="<?php echo htmlspecialchars($contact['onderwerp']);?>">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <textarea id="message" class="form-control" name="message" placeholder="Bericht" cols="40" rows="8"><?php echo htmlspecialchars($contact['message']);?></textarea>
                                </div>
                                <div class="input-group-btn col-md-12 text-center">
                                    <button href="" type="submit" name="submit" class="btn btn-primary btn-form btn-t1 color-btn">Berich versturen</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


<?php include 'footer.php'; ?>


















