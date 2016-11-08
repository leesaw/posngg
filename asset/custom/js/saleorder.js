var count_enter_form_input_product = 0;
var count_list = 0;

    $("#barcode").focus();

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
  	            //document.getElementById("total_net").innerHTML = "จำนวน &nbsp&nbsp "+count_list+"   &nbsp&nbsp รายการ";
  	        }else{
  	        	alert("ไม่พบ Barcode ที่ต้องการ");
  	        }
  				}
  			});
    	}
      setTimeout(function(){
                calculate();
            },1000);
    }

    function calculate() {
        var count = 0;
        var sum = 0;
        var sum_srp = 0;
        var sum_dc = 0;
        var dc_baht = 0;
        var srp = document.getElementsByName('it_srp');
        var qty = document.getElementsByName('it_quantity');
        var dc = document.getElementsByName('it_discount');
        var net = document.getElementsByName('it_net');
        var dc_percent = document.getElementsByName('it_dc_percent');
        for(var i=0; i<qty.length; i++) {
            if (dc[i].value == "") dc[i].value = 0;
            if (qty[i].value == "") qty[i].value = 0;
            if (dc_percent[i].value == "") dc_percent[i].value = 0;

            count += parseFloat(qty[i].value);
            sum_srp += parseFloat(qty[i].value)*parseFloat(srp[i].value);
            dc_baht = parseFloat(qty[i].value)*parseFloat(srp[i].value)*(parseFloat(dc_percent[i].value)/100);
            if (dc_baht > 0) {
              dc[i].value = dc_baht.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
            }

            sum_dc += parseFloat((dc[i].value).replace(/,/g, ''));
            sum += parseFloat(qty[i].value)*parseFloat(srp[i].value) - parseFloat((dc[i].value).replace(/,/g, ''));
            net[i].value = (parseFloat(qty[i].value)*parseFloat(srp[i].value) - parseFloat((dc[i].value).replace(/,/g, ''))).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
        }
        document.getElementById("summary").innerHTML = sum.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " บาท";
        document.getElementById("allcount").innerHTML = count.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
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
