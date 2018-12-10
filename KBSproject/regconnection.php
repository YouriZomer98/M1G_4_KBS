<?php
// Variable errors maken
$errors=array();
    
if (isset($_POST['register_btn'])){
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_EMAIL);
    $number = filter_input(INPUT_POST, "number", FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];


    //Errors
    if (empty($name)) {
        array_push($errors, "Naam is verplicht");
    }
    if (empty($email)) {
        array_push($errors, "Email is verplicht");
    }
    if (empty($password) || empty($password2)) {
        array_push($errors, "Wachtwoord is verplicht");
    }
    if ($password != $password2) {
        array_push($errors, "De wachtwoorden komen niet overeen");
    }
    if (strlen($password) > 10 || strlen($password2 > 10 )){
        array_push($errors, "Je wachtwoord is langer dan 10 karakters");
    }
    if (empty($address)){
        array_push($errors, "Adres is verplicht");
    }
    
    //Registreer gebruiker bij 0 errors:
    if (count($errors)==0){
        $password = hash('sha512', $password); //Hash <--
        $password2 = hash('sha512', $password2);

    
    try{
        $con = new PDO ("mysql:host=localhost;dbname=wideworldimporters", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $con->prepare("INSERT INTO users (name, email, address, number, password, password2) VALUES('$name','$email','$address','$number','$password', '$password2')");
        $stmt->execute();
        
    } catch(PDOException $e){
    echo "error".$e->getMessage();
        print_r($errors);
    }
    $con = null;
    header("location: loginregister.php");

}
}
?>

