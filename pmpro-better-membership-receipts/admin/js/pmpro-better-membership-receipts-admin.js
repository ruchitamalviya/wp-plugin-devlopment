(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );
jQuery(document).ready( function($){
	var mediaUploader;
	jQuery('#upload-receipt-logo').on('click',function(e){
		e.preventDefault();
		
		console.log("hello");
		//console.log(mediaUploader);
		
		if( mediaUploader ){
			mediaUploader.open();
			return;

		}
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Select a Picture',
			button: {
				text: 'Select Picture'
			},
			multiple: false
		});
		
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			console.log(attachment);
			$('#upload_receipt_logo').val(attachment.url);
			$('#logo_receipt_preview').css('background-image','url(' + attachment.url + ')');
		});
		
		mediaUploader.open();

	});	

});