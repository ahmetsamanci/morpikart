<?php
    @$productID = $_GET["product"];
    $title = "";
    $description = "";
    $categoryName = "";
    $catDescription = "";
    
    if($productID == "" || !is_numeric($productID))
    {
        echo '<script type="text/javascript">window.location="product.php";</script>';
    }
    else
    {
        $query = $db->query("SELECT * FROM products WHERE id = '{$productID}'")->fetch(PDO::FETCH_ASSOC);
        if ( $query )
        {
            $title_tr = $query["product_title"];
            $title_en = $query["product_title_en"];
            $description_tr = $query["product_description"];
            $description_en = $query["product_description_en"];
            $stock = $query["product_stok"];
            $category = $query["product_category"];
            $view = $query["product_view"];
            $price = $query["product_price"];
            $discount = $query["product_discount"];
            $image = $query["product_image"];
        }
        
        $images = $db->query("SELECT * FROM product_images WHERE product_id = '{$productID}'")->fetch(PDO::FETCH_ASSOC);
        if ( $images )
        {
            $image_uclu = $images["uclu"];
            $image_cercevetek = $images["cercevetek"];
            $image_besli = $images["besli"];
            $image_genisuclu = $images["genisuclu"];
            $image_uclukare = $images["uclukare"];
            $image_tekdikey = $images["tekdikey"];
            $image_altilikare = $images["altilikare"];
            $image_siralibesli = $images["siralibesli"];
            $image_sekizli = $images["sekizli"];
            $image_ikili = $images["ikikare"];
        }
        
        /* Ürün Fiyatı */
        $query = $db->query("SELECT * FROM chart WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
        if ( $query ){
            $price= $query['chart_total'];
        }
        
    }
    
    $catQuery = $db->query("SELECT * FROM categories WHERE id = '{$category}' ORDER BY id DESC Limit 1")->fetch(PDO::FETCH_ASSOC);
    if ( $catQuery )
    {
         $category_tr = $catQuery["categori_title"];
         $category_en = $catQuery["categori_title_en"];
         $catdesc_tr = $catQuery["categori_description"];
         $catdesc_en = $catQuery["categori_description_en"];
    }
    
    if($_SESSION["dil"] != "en")
    {
        $title = $title_tr;
        $description = $description_tr;
        $categoryName = $category_tr;
        $catDescription = $catdesc_tr;
    }
    else
    {
        $title = $title_en;
        $description = $description_en;
        $categoryName = $category_en;
        $catDescription = $catdesc_en;
    }
    
    // Görüntülenme Artışı 
    
    $view = $view+1;
    
    $query = $db->prepare("UPDATE products SET
    product_view = :view
    WHERE id = :id");
    $update = $query->execute(array(
         "view" =>$view,
         "id" => $productID
    ));
    
    
?>