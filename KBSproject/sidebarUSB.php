<style>

    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
        padding-top: 45px;
        margin-left: 20px;
        margin-top: 45px;
    }
    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 1rem;
        color: white;
        display: block;
    }
    .sidenav a:hover {
        color: #f1f1f1;
    }
    .main {
        margin-left: 160px; /* Same as the width of the sidenav */
        padding: 0px 10px;
    }
</style>
<?php

?>
<div class="sidenav">
    <form action="USB.php" method="get">
        <p><input class="btn btn-info" type="submit" name="submit" value="Toepassen"></p>
        <select name="orderby">
            <option value="StockItemID">Standaard</option>
            <option value="RecommendedRetailPrice DESC">Prijs hoog/laag</option>
            <option value="RecommendedRetailPrice">Prijs laag/hoog</option>
            <option value="StockItemName">A-Z</option>
            <option value="StockItemName DESC">Z-A</option>
        </select>
        <br><br>
        <h3>Kleur</h3>
        <input type="checkbox" name="kleur[]" value="Green"> <span style="color: green;">&#11044;</span> Groen <br>
        <input type="checkbox" name="kleur[]" value="Gray"> <span style="color: grey;">&#11044;</span> Grijs <br><br>
    </form>
    <?php
    
    ?>
</div>
