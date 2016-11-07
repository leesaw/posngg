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
            setTimeout(function(){
                calculate();
            },300);
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
  	            $('table > tbody').append(element);
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
            },300);
    }

    function calculate() {
        var count = 0;
        var sum = 0;
        var srp = document.getElementsByName('it_srp');
        var qty = document.getElementsByName('it_quantity');
        var dc = document.getElementsByName('it_discount');
        for(var i=0; i<qty.length; i++) {
            if (dc[i].value == "") dc[i].value = 0;
            if (qty[i].value == "") qty[i].value = 0;
            count += parseInt(qty[i].value);
            sum += parseInt(qty[i].value)*parseInt(srp[i].value) - parseInt((dc[i].value).replace(/,/g, ''));
        }
        document.getElementById("summary").innerHTML = sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " บาท";
        document.getElementById("allcount").innerHTML = count.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "," );
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
