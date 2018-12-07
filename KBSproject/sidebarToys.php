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
        margin-bottom: 45px;
        border-right: solid #343a40 1px;
        /*border-right: 1px black solid;*/
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
    <form action="Toys.php" method="get">
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
        <input type="checkbox" name="kleur[]" value="Black"> <span style="color: black;">&#11044;</span> Zwart <br>
        <input type="checkbox" name="kleur[]" value="Red"> <span style="color: red;">&#11044;</span> Rood <br>
        <input type="checkbox" name="kleur[]" value="Blue"> <span style="color: blue;">&#11044;</span> Blauw <br>
        <input type="checkbox" name="kleur[]" value="Pink"> <span style="color: hotpink;">&#11044;</span> Roze <br>
        <input type="checkbox" name="kleur[]" value="Yellow"> <span style="color: yellow;">&#11044;</span> Geel <br><br>
        <h3>Maat</h3>
        <input type="checkbox" name="maat[]" value="1/50 scale"> 1/50 Scale <br>
        <input type="checkbox" name="maat[]" value="1/12 scale"> 1/12 Scale <br><br>
        <h3>Soort</h3>
        <input type="checkbox" name="kleur[]" value="male"> Man <br>
        <input type="checkbox" name="kleur[]" value="female"> Vrouw <br>
        <input type="checkbox" name="kleur[]" value="variety"> Gemengd <br><br>
        <h3>Merk</h3>
        <input type="checkbox" name="merk[]" value="Northwind"> Northwind <br><br>
        <!--<p><input class="btn btn-info" type="submit" name="submit" value="Toepassen"></p>-->
    </form>
    <?php
    
    ?>
</div>
