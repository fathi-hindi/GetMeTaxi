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
}