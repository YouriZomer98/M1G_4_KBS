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
    <form action="Pack.php" method="get">
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
        <input type="checkbox" name="kleur[]" value="Black"> <span style="color: black;">&#11044;</span> Zwart <br>
        <input type="checkbox" name="kleur[]" value="White"> <span style="color: whitesmoke;">&#11044;</span> Wit <br>
        <input type="checkbox" name="kleur[]" value="Red"> <span style="color: red;">&#11044;</span> Rood <br>
        <input type="checkbox" name="kleur[]" value="Blue">  <span style="color: blue;">&#11044;</span> Blauw <br>
        <input type="checkbox" name="kleur[]" value="Yellow"> <span style="color: yellow;">&#11044;</span> Geel <br>
        <input type="checkbox" name="kleur[]" value="Brown"> <span style="color: saddlebrown;">&#11044;</span> Bruin <br><br>
        <h3>Maat</h3>
        <input type="checkbox" name="maat[]" value="5mm"> 5mm <br>
        <input type="checkbox" name="maat[]" value="9mm"> 9mm <br>
        <input type="checkbox" name="maat[]" value="18mm"> 18mm <br>
        <input type="checkbox" name="maat[]" value="1.5m"> 1.5m <br>
        <input type="checkbox" name="maat[]" value="10m"> 10m <br>
        <input type="checkbox" name="maat[]" value="20m"> 20m <br>
        <input type="checkbox" name="maat[]" value="50m"> 50m <br>
        <input type="checkbox" name="maat[]" value="325m"> 325m <br><br>
        <input type="checkbox" name="maat[]" value="48mmx75m"> 48mmx75m <br>
        <input type="checkbox" name="maat[]" value="48mmx100m"> 48mmx100m <br><br>
        <input type="checkbox" name="maat[]" value="100L"> 100L <br>
        <input type="checkbox" name="maat[]" value="200L"> 200L <br>
        <input type="checkbox" name="maat[]" value="300L"> 300L <br>
        <input type="checkbox" name="maat[]" value="400L"> 400L <br>
        <br>
        <!--<p><input class="btn btn-info" type="submit" name="submit" value="Toepassen"></p>-->
    </form>
    <?php
    
    ?>
</div>
