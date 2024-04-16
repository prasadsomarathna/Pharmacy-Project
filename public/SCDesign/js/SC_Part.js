
	$(document).ready(function() {

		$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$( "#wrapper" ).one( "click", function() {
				var sec = 0;
		function pad ( val ) { return val > 9 ? val : "0" + val; }
		setInterval( function(){
			$("#seconds").html(pad(++sec%60)).val(pad(++sec%60));
			$("#seconds2").val(pad(++sec%60));

			$("#minutes").html(pad(parseInt(sec/60,10)));
			$("#minutes2").val(pad(parseInt(sec/60,10)));
		}, 1000);
	});
	
	$('#label-callno').keyup(function(){

	 var tel =document.getElementById( "label-callno" ).value;

	 var tellen = $.trim( jQuery('#label-callno').val() );

	 //var AddrType = "W";
	 //document.querySelector('input[name=genderS]:checked').value
	 var AddrType = document.querySelector('input[name=label-AddrType]:checked').value;

	//  if ( tellen.length == 1 ) {

	//     var sec = 0;
	//     function pad ( val ) { return val > 9 ? val : "0" + val; }
	//     setInterval( function(){
	//         $("#seconds").html(pad(++sec%60)).val(pad(++sec%60));
	//         $("#seconds2").val(pad(++sec%60));

	//         $("#minutes").html(pad(parseInt(sec/60,10)));
	//         $("#minutes2").val(pad(parseInt(sec/60,10)));
	//     }, 1000);

	//  }

	 if ( tellen.length == 9 ) {
			$.ajax({
				type:"GET",
				url:"/GetCustomerDetails/"+tel+"/"+AddrType,
				success : function(results) {
					//console.log(results);
					var len = results.length;

					for(var i=0; i<len; i++){
					var cxsmsno = results[i].SMSNo;
					var cxname = results[i].Customer;
					var cxtitle = results[i].Title;
					var cxstatus = results[i].Status;
					var cxlanguage = results[i].Language;
					var cxdob = results[i].DOB;
					var cxanniv = results[i].Anniv;
					var cxaddrno = results[i].AddrNo;
					var cxstreet = results[i].Street;
					var cxapartaddr = results[i].ApartAddr;
					var cxaddress = results[i].Address;
					var cxbranch = results[i].Branch;
					var cxgrid = results[i].Grid;
					var cxofficeaddr = results[i].OfficeAddr;
					var cxofficeext = results[i].OfficeExt;
					var cxdept = results[i].Dept;
					var cxemail = results[i].Email;
					var cxdeliverynote = results[i].DeliveryNote;
					var cxstreetcode = results[i].StreetCode;
					var cxgridcode = results[i].GridCode;
				   

					$('#label-smsno').val(cxsmsno);
					$('#label-txtcxname').val(cxname);
					$("#opntitle").append("<option value='"+ cxtitle +"' selected>" + cxtitle + "</option>");
					$('#label-cxstatus').val(cxstatus);
					$('#label-cxdob').val(cxdob);
					$('#label-cxanniv').val(cxanniv);
					$('#label-addrno').val(cxaddrno);
					$('#label-cxgridstreet').val(cxstreet);
					$('#label-aprt').val(cxapartaddr);
					$('#label-cxaddr').val(cxaddress);
					$("#label-cxbranch").append("<option value='"+ cxbranch +"' selected>" + cxbranch + "</option>");
					$('#label-cxgrid').val(cxgrid);
					$('#label-company').val(cxofficeaddr);
					$('#label-ext').val(cxofficeext);
					$('#label-dept').val(cxdept);
					$('#label-email').val(cxemail);
					$('#label-note').val(cxdeliverynote);

					$('#label-cxgridstreetcode').val(cxstreetcode);
					$('#label-cxgridcode').val(cxgridcode);
					
					}    
					
				},
				error: function (e) {
					 alert('error');
				}
			}); 

	 }else{
		
					$('#label-smsno').val('');
					$('#label-txtcxname').val('');
					$("#opntitle").append("<option value='"+ '' +"' selected>" + '' + "</option>");
					$('#label-cxstatus').val('');
					$('#label-cxdob').val('');
					$('#label-cxanniv').val('');
					$('#label-addrno').val('');
					$('#label-cxgridstreet').val('');
					$('#label-aprt').val('');
					$('#label-cxaddr').val('');
					$("#label-cxbranch").append("<option value='"+ '' +"' selected>" + '' + "</option>");
					$('#label-cxgrid').val('');
					$('#label-company').val('');
					$('#label-ext').val('');
					$('#label-dept').val('');
					$('#label-email').val('');
					$('#label-note').val('');

					$('#label-cxgridstreetcode').val('');
					$('#label-cxgridcode').val('');
	 }

	});  


	});  


	// $(document).ready(function() {

	//     $.ajaxSetup({
	//     headers: {
	//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	//     }
	// });


	// $('#TxtRecipeName').keypress(function(){

	//  var MenuCode =document.getElementById( "TxtMenuCode" ).value;
	//  //var MenuCode="001R";
	//  alert(MenuCode);
	//         $.ajax({
	//             type:"GET",
	//             url:"/GetDiscountDetails/"+MenuCode,
	//             success : function(results) {
	//                 //console.log(results);
	//                 var len = results.length;

	//                 for(var i=0; i<len; i++){

	//                 var DiscCode = results[i].MenuDiscountCode;
	//                 var DiscDescription = results[i].MenuDiscountDisc;

	//                 //$('#label-smsno').val(cxsmsno);
	
	//                 $('#SelMenuDisc').append("<option value='"+ DiscCode +"' selected>" + DiscDescription + "</option>");
	//                 }    
					
	//             },
	//             error: function(results) {
	//             //alert(results.responseJSON.message);
	//             }
	//         }); 

	// });  
	// });  


