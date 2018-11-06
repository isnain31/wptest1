(function($) {
  "use strict";
  $(document).ready(function(){
	$('#customize-control-cleanblog_header_style select option').each(function() {
		var header_style_value = $(this).val();
		if((header_style_value == 'style4') || (header_style_value == 'style5')){
       		$(this).attr('disabled','disabled');
		}
    });  
	$('#customize-control-cleanblog_single_template select option').each(function() {
		var template_value = $(this).val();
		if((template_value == 'template3') || (template_value == 'template4')){
       		$(this).attr('disabled','disabled');
		}
    });
	$('<div class="customizer-buttons"><a href="https://airthemes.net/cleanblog/" class="button button-secondary" style="display: block;max-width: 200px;text-align: center;margin: 0px auto 10px;" target="_blank">Pro Version ($19.90 only)</a><a href="https://airthemes.net/cleanblogg/documentation/" class="button button-secondary" style="display: block;max-width: 200px;text-align: center;margin: 0px auto 10px;" target="_blank">Documentation</a><a href="https://airthemes.net/support/" class="button button-secondary" style="display: block;max-width: 200px;text-align: center;margin: 0px auto 15px;" target="_blank">Support</a></div>').insertAfter('#customize-info');
	
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
		}
		header_layout_change();	
	$('#customize-control-cleanblog_header_style select').on('change',function() {
	header_layout_change();
	});
	
    });
})(jQuery);