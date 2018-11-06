(function($) {
  "use strict";
  $(document).ready(function(){
	function slider_option(){
		var slider_post_value = $('#customize-control-cleanblog_slider_posts input:checked').val();
		if(slider_post_value == 'custom'){
			$('#customize-theme-controls #customize-control-cleanblog_slider_custom_id').fadeIn();
			$('#customize-theme-controls #customize-control-cleanblog_slider_category').hide();
			$('#customize-theme-controls #customize-control-cleanblog_slider_posts_num').hide();
			}
		else{
			$('#customize-theme-controls #customize-control-cleanblog_slider_custom_id').hide();
			$('#customize-theme-controls #customize-control-cleanblog_slider_category').fadeIn();
			$('#customize-theme-controls #customize-control-cleanblog_slider_posts_num').fadeIn();
			}
		}
		slider_option();
	$('#customize-control-cleanblog_slider_posts input').on('change',function() {
	slider_option();
	});
	function slider_type(){
		var slider_type = $('#customize-control-cleanblog_slider_type select').val();
		if(slider_type == 'carousel'){
			$('#customize-theme-controls #customize-control-cleanblog_slider_mode').hide();
			}
		else{
			$('#customize-theme-controls #customize-control-cleanblog_slider_mode').fadeIn();
			}
		}
		slider_type();	
	$('#customize-control-cleanblog_slider_type select').on('change',function() {
	slider_type();
	});
function header_layout_change(){
		var header_layout = $('#customize-control-cleanblog_header_style select').val();
		if(header_layout == 'style2'){
			$('#customize-theme-controls #customize-control-cleanblog_sticky_topbar').hide();
			}
		else{
			$('#customize-theme-controls #customize-control-cleanblog_sticky_topbar').fadeIn();
			}
		if(header_layout != 'style3'){
			$('#customize-theme-controls #customize-control-cleanblog_top_ad').hide();
			}
		else{
			$('#customize-theme-controls #customize-control-cleanblog_top_ad').fadeIn();
			}
		}
		header_layout_change();	
	$('#customize-control-cleanblog_header_style select').on('change',function() {
	header_layout_change();
	});	
    });
})(jQuery);