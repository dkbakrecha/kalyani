<?php
//prd($prdData);
$siteDescription = "Samrudh Exports, handicraft collections in Jodhpur by Gaurav Bhandari";
$defaultkeyWords = 'Samrudh Exports, Handicraft in Jodhpur,Jodhpur,Gaurav Bhandari, Furniture , Furniture in Jodhpur';
$cateKeywords = "";

if (isset($prdData) && !empty($prdData)) {
    foreach ($prdData as $prdKeywords) {
        $cateKeywords .= $prdKeywords['Product']['keywords'] . " , ";
    }
    $defaultkeyWords = $cateKeywords;
}

if (isset($singleProduct[0]['Product']['keywords']) && !empty($singleProduct[0]['Product']['keywords'])) {
    $defaultkeyWords = $singleProduct[0]['Product']['keywords'];
}
?>

<meta charset="UTF-8">
<meta name="description" content="<?php echo $siteDescription ?>">
<meta name="keywords" content="<?php echo $defaultkeyWords ?>">