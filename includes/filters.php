<?php
    
    // Seçimler
    
    $priceranks = array("50 TL", "50 TL - 100 TL", "100 TL - 150 TL", "150 TL - 200 TL", "200+ TL");
    $ranks = array("Akıllı Sıralama","Popüler Sıralama","Son Eklenenler");
    $ranksEn = array("Smart Ranking","Populer Ranking","Last Added");
    
    // Kontroller
    
    if(isset ($_POST["sortrank"]))
    {
        $_SESSION["filterRank"] = $_POST["sortrank"];
    }
    
    if(isset ($_POST["sortprice"]))
    {
        $_SESSION["filterPrice"] = $_POST["sortprice"];
    }
    
    @$filterCat = $_GET["category"];
    if($filterCat != "")
    {
        if(is_numeric($filterCat))
        {
            if($filterCat != "0")
            {
                $query = $db->query("SELECT * FROM categories WHERE id = '{$filterCat}'")->fetch(PDO::FETCH_ASSOC);
                if ( $query ){
                    $_SESSION["filterCategory"] = $filterCat;
                    $_SESSION["filterCatTR"] = $query["categori_title"];
                    $_SESSION["filterCatEN"] = $query["categori_title_en"];
                    echo '<script>window.location = "'.$pageUrl.'"</script>';
                }
                else
                {
                    echo '<script>window.location = "'.$pageUrl.'"</script>';
                }
            }
            else
            {
                $_SESSION["filterCategory"] = null;
                echo '<script>window.location = "'.$pageUrl.'"</script>';
            }
        }
        else
        {
            echo '<script>window.location = "'.$pageUrl.'"</script>';
        }
    }
    
    if(isset ($_POST["clearFilters"]))
    {
        $_SESSION["filterRank"] = null;
        $_SESSION["filterCategory"] = null;
        $_SESSION["filterPrice"] = null;
        $_SESSION["filterCatTR"] = null;
        $_SESSION["filterCatEN"] = null;
        
        echo '<script>window.location = "'.$pageUrl.'"</script>';
    }
    
    // Sorgu
    
    $sorgu = "SELECT * FROM products";
    $sorguArray = array();
    $urunLimiti = "20";
    $whereStatu = 0;
    
    if($_SESSION["filterRank"] == "" && $_SESSION["filterCategory"] == "" && $_SESSION["filterPrice"] == "")
    {
         $sorgu = $sorgu. " ORDER BY RAND() limit ".$urunLimiti;
    }
    
    
    
    if($_SESSION["filterPrice"] != "")
    {
        $whereStatu = 1;
        switch ($_SESSION["filterPrice"])
        {
            case 1: $pVal1 = "0"; $pVal2 = "50"; break;
            case 2: $pVal1 = "50"; $pVal2 = "100"; break;
            case 3: $pVal1 = "100"; $pVal2 = "150"; break;
            case 4: $pVal1 = "150"; $pVal2 = "200"; break;
            case 5: $pVal1 = "200"; $pVal2 = "1000"; break;
        }
        array_push($sorguArray," product_price BETWEEN ".$pVal1." AND ".$pVal2. " ");
    }
    
    if($_SESSION["filterCategory"] != "")
    {
        $whereStatu = 1;
        array_push($sorguArray," product_category = ".$_SESSION["filterCategory"]." ");
    }
    
    if($_SESSION["filterRank"] != "")
    {
        if($_SESSION["filterRank"] == "1")
        {
            // Akıllı Sıralama
            
            array_push($sorguArray, " ORDER by RAND() ");
        }
        elseif($_SESSION["filterRank"] == "2")
        {
            // Popüler Sıralama
            
            array_push($sorguArray, " ORDER by product_view DESC ");
        }
        elseif($_SESSION["filterRank"] == "3")
        {
            // Son Eklenenler
            
            array_push($sorguArray, " ORDER by id DESC ");
        }
    }
    
    $sorguSay = count($sorguArray) - 1;
    if($whereStatu == 1)
    {
        $sorgu = $sorgu." WHERE ";
    }
   
    for($sayac=0;$sayac<=$sorguSay; $sayac++)
    {
        if($sorguSay == 2 && $sayac == 1)
        {
            $sorgu = $sorgu.' and '.$sorguArray[$sayac];
        }
        else
        {
            $sorgu = $sorgu.' '.$sorguArray[$sayac]; 
        }
        
        if($sorguSay == 1 && $sayac == 0 && $_SESSION["filterPrice"] != "" && $_SESSION["filterCategory"])
        {
            $sorgu = $sorgu. ' and ';
        }
    }
    

    
    
    // Sorgu Birleştirme
    
    
    
    /*
    if($sorguSay != 0)
    {
        if($whereStatu == 1)
        {
            $sorgu = $sorgu. " WHERE ";
        }
            
        
        for($sayac = 0; $sayac<=$sorguSay; $sayac++)
        {
            if($_SESSION["filterCategory"] != "" && $_SESSION["filterPrice"] != "" && $sayac == 1)
            {
                $sorgu = $sorgu. " and ";
            }
            
            $kosul = trim($sorguArray[$sayac]);
            $sorgu = $sorgu." ".$kosul;
        }
        
        //$sorgu = $sorgu. " LIMIT ".$urunLimiti;
        
    }   */ 
    
?>
<!--
<div
class="sil"
style="
position: fixed;
left: 0px;
top: 20%;
width: 100%;
padding: 50px 0px;
background: rgba(0,0,0,0.5);
z-index: 999;
text-align: center;
vertical-align: middle;
color: #fff;
font-size: 20px;">
<?=$sorgu?>
<br/>
Bu sorgu da <?=$sorguSay?> koşul kullanıldı.
</div> -->