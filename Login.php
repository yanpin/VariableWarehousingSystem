<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>創新育成中心設備管理系統v0.1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <?php
        // Css link and Ico File
        include("Head.php");
    ?>

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>管理系統 - 後台登入</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="breadcrumb">
                <div class="alert alert-info">
                    Please login with your Username and Password.
                </div>
            </div>
			<form id="frm" name="frm" method="post" action="" class="form-horizontal" onSubmit="return check()">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user red"></i>
                        </span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock red"></i>
                        </span>
                        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
						<input type="button" class="btn btn-primary" id = "Submit" class="submit" value="Login">
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#Submit").click(function(){

      var Data = {
          "FunctionName":"Login",
          "TableName":"Login",

          "username":$("#username").val(),
          "userpassword":$("#pwd").val()
      };
      GetData("body/API.php",'GET',Data,"Login");
    });
  });
</script>
<?php
    include("foot.php");
?>
</body>
</html>