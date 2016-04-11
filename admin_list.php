<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>創新育成中心設備管理系統v0.1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-inner">

            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="admin_pwd.php">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.php?tj=out">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <a href="#"><img src="img/logo.png" width="100%"></a>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked"></div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">系統設定</li>
                            <li><a class="ajax-link" href="admin_pwd.php"><i class="glyphicon glyphicon-lock"></i><span> 更改密碼</span></a></li>
                        <li class="nav-header">庫存管理</li>
                            <li><a class="ajax-link" href="admin_list.php"><i class="glyphicon glyphicon-list-alt"></i><span> 庫存管理</span></a></li>
                            <li><a class="ajax-link" href="admin_add.php"><i class="glyphicon glyphicon-plus"></i><span> 庫存新增</span></a></li>
                        <li class="nav-header">統計管理</li>
                            <li><a class="ajax-link" href="admin_select.php"><i class="glyphicon glyphicon-eye-open"></i><span> 庫存查詢</span></a></li>
                            <li><a class="ajax-link" href="admin_count.php"><i class="glyphicon glyphicon-globe"></i><span> 庫存統計</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
            </div>
        </noscript>

    <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
    <div>
        <ul class="breadcrumb"></ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> 庫存管理系統 - 庫存管理</h2>

        <div class="box-icon">
            <!--<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>-->
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>名稱</th>
        <th>序號</th>
        <th>唯一碼</th>
        <th>財產標籤</th>
        <th>狀態</th>
        <th>分類</th>
        <th>數量</th>
        <th>位置</th>
        <th>RFID</th>
        <th>備註</th>
        <th>操作</th>
    </tr>
    </thead>
        <tbody>
            <?php
                $sql="select * from instock_table";
                $rs=mysql_query($sql);
                while($rows=mysql_fetch_assoc($rs))
                {
            ?>
            <tr align="center">
                <td class="td_bg" width="20%"><?php echo $rows["name"]?></td>
                <td class="td_bg" width="10%"><?php echo $rows["uid"]?></td>
                <td class="td_bg" width="6%"><?php echo $rows["onlyid"]?></td>
                <td class="td_bg" width="14%"><?php echo $rows["property"]?></td>
                <td class="td_bg" width="6%"><?php echo $rows["status"]?></td>
                <td class="td_bg" width="7%"><?php echo $rows["type"]?></td>
                <td class="td_bg" width="5%"><?php echo $rows["total"]?></td>
                <td class="td_bg" width="6%"><?php echo $rows["position"]?></td>
                <td class="td_bg" width="8%"><?php echo $rows["rfidcode"]?></td>
                <td class="td_bg" width="10%"><?php echo $rows["remark"]?></td>
                <td class="td_bg" width="8%"><a href="update.php?id=<?php echo $rows[onlyid] ?>" class="trlink">修改</a>&nbsp;&nbsp;<a onclick="if(window.confirm('確定要刪除該筆資料嗎?')) location.href='del.php?id=<?php echo $rows[onlyid] ?>';" class="trlink">刪除</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->
    </div><!--/row-->

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://de.topweb.io" target="_blank">Digital Energy</a> 2016</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">De</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
