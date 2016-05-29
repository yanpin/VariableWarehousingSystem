  function GetData(url, type, data, FunctinName){
    $.ajax({
      url: url,
      type: type,
      dataType: "json",
      data:data,
      success: function(Jdata) {
        if(FunctinName == 'MemberInquire'){
          var JdataSize = (Jdata.length-1);
          var i = 0;
          for(i=0;i<=JdataSize;i++){
            $("#DataTbody").append("<tr>");
            
            $("#DataTbody").append("<td>" + Jdata[i]['id'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['username'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['userpassword'] + "</td>");

            $("#DataTbody").append("<td>" + Jdata[i]['type'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['name'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['email'] + "</td>");
            
            $("#DataTbody").append("<td>" + Jdata[i]['phone'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['nfctoken'] + "</td>");
            $("#DataTbody").append("<td></td>");        

            $("#DataTbody").append("</tr>");
          }
        }else if(FunctinName == 'MemberNew'){
          $(".breadcrumb").html("<div class='alert alert-success' role='alert'>成功新增!</div>");
        }else if(FunctinName == 'StockInquire'){
          var JdataSize = (Jdata.length-1);
          console.log(Jdata);
          var i = 0;
          for(i=0;i<=JdataSize;i++){
            $("#DataTbody").append("<tr>");
            
            $("#DataTbody").append("<td>" + Jdata[i]['id'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['name'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['uid'] + "</td>");

            $("#DataTbody").append("<td>" + Jdata[i]['onlyid'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['property'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['status'] + "</td>");
            
            $("#DataTbody").append("<td>" + Jdata[i]['type'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['total'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['position'] + "</td>");

            $("#DataTbody").append("<td>" + Jdata[i]['qrcode'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['rfidcode'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['remark'] + "</td>");
            
            $("#DataTbody").append("</tr>");
          }
        }else if(FunctinName == 'RentalInquire'){
          var JdataSize = (Jdata.length-1);
          console.log(Jdata);
          var i = 0;
          for(i=0;i<=JdataSize;i++){
            $("#DataTbody").append("<tr>");
            
            $("#DataTbody").append("<td>" + Jdata[i]['id'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['user_nfctoken'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['instock_onlyid'] + "</td>");

            $("#DataTbody").append("<td>" + Jdata[i]['input_date'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['output_date'] + "</td>");
            $("#DataTbody").append("<td>" + Jdata[i]['total'] + "</td>");
            
            $("#DataTbody").append("<td>" + Jdata[i]['remark'] + "</td>");
            
            $("#DataTbody").append("</tr>");
          }
        }else if(FunctinName == 'RentalLend'){

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
        }

      },
      error: function() {
        $(".breadcrumb").html("<div class='alert alert-danger' role='alert'>連線錯誤!</div>");
      }
    });
  }
