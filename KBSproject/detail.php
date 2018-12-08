<?php
include 'header.php';
?>

        <?php
$id = $_GET['StockItemID']; 
        $sql = "SELECT * FROM stockitems WHERE StockItemID = $id";
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
<div class="container">
    <h1><?php echo $row[$k]["StockItemName"]?></h1>&nbsp;
    <img src="<?php print($foto); ?>" alt="Card image cap" height="300" width="300">
<div class="prijs">
    <p class="lead"><?php echo '€'.$row[$k]["RecommendedRetailPrice"].' Euro'; ?></p>
    </div>
<div class="beschrijving">
    <p class="desc"><?php echo $row[$k]["MarketingComments"]?></p>
    <a class="btn btn-success" href="cartAction.php?action=addToCart&StockItemID=<?php echo $row[$k]["StockItemID"]; ?>">In winkelmand</a></div>
    </div> 

            <?php if(!empty($deletedmaat[$id])){
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
include 'footer.php'; ?>