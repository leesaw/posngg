var count_enter_form_input_product = 0;
var count_list = 0;

    $("#barcode").focus();

    $("#it_quantity").keypress(function (evt) {
        evt.preventDefault();
    });

    $('#barcode').keyup(function(e){ //enter next
        if(e.keyCode == 13) {
            var barcode_value = $.trim($(this).val());
            if(barcode_value != "")
						{
			        check_barcode(barcode_value);
						}
	          $(this).val('');

			}
		});

    $('#staffCode').keyup(function(e){ //enter next
        if(e.keyCode == 13) {
            var saleperson_value = $.trim($(this).val());
            if(saleperson_value != "")
						{
			        check_sale_person(saleperson_value);
						}
				}
		});

    $('#cusTelephone_view').keyup(function(e){ //enter next
        if(e.keyCode == 13) {
            var telephone = $.trim($(this).val());
            if(telephone != "")
						{
			        check_customer(telephone);
						}
				}
		});

    $('#valueDCTopup').keyup(function(e){ //enter next
        if(e.keyCode == 13) {
          if($("#valueDCTopup").val() != "") {
            document.getElementById("dc_topup").innerHTML = parseFloat($("#valueDCTopup").val()).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $("#hiddenDCTopup").val($("#valueDCTopup").val());
          }
          $("#valueDCTopup").val('');
          $('#modDCTopup').modal('toggle');
          setTimeout(function(){
                    calculate();
                },300);
				}
		});

    $(document).ready(function() {
      $("#btnConfirmDCTopup").click(function() {
        if($("#valueDCTopup").val() != "") {
          document.getElementById("dc_topup").innerHTML = parseFloat($("#valueDCTopup").val()).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          $("#hiddenDCTopup").val($("#valueDCTopup").val());
        }
        $("#valueDCTopup").val('');
        $('#modDCTopup').modal('toggle');
        setTimeout(function(){
                  calculate();
              },300);
      });

      $("#btnSelectProductType").click(function() {
        var message = "ต้องการให้ข้อมูลทั้งหมดในหน้านี้ ถูกลบใช่หรือไม่ !";
        return confirm(message);
      });

      $("#btnSaveCustomer").click(function() {
        if ($("#cusTelephone").val()=="") {
          alert("กรุณาใส่ เบอร์ติดต่อลูกค้า !");
          $("#cusTelephone").focus();
        }else if($("#cusName").val()=="") {
          alert("กรุณาใส่ ชื่อ-นามสกุลลูกค้า !");
          $("#cusName").focus();
        }else{
          $("#btnSaveCustomer").prop('disabled', true);
          $.ajax({
    				type : "POST" ,
    				url : link_new_customer ,
    				data : {name: $("#cusName").val(), address: $("#cusAddress").val(), province: $("#cusProvince").val(), telephone: $("#cusTelephone").val(), taxid: $("#cusTaxID").val()} ,
    				success : function(data) {
    					if(data)
    					{
                alert("ทำการบันทึกข้อมูลลูกค้าเรียบร้อยแล้ว !");

                $('#cusName_view').val($("#cusName").val());
                var jungwat = " ";
                if($("#cusProvince").val()!="กรุงเทพมหานคร") jungwat = " จ.";
                $('#cusAddress_view').val($("#cusAddress").val() + jungwat + $("#cusProvince").val());
                $('#cusTaxID_view').val($("#cusTaxID").val());
                $('#cusTelephone_view').val($("#cusTelephone").val());

                $("#cusTelephone").val("");
                $("#cusName").val("");
                $("#cusAddress").val("");
                $("#cusTaxID").val("");
                $("#btnSaveCustomer").attr('disabled', false);
                $('#modNewCustomer').modal('toggle');

    	        }else{
    	        	alert("ไม่สามารถ บันทึกข้อมูลลูกค้าได้ !");
    	        }
    				},
            error: function (textStatus, errorThrown) {
                alert("เกิดความผิดพลาด !!!");
                $("#btnSaveCustomer").attr('disabled', false);
            }
    			});
        }
      });

      $("#btnPayment").click(function() {
        if ($("#var_allcount").val() < 1) {
          alert("กรุณา สแกนบาร์โค้ด เพื่อเลือกสินค้า");
          $("#barcode").focus();
          return false;
        }else if ($("#saleperson_id").val()<1) {
          alert("กรุณาใส่ รหัสพนักงานขาย !");
          $("#staffCode").focus();
          return false;
        }else{
          var count = 0, sum = 0;
          var srp = document.getElementsByName('it_srp');
          var qty = document.getElementsByName('it_quantity');
          var dc = document.getElementsByName('it_discount');
          var net = document.getElementsByName('it_net');
          var dc_percent = document.getElementsByName('it_dc_percent');
          var dc_topup = $("#hiddenDCTopup").val();
          for(var i=0; i<qty.length; i++) {
              count += parseFloat(qty[i].value);
              sum += parseFloat(qty[i].value)*parseFloat(srp[i].value) - parseFloat((dc[i].value).replace(/,/g, ''));
          }
          sum -= dc_topup;
          document.getElementById("totalPrice").value = sum.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " บาท";
          document.getElementById("totalCount").value = count.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        }
      });

      $("#btnConfirmPayment").click(function(){
        if ($("#paymentValue").val()=="") {
          alert("กรุณาใส่ จำนวนเงินที่ชำระ !");
          $("#paymentValue").focus();
        }else{
          $("#btnConfirmPayment").prop('disabled', true);

          var item_id = document.getElementsByName('it_id');
          var item_barcode = document.getElementsByName('it_barcode');
          var srp = document.getElementsByName('it_srp');
          var qty = document.getElementsByName('it_quantity');
          var dc = document.getElementsByName('it_discount');
          var net = document.getElementsByName('it_net');
          var dc_percent = document.getElementsByName('it_dc_percent');
          var dc_topup = $("#hiddenDCTopup").val();

          // create item array
          var item_array = new Array();
          var total_net = 0;
          var total_dc = 0;
          var total_tax = 0;
          for(var i=0; i<item_id.length; i++) {
            total_net += parseFloat((net[i].value).replace(/,/g, ''));
            total_dc += parseFloat((dc[i].value).replace(/,/g, ''));
            item_array[i] = {  id: item_id[i].value,
                              barcode: item_barcode[i].value,
                              srp: (srp[i].value).replace(/,/g, ''),
                              qty: qty[i].value,
                              dc_baht: (dc[i].value).replace(/,/g, ''),
                              dc_percent: dc_percent[i].value,
                              net: (net[i].value).replace(/,/g, ''),
                            };
          }

          total_tax = (total_net - dc_topup)*0.07/1.07;
          var payment = { paymentWay: $("#paymentWay").val(),
                          paymentValue: $("#paymentValue").val(),
                          paymentRemark: $("#paymentRemark").val(),
                          customer_id: $("#customer_id").val(),
                          saleperson_id: $("#saleperson_id").val(),
                          dc_topup: dc_topup,
                          total_net: total_net,
                          total_dc: total_dc,
                          total_tax: total_tax,
                        };

          $.ajax({
    				type : "POST" ,
    				url : link_save_payment ,
    				data : {item: item_array, payment: payment} ,
    				success : function(data) {
    					if(data)
    					{
                alert("ทำการบันทึกข้อมูลเรียบร้อยแล้ว !");
                $("#paymentValue").val("");
                $("#btnConfirmPayment").attr('disabled', false);
                $('#modPayment').modal('toggle');
                $('#modPrintDocument').modal('show');
    	        }else{
    	        	alert("ไม่สามารถ บันทึกข้อมูลได้ !");
    	        }
    				},
            error: function (textStatus, errorThrown) {
                alert("เกิดความผิดพลาด !!!");
                $("#btnConfirmPayment").attr('disabled', false);
            }
    			});
        }

      });
    });


    function check_barcode(barcode)
    {
    	if(barcode != "") {
  			$.ajax({
  				type : "POST" ,
  				url : link ,
  				data : {barcode: barcode} ,
  				success : function(data) {
  					if(data != "")
  					{
  	            var element = '<tr id="row'+count_enter_form_input_product+'"><td><button type="button" id="row'+count_enter_form_input_product+'" class="btn btn-danger btn-xs" onClick="delete_item_row('+count_enter_form_input_product+');"><i class="fa fa-close"></i></button></td>'+data+'</tr>';
  	            $('#itemlist > tbody').append(element);
  	            count_enter_form_input_product++;
  	            count_list++;
                setTimeout(function(){
                          calculate();
                      },300);
  	        }else{
  	        	alert("ไม่พบ Barcode ที่ต้องการ");
  	        }
  				},
          error: function (textStatus, errorThrown) {
              alert("เกิดความผิดพลาด !!!");
          }
  			});
    	}

    }

    function check_sale_person(number)
    {
    	if(number != "") {
  			$.ajax({
  				type : "POST" ,
  				url : link_saleperson ,
  				data : {number: number} ,
          dataType: 'json',
  				success : function(data) {
  					if(data.nggu_id > 0)
  					{
              $('#saleperson_id').val(data.nggu_id);
              $('#staffName').val(data.nggu_name);
              $('#staffCode').val(data.nggu_number);
  	        }else{
  	        	alert("ไม่พบ รหัสพนักงาน ที่ต้องการ");
              $('#saleperson_id').val('0');
              $('#staffName').val('');
              $('#staffCode').val('');
  	        }
  				},
          error: function (textStatus, errorThrown) {
              alert("ไม่พบ รหัสพนักงาน ที่ต้องการ !!!");
              $('#saleperson_id').val('0');
              $('#staffName').val('');
              $('#staffCode').val('');
          }
  			});
    	}
    }

    function check_customer(telephone)
    {
    	if(telephone != "") {
  			$.ajax({
  				type : "POST" ,
  				url : link_customer ,
  				data : {telephone: telephone} ,
          dataType: 'json',
  				success : function(data) {
  					if(data.posc_id > 0)
  					{
              $('#customer_id').val(data.posc_id);
              $('#cusName_view').val(data.posc_name);
              $('#cusAddress_view').val(data.posc_address);
              $('#cusTaxID_view').val(data.posc_taxid);
  	        }else{
  	        	alert("ไม่พบ ข้อมูลลูกค้า ที่ต้องการ");
              $('#customer_id').val('0');
              $('#cusTelephone_view').val('');
              $('#cusName_view').val('');
              $('#cusAddress_view').val('');
              $('#cusTaxID_view').val('');
  	        }
  				},
          error: function (textStatus, errorThrown) {
              alert("ไม่พบ ข้อมูลลูกค้า ที่ต้องการ !!!");
              $('#customer_id').val('0');
              $('#cusTelephone_view').val('');
              $('#cusName_view').val('');
              $('#cusAddress_view').val('');
              $('#cusTaxID_view').val('');
          }
  			});
    	}
    }

    function calculate() {
        var count = 0, sum = 0, sum_srp = 0, sum_dc = 0, dc_baht=0;
        var srp = document.getElementsByName('it_srp');
        var qty = document.getElementsByName('it_quantity');
        var dc = document.getElementsByName('it_discount');
        var net = document.getElementsByName('it_net');
        var dc_percent = document.getElementsByName('it_dc_percent');
        var dc_topup = $("#hiddenDCTopup").val();
        for(var i=0; i<qty.length; i++) {
            if (dc[i].value == "") dc[i].value = 0;
            if (qty[i].value == "") qty[i].value = 0;
            if (dc_percent[i].value == "") dc_percent[i].value = 0;
            if (dc_percent[i].value < 0) dc_percent[i].value = 0;
            else if (dc_percent[i].value > 100) dc_percent[i].value = 100;

            count += parseFloat(qty[i].value);
            sum_srp += parseFloat(qty[i].value)*parseFloat(srp[i].value);
            dc_baht = parseFloat(qty[i].value)*parseFloat(srp[i].value)*((dc_percent[i].value)/100);
            if (dc_baht > 0) {
              dc[i].value = dc_baht.toFixed(2);
            }else{
              dc[i].value = parseFloat(dc[i].value).toFixed(2);
            }

            sum_dc += parseFloat((dc[i].value).replace(/,/g, ''));
            sum += parseFloat(qty[i].value)*parseFloat(srp[i].value) - parseFloat((dc[i].value).replace(/,/g, ''));
            net[i].value = (parseFloat(qty[i].value)*parseFloat(srp[i].value) - parseFloat((dc[i].value).replace(/,/g, ''))).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        }
        sum -= dc_topup;
        document.getElementById("summary").innerHTML = sum.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " บาท";
        document.getElementById("allcount").innerHTML = count.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        document.getElementById("sum_srp").innerHTML = sum_srp.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        document.getElementById("sum_dc").innerHTML = sum_dc.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        $('#var_allcount').val(count);
    }

    function delete_item_row(row1)
    {
        count_list--;
        $('#row'+row1).remove();
        setTimeout(function(){
                  calculate();
              },300);
    }

    function numberWithCommas(obj) {
    	var x=$(obj).val();
        var parts = x.toString().split(".");
    	parts[0] = parts[0].replace(/,/g,"");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $(obj).val(parts.join("."));
    }
