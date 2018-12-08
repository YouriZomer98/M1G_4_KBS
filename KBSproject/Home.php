<?php 
include 'header.php'; 
//include 'connect.php'; 

?>

<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="3"></li>
        <li data-target="#demo" data-slide-to="4"></li>
        <li data-target="#demo" data-slide-to="5"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img  src="wwihome.jpg" alt="WWI.png" width="100%" height="500">
            <div class="carousel-caption">
                <h3>Wij zijn WideWorldImporters</h3>
                <p></p>
            </div>
        </div>
        <?php
        $sql = "SELECT s.*, o.StockItemID, count(*) as populair
                            from orderlines o JOIN stockitems s ON o.StockItemID = s.StockItemID
                            group by o.StockItemID
                            order by populair desc
                            LIMIT 5;";
        $product = dbSelectAll($sql);
        $uniq = array();
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
        <div class="carousel-item">
            <img src="<?php print($foto); ?>" alt="Card image cap" width="100%" height="500">
            <div class="carousel-caption">
                <h3><?php echo $row[$k]["StockItemName"]; ?></h3>
                <p>Prijs: <?php echo '€'.$row[$k]["RecommendedRetailPrice"].' euro'; ?></p>
            </div>
        </div>
        <?php           
        if(!empty($deletedmaat[$id])){
                        $maatje = implode(' ', $deletedmaat[$id]);
//                        print(" ".$maatje);
                    }
                    $replace = array("(", ")");
                    if(!empty($deletedkleur[$id])){
                        $kleur = str_replace($replace, '', implode(' ', $deletedkleur[$id]));
//                        print(" ".$kleur);
                    }
                    
                }
            }
        }
             ?>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<div class="container marketing">

    <div class="row">
        <h1>Dit zijn de 5 populairste producten bij WWI</h1>
        <?php
        $sql = "SELECT s.*, o.StockItemID, count(*) as populair
                            from orderlines o JOIN stockitems s ON o.StockItemID = s.StockItemID
                            group by o.StockItemID
                            order by populair desc
                            LIMIT 5;";
        $product = dbSelectAll($sql);
        $uniq = array();
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
        <div class="col-lg-4 center">
            <img class="rounded-circle" src="<?php print($foto); ?>" alt="Card image cap" width="100%" height="300">
            <h2><?php echo $row[$k]["StockItemName"]; ?></h2>
            <p><?php echo $row[$k]["MarketingComments"];?></p>
            <p> <a class="btn btn-success button-style" href="cartAction.php?action=addToCart&StockItemID=<?php echo $row[$k]["StockItemID"]; ?>">In winkelmand</a></p>
            <p><a class="btn btn-info button-style" href="detail.php?action=&StockItemID=<?php echo $row[$k]["StockItemID"]; ?>">Details</a></p>
        </div>
        <?php           
        if(!empty($deletedmaat[$id])){
                        $maatje = implode(' ', $deletedmaat[$id]);
//                        print(" ".$maatje);
                    }
                    $replace = array("(", ")");
                    if(!empty($deletedkleur[$id])){
                        $kleur = str_replace($replace, '', implode(' ', $deletedkleur[$id]));
//                        print(" ".$kleur);
                    }
                    
                }
            }
        }
             ?>
    </div>
</div>
    <br>
<?php include 'footer.php' ?>

