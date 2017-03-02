/**
 * Loading icon helper.
 *
 */
loadingHelperJS={

	/* Global variable declarations */
	LOADING_ICON_DIV_ID_SELECTORE: '#loadingIcon',
	
	/**
	 * 
	 */
	show:function(){
		$(this.LOADING_ICON_DIV_ID_SELECTORE).attr( "style", function( i, val ) {
		  return "display:block;";
		});
	},
	
	/**
	 * 
	 */
	hide:function(){
		$(this.LOADING_ICON_DIV_ID_SELECTORE).attr( "style", function( i, val ) {
		  return "";
		});
	},
	
}