var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){

  $( '#TxtRecipeName' ).autocomplete({
   
	source: function( request, response ) {
	  // Fetch data
	  $.ajax({
		url:"{{route('SalesCenter.GetMainMenu')}}",
		type: 'POST',
		dataType: "JSON",
		data: {
		   _token: CSRF_TOKEN,
		   search: request.term
		},
		success: function( data ) {
		   response( data );
		}
	   
	  });
	},
	select: function (event, ui) {           

	   $('#TxtRecipeName').val(ui.item.label); // display the selected text
	   $('#TxtMenuCode').val(ui.item.menucode); 
	   $('#TxtUnitPrice').val(ui.item.value); // save selected id to input 
	   $('#TxtQty').val(1);
	   $('#TxtDiscount').val("0.00");
	   $('#TxtValue').val(ui.item.value +".00");
	   
	   var MenuCode =document.getElementById( "TxtMenuCode" ).value;
	   var MenuQty =document.getElementById( "TxtQty" ).value;

	   if (MenuQty != '') {

			$.ajax({
				type:"GET",
				url:"/GetDiscountDetails/"+MenuCode+"/"+1,
				success : function(results) {
					//console.log(results);
					var len = results.length;

					for(var i=0; i<len; i++){

					var DiscCode = results[i].MenuDiscountCode;
					var DiscDescription = results[i].MenuDiscountDisc;
	
					$('#SelMenuDisc').append("<option value=''>No Promotion</option><option value='"+ DiscCode +"' selected>" + DiscDescription + "</option>");
					} 
					  
					
				},
				error: function(results) {
				//alert(results.responseJSON.message);
				}
			}); 

		}

	   return false;
	}
  });

});


var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){

  $( "#label-cxgridstreet" ).autocomplete({
   
	source: function( request, response ) {
	  // Fetch data
	  $.ajax({
		url:"{{route('SalesCenter.GetStreet')}}",
		type: 'POST',
		dataType: "json",
		data: {
		   _token: CSRF_TOKEN,
		   search2: request.term
		},
		
		success: function( data ) {
		   response( data );

		}
	  });
	}, select: function (event, ui) {
		
		//$(this).val(ui.item.streetname);
	   $( '#label-cxgridstreet' ).val( ui.item.label + " | " + ui.item.grid); 
	   $( '#label-cxgrid' ).val( ui.item.grid ); 
	   $( '#label-cxgridcode' ).val( ui.item.gridcode );
	   $( '#label-cxgridstreetcode' ).val( ui.item.value );
	   $( '#label-cxbranch' ).val( ui.item.outlet ); 

	   return false;
	}
  });

});

