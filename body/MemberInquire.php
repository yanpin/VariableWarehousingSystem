<script type="text/javascript">
  $(function(){
    var Data = {
        'FunctionName':'ShowData',
        'TableName':'user_table'
    };
    GetData("body/API.php",'GET',Data,"MemberInquire");
  })
</script>
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>帳號(學號)</th> 
      <th>密碼</th>
      <th>類別(學生/管理員)</th>
      <th>姓名</th>
      <th>信箱</th>
      <th>電話</th>
      <th>學生證卡號</th>
    </tr>
  </thead>
  <tbody id="DataTbody">
  </tbody>
</table>
