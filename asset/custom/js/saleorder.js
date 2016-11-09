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

    $(document).ready(function() {
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
    				}
    			});
        }
      });

      $("#btnPayment").click(function() {
        var count = 0, sum = 0;
        var srp = document.getElementsByName('it_srp');
        var qty = document.getElementsByName('it_quantity');
        var dc = document.getElementsByName('it_discount');
        var net = document.getElementsByName('it_net');
        var dc_percent = document.getElementsByName('it_dc_percent');
        for(var i=0; i<qty.length; i++) {
            count += parseFloat(qty[i].value);
            sum += parseFloat(qty[i].value)*parseFloat(srp[i].value) - parseFloat((dc[i].value).replace(/,/g, ''));
        }
        document.getElementById("totalPrice").value = sum.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " บาท";
        document.getElementById("totalCount").value = count.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );

        
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
  	            //document.getElementById("total_net").innerHTML = "จำนวน &nbsp&nbsp "+count_list+"   &nbsp&nbsp รายการ";
  	        }else{
  	        	alert("ไม่พบ Barcode ที่ต้องการ");
  	        }
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
              $('#staffName').val(data.nggu_name);
              $('#staffCode').val(data.nggu_number);
  	        }else{
  	        	alert("ไม่พบ รหัสพนักงาน ที่ต้องการ");
  	        }
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
              $('#cusName_view').val(data.posc_name);
              $('#cusAddress_view').val(data.posc_address);
              $('#cusTaxID_view').val(data.posc_taxid);
  	        }else{
  	        	alert("ไม่พบ ข้อมูลลูกค้า ที่ต้องการ");
  	        }
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
        document.getElementById("summary").innerHTML = sum.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " บาท";
        document.getElementById("allcount").innerHTML = count.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        document.getElementById("sum_srp").innerHTML = sum_srp.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        document.getElementById("sum_dc").innerHTML = sum_dc.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        document.getElementById("sum_net").innerHTML = sum.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
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