$(document).ready(function(){
	var no = 0;

	$("#btnadd_menu").click(function(){
		no++;
		//alert(no);
		var TxtRecipeName = $("#TxtRecipeName").val();
		var TxtMenuCode = $("#TxtMenuCode").val();
		var TxtRemark = $("#TxtRemark").val();
		var TxtQty = Number($("#TxtQty").val()).toFixed(2);
		var TxtUnitPrice = Number($("#TxtUnitPrice").val()).toFixed(2);
		var TxtDisc = Number($("#TxtDiscount").val()).toFixed(2);
		var TxtValue = Number($("#TxtValue").val()).toFixed(2);
		var DiscCode = $("#SelMenuDisc").val();

		var Row = '<tr><td><input type="hidden" id="menucode_'+no+'" name="menucode[]" value="'+TxtMenuCode+'" />' + TxtRecipeName + '</td><td><input type="hidden" id="menuremark_'+no+'" name="menuremark[]" value="'+TxtRemark+'" />' + TxtRemark + '</td><td><input type="hidden" id="menuqty_'+no+'" name="menuqty[]" value="'+TxtQty+'" />' + TxtQty + '</td><td><input type="hidden" id="menuunitprice_'+no+'" name="menuunitprice[]" value="'+TxtUnitPrice+'" />' + TxtUnitPrice + '</td><td><input type="hidden" id="menudisc_'+no+'" name="menudisc[]" value="'+TxtDisc+'" />' + TxtDisc + '</td><td><input type="hidden" class="menusumvalue" id="menuvalue_'+no+'" name="menuvalue[]" value="'+TxtValue+'" />' + TxtValue + '</td> <td><input type="hidden" id="DiscCode_'+no+'" name="DiscCode[]" value="'+DiscCode+'" /><a href="#" type="button">X</a></td> </tr>';
		$("#MenuTable").append(Row);


		if (DiscCode != '') {
			
		$.ajax({
			
				type:"GET",
				url:"/AddMenuDiscount/"+TxtMenuCode,
				success : function(results) {
					//console.log(results);
					var len2 = results.length;

					for(var i=0; i<len2; i++){

					var DiscCodex = results[i].MenuDiscountCode;
					var DiscDescriptionx = results[i].MenuDiscountDisc;

					var BuyDescriptionx = results[i].BuyDescription;
					var GetDescriptionx = results[i].GetDescription;
					var BuyCodex = results[i].BuyCode;
					var GetCodex = results[i].GetCode;
					var GetQtyx = Number(results[i].GetQty).toFixed(2);
					var UnitPricex = "0.00";
					var Valuex = "0.00";

					$('#TxtDiscountCode').val(DiscCodex);

					var MenuDiscCodeLen = $.trim( jQuery('#TxtDiscountCode').val() );
					if ( MenuDiscCodeLen.length > 0 ) {

						document.getElementById('TxtPromotionlist').disabled = true; 
					}

					var Row2 = '<tr><td><input type="hidden" id="menucode_'+no+'" name="menucode[]" value="'+GetCodex+'" />' + GetDescriptionx + '</td><td><input type="hidden" id="menuremark_'+no+'" name="menuremark[]" value="" /></td><td><input type="hidden" id="menuqty_'+no+'" name="menuqty[]" value="'+ GetQtyx +'" />' + GetQtyx+ '</td><td><input type="hidden" id="menuunitprice_'+no+'" name="menuunitprice[]" value="'+UnitPricex+'" />'+UnitPricex+'</td><td><input type="hidden" id="menudisc_'+no+'" name="menudisc[]" value="'+Valuex+'" />' + DiscDescriptionx + '</td><td><input type="hidden" class="menusumvalue" id="menuvalue_'+no+'" name="menuvalue[]" value="'+Valuex+'" />'+ Valuex +'</td> <td><input type="hidden" id="DiscCode_'+no+'" name="DiscCode[]" value="'+DiscCodex+'" /><a href="#" type="button">X</a></td> </tr>';
					//var Row2 = '<tr><td><input type="hidden" id="menucodex_'+no+'" name="menucodex[]" value="'+GetCodex+'" />' + GetDescriptionx + '</td><td><input type="hidden" id="menuremarkx_'+no+'" name="menuremarkx[]" value="" /></td><td><input type="hidden" id="menuqtyx_'+no+'" name="menuqtyx[]" value="'+ GetQtyx +'" />' + GetQtyx + '</td><td><input type="hidden" id="menuunitpricex_'+no+'" name="menuunitpricex[]" value="'+UnitPricex+'" />'+UnitPricex+'</td><td><input type="hidden" id="menudiscx_'+no+'" name="menudiscx[]" value="'+DiscDescriptionx+'" />' + DiscDescriptionx + '</td><td><input type="hidden" class="menusumvaluex" id="menuvaluex_'+no+'" name="menuvaluex[]" value="'+Valuex+'" />'+ Valuex +'</td> <td><input type="hidden" id="DiscCodex_'+no+'" name="DiscCodex[]" value="'+DiscCodex+'" /><a href="#" type="button">X</a></td> </tr>';
					//var Row2 = '<tr><td><input type="hidden" id="menucodex_'+no+'" name="menucodex[]" value="" />hh</td><td><input type="hidden" id="menuremarkx_'+no+'" name="menuremarkx[]" value="" /></td><td><input type="hidden" id="menuqtyx_'+no+'" name="menuqtyx[]" value="" /></td><td><input type="hidden" id="menuunitpricex_'+no+'" name="menuunitpricex[]" value="" /></td><td><input type="hidden" id="menudiscx_'+no+'" name="menudiscx[]" value="" />jj</td><td><input type="hidden" class="menusumvaluex" id="menuvaluex_'+no+'" name="menuvaluex[]" value="" /></td> <td><input type="hidden" id="DiscCodex_'+no+'" name="DiscCodex[]" value="" /><a href="#" type="button">X</a></td> </tr>';
					$("#MenuTable").append(Row2);
					} 


					  
					
				},
				error: function(results) {
				//alert(results.responseJSON.message);
				}
			});
		
		}
		// var sum=0;
		// sum=parseInt(sum);
		// TxtValue=parseFloat(TxtValue);

		// for (var i = 1; i <= parseInt(no); i++) {

		//     //var menutot  = parseInt(document.getElementById("menutotprice2_"+i).value) ;

		//     sum += TxtValue;
			
			
		// }

		var sum = 0;
		$('.menusumvalue').each(function() {
		if($(this).val() != '' && !isNaN($(this).val())){
			sum += parseInt($(this).val());
		}
		});

		$('#TxtRemain').val(Number(sum).toFixed(2));
		$('#TxtAmount').val(Number(sum).toFixed(2));
				
		//document.getElementById("TxtAmount").value = Number(sum).toFixed(2);
		document.getElementById("TxtDiscount2").value = "0.00";

		document.getElementById('TxtRecipeName').value = "";
		document.getElementById("TxtQty").value = "";
		document.getElementById("TxtUnitPrice").value = "";
		document.getElementById("TxtDiscount").value = "";
		document.getElementById("TxtValue").value = "";
		document.getElementById("TxtRemark").value = "";
		document.getElementById("SelMenuDisc").value = "";
	   
		$('#SelMenuDisc').empty();

		document.getElementById('btnadd_menu').disabled = true; 
		CheckZeroval();


	});
	


	$('#MenuTable').on('click','tr a',function(e){
			e.preventDefault();
			$(this).parents('tr').remove();


			var sum = 0;
		$('.menusumvalue').each(function() {
		if($(this).val() != '' && !isNaN($(this).val())){
			sum += parseInt($(this).val());
		}
		});

		$('#TxtRemain').val(Number(sum).toFixed(2));
		$('#TxtAmount').val(Number(sum).toFixed(2));
		document.getElementById('TxtDiscountCode').value = "";

		});




		});    


