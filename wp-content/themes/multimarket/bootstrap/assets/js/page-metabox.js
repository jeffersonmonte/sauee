(function( $ ) {
  "use strict";

	/* Page Templates Metabox */

	$("select#page_template").change(function(){
		$( "select#page_template option:selected").each(function(){
			switch($(this).attr("value")) {

				case "templates/archive.php" :
					$("#postdivrich").show();
					$("#commentstatusdiv").hide();
					$("#postimagediv").hide();
					$("#multimarket_page_details").show();
					$("#multimarket_contact_maps").hide();
				break;

				case "templates/contact.php" :
					$("#postdivrich").show();
					$("#multimarket_contact_maps").show();
					$("#commentstatusdiv").hide();
					$("#postimagediv").hide();
					$("#multimarket_page_details").show();
					$("#commentsdiv").hide();
				break;

				case "templates/blog.php" :
					$("#postdivrich").hide();
					$("#commentstatusdiv").hide();
					$("#postimagediv").hide();
					$("#multimarket_page_details").show();
					$("#multimarket_contact_maps").hide();
				break;

				default :
					$("#postdivrich").show();
					$("#commentstatusdiv").show();
					$("#postimagediv").show();
					$("#theme-layouts-post-meta-box").show();
					$("#multimarket_page_details").show();
					$("#multimarket_contact_maps").hide();
			}
		});
	}).change();

	/* End of Page Templates Metabox */
	var video_metabox 			= $("#multimarket_product_video_details");
	var audio_metabox 			= $("#multimarket_product_audio_details");
	var preview_metabox 		= $("#multimarket_product_live_preview");

	/* Product Type Metabox */
	$("input:radio[name=post_format]").change(function(){
		$( "input:radio[name=post_format]:checked").each(function(){
			switch($(this).attr("value")) {
				case "audio" :
					audio_metabox.fadeIn();
					video_metabox.hide();
				break;

				case "video" :
					audio_metabox.hide();
					video_metabox.fadeIn();
				break;

				default :
					audio_metabox.hide();
					video_metabox.hide();
					preview_metabox.fadeIn();
				break;
			}
		});
	}).change();

	/* End of Page Templates Metabox */

}(jQuery));

