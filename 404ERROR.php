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
    <style type="text/css">
    	html{
    		height: 100%;
		}
		body{
			height: 100%;
		}
		
			
	</style>
	
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
        <div class="row TT">
            <div id="content" class="col-lg-12 col-sm-12">
                <div class="row TT">
                	<div class="col-md-1 col-sm-1 col-xs-12">
                	</div>

                	<div class="col-md-10 col-sm-10 col-xs-12 Dome">
                		<h1>DIGITAL ENERGY</h1>
                		<p><b>404.</b> That's an error</p>
                		<p>The requested URL /404 was not found on this server</p>
                		
                	</div>
                	<div class="col-md-1 col-sm-1 col-xs-12">
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
        include("Foot.php");
    ?>
    <script type="text/javascript">
		$(document).ready(function(){
			var BodyHeight = $("body").css('height');
			var row = parseInt(BodyHeight) - 62 - 30 -30;
			$(".Dome").css("height", row);
			$(".ch-container").css("height", row);
		});
		$(window).resize(function(){
			var BodyHeight = $("body").css('height');
			var row = parseInt(BodyHeight) - 62 - 30 -30;
			console.log(row);
			$(".Dome").css("height", row);
			$(".ch-container").css("height", row);
		});
		
	</script>
</body>
</html>
