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
            console.log(TrData);
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
        DataModify(Jdata, FunctinName);
        
      },
      error: function() {
        $(".breadcrumb").html("<div class='alert alert-danger' role='alert'>連線錯誤!</div>");
      }
    });
  }

  function DataModify(JsonData, FunctinName){
    $("tr#detailed").click(function(){
      //alert($(this).attr("test"));
      console.log(JsonData);
      console.log(FunctinName);
      //欸欸我在這裡啦          
      // $("#LiveShow").html(
      //   "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>" +
      //     "<div class='modal-dialog'>" +
      //       "<div class='modal-content'>" +
      //         "<div class='modal-header'>" +
      //           "<button type='button' class='close' data-dismiss='modal'>" +
      //             "<span aria-hidden='true'>&times;</span>" +
      //             "<span class='sr-only'>Close</span>" +
      //           "</button>" +
      //           "<h4 class='modal-title' id='myModalLabel'>Modal title</h4>" +
      //         "</div>" +
      //         "<div class='modal-body'>" +

      //         "</div>" +
      //         "<div class='modal-footer'>" +
      //           "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>" +
      //           "<button type='button' class='btn btn-primary'>Save changes</button>" +
      //         "</div>" +
      //       "</div>" +
      //     "</div>" +
      //   "</div>" 
      // );
      

    })
  }
