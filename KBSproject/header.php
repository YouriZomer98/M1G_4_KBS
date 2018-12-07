<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
             body {
                padding-top: 50px;
            }
            .button-style
            {
                border-radius: 0 !important;
            }

            .footer {
              /*              width: 100%;
              height: 60px;  Set the fixed height of the footer here */
              line-height: 60px; /* Vertically center the text there */
              background-color: #343a40;
              font-size: 17px;
              color:white;
            }
            .container{
                padding: 50px;}
            .cart-link{
                width: 100%;
                text-align: right;
                display: block;
                font-size: 22px;}
            .thumbnail {
                border: 1px solid rgba(0,0,0,.125);
            }
            .item{
                padding: 20px 0;
            }

        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <a class="navbar-brand" href="index3.php"><img src="WWI.png" width="160" height="48" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="home.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index3.php">PRODUCTEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="loginregister.php">INLOGGEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="viewCart.php">WINKELWAGEN</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CATEGORIE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Items.php?submit=">Novelty Items</a>
                        <a class="dropdown-item" href="Clothing.php?submit=">Clothing</a>
                        <a class="dropdown-item" href="Mugs.php?submit=">Mugs</a>
                        <a class="dropdown-item" href="T.php?submit=">T-shirts</a>
                        <a class="dropdown-item" href="Airline.php?submit=">Airline Novelties</a>
                        <a class="dropdown-item" href="Computing.php?submit=">Computing Novelties</a>
                        <a class="dropdown-item" href="USB.php?submit=">USB Novelties</a>
                        <a class="dropdown-item" href="Furry.php?submit=">Furry Footwear</a>
                        <a class="dropdown-item" href="Toys.php?submit=">Toys</a>
                        <a class="dropdown-item" href="Pack.php?submit=">Packaging Materials</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" name="search" method="get" action="searchresults.php">
                <input class="form-control mr-sm-2" name="search" placeholder="search"/>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" action="searchresults.php" value="search">Search</button>
            </form>
        </div>
    </nav>
