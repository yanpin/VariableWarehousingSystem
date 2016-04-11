<script type="text/javascript">
  $(function(){
    var Data = {
        'FunctionName':'ShowData',
        'TableName':'stockinfo_table'
    };
    GetData("body/API.php",'GET',Data,"RentalInquire");
  })
</script>
<table class="table table-striped">
  <thead>
    <tr>
	    <th>#ID</th>
		<th>學生唯一碼</th> 
		<th>設備唯一碼</th> 
		<th>租借日期</th> 
		<th>歸還日期</th> 
		<th>租借數量</th> 
		<th>備註</th> 
    </tr>
  </thead>
  <tbody id="DataTbody">
  </tbody>
</table>
