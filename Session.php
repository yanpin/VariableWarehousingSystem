<?php
    session_start();
    $ArrayTitle = Array(
        // "會員管理",
            "首頁",
            "會員查詢",
            "會員新增",
        // "庫存管理",
            "庫存查詢",
            "庫存新增",
        // "租借管理",
            "租借查詢",
            "借出",
            "歸還",
        // "統計管理", 
            "會員統計",
            "庫存統計",
            "租借統計",
        // "系統設定",
            "更改密碼"
    );
    $ArrayUserData =Array(
        "ID" =>         @$_SESSION["ID"],
        "Name" =>       @$_SESSION["Name"],
        "Password" =>   @$_SESSION["Password"]
    );
    if(@$ArrayUserData['ID'] == NULL){
        echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
        //echo "<script>alert('".$_SESSION["ID"]."');</script>";
    }
?>