$(document).ready(function(){
	var no = 0;
	$("#btnadd_pay").click(function(){
		no++;
		
		var PayType = document.getElementById("SelectPayTypes").value;
		var PayTypex = document.getElementById("SelectPayTypes");

		var TxtAmount = $("#TxtAmount").val();
		var TxtValue = $("#TxtAmount").val();
		var TxtPayRemark = $("#TxtPayRemark").val();
		var TxtPayType = PayTypex.options[PayTypex.selectedIndex].text;
		var TxtCardNo = $("#TxtCardNo").val();
		var TxtHolderName = $("#TxtHolderName").val();
		var TxtExpdate = $("#TxtExpdate").val();
		var TxtDiscount2 = $("#TxtDiscount2").val();
		

		var markup = '<tr><td><input type="hidden" id="TblPayCode_'+no+'" name="TblPayCode[]" value="'+PayType+'" />' + TxtPayType + '</td><td><input type="hidden" id="TblAmount_'+no+'" name="TblAmount[]" value="'+TxtAmount+'" />' + TxtAmount + '</td><td><input type="hidden" class="CloseTblValue" id="TblValue_'+no+'" name="TblValue[]" value="'+TxtValue+'" />' + TxtValue + '</td><td><input type="hidden" id="TblPayRemark_'+no+'" name="TblPayRemark[]" value="'+TxtPayRemark+'" />' + TxtPayRemark + '</td> <td><input type="hidden" id="TblCardNo_'+no+'" name="TblCardNo[]" value="'+TxtCardNo+'" /><input type="hidden" id="TblExpdate_'+no+'" name="TblExpdate[]" value="'+TxtExpdate+'" /><input type="hidden" id="TblHoldername_'+no+'" name="TblHoldername[]" value="'+TxtHolderName+'" /><a href="#" type="button">X</a></td></tr>';
		$("#PaymentTable").append(markup);

		$( "#TxtPromotionlist" ).prop( "disabled", true );

		var sum = 0;
		$('.menusumvalue').each(function() {
		if($(this).val() != '' && !isNaN($(this).val())){
			sum += parseInt($(this).val());
		}
		});

		var sum2 = 0;
		$('.CloseTblValue').each(function() {
		if($(this).val() != '' && !isNaN($(this).val())){
			sum2 += parseInt($(this).val());
		}
		});

		$('#TxtRemain').val(Number(sum - sum2 - TxtDiscount2).toFixed(2));
		$('#TxtAmount').val(Number(sum - sum2 - TxtDiscount2).toFixed(2));

		if(sum2 < 1000){
			var dc="100";
		}else{
			var dc="0";
		} 
		document.getElementById("label-subtotal").value = Number(sum).toFixed(2);
		document.getElementById("label-discount").value = Number(TxtDiscount2).toFixed(2);
		document.getElementById("label-deliverycharge").value = parseFloat(dc).toFixed(2);
		//var DeliveryCharge = document.getElementById("label-deliverycharge").value;
		document.getElementById("label-total").value = Number(parseFloat(sum2) + parseFloat(dc)).toFixed(2);

		var TxtRemain = $("#TxtRemain").val();

		if (TxtRemain == 0) {
			document.getElementById("Btn-PlaceOrder").disabled = false;
			document.getElementById("btnadd_pay").disabled = false;
		}
		CheckZeroval();
		//document.getElementById("TxtAmount").value = TxtAmount - (document.getElementById("label-subtotal").value) ;
	});
	
	$('#PaymentTable').on('click','tr a',function(e){
			e.preventDefault();
			$(this).parents('tr').remove();

			var TxtDiscount2 = $("#TxtDiscount2").val();
			var sum = 0;
		$('.menusumvalue').each(function() {
		if($(this).val() != '' && !isNaN($(this).val())){
			sum += parseInt($(this).val());
		}
		});

		var sum2 = 0;
		$('.ClaseTblValue').each(function() {
		if($(this).val() != '' && !isNaN($(this).val())){
			sum2 += parseInt($(this).val());
		}
		});

		$('#TxtRemain').val(Number(sum - sum2 - TxtDiscount2).toFixed(2));
		$('#TxtAmount').val(Number(sum - sum2 - TxtDiscount2).toFixed(2));


		if(sum2 < 1000){
			var dc="100";
		}else{
			var dc="0";
		} 
		document.getElementById("label-subtotal").value = Number(sum).toFixed(2);
		document.getElementById("label-discount").value = Number(TxtDiscount2).toFixed(2);
		document.getElementById("label-deliverycharge").value = parseFloat(dc).toFixed(2);
		//var DeliveryCharge = document.getElementById("label-deliverycharge").value;
		document.getElementById("label-total").value = Number(parseFloat(sum2) + parseFloat(dc)).toFixed(2);

		var TxtRemain = $("#TxtRemain").val();

		if (TxtRemain == 0) {
			document.getElementById("Btn-PlaceOrder").disabled = false;
			document.getElementById("btnadd_pay").disabled = false;
		}

		CheckZeroval();

		});

});    

