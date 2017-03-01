/**
 * 
 *
 */
AddressHelperJS={

	/* Global variable declarations */
	addressId:null,
	
	/**
	 * 
	 */
	setCurrentAddressId:function(addressId){
		this.addressId = addressId;
	},
	
	/**
	 * 
	 */
	populateAddress:function(){
		$.ajax({
            url: "/address/ajaxGetAddress",
            type: "GET",
			dataType: "JSON",
            data: {addressId: AddressHelperJS.addressId},
            success: function (data) {	
				if (data.status == 'sucsess') {
					var address = data.address;
					document.getElementById('addressModal_address1').value = address.address1;
					document.getElementById('addressModal_address2').value = address.address2;
					document.getElementById('addressModal_city').value = address.city_name;
					document.getElementById('addressModal_phone').value = address.phone;
					document.getElementById('addressModal_mobile').value = address.mobile;
					document.getElementById('addressModal_orgname').value = address.orgname;
				}
            },
        });
	},
	
	/**
	 * Delete current selected address.
	 */
	ajaxDeleteAddress:function(){
		if (confirm('Are you sure to delete this address?')) {
			$.ajax({
				url: "/address/ajaxDeleteAddress",
				type: "GET",
				dataType: "JSON",
				data: {addressId: AddressHelperJS.addressId},
				success: function (data) {	
					if (data.status == 'sucsess') {
						$('#address_' + AddressHelperJS.addressId).remove();
					} else {
						alert('Unable to delete this address. Please try again.');
					}
				},
			});
		}
	},

	/**
	 * AJAX Save address.
	 */
	ajaxSaveAddress:function(){
		document.getElementById('addressModalErrorPanle').innerHTML = '';
		var addressId = this.addressId
		var address1 = document.getElementById('addressModal_address1').value;
		var address2 = document.getElementById('addressModal_address2').value;
		var cityId = document.getElementById('addressModal_city').value;
		var phone = document.getElementById('addressModal_phone').value;
		var mobile = document.getElementById('addressModal_mobile').value;
		var orgname = document.getElementById('addressModal_orgname').value;
		
		$.ajax({
			url: "/address/ajaxSaveAddress",
			type: "GET",
			dataType: "JSON",
			data: {addressId: addressId, address1: address1, address2: address2, cityId: cityId, phone: phone, mobile: mobile, orgname: orgname},
			success: function (data) {	
				if (data.status == 'sucsess') {
					$('#addressModal').modal('hide');
				} else {
					document.getElementById('addressModalErrorPanle').innerHTML = data.error;
				}
			},
			error: function (data) {
				document.getElementById('addressModalErrorPanle').innerHTML = 'Unable to save your address now. Please try again!';	
			}
		});
	},
	
	/**
	 * Show address modal.
	 */
	showModal:function(reset){
		this.showModal(reset, null);
	},
	
	/**
	 * Show address modal.
	 */
	showModal:function(reset, addressId){
		if (reset) {
			this.reset();
		} else {
			this.setCurrentAddressId(addressId);
			this.populateAddress();
		}
		$('#addressModal').modal('show');
	},
	
	/**
	 * Reset function.
	 */
	reset:function(){
		this.addressId = null;
		document.getElementById('addressModal_address1').value = '';
		document.getElementById('addressModal_address2').value = '';
		document.getElementById('addressModal_city').value = '';
		document.getElementById('addressModal_phone').value = '';
		document.getElementById('addressModal_mobile').value = '';
		document.getElementById('addressModal_orgname').value = '';
	},
}