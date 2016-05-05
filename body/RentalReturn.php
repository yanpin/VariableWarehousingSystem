<?php
  $ArrayMembrName = Array(
    '學生唯一碼',
    '設備唯一碼',
    '租借日期',
      
    '歸還日期',
    '租借數量',
    '備註'
  );

  $ArrayMembrKeyName = Array(
    'user_nfctoken',
    'instock_onlyid',
    'input_date',
    
    'output_date',
    'total',
    'remark'
  );
  $ArrayMembrtype = Array(
    'text',
    'text',
    'hidden',

    'hidden',
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
          "FunctionName":"AddedData",
          "TableName":"stockinfo_table",

          "user_nfctoken":$("#user_nfctoken").val(),
          "instock_onlyid":$("#instock_onlyid").val(),
          "input_date":$("#input_date").val(),
          
          "output_date":$("#output_date").val(),
          "total":$("#total").val(),
          "remark":$("#remark").val(),          
      };
      GetData("body/API.php",'GET',Data,"RentalReturn");
    });
  });
</script>
<table cellpadding="3" cellspacing="1" border="0" width="100%" class="table" align=center>
  <form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript">
    <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
      <?php
        $j=0;
        $content = '';
        $ArrayMembrNameCount = count($ArrayMembrName);
        
        for($i=0;($i<=$ArrayMembrNameCount-1);$i++){
          $Head = "<tr>";
          $End = "<tr>";
            
          if($ArrayMembrtype[$i] == 'text'){
            $content .= 
            "<td width='10%' align='right' class='td_bg'>". $ArrayMembrName[$i] ."：</td>
            <td width='40%' class='td_bg'>
              <input name='name' type='text' id='". $ArrayMembrKeyName[$i] ."'/>
            </td>
            ";
          }elseif($ArrayMembrtype[$i] == 'hidden'){
            $content .= "<input name='name' type='hidden' id='". $ArrayMembrKeyName[$i] ."'/>";
          }

         if(($i+1)%2==0 or ($i==$ArrayMembrNameCount-1)){
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
    