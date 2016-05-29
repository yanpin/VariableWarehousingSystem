<?php
  $ArrayMembrName = Array(
    '名稱',
    '序號',
    '唯一碼',
    
    '財產標籤',
    '狀態',
    '分類',

    '數量',
    '位置',
    'QRCode',

    'RFIDCode',
    '備註'
  );

  $ArrayMembrKeyName = Array(
    'name',
    'uid',
    'onlyid',
    
    'property',
    'status',
    'type',

    'total',
    'position',
    'qrcode',

    'rfidcode',
    'remark',
  );
  $ArrayMembrtype = Array(
    'text',
    'text',
    'text',

    'text',
    'select',
    'select',

    'text',
    'text',
    'text',

    'text',
    'text',
  );
      // '學生',
      // '管理者',
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#button").click(function(){
      var Data = {
          "FunctionName":"AddedData",
          "TableName":"instock_table",

          "name":$("#name").val(),
          "uid":$("#uid").val(),
          "onlyid":$("#onlyid").val(),
          
          "property":$("#property").val(),
          "status":$("#status").val(),
          "type":$("#type").val(),
          
          "total":$("#total").val(),
          "position":$("#position").val(),
          "qrcode":$("#qrcode").val(),

          "rfidcode":$("#rfidcode").val(),
          "remark":$("#remark").val(),  
      };
      GetData("body/API.php",'GET',Data,"MemberNew");
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
          }elseif($ArrayMembrtype[$i] == 'select'){
            if($ArrayMembrKeyName[$i] == 'status'){
              $content .= 
              "
              <td width='10%' align='right' class='td_bg'>". $ArrayMembrName[$i] ."：</td>
              <td width='40%' class='td_bg'>
              <select id='". $ArrayMembrKeyName[$i] ."'>
                  <option value='現存'>現存</option>
                  <option value='借出'>借出</option>
                  <option value='損壞'>損壞</option>
                  <option value='遺失'>遺失</option>
                </select>
              </td>
              ";
            }else if($ArrayMembrKeyName[$i] == 'type'){
              $content .= 
              "
              <td width='10%' align='right' class='td_bg'>". $ArrayMembrName[$i] ."：</td>
              <td width='40%' class='td_bg'>
              <select id='". $ArrayMembrKeyName[$i] ."'>
                  <option value='零件'>零件</option>
                  <option value='設備'>設備</option>
                </select>
              </td>
              ";
            }

          }

         if(($i+1)%2==0 or ($i==$ArrayMembrNameCount-1)){
            if(($i==$ArrayMembrNameCount-1)){
              $content .= "<td width='10%' class='td_bg'>
                          </td>
                          <td width='40%' class='td_bg'>
                          </td>";
            }
            echo $Head;
            echo $content;
            echo $End;
            $content = '';
          }
          if(($i==$ArrayMembrNameCount-1)){
            echo "
            <td width='10%' align='right' class='td_bg'>
              <input type='hidden' name='action' value='insert'>
              <input class='btn btn-primary' type='button' name='button' id='button' value='提交' />
            </td>
            <td width='40%' class='td_bg'>
              <input class='btn btn-primary' type='reset' name='button2' id='button2' value='重置' />
            </td>
            <td width='10%' class='td_bg'>
            </td>
            <td width='40%' class='td_bg'>
            </td>
            ";
          }
        }
      ?>
      </table>
      </form>
      </table>
    