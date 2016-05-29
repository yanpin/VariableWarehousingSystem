<script type="text/javascript">
  $(function(){
    var Data = {
        'FunctionName':'ShowData',
        'TableName':'instock_table'
    };
    GetData("body/API.php",'GET',Data,"StockInquire");	 
  })
</script>
<table class="table table-striped">
  <thead>
    <tr style='width: 38p'>
	    <th>#id</th>
		<th>名稱</th> 
		<th>序號</th> 

		<th>唯一碼</th> 
		<th>財產標籤</th> 
		<th>狀態</th> 
		
		<th>分類</th> 
		<th>數量</th> 
		<th>位置</th> 
		
		<th>QRCode</th> 
		<th>RFIDCode</th> 
		<th>備註</th> 
	</tr>
  </thead>
  <tbody id="DataTbody">
  
  </tbody>
</table>
