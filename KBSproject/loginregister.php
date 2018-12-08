<?php
//include the login script
include("logconnection.php");
include("regconnection.php");
include ("header.php");

?>
        <title>Login wideworldimporters</title>


<div class="container">
        <div class="row">
        <div class="col-md-6 box1">
            <h4>Inloggen</h4>
            <p>Bestaande klanten</p>
            <form method ="post" name="login">
            <div class="input-group mb-3">
            <div class="input-group-prepend"><span class="input-group-text" id="email">Email</span></div>
            <input type="text" class="form-control" aria-label="email" aria-describedby="email" name="email" placeholder="E-mailadres">
            </div>

            <div class="input-group mb-3">
             <div class="input-group-prepend">
                <span class="input-group-text" id="password">Wachtwoord</span></div>
                <input class="form-control" type="password" aria-label="password" aria-describedby="password" name="userPassword" placeholder="Wachtwoord">
            </div>
            <button class="btn btn-success" type="submit" name="login_btn">Inloggen</button>
            </form>
        </div>

        <div class="line"></div>

        <div class="col-md-6 box2">
            <form method="post" name="register">
            <h4>Nieuw bij wwi.nl?</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" for="name">Volledige naam*</span>
                    </div>
                    <input type="text" name="name" class="form-control textInput" placeholder="Naam en achternaam">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="email">Email*</span>
                    </div>
                    <input type="email" name="email" class="form-control textInput" placeholder="Email">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="address">Adres*</span>
                    </div>
                    <input type="text" name="address" class="form-control textInput" placeholder="Adres">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="number">Telefoonnummer</span>
                    </div>
                    <input type="text" name="number" class="form-control textInput" placeholder="Nummer">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="password">Wachtwoord*</span>
                    </div>
                    <input type="password" name="password" class="form-control textInput" placeholder="Wachtwoord">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="password2">Wachtwoord*</span>
                    </div>
                        <input type="password" name="password2" class="form-control textInput" placeholder="Herhaal wachtwoord">
                </div>
                <p>Alle velden zijn verplicht met *</p>
                <?php include('errors.php');?>
                 <div class="input-group">
                    <button type="submit" class="btn btn-success" name="register_btn" id="register_btn">Maak een account aan</button>
                </div>
            </form>
        </div>
    </div>
 </div>
<?php include ("footer.php");?>