$(document).ready(function(){
   
	$("#btnadd_past").click(function(){
		

			var FromDate = ($("#pstfromdate").val());
			var ToDate = ($("#psttodate").val());
			var Outlet = document.getElementById("pstbranch").value;
			var TellNo = ($("#psttelno").val());

		 $("#TblPassOrders td").empty().append("");
		 
		$.ajax({
			method: 'GET',
			url: '/Past-Order',
			data: { 'FromDate' : FromDate, 'ToDate' : ToDate , 'TellNo' : TellNo, 'Outlet' : Outlet},
			dataType: 'json',
			
			success: function(results) {
			   // response( results );

			var len = results.length;
					//alert(len);
				
				for(var i=0; i<len; i++){

				var OrderNo = results[i].OrderNo;   
				var TelNo = results[i].TelNo;
				var Customer = results[i].Customer;
				var DayOrdNo = results[i].DayOrdNo;

				var OrderType = results[i].OrderType;
				var OrderDate = results[i].OrderDate;
				var OrderTime = results[i].OrderTime;
				var DeliveryTime = results[i].DeliveryTime;
				var Outlet = results[i].Outlet;
				var UserID = results[i].UserID;
				var DispatchUser = results[i].DispatchUser;
				var Discount = results[i].Discount;
				var Total = results[i].Total;
				var DisCode = results[i].DisCode;
				var PayCode = results[i].PayCode;
				var OrderStatus = results[i].OrderStatus;
			

				var MenuDetailsAdd = '<tr id="'+ OrderNo +'"><td><input type="hidden" value="'+OrderNo+'" name="TxtPassOrder[]"/>' + TelNo + '</td><td>' + Customer + '</td><td>' + DayOrdNo + '</td><td>' + OrderType + '</td><td>' + OrderDate + '</td><td>' + DeliveryTime + '</td><td>'+Outlet+'</td><td>'+UserID+'</td><td>'+DispatchUser+'</td><td>'+Discount+'</td><td>'+Total+'</td><td>'+DisCode+'</td><td>'+PayCode+'</td><td>'+OrderStatus+'</td></tr>';
				
				$("#TblPassOrders tbody").append($(MenuDetailsAdd));
				
				

				} 



				$("#TblPassOrders tr").click(function() {

$("#TblOrderDetails tbody").empty().append("");

var Orderno = $(this).attr('id');
//alert(SelectedOrder);
$.ajax({
method: 'GET',
url: '/GetLiveOrderDetails/'+Orderno,
dataType: 'json',
success: function(results) {
   // response( results );

var len = results.length;
		//alert(len);
	
	for(var i=0; i<len; i++){
			
	var OrderNo = results[i].OrderNo;
	var MainMenuCode = results[i].MainMenuCode;
	var Qty = results[i].Qty.toFixed(2);
	var Rate = results[i].Rate.toFixed(2);
	var Discount = results[i].Discount.toFixed(2);
	var DiscCode = results[i].DiscCode;
	var Remarks = results[i].Remarks;
	var UnitPrice = results[i].UnitPrice.toFixed(2);
	var ApperOnInv = results[i].ApperOnInv;
	

	var MenuDetailsAdd = '<tr><td>' + ApperOnInv + '</td><td>' + Remarks + '</td><td>' + Qty + '</td><td>' + UnitPrice + '</td><td>' + Discount + '</td><td>' + Rate + '</td></tr>';
	
	$("#TblOrderDetails tbody").append($(MenuDetailsAdd));
	
	} 


}
});
});

			}
		});
	

	});
   

});    


