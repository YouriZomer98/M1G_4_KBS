<?php 
include 'header.php'; 
function like_match($pattern, $subject){
    $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
    return (bool) preg_match("/^{$pattern}$/i", $subject);
}
?>
<div class="container">
    <div id="products" class="row">
        <?php
        $sql = "SELECT * FROM stockitems where StockItemName LIKE '%". $_GET['search'] ."%' ";
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
            <div class="item col-lg-4">
                <div class="thumbnail">
                    <img class="card-img-top" src="<?php print($foto); ?>" alt="Card image cap">
                    <div class="card-body">
                        <ul class="list-group list-group-flush text-center">
                            <h6 class="card-title list-group-item"><?php echo $row[$k]['StockItemID'].$row[$k]["StockItemName"]; ?></h6>
                            <h7 class="list-group-item"> Prijs: <?php echo '€'.$row[$k]["RecommendedRetailPrice"].' euro'; ?></h7><hr>
                            <a class="btn btn-success button-style" href="cartAction.php?action=addToCart&StockItemID=<?php echo $row[$k]["StockItemID"]; ?>">In winkelmand</a>
                            <a class="btn btn-info button-style" href="detail.php?action=&StockItemID=<?php echo $row[$k]["StockItemID"]; ?>">Details</a>
                        </ul>
                    </div>
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
</div>
<?php include'footer.php'?>



