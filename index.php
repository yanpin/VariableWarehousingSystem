<?php
    include("Session.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?=$ArrayTitle[0]?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <?php
        // Css link and Ico File
        include("Head.php");
    ?>
</head>

<body>
    <div class="navbar navbar-default" role="navigation">
        <?php
            // Head Nav 
            // Use: Member Control Function
            include("NavHead.php");
        ?>
    </div>
    <div class="ch-container">
        <div class="row">
            <div class="col-sm-2 col-lg-2">
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked"></div>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <?php
                                //left Nav 
                                //Use:The Main Function
                                include("nav.php");
                            ?>                        
                        </ul>
                    </div>
                </div>
            </div>
            <noscript>
                <div class="alert alert-block col-md-12"></div>
            </noscript>
            <div id="content" class="col-lg-10 col-sm-10">
                <div>
                    <ul class="breadcrumb AlertWin"></ul>
                </div>
                <div class="row">
                    <div class="box col-md-12">
                        <div class="box-inner">
                            <div class="box-header well" data-original-title="">
                                <h2><i class="glyphicon glyphicon-user"></i> 庫存管理系統</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn btn-minimize btn-round btn-default">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="box-content">
                                <script type="text/javascript">
                                    Function (){
                                            
                                    }
                                </script>
                                
                                <?php
                                    include("body/index.php");
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="row">
                    <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; 
                    <a href="http://de.topweb.io" target="_blank">Digital Energy</a> 2016</p>
                    <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: 
                    <a href="http://usman.it/free-responsive-admin-template">De</a></p>
                </footer>
            </div>
        </div>
    </div>
    <?php
        include("foot.php");
    ?>
</body>
</html>
