
$( document ).ready(function() {
	// Get CurrentWeb Info
	var websiteName= window.location.hostname;
	var CurPage =window.location.pathname;
	var theDate = new Date();
	var theYear = theDate.getFullYear();


	$("#copyright").html('&copy; ' + websiteName + ' ' + theYear + '. All rights reserved.');

	//Function that must be on top
	$( function() {
	    $("#Bulanan").on("change",function(){

			var biaya= $(this).val(); 
			$(this).prop('value',moneyFormat(biaya));
			$(this).attr('value',Number(biaya));
	    });
	});

	$( function() {
	    $("#Potongan").on("change",function(){

			var biaya= $(this).val(); 
			$(this).prop('value',moneyFormat(biaya));
			$(this).attr('value',Number(biaya));
	    });
	});

	$( function() {
	    $("#btnSubmit").on("click",function(){
			if(CurPage.substring(0,10) == "/pelanggan") {
				var biaya= $("#Bulanan").val(); 
				$("#Bulanan").prop('value', dataFormat(biaya));
			}else if(CurPage.substring(0,8) == "/invoice" && CurPage.slice(-5) == "bayar" ){
				$("input").prop("disabled", false);
				var biaya= $("#Bulanan").val(); 
				$("#Bulanan").prop('value', dataFormat(biaya));
				var biaya= $("#Potongan").val(); 
				$("#Potongan").prop('value', dataFormat(biaya));
				var biaya= $("#PPN").val(); 
				$("#PPN").prop('value', dataFormat(biaya));
				var biaya= $("#Total").val(); 
				$("#Total").prop('value', dataFormat(biaya));
			}else if(CurPage.substring(0,8) == "/invoice"){
				var biaya= $("#Bulanan").val(); 
				$("#Bulanan").prop('value', dataFormat(biaya));
				var biaya= $("#Potongan").val(); 
				$("#Potongan").prop('value', dataFormat(biaya));
			}
	    });
	});

	function toDate(dateStr) {
	  var parts = dateStr.split("-")
	  return new Date(parts[0], parts[1] - 1, parts[2])
	}

	$( function() {
		$( "#datepicker" ).datepicker({
			changeMonth:true,
			changeYear:true,
		  	dateFormat: "dd M yy"	//dateFormat: "dd-mm-yy"
		});

	    $("#datepicker").on("change",function(){
	        var selected = $(this).val();
	        $("#datepicker").attr('value',selected);
	    });
	});

	$( function() {
		$( "#datepicker2" ).datepicker({
			changeMonth:true,
			changeYear:true,
		  	dateFormat: "dd M yy"	//dateFormat: "dd-mm-yy"
		});

	    $("#datepicker2").on("change",function(){
	        var selected = $(this).val();
	        $("#datepicker2").attr('value',selected);
	    });
	});

	function moneyFormat(fValue) {
		var oNumber = fValue;
		var eNumber ="";

		if (oNumber>999 && oNumber <=999999){	//1.000 - 999.999
				eNumber = String(oNumber).slice(-6,-3)+"."+String(oNumber).slice(-3);
		}else if(oNumber>999999 && oNumber <=999999999){	//1.000.000 - 999.999.999
				eNumber = String(oNumber).slice(-9,-6)+"."+String(oNumber).slice(-6,-3)+"."+String(oNumber).slice(-3);
		}else if(oNumber>999999999 && oNumber <=999999999999){	//1.000.000.000 - 999.999.999.999
				eNumber = String(oNumber).slice(-12,-9)+"."+String(oNumber).slice(-9,-6)+"."+String(oNumber).slice(-6,-3)+"."+String(oNumber).slice(-3);
		}else{
			eNumber= fValue;
		}
		return eNumber;
	}

	function dataFormat(fValue) {
		var oNumber = fValue;
		
		var eNumber ="";

		if (String(oNumber).slice(-4,-3)=="." && oNumber.length >=5 && oNumber.length <=7){	//1.000 - 999.999
				var g1 = String(oNumber).slice(-7,-4);
				var g2 = String(oNumber).slice(-3);
				eNumber = g1+g2;
		}else if(String(oNumber).slice(-4,-3)=="." && oNumber.length >=9 && oNumber.length <=11){	//1.000.000 - 999.999.999
				var g1 = String(oNumber).slice(-11,-8);
				var g2 = String(oNumber).slice(-7,-4);
				var g3 = String(oNumber).slice(-3);
				eNumber = g1+g2+g3;
		 }else if(String(oNumber).slice(-4,-3)=="." && oNumber.length >=13 && oNumber.length <=15){	//1.000.000.000 - 999.999.999.999
				var g1 = String(oNumber).slice(-15,-12);
				var g2 = String(oNumber).slice(-11,-8);
				var g2 = String(oNumber).slice(-7,-4);
				var g4 = String(oNumber).slice(-3);
				eNumber = g1+g2+g3+g4;
		 }else{
		 	eNumber= fValue;
		 }
		 return eNumber;
	}


	// Set BTS Dropdown Default Value when open Pelanggan Edit Pages
	if(CurPage.substring(0,10) == "/pelanggan") {
		// document.getElementById("demo1").innerHTML ="Page path is " + window.location.pathname;
  		
  		if(CurPage.slice(-4) == 'create'){

			var biaya= $("#Bulanan").val(); 
			$("#Bulanan").prop('value',moneyFormat(biaya));
			$("#Bulanan").attr('value',Number(biaya));

	    }else if(CurPage.slice(-4) == 'edit'){

	  		var OldVal = $(".btsselector").data("id");
		    $(".btsselector option").each(function(){
		                
		        if(OldVal  == $(this).text()){
		        	$(this).attr('selected','selected');
		        	$(this).prop('value',$(this).text());
		        }else{	
		        	$(this).removeAttr('selected');
		        }
		    });

			var biaya= $("#Bulanan").val(); 
			$("#Bulanan").prop('value',moneyFormat(biaya));
			$("#Bulanan").attr('value',Number(biaya));

	    };
	};

	// Set Dropdown Menu for BTS
	$( ".btsselector" ).change(function(){
	    var CurSel = $(this).find(":selected").text();
	    $(".btsselector option").each(function(){
	                
	        if(CurSel  == $(this).text() && $(this).text()!="Silahkan Pilih"){
	        	$(this).attr('selected','selected');
	        	$(this).prop('value',$(this).text());
	        }else{	
	        	$(this).removeAttr('selected');
	        }
	    });
	});

	$( "#CaraBayar" ).change(function(){
	    var CurSel = $(this).find(":selected").text();
	    $("#CaraBayar option").each(function(){
	                
	        if(CurSel  == $(this).text()){
	        	$(this).attr('selected','selected');
	        }else{	
	        	$(this).removeAttr('selected');
	        }
	    });
	});

	if(CurPage.substring(0,8) == "/invoice") {

		//Start to Add Month DropDown Item
		var month = new Array();
		month[1] = "January";
		month[2] = "February";
		month[3] = "March";
		month[4] = "April";
		month[5] = "May";
		month[6] = "June";
		month[7] = "July";
		month[8] = "August";
		month[9] = "September";
		month[10] = "October";
		month[11] = "November";
		month[12] = "December";

		//Month Dropdown
		var sel = $('<select />');

		for(var mon in month) 
		{
		 $('<option />', {value: mon, text: month[mon]}).appendTo(sel); 
		} 

		sel.appendTo('#MonthInvc');

	    $('#MonthInvc select').addClass('form-control');
	    $('#MonthInvc select').prop('name','SelMonth');
	    $('#MonthInvc select').prop('id','SelMonth');

		//Year Dropdown
	    var sel2 = $('<select />'); 
	    var StartYear = 2000;
	    var EndYear = 2099;

		var list = [];
		for (var i =  StartYear; i <= EndYear; i++) {
		    //list.push(i);
		    $('<option />', {value: i, text: i}).appendTo(sel2); 
		}

		sel2.appendTo('#YearInvc');

	    $('#YearInvc select').addClass('form-control');
	    $('#YearInvc select').prop('name','SelYear');
	    $('#YearInvc select').prop('id','SelYear');


	    $("#SelMonth option").each(function(){

	    	if(SelMonth == null){
	    		SelMonth = new Date().getMonth()+1;
	    	}
	        //alert($(this).val());
	        if(SelMonth  == $(this).val()){
	        	$(this).attr('selected','selected');

	        	var CurVal = $(this).val();
	        	//alert (CurVal +"-"+$(this).val());
	        	$('#SelMonth').attr('value',CurVal);
	        }else{	
	        	$(this).removeAttr('selected');
	        }
	    });

	    $("#SelYear option").each(function(){

	    	if(SelYear == null){
	    		SelYear = new Date().getFullYear();
	    	}
	        //alert($(this).val());
	        if(SelYear  == $(this).val()){
	        	$(this).attr('selected','selected');

	        	var CurVal = $(this).val();
	        	//alert (CurVal +"-"+$(this).val());
	        	$('#SelYear').attr('value',CurVal);
	        }else{	
	        	$(this).removeAttr('selected');
	        }
	    });

        $("tr #StatusBayar").each(function(){
	    	if ($(this).text()=="LUNAS"){
	    		$(this).parent().addClass("Lunas");
	    	}
        });
	    // $("tr").each(function(){
	    // 	var StatusBayar1 = $("#StatusBayar").text();
	    // 	var StatusBayar = $("#naper").text();
	    // 	alert(StatusBayar);
	    // 	if (StatusBayar=="LUNAS"){
	    // 		$("#InvcData tr").addClass("Lunas");
	    // 	}

	    // });


  		if(CurPage.slice(-4) == 'edit'){

			var biaya= $("#Bulanan").val(); 
			$("#Bulanan").prop('value',moneyFormat(biaya));
			$("#Bulanan").attr('value',Number(biaya));

			var biaya= $("#Potongan").val(); 
			$("#Potongan").prop('value',moneyFormat(biaya));
			$("#Potongan").attr('value',Number(biaya));
		}

  		if(CurPage.slice(-5) == 'bayar'){	

			var biaya= $("#Bulanan").val(); 
			$("#Bulanan").prop('value',moneyFormat(biaya));
			$("#Bulanan").attr('value',Number(biaya));

			var biaya= $("#Potongan").val(); 
			$("#Potongan").prop('value',moneyFormat(biaya));
			$("#Potongan").attr('value',Number(biaya));

			var biaya= $("#PPN").val(); 
			$("#PPN").prop('value',moneyFormat(biaya));
			$("#PPN").attr('value',Number(biaya));

			var biaya= $("#Total").val(); 
			$("#Total").prop('value',moneyFormat(biaya));
			$("#Total").attr('value',Number(biaya));
		}
	};

	$( "#SelMonth" ).change(function(){
	    var CurSel = $(this).find(":selected").text();
	    $("#SelMonth option").each(function(){
	                
	        if(CurSel  == $(this).text()){
	        	$(this).attr('selected','selected');

	        	var CurVal = $(this).val();
	        	// alert (CurSel +"-"+$(this).text());
	        	$('#SelMonth').attr('value',CurVal);
	        }else{	
	        	$(this).removeAttr('selected');
	        }
	    });
	});

	$( "#SelYear" ).change(function(){
	    var CurSel = $(this).find(":selected").text();
	    $("#SelYear option").each(function(){
	                
	        if(CurSel  == $(this).text() && $(this).text()!="Silahkan Pilih"){
	        	$(this).attr('selected','selected');
	        	$('#YearInvc').attr('value',CurVal);
	        	$('#SelYear').attr('value',$(this).val());
	        }else{	
	        	$(this).removeAttr('selected');
	        }
	    });
	});

	





	$('#password, #password_confirmation').on('keyup', function () {
	  if ($('#password').val() == $('#cpassword_confirmation').val()) {
	    $('#message').html('Matching').css('color', 'green');
	  } else 
	    $('#message').html('Not Matching').css('color', 'red');
	});


});