/**
 * 
 *
 */
CheckoutHelperJS={

	/* Global variable declarations */
	
	/**
	 * This function called when ciyt is changed in Taxi booking section,
	 * to populate the taxi office in selected city.
	 * 
	 */
	taxi_onCityChange:function(select){
		var cityId = select.value;
		$.ajax({
            url: "/checkout/ajaxGetOfficesByCity",
            type: "GET",
			dataType: "JSON",
            data: {cityId: cityId},
            success: function (data) {	
				var taxiOfficeSelect = document.getElementById('taxi_taxiOffice');
				taxiOfficeSelect.options.length = 0;
				
				var objOption = document.createElement("option");
				if (data.length > 0 ) {
					for (i = 0; i < data.length; i++) { 
						objOption = document.createElement("option");
						objOption.text = data[i]['name'];
						objOption.value = data[i]['taxioffice_id'];
						taxiOfficeSelect.options.add(objOption);
					}
				}
            },
        });
	},
	
	/**
	 * 
	 * 
	 * 
	 */
	taxi_processOrder:function(){
		
		var fromAddress = document.getElementById('taxi_fromAddress').value;
		var toAddress = document.getElementById('taxi_toAddress').value;
		var cityId = document.getElementById('taxi_city').value;
		var taxiTypeId = document.getElementById('taxi_taxiType').value;
		var taxiOfficeId = document.getElementById('taxi_taxiOffice').value;
		var date = document.getElementById('taxi_date').value;
		var time = document.getElementById('taxi_time').value;
		var fristName = document.getElementById('taxi_firstName').value;
		var lastName = document.getElementById('taxi_lastName').value;
		var phone = document.getElementById('taxi_phone').value;
		var email = document.getElementById('taxi_email').value;
		
		$.ajax({
            url: "/checkout/ajaxProcessTaxiOrder",
            type: "POST",
			dataType: "JSON",
            data: {fromAddress: fromAddress, toAddress: toAddress, cityId: cityId
			, taxiTypeId: taxiTypeId, taxiOfficeId: taxiOfficeId, date: date,
			time: time, fristName: fristName, lastName: lastName, phone: phone, email: email},
            
			success: function (data) {	
				// display error message or redirect to confirmation view.
            },
        });
	},
	
	/**
	 * 
	 * 
	 * 
	 */
	taxi_goToStep:function(step){
		this.taxi_clearErrorMessage();
		if (step == 1 ){
			document.getElementById('taxi_step2').setAttribute('class', "nondisplay");
			document.getElementById('taxi_step1').setAttribute('class', "");
		} else if (step == 2) {
			var fromAddress = document.getElementById('taxi_fromAddress').value;
			var toAddress = document.getElementById('taxi_toAddress').value;
			var cityId = document.getElementById('taxi_city').value;
			var taxiTypeId = document.getElementById('taxi_taxiType').value;
			var taxiOfficeId = document.getElementById('taxi_taxiOffice').value;
			var date = document.getElementById('taxi_date').value;
			var time = document.getElementById('taxi_time').value;
			
			if (fromAddress == '') {
				this.taxi_setErrorMessage('Please enter valid pick-up address.');
				return;
			} else if (toAddress == '') {
				this.taxi_setErrorMessage('Please enter valid drop-off address.');
				return;
			} else if (cityId == '') {
				this.taxi_setErrorMessage('Please select valid city.');
				return;
			} else if (taxiTypeId == '') {
				this.taxi_setErrorMessage('Please select valid taxi type.');
				return;
			} else if (taxiOfficeId == '') {
				this.taxi_setErrorMessage('Please select valid taxi office.');
				return;
			} else if (date == '') {
				this.taxi_setErrorMessage('Please enter valid date.');
				return;
			} else if (time == '') {
				this.taxi_setErrorMessage('Please enter valid time.');
				return;
			}
			// TODO: go to next step in animation.
			document.getElementById('taxi_step1').setAttribute('class', "nondisplay");
			document.getElementById('taxi_step2').setAttribute('class', "");
		}
	},
	
	/**
	 * 
	 * 
	 * 
	 */
	taxi_step2ButtonHandler:function(){
		this.taxi_clearErrorMessage();
		var fristName = document.getElementById('taxi_firstName').value;
		var lastName = document.getElementById('taxi_lastName').value;
		var phone = document.getElementById('taxi_phone').value;
		var email = document.getElementById('taxi_email').value;
		
		if (fristName == '') {
			this.taxi_setErrorMessage('Please enter your first name.');
			return;
		} else if (lastName == '') {
			this.taxi_setErrorMessage('Please enter your last name.');
			return;
		} else if (phone == '') {
			this.taxi_setErrorMessage('Please enter valid phome number.');
			return;
		} else if (email == '') {
			this.taxi_setErrorMessage('Please enter valid email address.');
			return;
		} 
		
		this.taxi_processOrder();
	},
	
	/**
	 * 
	 */
	taxi_setErrorMessage:function(error){
		document.getElementById('taxi_error-message').innerHTML = error;
	},
	/**
	 * 
	 */
	taxi_clearErrorMessage:function(){
		document.getElementById('taxi_error-message').innerHTML = "";
	},
}