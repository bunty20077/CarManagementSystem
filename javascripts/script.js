/**
 * 
 */

function addCar() {
	var carmodel = document.getElementById("car-model").value;
	var registrationnumber = document.getElementById("registration-number").value;
	var purchaseddate = document.getElementById("purchased-date").value;

	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'carmodel=' + carmodel + '&registrationnumber=' + registrationnumber + '&purchaseddate=' + purchaseddate;
	if (carmodel == '' || registrationnumber == '' || purchaseddate == '') {
		alert("Please Fill All Fields");
	} else {
		// AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "RestService/AddCarService.php",
			data: dataString,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
};

function addDriver() {
	var firstname = document.getElementById("firstname").value;
	var lastname = document.getElementById("lastname").value;
	var phonenumber = document.getElementById("phonenumber").value;

	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'firstname=' + firstname + '&lastname=' + lastname + '&phonenumber=' + phonenumber;
	if (firstname == '' || lastname == '' || phonenumber == '') {
		alert("Please Fill All Fields");
	} else {
		// AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "RestService/AddDriverService.php",
			data: dataString,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
};

function addCompany() {
	var companyname = document.getElementById("companyname").value;
	var companymanager = document.getElementById("companymanager").value;
	var phonenumber = document.getElementById("companyphonenumber").value;
	var companyspoc = document.getElementById("companyspoc").value;
	var companyaddress = document.getElementById("companyaddress").value;
	var moredetails = document.getElementById("moredetails").value;
	

	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'companyname=' + companyname + '&companymanager=' + companymanager + '&phonenumber=' + phonenumber	+ '&companyspoc=' + companyspoc + '&companyaddress=' + companyaddress + '&moredetails=' + moredetails;
	if (companyname == '' || companymanager == '' || phonenumber == '' || companyspoc == '' || companyaddress == ''  || moredetails == '') {
		alert("Please Fill All Fields");
	} else {
		// AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "RestService/AddCompanyService.php",
			data: dataString,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
};

function addDetails() {
	
	var date = document.getElementById("date").value;
	var amount = document.getElementById("amount").value;
	var particulars = document.getElementById("particulars").value;
	var isCategoryChecked = document.getElementsByName("category");
	/*
	 * Fix for Git Issue #3
	 */
	var category;
	for (var i = 0, length = isCategoryChecked.length; i < length; i++) {
	    if (isCategoryChecked[i].checked) {
	       category = isCategoryChecked[i].value;
	        break;
	    }
	}

	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'date=' + date + '&category=' + category + '&amount=' + amount	+ '&particulars=' + particulars;
	if (date == '' || category == '' || amount == '' || particulars == '') {
		alert("Please Fill All Fields");
	} else {
		// AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "RestService/AddDetailsService.php",
			data: dataString,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
};

function addRunDistance() {
	
	var date = document.getElementById("date").value;
	var distance = document.getElementById("distance").value;
	var carid = document.getElementById("carid").value;
	
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'date=' + date + '&distance=' + distance + '&carid='+ carid;
	if (date == '' || distance == '' || carid == '') {
		alert("Please Fill All Fields");
	} else {
		// AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "RestService/AddDistanceRun.php",
			data: dataString,
			cache: false,
			success: function(html) {
				alert(html);
			}
		});
	}
	return false;
};

function fetchTotalDistanceRun() {
	

	
	// Returns successful data submission message when the entered information is stored in database.
	//var dataString = 'date=' + date + '&distance=' + distance + '&carid='+ carid;
	if (date == '' || distance == '' || carid == '') {
		alert("Please Fill All Fields");
	} else {
		// AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "RestService/TotalDistanceRun.php",
			//data: dataString,
			cache: false,
			success: function(html) {
				append(html);
			}
		});
	}
	return false;
};


function viewTransactions() {
	 
    $.ajax({
        type: "POST",
        url: "RestService/transactions.php",
        cache: false,
        success: function(html) {
            //alert(html);
            var obj = JSON.parse(html);
            var displaydate="";
            var particulars="";
            var credit="";
            var debit="";
            var balance="";               
            var statementTable = '';
            for (i = 0; i < obj.data.length; i++) { 
            statementTable+='<tr><td>'+obj.data[i].date+'</td><td>'+obj.data[i].particulars+'</td><td>'+obj.data[i].credit+'</td><td>'+obj.data[i].debit+'</td></tr>';
                    }
            document.getElementById("statementTbody").innerHTML = statementTable;
            document.getElementById("balanceview").innerHTML = obj.balance;
            document.getElementById("totalcreditview").innerHTML = obj.totcredit;
            document.getElementById("totaldebitview").innerHTML = obj.totdebit;
        }
    });

return false;
};

function notifyUser() {
	
		$.ajax({
		type: "GET",
		url: "RestService/NotifyService.php",
		cache: true,
		success: function(data) {
			var obj = JSON.parse(data);
			$.notify(obj);
		}
	});
	

return false;
};

