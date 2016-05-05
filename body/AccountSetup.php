<?php
  $ArrayMembrName = Array(
    'ID',
    '用戶名稱',
    '原密碼',

    '新密碼',
    '確認密碼' 
  );

  $ArrayMembrKeyName = Array(
    'ID',
    'Name',
    'PasswordOld',

    'NewPassword',
    'ConfirmNewPassword'
  );
  $ArrayMembrPlaceholder = Array(
    $ArrayUserData['ID'],
    $ArrayUserData['Name'],
    $ArrayUserData['Password'],

    "",
    ""
  );
  $ArrayMembrtype = Array(
    'hidden',
    'text',
    'textreadonly',

    'text',
    'text'
  );
      // '學生',
      // '管理者',
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#button").click(function(){
      var Data = {
          "FunctionName":"ModifyData",
          "TableName":"user_table",

          "id":$("#ID").val(),
          "name":$("#Name").val(),
          "userpassword":$("#NewPassword").val()
      };
      GetData("body/API.php",'GET',Data,"AccountSetup");
    });
    $("#ConfirmNewPassword").change(function(){
      var NewPassword = $("#NewPassword").val();
      var PasswordOld = $("#ConfirmNewPassword").val();
      
      if(NewPassword == PasswordOld){
        $(".breadcrumb").html("<div class='alert alert-success' role='alert'>密碼相同!</div>");  
      }else if(NewPassword != PasswordOld){
        $(".breadcrumb").html("<div class='alert alert-danger' role='alert'>密碼不同!</div>");  
      }
    });
  });
</script>
<table cellpadding="3" cellspacing="1" border="0" width="100%" class="table" align=center>
  <form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript">
    <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
      <?php
        $j=0;
        $content = '';
        $hidden = 0;
        $ArrayMembrNameCount = count($ArrayMembrName);
        
        for($i=0;($i<=$ArrayMembrNameCount-1);$i++){
          $Head = "<tr>";
          $End = "<tr>";
            
          if($ArrayMembrtype[$i] == 'text'){
            $content .= 
            "<td width='15%' align='right'  class='td_bg'>". $ArrayMembrName[$i] ."：</td>
            <td width='35%' class='td_bg'>
              <input name='name' placeholder='". $ArrayMembrPlaceholder[$i] ."' type='text' id='". $ArrayMembrKeyName[$i] ."'/>
            </td>
            ";
          }elseif($ArrayMembrtype[$i] == 'hidden'){
              $content .= "<input id='". $ArrayMembrKeyName[$i] ."' type='hidden' value='".$ArrayUserData['ID']."' >";
              $hidden++;
          }elseif($ArrayMembrtype[$i] == 'textreadonly'){
               $content .= 
                "<td width='15%' align='right'  class='td_bg'>". $ArrayMembrName[$i] ."：</td>
                <td width='35%' class='td_bg'>
                  <input name='name' placeholder='". $ArrayMembrPlaceholder[$i] ."' type='text' id='". $ArrayMembrKeyName[$i] ."' readonly='readonly'/>
                </td>
                ";
          }

         if(($i-$hidden+1)%2==0 or ($i-$hidden==$ArrayMembrNameCount-1)){
            if(($i==$ArrayMembrNameCount-1)){
              $content .= "<td width='15%' class='td_bg'>
                          </td>
                          <td width='35%' class='td_bg'>
                          </td>";
            }
            echo $Head;
            echo $content;
            echo $End;
            $content = '';
          }
          if(($i==$ArrayMembrNameCount-1)){
            echo "
            <td width='15%' align='right' class='td_bg'>
              <input type='hidden' name='action' value='insert'>
              <input class='btn btn-primary' type='button' name='button' id='button' value='提交' />
            </td>
            <td width='35%' class='td_bg'>
              <input class='btn btn-primary' type='reset' name='button2' id='button2' value='重置' />
            </td>
            <td width='15%' class='td_bg'>
            </td>
            <td width='35%' class='td_bg'>
            </td>
            ";
          }
        }
      ?>
    </table>
    </form>
    </table>