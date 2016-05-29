var JsonData;
  function GetData(url, type, data, FunctinName){
    $.ajax({
      url: url,
      type: type,
      dataType: "json",
      data:data,
      success: function(Jdata) {
          var JdataSize = (Jdata.length-1);
          var i = 0;
          console.log(Jdata);
        if(FunctinName == 'MemberInquire'){
          for(i=0;i<=JdataSize;i++){
            var TrData = 
            "<tr id='detailed' test = '" + Jdata[i]['id'] + "' data-toggle='modal' data-target='#myModal'>" +
              "<td>" + Jdata[i]['id'] + "</td>" +
              "<td>" + Jdata[i]['username'] + "</td>" +
              "<td>" + Jdata[i]['userpassword'] + "</td>" +

              "<td>" + Jdata[i]['type'] + "</td>" +
              "<td>" + Jdata[i]['name'] + "</td>" +
              "<td>" + Jdata[i]['email'] + "</td>" +
              
              "<td>" + Jdata[i]['phone'] + "</td>" +
              "<td>" + Jdata[i]['nfctoken'] + "</td>"+
            "</tr>";
           
            $("#DataTbody").append(TrData);              
          }
        }else if(FunctinName == 'StockInquire'){
          for(i=0;i<=JdataSize;i++){

            var TrData = 
            "<tr id='detailed' test = '" + Jdata[i]['id'] + "' data-toggle='modal' data-target='#myModal'>" +
              "<td>" + Jdata[i]['id'] + "</td>" +
              "<td>" + Jdata[i]['name'] + "</td>" +
              "<td>" + Jdata[i]['uid'] + "</td>" +

              "<td>" + Jdata[i]['onlyid'] + "</td>" +
              "<td>" + Jdata[i]['property'] + "</td>" +
              "<td>" + Jdata[i]['status'] + "</td>" +
              
              "<td>" + Jdata[i]['type'] + "</td>" +
              "<td>" + Jdata[i]['total'] + "</td>" +
              "<td>" + Jdata[i]['position'] + "</td>" +

              "<td>" + Jdata[i]['qrcode'] + "</td>" +
              "<td>" + Jdata[i]['rfidcode'] + "</td>" +
              "<td>" + Jdata[i]['remark'] + "</td>" +
            "</tr>";
            $("#DataTbody").append(TrData);            
          }
        }else if(FunctinName == 'RentalInquire'){
          for(i=0;i<=JdataSize;i++){

            var TrData = 
            "<tr id='detailed' test = '" + Jdata[i]['id'] + "' data-toggle='modal' data-target='#myModal'>" +
              "<td>" + Jdata[i]['id'] + "</td>" +
              "<td>" + Jdata[i]['user_nfctoken'] + "</td>" +
              "<td>" + Jdata[i]['instock_onlyid'] + "</td>" +

              "<td>" + Jdata[i]['input_date'] + "</td>" +
              "<td>" + Jdata[i]['output_date'] + "</td>" +
              "<td>" + Jdata[i]['total'] + "</td>" +
              
              "<td>" + Jdata[i]['remark'] + "</td>" +
            "</tr>";
            $("#DataTbody").append(TrData); 
          }
        }

        //=========================================
        //  回復狀態
        //
        if(FunctinName == 'RentalLend'){
          if(Jdata['status']=="ERROR"){
            $(".breadcrumb").html("<div class='alert alert-danger' role='alert'>查無歸還紀錄!</div>");            
          }else if(Jdata['status'] == 'OK'){
            $(".breadcrumb").html("<div class='alert alert-success' role='alert'>歸還成功!</div>"); 
          }
        }else if(FunctinName == 'RentalReturn'){
          $(".breadcrumb").html("<div class='alert alert-success' role='alert'>借出成功!</div>");
        }else if(FunctinName == 'AccountSetup'){
          $(".breadcrumb").html("<div class='alert alert-success' role='alert'>修改成功!</div>");
        }else if(FunctinName == 'Login'){
          if(Jdata['status']=="ERROR"){
            $(".breadcrumb").html("<div class='alert alert-danger' role='alert'>帳號密碼錯誤!</div>");
          }else if(Jdata['id'] != null){
              $(".breadcrumb").html("<div class='alert alert-success' role='alert'>登入成功!</div>");
              $(".breadcrumb").html("<meta http-equiv=REFRESH CONTENT=2;url=index.php>");
          }
        }else if(FunctinName == 'MemberNew'){
          $(".breadcrumb").html("<div class='alert alert-success' role='alert'>成功新增!</div>");
        }
        $("#DataTbody").append("<div id = 'LiveShow' ></div>");
        ShowDataWin(Jdata, FunctinName);
        
      },
      error: function() {
        $(".breadcrumb").html("<div class='alert alert-danger' role='alert'>連線錯誤!</div>");
      }
    });
    
  }
  function ModifyAjax(){
    $.ajax({
      url: url,
      type: type,
      dataType: "json",
      data:data,
      success: function(Jdata) {

      }
  })
  }
  function ShowDataWin(JsonData, FunctinName){
    $("tr#detailed").click(function(){
      console.log(DataId = $(this).attr("test"));
      console.log(JsonData);
      console.log(FunctinName);


      if(FunctinName == "MemberInquire"){
        var ThArray =   [" #ID ", "帳號(學號)", "密碼",         "(學生/管理員)", "姓名", "信箱", "電話", "學生證卡號"];
        var DataName =  ['id',  'username',   'userpassword', 'type',              'name', 'email','phone','nfctoken'];
        var Inputtype = ['']; 
        var Readonly =  ['readonly'];


        //readonly/
      }else if(FunctinName == "StockInquire"){
        var ThArray =   [" #ID ", "名稱", "序號", "唯一碼", "財產標籤", "狀態",   "分類", "數量", "位置",     "QRCode", "RFIDCode", "備註"];
        var DataName =  ["id",    'name', 'uid',  'onlyid', 'property', 'status', 'type', 'total','position', 'qrcode', 'rfidcode', 'remark'];
        var Readonly =  ['readonly'];

      
      }else if(FunctinName == "RentalInquire"){
        var ThArray =   [" #ID ", "學生唯一碼",    "設備唯一碼",     "租借日期",   "歸還日期",    "租借數量", "備註"];
        var DataName =  ["id",    'user_nfctoken', 'instock_onlyid', 'input_date', 'output_date', 'total',    'remark'];      
        var InputType = [''];
        var Readonly =  ['readonly', '', '', 'readonly'];
      }

      var i;
      var BodyData = "";
      for(i=1;i<=ThArray.length;i++){
        

        BodyData += 
          "<div class='form-group'>" +
            "<label for='inputPassword3' class='col-sm-2 control-label' style = 'padding-left: 0px; padding-right:0px;'>" + ThArray[i-1] + "</label>" +
            "<div class='col-sm-10'>" +
              "<input type='password' class='form-control' id='inputPassword3' placeholder='" + JsonData[DataId-1][DataName[i-1]] + "' " + Readonly[i-1] +">" +
            "</div>" +
          "</div>";
      }
      
      
      //欸欸我在這裡啦          
      $("#LiveShow").html(
        "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>" +
          "<div class='modal-dialog'>" +
            "<div class='modal-content'>" +
              "<div class='modal-header'>" +
                "<button type='button' class='close' data-dismiss='modal'>" +
                  "<span aria-hidden='true'>&times;</span>" +
                  "<span class='sr-only'>Close</span>" +
                "</button>" +
                "<h4 class='modal-title' id='myModalLabel'>顯示 and 修改資料</h4>" +
              "</div>" +
              "<div class='modal-body'>" +
                "<form class='form-horizontal'>" +                  
                    BodyData +
                "</form>" +
              "</div>" +

              "<div class='modal-footer'>" +
                "<button type='button' class='btn btn-primary'>修改</button>" +
                "<button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>" +
                
              "</div>" +
            "</div>" +
          "</div>" +
        "</div>" 
      );
    })
  }