function TotPriceCalc() {


var qty = document.getElementById("TxtQty").value;
var unitprice=document.getElementById( "TxtUnitPrice").value;
var ManualDiscount=document.getElementById( "TxtDiscount").value;

var subTot=(qty*unitprice)-(ManualDiscount);

document.getElementById("TxtValue").value = Number(subTot).toFixed(2);

var MenuCode =document.getElementById( "TxtMenuCode" ).value;
	   //var MenuQty =document.getElementById( "TxtQty" ).value;
	   if (qty != '') {

			$.ajax({
				type:"GET",
				url:"/GetDiscountDetails/"+MenuCode+"/"+qty,
				success : function(results) {
					//console.log(results);
					var len = results.length;

					for(var i=0; i<len; i++){

					var DiscCode = results[i].MenuDiscountCode;
					var DiscDescription = results[i].MenuDiscountDisc;
	
					$('#SelMenuDisc').append("<option value=''>No Promotion</option><option value='"+ DiscCode +"' selected>" + DiscDescription + "</option>");
					} 
					  
					
				},
				error: function(results) {
				//alert(results.responseJSON.message);
				}
			});

		}
		$('#SelMenuDisc').empty();
}


function CheckMenuEmpty() {
	if(document.getElementById("TxtRecipeName").value=="") { 
		document.getElementById('btnadd_menu').disabled = true; 
	} else { 
		document.getElementById('btnadd_menu').disabled = false;

	}
}

function CheckZeroval(){ 

var AmountInput = document.getElementById("TxtAmount").value;
if ((AmountInput == 0) || (AmountInput == "0.00"))
{
document.getElementById('btnadd_pay').disabled = true; 
}else{

document.getElementById('btnadd_pay').disabled = false; 
}

}

function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode != 46 && charCode > 31 
			&& (charCode < 48 || charCode > 57))
			return false;
			return true;
		} 

function limitNumber(limitField, limitNum) {
		if (limitField.value.length = limitNum) {
			limitField.value = limitField.value.substring(0, limitNum);
		}
	}

$(document).ready(function(){

		$("#TblPassOrders tr").click(function() {

		$("#TblOrderDetails tbody").empty().append("");

		var Orderno = $(this).attr('id');
		//alert(SelectedOrder);
		$.ajax({
			method: 'GET',
			url: '/GetLiveOrderDetails/'+Orderno,
			dataType: 'json',
			success: function(results) {
			   // response( results );

			var len = results.length;
					//alert(len);
				
				for(var i=0; i<len; i++){
						
				var OrderNo = results[i].OrderNo;
				var MainMenuCode = results[i].MainMenuCode;
				var Qty = results[i].Qty.toFixed(2);
				var Rate = results[i].Rate.toFixed(2);
				var Discount = results[i].Discount.toFixed(2);
				var DiscCode = results[i].DiscCode;
				var Remarks = results[i].Remarks;
				var UnitPrice = results[i].UnitPrice.toFixed(2);
				var ApperOnInv = results[i].ApperOnInv;
				

				var MenuDetailsAdd = '<tr><td>' + ApperOnInv + '</td><td>' + Remarks + '</td><td>' + Qty + '</td><td>' + UnitPrice + '</td><td>' + Discount + '</td><td>' + Rate + '</td></tr>';
				
				$("#TblOrderDetails tbody").append($(MenuDetailsAdd));
				
				} 


			}
		});
		});
});

