<?php include 'header.php';
include 'sidebarItems.php';?>
<div class="main">
<div class="container">
    <div id="products" class="row">
        <?php
        if(isset($_GET['submit'])){
            $sql = "SELECT * FROM stockitems WHERE StockItemID IN (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = 1)";
            $allesarray = dbSelectAll($sql);
            $alles = $allesarray->fetchAll(PDO::FETCH_COLUMN);
            if(isset($_GET['kleur']) && !empty($_GET['kleur'])){
                $kleuren = implode("|", $_GET['kleur']);
                $sql = "SELECT * FROM stockitems WHERE StockItemName RLIKE '$kleuren'";
                $kleurarray = dbSelectAll($sql);
                $kleur = $kleurarray->fetchAll(PDO::FETCH_COLUMN);
            }else{
                $sql = "SELECT * FROM stockitems";
                $kleurarray = dbSelectAll($sql);
                $kleur = $kleurarray->fetchAll(PDO::FETCH_COLUMN);
            }
            if(isset($_GET['maat']) && !empty($_GET['maat'])){
                $maten = implode("', '", $_GET['maat']);
                $sql = "SELECT * FROM stockitems WHERE Size IN ('$maten')";
                $maatarray = dbSelectAll($sql);
                $maat = $maatarray->fetchAll(PDO::FETCH_COLUMN);
            }else{
                $sql = "SELECT * FROM stockitems";
                $maatarray = dbSelectAll($sql);
                $maat = $maatarray->fetchAll(PDO::FETCH_COLUMN);
            }
            if(filter_has_var(INPUT_GET, 'orderby') && filter_input(INPUT_GET, 'orderby', FILTER_SANITIZE_STRING)){
                $orderby = $_GET['orderby'];
            }else{
                $orderby = 'StockItemID';
            }
            $samen = array_intersect($alles, $kleur, $maat);
            $productID = implode("', '", $samen);
            $sql = "SELECT * FROM stockitems WHERE StockItemID IN ('$productID') ORDER BY $orderby";
            $product = dbSelectAll($sql);
        }
        $uniq = array();
        $k = 0;
        while($row = $product->fetchAll(PDO::FETCH_ASSOC)){
            for($k=0;$k<count($row);$k++){
                $name = explode(' ', $row[$k]['StockItemName']);
                $maat = explode(' ', $row[$k]['Size']);
                $array = array_diff($name, $maat);
                $i = 0;
                $j = count($array);
                $id = $row[$k]['StockItemID'];
                $deletedmaat[$id] = array_values(array_intersect($name, $maat));
                $l = 0;
                foreach ($array as $value) {
                    if(like_match('(%)', $value) || like_match('(L%', $value) || like_match('%n)', $value)){
                        $deletedkleur[$id][$l] = $value;
                        $l++;
                        $j--;
                    }elseif($value == ''){
                        $j--;
                    }else{
                        $newarray[$i] = $value;
                        $i++;
                    }
                }
                $newarray2 = array_splice($newarray, 0, $j);
                $newstring = implode(' ', $newarray2);
                $row[$k]['StockItemName'] = $newstring;
                if(!in_array($row[$k]['StockItemName'], $uniq)){
                    $uniq[] = $row[$k]['StockItemName'];

                    if(file_exists("fotos/".$row[$k]['StockItemID'].".jpg")){
                        $foto = "fotos/".$row[$k]['StockItemID'].".jpg";
                    }elseif(file_exists("fotos/".$row[$k]['StockItemID'].".png")){
                        $foto = "fotos/".$row[$k]['StockItemID'].".png";
                    }elseif(file_exists("fotos/".$row[$k]['StockItemID'].".jpeg")){
                        $foto = "fotos/".$row[$k]['StockItemID'].".jpeg";
                    }else{
                        $foto = "https://via.placeholder.com/277x180";
                    }
        ?>
            <div class="item col-lg-4">
                <div class="thumbnail">
                    <img class="card-img-top" src="<?php print($foto); ?>" alt="Card image cap">
                    <div class="card-body">
                        <ul class="list-group list-group-flush text-center">
                            <h6 class="card-title list-group-item"><?php echo $row[$k]["StockItemName"]; ?></h6>
                            <h7 class="list-group-item"> Prijs: <?php echo '€'.$row[$k]["RecommendedRetailPrice"].' euro'; ?></h7><hr>
                            <a class="btn btn-success button-style" href="cartAction.php?action=addToCart&StockItemID=<?php echo $row[$k]["StockItemID"]; ?>">In winkelmand</a>
                            <a class="btn btn-info button-style" href="detail.php?action=&StockItemID=<?php echo $row[$k]["StockItemID"]; ?>">Details</a>
                        </ul>
                    </div>
                </div>
            </div>
            <?php 
                }
            }
        }
        if($k == 0){
            print("<p>Product (en) niet gevonden .....</p>");
        }   
            ?>
    </div>
    </div>
</div>
        <?php
    include 'footer.php';
        ?>
    </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>