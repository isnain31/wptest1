<?php
$content_width = (int)get_theme_mod('cleanblog_content_width',1100);
	$logo_width = (int)get_theme_mod('cleanblog_logo_width','250');
	$cleanblog_logo_top = (int)get_theme_mod('cleanblog_logo_top',50);
	$cleanblog_logo_bottom = (int)get_theme_mod('cleanblog_logo_bottom',50);
	$cleanblog_tagline_margin = (int)get_theme_mod('cleanblog_tagline_margin',5);
	
	//Main Color Options
	$cleanblog_primary_color = get_theme_mod('cleanblog_primary_color','#C09E77');
	$cleanblog_secondary_color = get_theme_mod('cleanblog_secondary_color','#A46B2B');
	$cleanblog_main_background_color = get_theme_mod('cleanblog_main_background_color','#14141B');
	$cleanblog_body_text_color = get_theme_mod('cleanblog_body_text_color','#333333');
	$cleanblog_post_title_color = get_theme_mod('cleanblog_post_title_color','#14141B');
	$cleanblog_body_link_color = get_theme_mod('cleanblog_body_link_color','#C09E77');
	$cleanblog_body_link_hover_color = get_theme_mod('cleanblog_body_link_hover_color','#A46B2B');
	
	// Header Color Options
	$cleanblog_header_background_color = get_theme_mod('cleanblog_header_background_color','#14141B');
	$cleanblog_menu_text_color = get_theme_mod('cleanblog_menu_text_color','#ffffff');
	$cleanblog_menu_text_hover_color = get_theme_mod('cleanblog_menu_text_hover_color','#C09E77');
	$cleanblog_menu_dividers_color = get_theme_mod('cleanblog_menu_dividers_color','#333333');
	$cleanblog_header_icons_color = get_theme_mod('cleanblog_header_icons_color','#C09E77');
	$cleanblog_header_icons_hover_color = get_theme_mod('cleanblog_header_icons_hover_color','#ffffff');
	$cleanblog_header_search_color = get_theme_mod('cleanblog_header_search_color','#aaaaaa');
	$cleanblog_logo_text_color = get_theme_mod('cleanblog_logo_text_color','#484848');
	$cleanblog_tagline_text_color = get_theme_mod('cleanblog_tagline_text_color','#C09E77');
	// Footer Color Options
	$cleanblog_foooter_widgets_background_color = get_theme_mod('cleanblog_foooter_widgets_background_color','#2F2F33');
	$cleanblog_foooter_widgets_text_color = get_theme_mod('cleanblog_foooter_widgets_text_color','#ffffff');
	$cleanblog_foooter_copyright_background_color = get_theme_mod('cleanblog_foooter_copyright_background_color','#14141B');
	$cleanblog_foooter_copyright_text_color = get_theme_mod('cleanblog_foooter_copyright_text_color','#837874');
	$cleanblog_footer_icons_color = get_theme_mod('cleanblog_footer_icons_color','#C09E77');
	$cleanblog_footer_icons_hover_color = get_theme_mod('cleanblog_footer_icons_hover_color','#ffffff');
	// Background Color Option
	$cleanblog_body_background_color = get_theme_mod('cleanblog_body_background_color','#ffffff');
	$cleanblog_container_background_color = get_theme_mod('cleanblog_container_background_color','#ffffff');
	// Custom CSS
	$cleanblog_custom_css = get_theme_mod('cleanblog_custom_css');
	
	//Typography
	$fonts_src = array("open_sans"=>"Open+Sans:400,300,600,400italic,700,800", "abel"=>"Abel", "abril_fatface"=>"Abril+Fatface
", "alegreya"=>"Alegreya:400,700,900,400italic", "alegreya_sans"=>"Alegreya+Sans:400,100,300,400italic,500,700,800,900", "amatic_sc"=>"Amatic+SC:400,700", "anton"=>"Anton", "architects_daughter"=>"Architects+Daughter", "archivo_narrow"=>"Archivo+Narrow:400,400italic,700", "arimo"=>"Arimo:400,400italic,700", "arvo"=>"Arvo:400,700,400italic", "asap"=>"Asap:400,400italic,700", "bangers"=>"Bangers", "benchnine"=>"BenchNine:400,300,700", "bitter"=>"Bitter:400,400italic,700", "bree_serif"=>"Bree+Serif", "cabin"=>"Cabin:400,400italic,500,600,700", "candal"=>"Candal", "catamaran"=>"Catamaran:400,100,200,300,500,600,700,800,900", "comfortaa"=>"Comfortaa:400,300,700", "crete_round"=>"Crete+Round:400,400italic", "crimson_text"=>"Crimson+Text:400,600,700,400italic", "cuprum"=>"Cuprum:400,400italic,700", "dancing_script"=>"Dancing+Script:400,700", "dosis"=>"Dosis:400,200,300,500,600,700,800", "droid_sans"=>"Droid+Sans:400,700", "droid_serif"=>"Droid+Serif:400,400italic,700", "eb_garamond"=>"EB+Garamond", "exo"=>"Exo:400,100,200,300,400italic,500,600,700,800,900", "exo_2"=>"Exo+2:400,100,200,300,400italic,500,600,700,800,900", "fira_sans"=>"Fira+Sans:400,300,400italic,500,700", "fjalla_one"=>"Fjalla+One", "francois_one"=>"Francois+One", "gloria_hallelujah"=>"Gloria+Hallelujah", "hammersmith_one"=>"Hammersmith+One", "hind"=>"Hind:400,300,500,600,700", "inconsolata"=>"Inconsolata:400,700", "indie_flower"=>"Indie+Flower", "josefin_sans"=>"Josefin+Sans:400,100,300,400italic,600,700'", "josefin_slab"=>"Josefin+Slab:400,100,300,400italic,600,700", "karla"=>"Karla:400,400italic,700", "kaushan_script"=>"Kaushan+Script", "lato"=>"Lato:400,100,300,400italic,700,900", "libre_baskerville"=>"Libre+Baskerville:400,400italic,700", "lobster"=>"Lobster", "lora"=>"Lora:400,400italic,700", "maven_pro"=>"Maven+Pro:400,500,700,900", "merriweather"=>"Merriweather:400,400italic,300,700,900", "merriweather_sans"=>"Merriweather+Sans:400,300,400italic,700,800", "monda"=>"Monda:400,700", "montserrat"=>"Montserrat:400,700", "muli"=>"Muli:400,300,400italic", "news_cycle"=>"News+Cycle:400,700", "noticia_text"=>"Noticia+Text:400,400italic,700", "noto_sans"=>"Noto+Sans:400,400italic,700", "noto_serif"=>"Noto+Serif:400,400italic,700", "nunito"=>"Nunito:400,300,700", "open_sans_condensed"=>"Open+Sans+Condensed:300,300italic,700", "orbitron"=>"Orbitron:400,500,700,900", "oswald"=>"Oswald:400,300,700", "oxygen"=>"Oxygen:400,300,700", "pacifico"=>"Pacifico", "passion_one"=>"Passion+One:400,700,900", "pathway_gothic_one"=>"Pathway+Gothic+One", "patua_one"=>"Patua+One", "play"=>"Play:400,700", "playfair_display"=>"Playfair+Display:400,400italic,700,900", "poiret_one"=>"Poiret+One", "pontano_sans"=>"Pontano+Sans", "poppins"=>"Poppins:400,300,500,600,700", "pt_sans"=>"PT+Sans:400,700,400italic", "pt_sans_caption"=>"PT+Sans+Caption:400,700", "pt_sans_narrow"=>"PT+Sans+Narrow:400,700", "pt_serif"=>"PT+Serif:400,400italic,700", "quattrocento_sans"=>"Quattrocento+Sans:400,700,400italic", "questrial"=>"Questrial", "quicksand"=>"Quicksand:400,300,700", "raleway"=>"Raleway:400,100,200,300,400italic,500,600,700,800,900", "righteous"=>"Righteous", "roboto"=>"Roboto:400,100,300,400italic,500,700,900", "roboto_condensed"=>"Roboto+Condensed:400,300,400italic,700", "roboto_mono"=>"Roboto+Mono:400,100,300,400italic,500,700", "roboto_slab"=>"Roboto+Slab:400,100,300,700", "rokkitt"=>"Rokkitt:400,700", "ropa_sans"=>"Ropa+Sans:400,400italic", "rubik"=>"Rubik:400,300,400italic,500,700,900", "russo_one"=>"Russo+One", "shadows_into_light"=>"Shadows+Into+Light", "sigmar_one"=>"Sigmar+One", "signika"=>"Signika:400,300,600,700", "slabo_27px"=>"Slabo+27px", "source_sans_pro"=>"Source+Sans+Pro:400,200,300,400italic,600,700,900", "source_serif_pro"=>"Source+Serif+Pro:400,600,700", "titillium_web"=>"Titillium+Web:400,200,300,400italic,600,700,900", "ubuntu"=>"Ubuntu:400,300,400italic,500,700", "ubuntu_condensed"=>"Ubuntu+Condensed", "varela_round"=>"Varela+Round", "vollkorn"=>"Vollkorn:400,400italic,700", "yanone_kaffeesatz"=>"Yanone+Kaffeesatz:400,200,300,700", "yellowtail"=>"Yellowtail", "kanit"=>"family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" );

$fonts_family = array("open_sans"=>"'Open Sans', sans-serif", "abel"=>"'Abel', sans-serif", "abril_fatface"=>"'Abril Fatface', cursive", "alegreya"=>"'Alegreya', serif", "alegreya_sans"=>"'Alegreya Sans', sans-serif", "amatic_sc"=>"'Amatic SC', cursive", "anton"=>"'Anton', sans-serif", "architects_daughter"=>"'Architects Daughter', cursive", "archivo_narrow"=>"'Archivo Narrow', sans-serif", "arimo"=>"'Arimo', sans-serif", "arvo"=>"'Arvo', serif", "asap"=>"'Asap', sans-serif", "bangers"=>"'Bangers', cursive", "benchnine"=>"'BenchNine', sans-serif", "bitter"=>"'Bitter', serif", "bree_serif"=>"'Bree Serif', serif", "cabin"=>"'Cabin', sans-serif", "candal"=>"'Candal', sans-serif", "catamaran"=>"'Catamaran', sans-serif", "comfortaa"=>"'Comfortaa', cursive", "crete_round"=>"'Crete Round', serif", "crimson_text"=>"'Crimson Text', serif", "cuprum"=>"'Cuprum', sans-serif", "dancing_script"=>"'Dancing Script', cursive", "dosis"=>"'Dosis', sans-serif", "droid_sans"=>"'Droid Sans', sans-serif", "droid_serif"=>"'Droid Serif', serif", "eb_garamond"=>"'EB Garamond', serif", "exo"=>"'Exo', sans-serif", "exo_2"=>"'Exo 2', sans-serif", "fira_sans"=>"'Fira Sans', sans-serif", "fjalla_one"=>"'Fjalla One', sans-serif", "francois_one"=>"'Francois One', sans-serif", "gloria_hallelujah"=>"'Gloria Hallelujah', cursive", "hammersmith_one"=>"'Hammersmith One', sans-serif", "hind"=>"'Hind', sans-serif", "inconsolata"=>"Inconsolata", "indie_flower"=>"'Indie Flower', cursive", "josefin_sans"=>"'Josefin Sans', sans-serif", "josefin_slab"=>"'Josefin Slab', serif", "karla"=>"'Karla', sans-serif", "kaushan_script"=>"'Kaushan Script', cursive", "lato"=>"'Lato', sans-serif", "libre_baskerville"=>"'Libre Baskerville', serif", "lobster"=>"'Lobster', cursive", "lora"=>"'Lora', serif", "maven_pro"=>"'Maven Pro', sans-serif", "merriweather"=>"'Merriweather', serif", "merriweather_sans"=>"'Merriweather Sans', sans-serif", "monda"=>"'Monda', sans-serif", "montserrat"=>"'Montserrat', sans-serif", "muli"=>"'Muli', sans-serif", "news_cycle"=>"'News Cycle', sans-serif", "noticia_text"=>"'Noticia Text', serif", "noto_sans"=>"'Noto Sans', sans-serif", "noto_serif"=>"'Noto Serif', serif", "nunito"=>"'Nunito', sans-serif", "open_sans_condensed"=>"'Open Sans Condensed', sans-serif", "orbitron"=>"'Orbitron', sans-serif", "oswald"=>"'Oswald', sans-serif", "oxygen"=>"'Oxygen', sans-serif", "pacifico"=>"'Pacifico', cursive", "passion_one"=>"'Passion One', cursive", "pathway_gothic_one"=>"'Pathway Gothic One', sans-serif", "patua_one"=>"'Patua One', cursive", "play"=>"'Play', sans-serif", "playfair_display"=>"'Playfair Display', serif", "poiret_one"=>"'Poiret One', cursive", "pontano_sans"=>"'Pontano Sans', sans-serif", "poppins"=>"'Poppins', sans-serif;", "pt_sans"=>"'PT Sans', sans-serif", "pt_sans_caption"=>"'PT Sans Caption', sans-serif", "pt_sans_narrow"=>"'PT Sans Narrow', sans-serif", "pt_serif"=>"'PT Serif', serif", "quattrocento_sans"=>"'Quattrocento Sans', sans-serif", "questrial"=>"'Questrial', sans-serif", "quicksand"=>"'Quicksand', sans-serif", "raleway"=>"'Raleway', sans-serif", "righteous"=>"'Righteous', cursive", "roboto"=>"'Roboto', sans-serif", "roboto_condensed"=>"'Roboto Condensed', sans-serif", "roboto_mono"=>"'Roboto Mono'", "roboto_slab"=>"'Roboto Slab', serif", "rokkitt"=>"'Rokkitt', serif", "ropa_sans"=>"'Ropa Sans', sans-serif", "rubik"=>"'Rubik', sans-serif", "russo_one"=>"'Russo One', sans-serif", "shadows_into_light"=>"'Shadows Into Light', cursive", "sigmar_one"=>"'Sigmar One', cursive", "signika"=>"'Signika', sans-serif", "slabo_27px"=>"'Slabo 27px', serif", "source_sans_pro"=>"'Source Sans Pro', sans-serif", "source_serif_pro"=>"'Source Serif Pro', serif", "titillium_web"=>"'Titillium Web', sans-serif", "ubuntu"=>"'Ubuntu', sans-serif", "ubuntu_condensed"=>"'Ubuntu Condensed', sans-serif", "varela_round"=>"'Varela Round', sans-serif", "vollkorn"=>"'Vollkorn', serif", "yanone_kaffeesatz"=>"'Yanone Kaffeesatz', sans-serif", "yellowtail"=>"'Yellowtail', cursive", "kanit"=>"'Kanit', sans-serif");

	$cleanblog_menu_font = get_theme_mod('cleanblog_menu_font','source_sans_pro');
	$cleanblog_logo_font = get_theme_mod('cleanblog_logo_font','open_sans');
	$cleanblog_tagline_font = get_theme_mod('cleanblog_tagline_font','open_sans');
	$cleanblog_body_font = get_theme_mod('cleanblog_body_font','open_sans');
	$cleanblog_title_font = get_theme_mod('cleanblog_title_font','open_sans');
	$cleanblog_widget_title_font = get_theme_mod('cleanblog_widget_title_font','open_sans');
	$cleanblog_slider_title_font = get_theme_mod('cleanblog_slider_title_font','open_sans');
	
	$cleanblog_menu_font_size = get_theme_mod('cleanblog_menu_font_size','14');
	$cleanblog_logo_font_size = get_theme_mod('cleanblog_logo_font_size','50');
	$cleanblog_tagline_font_size = get_theme_mod('cleanblog_tagline_font_size','17');
	$cleanblog_body_font_size = get_theme_mod('cleanblog_body_font_size','14');
	$cleanblog_body_line_height = get_theme_mod('cleanblog_body_line_height','24');
	$cleanblog_list_line_height = get_theme_mod('cleanblog_list_line_height','22');
	$cleanblog_single_title_font_size = get_theme_mod('cleanblog_single_title_font_size','24');
	$cleanblog_list_grid_title_font_size = get_theme_mod('cleanblog_list_grid_title_font_size','20');
	$cleanblog_standard_title_font_size = get_theme_mod('cleanblog_standard_title_font_size','24');
	$cleanblog_widgets_title_font_size = get_theme_mod('cleanblog_widgets_title_font_size','18');
	$cleanblog_slider_title_font_size = get_theme_mod('cleanblog_slider_title_font_size','22');
	
	$cleanblog_used_fonts = array($cleanblog_menu_font, $cleanblog_logo_font, $cleanblog_tagline_font, $cleanblog_body_font, $cleanblog_title_font, $cleanblog_widget_title_font, $cleanblog_slider_title_font);
	$cleanblog_used_fonts = array_unique($cleanblog_used_fonts);
	$cleanblogg_header_img = get_header_image();
	
	if (!empty($content_width) && $content_width <= 1400 && $content_width >= 800):
	$content_width = $content_width;	
	else:
	$content_width = 1100;	
	endif;
$custom_css = "
     .cb-logo .cb-site-title a{
		display:inline-block;
		}
	.cb-header .cb-logo {
		margin-top:{$cleanblog_logo_top}px;
		margin-bottom:{$cleanblog_logo_bottom}px;
		}
	.cb-header-style5 .cb-header{
		padding-top:{$cleanblog_logo_top}px;
		padding-bottom:{$cleanblog_logo_bottom}px;
		}
	header.cb-header .cb-logo .cb-tagline{
	margin-top:{$cleanblog_tagline_margin}px;	
		}
	.container-fluid, #cb-main.cb-box-layout {
		max-width: {$content_width}px;
		}
	.cb-logo .cb-site-title a img{ 
	width:{$logo_width}px!important;
	display: inline-block; 
	}
	body{
	background-color:{$cleanblog_body_background_color}!important;
	}
	.cb-main-slider .container-fluid, .cb-content .container-fluid,.cb-header .cb-bottom-menu .container-fluid, .cb-header-style5 .cb-header{
	background-color: {$cleanblog_container_background_color};
	}
	.cb-header .cb-top-bar, .cb-header .cb-nav ul li ul.sub-menu li {
    background-color: {$cleanblog_header_background_color};
	}
	.cb-header .cb-nav ul li a:hover, .cb-header .cb-nav ul li.current-menu-item > a, .cb-header .cb-nav ul li.current-menu-parent > a, .cb-header .cb-bottom-nav .cb-nav ul li a:hover{
	color: {$cleanblog_menu_text_hover_color};
	}
	.cb-header .cb-nav > ul > li, .cb-header .cb-nav ul li ul.sub-menu li, .cb-header .cb-nav ul li ul.sub-menu li ul.sub-menu, .cb-header .cb-bottom-nav .cb-nav ul li ul.sub-menu li, .cb-header .cb-bottom-nav .cb-nav ul li ul.sub-menu li:first-child{
    border-color:{$cleanblog_menu_dividers_color};
	}
	.cb-header .cb-top-social a i,.cb-header .cb-top-search-btn{
    color: {$cleanblog_header_icons_color};
	}
	.cb-header .cb-top-search-btn{
	border-color:{$cleanblog_header_icons_color};	
	}
	.cb-header .cb-top-social a i:hover, .cb-header .cb-top-search-btn:hover{
	color:{$cleanblog_header_icons_hover_color};
	}
	.cb-header .search-form input.s,.cb-header .search-form .search-submit{
	color:{$cleanblog_header_search_color};	
	}
	.cb-header-style2 .cb-header .search-form input.s{
	border-color:{$cleanblog_header_search_color};	
	}
	.cb-header .cb-top-search-btn:hover{
	border-color:{$cleanblog_header_icons_hover_color};	
		}
	.cb-header .cb-logo .cb-site-title a {
    color: {$cleanblog_logo_text_color};
	}
	.cb-header .cb-logo .cb-tagline{
	color: {$cleanblog_tagline_text_color};	
		}
	#cb-footer .cb-footer-widgets {
    background-color: {$cleanblog_foooter_widgets_background_color};
	}
	#cb-footer, #cb-footer .widget-post-content {
    color: {$cleanblog_foooter_widgets_text_color};
	}
	#cb-footer .cb-socket {
    background-color: {$cleanblog_foooter_copyright_background_color};
	}
	#cb-footer .cb-footer-bottom p {
    color: {$cleanblog_foooter_copyright_text_color};
	}
	body {
    color: {$cleanblog_body_text_color};
	font-family:{$fonts_family[$cleanblog_body_font]};
	font-size: {$cleanblog_body_font_size}px;
	line-height: {$cleanblog_body_line_height}px;
	}
	.cb-post-content a:link,.cb-post-content  a:visited {
    color: {$cleanblog_body_link_color};
	}
	.cb-post-content a:hover,.cb-post-content a:active,.cb-post-content a:focus {
    color: {$cleanblog_body_link_hover_color};
	}
	.cb-slider .cb-slider-inner a.cb-more:hover, #sidebar .widget.null-instagram-feed .clear a:hover, .cb-post-cat .post-categories li,.widget h4.widget-title,.cb-main .cb-next-pre .cb-next-pre-icon {
	background-color:{$cleanblog_main_background_color};	
		}
	a:link, a:visited, .widget h4.widget-title, #cb-footer .widget-title, .cb-comment-list li .author, .widget .widget-nav-tabs li.active a, .wpcf7-form span.wpcf7-not-valid-tip, .search-form .search-submit{
	color:{$cleanblog_primary_color};	
		}
		a:hover,a:active,a:focus  {
	color:{$cleanblog_secondary_color};	
		}
		.wpcf7-form div.wpcf7-mail-sent-ok{
	border-color:{$cleanblog_secondary_color};
			}
	.cb-post-header hr, .cb-article-list a.cb-more, #cb-footer .widget-title hr, .cb-comments #respond small #cancel-comment-reply-link, .cb-comment	.reply a:hover, .cb-comments #respond small #cancel-comment-reply-link:hover, .widget .widget-nav-tabs li, .wpcf7-form .wpcf7-not-valid,.wpcf7-form div.wpcf7-validation-errors, .cb-article-list .cb-list-content hr, .cb-single .cb-post-tags a, .about-readmore{
	border-color:{$cleanblog_primary_color};	
		}
	.widget .widget-nav-tabs li, .cb-comment .reply a:hover, .cb-comments #respond small #cancel-comment-reply-link:hover, .cb-slider .cb-slider-inner a.cb-more, #sidebar .widget.null-instagram-feed .clear a, #cb-footer .cb-footer-instagram .widget.null-instagram-feed .widget-title, .widget.cb_mailchimp_widget input[type='submit'], #cb-footer .cb-footer-instagram .widget_pinterest-pinboard-widget h4.widget-title{
	background-color:{$cleanblog_primary_color};	
		}
	hr{
		border-top: 1px solid {$cleanblog_primary_color};
		}
	.cb-post-title a{
		color:{$cleanblog_post_title_color};
		}
	.cb-header .cb-nav ul li a{
	font-family: {$fonts_family[$cleanblog_menu_font]};
	font-size: {$cleanblog_menu_font_size}px;
	color: {$cleanblog_menu_text_color};
	}
	.cb-header .cb-menu-toggle{
	color: {$cleanblog_menu_text_color};	
		}
	#cb-footer .cb-footer-bottom .cb-footer-social a i{
	color:{$cleanblog_footer_icons_color};		
		}
	#cb-footer .cb-footer-bottom .cb-footer-social a i:hover{
	color:{$cleanblog_footer_icons_hover_color};		
		}	
	.cb-header .cb-logo .cb-site-title a {
	font-family: {$fonts_family[$cleanblog_logo_font]};
	font-size:{$cleanblog_logo_font_size}px;
	}
	.cb-header .cb-logo .cb-tagline {
	font-family: {$fonts_family[$cleanblog_tagline_font]};
	font-size: {$cleanblog_tagline_font_size}px;
	}
	.cb-post-title a, .cb-post-title {
    font-family: {$fonts_family[$cleanblog_title_font]};
	}
	.widget-title{
	font-family: {$fonts_family[$cleanblog_widget_title_font]};
	font-size:{$cleanblog_widgets_title_font_size}px;	
		}
	.cb-grid .cb-grid-entry p,.cb-article-list .cb-list-entry p {
	line-height:{$cleanblog_list_line_height}px;
		}
	.page .cb-post-title, .single-post .cb-post-title a{
	font-size:{$cleanblog_single_title_font_size}px;	
		}
	.cb-grid .cb-post-title a, .cb-article-list .cb-post-title a{
	font-size:{$cleanblog_list_grid_title_font_size}px;	
		}	
	.cb-article-standard h2.cb-post-title a{
	font-size:{$cleanblog_standard_title_font_size}px;	
		}
	.cb-slider .cb-slider-inner h2 a, .cb-carousal-slider h2 a, .cb-metro-slider .cb-metro-block .cb-slider-inner h2 a{
	font-family: {$fonts_family[$cleanblog_slider_title_font]};
	font-size:{$cleanblog_slider_title_font_size}px;		
		}
	@media only screen and (max-width:1199px){
	.cb-header-style3 .cb-header .cb-top-ad{
		margin-bottom:{$cleanblog_logo_bottom}px;
		}
}	
	@media only screen and (max-width:992px){
	.cb-header .cb-nav > ul {
    background-color: {$cleanblog_header_background_color};
	}
	.cb-header .cb-nav ul.menu li {
    border-top: 1px solid {$cleanblog_menu_dividers_color};
	}
	.cb-header .cb-nav ul.menu li ul.sub-menu li:first-child {
    border-top: 1px solid {$cleanblog_menu_dividers_color};
	}
	.cb-header .cb-nav ul.menu > li:last-child {
    border-bottom: 1px solid {$cleanblog_menu_dividers_color};
	}
		}
	";
	$custom_css .= "
	.woocommerce ul.products li.product .button, .woocommerce div.product div.images .woocommerce-product-gallery__trigger::after, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce-info::before, .widget_product_search .woocommerce-product-search input[type=submit]{
	background-color: {$cleanblog_primary_color};	
		}
	.woocommerce .star-rating, .woocommerce-info::before{
		color: {$cleanblog_primary_color};
		}
	.woocommerce ul.products li.product .onsale,.woocommerce span.onsale, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce input.button, .woocommerce-page #payment #place_order:hover, .widget_product_search .woocommerce-product-search input[type=submit]:hover {
    background-color: {$cleanblog_secondary_color};
}
.woocommerce-info {
    border-top-color: {$cleanblog_primary_color};
}
.woocommerce div.product div.images .woocommerce-product-gallery__trigger::before{
	border-color: {$cleanblog_primary_color};
	}
.woocommerce #review_form #respond .form-submit input#submit, .woocommerce a.remove:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #payment #place_order, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button{
	background-color:{$cleanblog_main_background_color};
	}
.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price{
	color:{$cleanblog_body_text_color};
	} 
";
if ( get_header_image() ) : 
$custom_css .= "
 .cb-header{
	background-image: url({$cleanblogg_header_img});
	background-repeat: no-repeat;
background-position: center;
background-size: cover;
	}
";
else:
$custom_css .= "
 .cb-header .container-fluid.cb-logo-container:background-color: {$cleanblog_container_background_color}; 
";
endif;
	/*Custom CSS*/
$cleanblog_custom_css = wp_filter_nohtml_kses ( $cleanblog_custom_css );
if ( ! empty( $custom_css ) ) {
  $custom_css .= $cleanblog_custom_css;
}
    wp_add_inline_style( 'cleanblogg_css', $custom_css );
	foreach($cleanblog_used_fonts as $usedfont ):
  		foreach($fonts_src as $fontkey => $font_value):
		if($fontkey == $usedfont):
		wp_enqueue_style( $usedfont, '//fonts.googleapis.com/css?family='.$font_value);/* Fonts */
		endif;
		endforeach;
	endforeach;
?>