function EnableDisableTextBox() {

	if (document.querySelector('input[name = RadioTimedorder]:checked')) {

		document.getElementById("TxtTimedOrder").disabled = false;
		document.getElementById("TxtFutureOrderdate").disabled = true;
		document.getElementById("TxtFutureOrdertime").disabled = true;
		document.getElementById('RadioFutureOrder').checked = false;

	}
}

function EnableDisableTextBox2() {
	
	 if(document.querySelector('input[name = RadioFutureOrder]:checked')){
		
		document.getElementById("TxtFutureOrderdate").disabled = false;
		document.getElementById("TxtFutureOrdertime").disabled = false;
		document.getElementById("TxtTimedOrder").disabled = true;
		document.getElementById('RadioTimedorder').checked = false;
	}
}


$(document).ready(function(){
$('#TxtPromotionlist').on('change', function() {

	$( "#SelMenuDisc" ).prop( "disabled", true );
	
	var BillDiscCode = $("#TxtPromotionlist").val();
	
	if (BillDiscCode != '') {
			
			$.ajax({
				
					type:"GET",
					url:"/AddBillDiscount/"+BillDiscCode,
					success : function(results) {
						//console.log(results);
						var len2 = results.length;

						for(var i=0; i<len2; i++){

						var BillDiscCode = results[i].BillDiscountCode;
						var BillDiscDescription = results[i].BillDescription;

						var BilldiscountType = results[i].BillDiscountType;
						var BillDiscountValueType = results[i].BillDiscountValueType;
						var BillDiscountValue = Number(results[i].BillDiscountValue).toFixed(2);

						
						$('#TxtDiscountCode').val(BillDiscCode);

						if(BillDiscountValueType == 1){

						var sum = 0;
						$('.menusumvalue').each(function() {
						if($(this).val() != '' && !isNaN($(this).val())){
							sum += parseInt($(this).val());
						}
						});

						//$('#TxtDiscountCode').val(BillDiscCode);
						$('#TxtRemain').val(Number(sum-(sum*BillDiscountValue/100)).toFixed(2));
						$('#TxtAmount').val(Number(sum-(sum*BillDiscountValue/100)).toFixed(2));

						$( '#TxtDiscount2' ).val( Number(sum*BillDiscountValue/100).toFixed(2) );
						}else{

							var sum = 0;
						$('.menusumvalue').each(function() {
						if($(this).val() != '' && !isNaN($(this).val())){
							sum += parseInt($(this).val());
						}
						});
						//$('#TxtDiscount2').val(BillDiscCode);
						$('#TxtRemain').val(Number(sum-BillDiscountValue).toFixed(2));
						$('#TxtAmount').val(Number(sum-BillDiscountValue).toFixed(2));

						$( '#TxtDiscount2' ).val( Number(BillDiscountValue).toFixed(2) );

						}
					} 
							
					},
					error: function(results) {
					//alert(results.responseJSON.message);
					}
				});
			
			}
});
});



$(document).ready(function(){
$('#PastOrd_CloseBtn').on('click', function () {
$('#PastOrderModalForm').trigger("reset");
location.replace("/SalesCenter")
//$("#TblPassOrders td").empty().append("");
//$("#TblOrderDetails td").empty().append("");
})
});


//Cancel

$(document).ready(function() {
 
 $('#label-cantelno').keyup(function(){

var cantel =document.getElementById( "label-cantelno" ).value;

var cantellen = $.trim( jQuery('#label-cantelno').val() );


if ( cantellen.length == 9 ) {
	$.ajax({
		type:"GET",
		url:"/GetCancelCustomerDetails/"+cantel,
		success : function(results) {
			//console.log(results);
			var len = results.length;

			for(var i=0; i<len; i++){
			var OrderNo = results[i].OrderNo;
			var DayOrdNo = results[i].DayOrdNo;
			var Branch = results[i].Branch;

			$('#selcanorderno').val(OrderNo);
			$('#label-candayorderno').val(DayOrdNo);
			$('#label-canoutlet').val(Branch);
			
			}    
			
		},
		error: function (e) {
			 alert('error');
		}
	}); 

}else{

			$('#selcanorderno').val('');
			$('#label-candayorderno').val('');
			$('#label-canoutlet').val('');

	}

});
});  


