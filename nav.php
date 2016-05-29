<?php
    $ArrayNavHaef = Array(
        "NULL",
            "MemberInquire.php",
            "MemberNew.php",
        "NULL",
            "StockInquire.php",
            "StockNew.php",
        "NULL",
            "RentalInquire.php",
            "RentalReturn.php",
            "RentalLend.php",
        "NULL",
            "會員統計",
            "庫存統計",
            "租借統計",      
        "NULL",
            "更改密碼"
    );
    $ArrayGlyphicon  = Array(
        "NULL",
            "glyphicon glyphicon-user",
            "glyphicon glyphicon-plus",
        "NULL",
            "glyphicon glyphicon-hdd",
            "glyphicon glyphicon-plus",
        "NULL",
            "glyphicon glyphicon-sort",
            "glyphicon glyphicon-arrow-down",
            "glyphicon glyphicon-arrow-up",
        "NULL",
            "會員統計",
            "庫存統計",
            "租借統計",
        "NULL",
            "更改密碼"
    );  
    $ArrayNavName = Array(
        "會員管理",
            "會員查詢",
            "會員新增",
        "庫存管理",
            "庫存查詢",
            "庫存新增",
        "租借管理",
            "租借查詢",
            "借出",
            "歸還",
        "統計管理", 
            "會員統計",
            "庫存統計",
            "租借統計",
        "系統設定",
            "更改密碼"
    );
    $ArrayNavType = Array(
        "nav-header",
            "nav-content",
            "nav-content",
        "nav-header",
            "nav-content",
            "nav-content",
        "nav-header",
            "nav-content",
            "nav-content",
            "nav-content"
    //     "nav-header", 
    //         "nav-content",
    //         "nav-content",
    //         "nav-content",
    //     "nav-header",
    //         "nav-content"
    );
    $ArraySiez = count($ArrayNavType);
    for($i=0;$i<=($ArraySiez-1);$i++){
        if($ArrayNavType[$i] == 'nav-header'){
            echo "<li class='nav-header'>". $ArrayNavName[$i] ."</li>";
        }elseif ($ArrayNavType[$i] == 'nav-content') {
            echo  "
            <li>
                <a class='ajax-link' href='" . $ArrayNavHaef[$i] . "'>
                    <i class='" . $ArrayGlyphicon[$i] . "'></i>
                    <span>" . $ArrayNavName[$i] . "</span>
                </a>
            </li>";
        }
    }
?>