//Complaint

$(document).ready(function() {
 
 $('#label-comtelno').keyup(function(){

var comtel =document.getElementById( "label-comtelno" ).value;

var comtellen = $.trim( jQuery('#label-comtelno').val() );


if ( comtellen.length == 9 ) {
	$.ajax({
		type:"GET",
		url:"/GetComCustomerDetails/"+comtel,
		success : function(results) {
			//console.log(results);
			var len = results.length;

			for(var i=0; i<len; i++){
			var OrderNo = results[i].OrderNo;
			var DayOrdNo = results[i].DayOrdNo;
			var Branch = results[i].Branch;

			$('#label-comorderno').val(OrderNo);
			$('#label-comdayorderno').val(DayOrdNo);
			$('#label-comoutlet').val(Branch);
			
			}    
			
		},
		error: function (e) {
			 alert('error');
		}
	}); 

}else{

			$('#label-comorderno').val('');
			$('#label-comdayorderno').val('');
			$('#label-comoutlet').val('');

	}

});
});

	$(document).ready(function(){
   
   $("#btnadd_insertcom").click(function(){
	
	var TelNo = $('#label-comtelno').val();
	var OrderNo = $('#label-comorderno').val();
	var DayOrdNo = $('#label-comdayorderno').val();
	var Outlet = $('#label-comoutlet').val();
	var Source = $('#SelComplaintSource').val();
	var Category = $('#SelComplaintCategory').val();
	var SubCategory = $('#SelComplaintSubCategory').val();
	var Remark = $('#label-comremark').val();


	   $.ajax({
				type: 'post',
				url: '/Order-Complaint',
				data: {
					'TelNo' : TelNo, 'OrderNo' : OrderNo , 'DayOrdNo' : DayOrdNo, 'Outlet' : Outlet, 'Source' : Source, 'Category' : Category, 'SubCategory' : SubCategory, 'Remark' : Remark
				},
				success: function (response) {
					console.log(response);
					$('#label-comtelno').val("");
					$('#label-comorderno').val("");
					$('#label-comdayorderno').val("");
					$('#label-comoutlet').val("")
					$('#SelComplaintSource').val("");
					$('#SelComplaintCategory').val("");
					$('#SelComplaintSubCategory').val("");
					$('#label-comremark').val("");
				}
			});

   
   });      
});


//ComplaintResolution

$(document).ready(function() {
 
 $('#label-restelno').keyup(function(){

var restel =document.getElementById( "label-restelno" ).value;

var restellen = $.trim( jQuery('#label-restelno').val() );


if ( restellen.length == 9 ) {
	$.ajax({
		type:"GET",
		url:"/GetResCustomerDetails/"+restel,
		success : function(results) {
			//console.log(results);
			var len = results.length;

			for(var i=0; i<len; i++){
			var OrderNo = results[i].OrderNo;
			var DayOrdNo = results[i].DayOrdNo;
			var Branch = results[i].Branch;

			$('#label-resorderno').val(OrderNo);
			$('#label-resdayorderno').val(DayOrdNo);
			$('#label-resoutlet').val(Branch);
			
			}    
			
		},
		error: function (e) {
			 alert('error');
		}
	}); 

}else{

			$('#label-resorderno').val('');
			$('#label-resdayorderno').val('');
			$('#label-resoutlet').val('');

	}

});
});


$(document).ready(function(){
   
   $("#btnadd_res").click(function(){
	
	var TelNo = $('#label-restelno').val();
	var OrderNo = $('#label-resorderno').val();
	var DayOrdNo = $('#label-resdayorderno').val();
	var Outlet = $('#label-resoutlet').val();
	var ResType = $('#label-restype').val();
	var Remark = $('#label-rescmt').val();


	   $.ajax({
				type: 'post',
				url: '/Order-Resolution',
				data: {
					'TelNo' : TelNo, 'OrderNo' : OrderNo , 'DayOrdNo' : DayOrdNo, 'Outlet' : Outlet, 'ResType' : ResType, 'Remark' : Remark
				},
				success: function (response) {
					console.log(response);
					$('#label-restelno').val("");
					$('#label-resorderno').val("");
					$('#label-resdayorderno').val("");
					$('#label-resoutlet').val("")
					$('#label-restype').val("");
					$('#label-rescmt').val("");
				}
			});

   
   });      
});


