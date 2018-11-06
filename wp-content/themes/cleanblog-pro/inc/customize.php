<?php
function get_categories_select() {
  $teh_cats = get_categories();
  $results;
 
  $count = count($teh_cats);
  $results['0'] = __( 'All', 'cleanblog-pro' );
  for ($i=0; $i < $count; $i++) {
    if (isset($teh_cats[$i]))
      $results[$teh_cats[$i]->term_id] = $teh_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}
add_action( 'customize_register', 'themename_customize_register' );
function themename_customize_register($wp_customize) {
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Cleanblog_Customize_Misc_Control' ) ) :
class Cleanblog_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
		$fonts = array("open_sans"=>"Open Sans", "abel"=>"Abel", "abril_fatface"=>"Abril Fatface", "alegreya
"=>"Alegreya", "alegreya_sans"=>"Alegreya Sans", "amatic_sc"=>"Amatic SC", "anton"=>"Anton", "architects_daughter"=>"Architects Daughter", "archivo_narrow"=>"Archivo Narrow", "arimo"=>"Arimo", "arvo"=>"Arvo", "asap"=>"Asap", "bangers"=>"Bangers", "benchnine"=>"BenchNine", "bitter"=>"Bitter", "bree_serif"=>"Bree Serif", "cabin"=>"Cabin", "candal"=>"Candal", "catamaran"=>"Catamaran", "comfortaa"=>"Comfortaa", "crete_round"=>"Crete Round", "crimson_text"=>"Crimson Text", "cuprum"=>"Cuprum", "dancing_script"=>"Dancing Script", "dosis"=>"Dosis", "droid_sans"=>"Droid Sans", "droid_serif"=>"Droid Serif", "eb_garamond"=>"EB Garamond", "exo"=>"Exo", "exo_2"=>"Exo 2", "fira_sans"=>"Fira Sans", "fjalla_one"=>"Fjalla One", "francois_one"=>"Francois One", "gloria_hallelujah"=>"Gloria Hallelujah", "hammersmith_one"=>"Hammersmith One", "hind"=>"Hind", "inconsolata"=>"Inconsolata", "indie_flower"=>"Indie Flower", "josefin_sans"=>"Josefin Sans", "josefin_slab
"=>"Josefin Slab", "karla"=>"Karla", "kaushan_script"=>"Kaushan Script", "lato"=>"Lato", "libre_baskerville"=>"Libre Baskerville", "lobster"=>"Lobster", "lora"=>"Lora", "maven_pro"=>"Maven Pro", "merriweather"=>"Merriweather", "merriweather_sans"=>"Merriweather Sans", "monda"=>"Monda", "montserrat"=>"Montserrat", "muli"=>"Muli", "news_cycle"=>"News Cycle", "noticia_text"=>"Noticia Text", "noto_sans"=>"Noto Sans", "noto_serif"=>"Noto Serif", "nunito"=>"Nunito", "open_sans_condensed"=>"Open Sans Condensed", "orbitron"=>"Orbitron", "oswald"=>"Oswald", "oxygen"=>"Oxygen", "pacifico"=>"Pacifico", "passion_one"=>"Passion One", "pathway_gothic_one"=>"Pathway Gothic One", "patua_one"=>"Patua One", "play"=>"Play", "playfair_display"=>"Playfair Display", "poiret_one"=>"Poiret One", "pontano_sans
"=>"Pontano Sans", "poppins"=>"Poppins", "pt_sans"=>"PT Sans", "pt_sans_caption"=>"PT Sans Caption", "pt_sans_narrow"=>"PT Sans Narrow", "pt_serif"=>"PT Serif", "quattrocento_sans"=>"Quattrocento Sans", "questrial"=>"Questrial", "quicksand"=>"Quicksand", "raleway"=>"Raleway", "righteous"=>"Righteous", "roboto"=>"Roboto", "roboto_condensed"=>"Roboto Condensed", "roboto_mono"=>"Roboto Mono", "roboto_slab"=>"Roboto Slab", "rokkitt"=>"Rokkitt", "ropa_sans"=>"Ropa Sans", "rubik"=>"Rubik", "russo_one"=>"Russo One", "shadows_into_light"=>"Shadows Into Light", "sigmar_one"=>"Sigmar One", "signika"=>"Signika", "slabo_27px"=>"Slabo 27px", "source_sans_pro"=>"Source Sans Pro", "source_serif_pro"=>"Source Serif Pro", "titillium_web"=>"Titillium Web", "ubuntu"=>"Ubuntu", "ubuntu_condensed"=>"Ubuntu Condensed", "varela_round"=>"Varela Round", "vollkorn"=>"Vollkorn", "yanone_kaffeesatz"=>"Yanone Kaffeesatz", "yellowtail"=>"Yellowtail","kanit"=>"Kanit" );
        switch ( $this->type ) {
            default:
            case 'desc' :
                echo '<p class="description">' . $this->description . '</p>';
                break;
 
            case 'heading':
                echo '<span class="customize-control-title" style="background-color: rgb(255, 255, 255);padding: 3px 5px;text-align: center;border: 1px dashed rgb(218, 218, 218);margin: 10px -10px;">' . esc_html( $this->label ) . '</span>';
                break;
				
 			case 'title':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
				
            case 'line' :
                echo '<hr />';
                break;
				
			case 'textdesc' :
                ?><label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p class="description"><?php echo $this->description; ?></p>
            <input type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
        </label><?php
                break;
				
			case 'number' :
                ?><label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p class="description"><?php echo $this->description; ?></p>
            <input type="number" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
        </label><?php
                break;
			case 'fonts' :
                ?><label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p class="description"><?php echo $this->description; ?></p>
            <select <?php $this->link(); ?> style="min-width:97.5%;">
			<?php
            foreach ($fonts as $font_key => $font_value) {
    		echo '<option '.selected( $this->value(), $font_key ) .' value="'.$font_key.'">'.$font_value.'</option>';
			}
			?>
            </select>
			<?php
                break;	
        }
    }
}
endif;
//## Social Section
$wp_customize->add_section( 'cleanblog_social_section', array(
'title'          => __( 'Social Links', 'cleanblog-pro' ),
'priority'       => 36,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'social_message',
array(
'section'  => 'cleanblog_social_section',
'description' => __( 'Set the URLs for your social media profiles here to be used in the header and footer. Keep the fields empty if you won\'t be using your social media profiles.', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End	

// Show social icons in Header
$wp_customize->add_setting( 'cleanblog_social_in_header', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh') );

$wp_customize->add_control( 'cleanblog_social_in_header', array(
'label'      => __('Show/Hide Header Social Icons', 'cleanblog-pro'),
'section'    => 'cleanblog_social_section',
'settings'   => 'cleanblog_social_in_header',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' => 2
) );

// Show social icons in Footer
$wp_customize->add_setting( 'cleanblog_social_in_footer', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_social_in_footer', array(
'label'      => __('Show/Hide Footer Social Icons', 'cleanblog-pro'),
'section'    => 'cleanblog_social_section',
'settings'   => 'cleanblog_social_in_footer',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' => 3
) );

// Email
$wp_customize->add_setting( 'cleanblog_social_email', array(
'default'   => '',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_social_email', array(
'label' => __( 'Email', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 4
) );

// Facebook
$wp_customize->add_setting( 'cleanblog_fb', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_fb', array(
'label' => __( 'Facebook', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 5
) );

// Twitter
$wp_customize->add_setting( 'cleanblog_twitter', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_twitter', array(
'label' => __( 'Twitter', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 6
) );

// Google Plus
$wp_customize->add_setting( 'cleanblog_googleplus', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_googleplus', array(
'label' => __( 'Google +', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 7
) );

// Instagram
$wp_customize->add_setting( 'cleanblog_instagram', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_instagram', array(
'label' => __( 'Instagram', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 8
) );

// Pinterest
$wp_customize->add_setting( 'cleanblog_pinterest', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_pinterest', array(
'label' => __( 'Pinterest', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 9
) ); 

// LinkedIn
$wp_customize->add_setting( 'cleanblog_linkedin', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_linkedin', array(
'label' => __( 'LinkedIn', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 10
) ); 

// Tumblr
$wp_customize->add_setting( 'cleanblog_tumblr', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_tumblr', array(
'label' => __( 'Tumblr', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 11
) );  

// Flickr
$wp_customize->add_setting( 'cleanblog_flickr', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_flickr', array(
'label' => __( 'Flickr', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 12
) ); 
 
// Reddit
$wp_customize->add_setting( 'cleanblog_reddit', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_reddit', array(
'label' => __( 'Reddit', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 13
) );
 
// Youtube
$wp_customize->add_setting( 'cleanblog_youtube', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_youtube', array(
'label' => __( 'Youtube', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 14
) );

// Vimeo
$wp_customize->add_setting( 'cleanblog_vimeo', array(
'default'   => '',
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_vimeo', array(
'label' => __( 'Vimeo', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 15
) );
 
// RSS
$wp_customize->add_setting( 'cleanblog_rss', array(
'default'   =>'' ,
'sanitize_callback' => 'esc_url_raw',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_rss', array(
'label' => __( 'RSS Feed', 'cleanblog-pro' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 16
) );  

//## Header Section

$wp_customize->add_section( 'cleanblog_header_section', array(
'title'          => __( 'Header', 'cleanblog-pro' ),
'priority'       => 34,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'header_message',
array(
'section'  => 'cleanblog_header_section',
'description' => __( 'Manage elements of header.', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End

//Header Type
$wp_customize->add_setting( 'cleanblog_header_style', array(
'default'   => 'style1',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_header_style', array(
'label'      => __('Header Layout Style', 'cleanblog-pro'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_header_style',
'type'       => 'select',
'choices'    => array(
'style1' => __('Style 01 (Topbar W/ Menu + Below Logo)', 'cleanblog-pro'),
'style2' => __('Style 02 (Topbar + Below Logo + Below Menu)', 'cleanblog-pro'),
'style3' => __('Style 03 (Topbar W/ Menu + Logo left with Ad)', 'cleanblog-pro'),
'style4' => __('Style 04 (Logo + Bottom bar)', 'cleanblog-pro'),
'style5' => __('Style 05 (Inline Logo Menu &amp; Icons)', 'cleanblog-pro'),
),
'priority' => 2
) );
// Logo
$wp_customize->add_setting( 'cleanblog_logo', array(
'default' => '',
'sanitize_callback' => 'esc_url_raw', 
'transport' => 'refresh',
 ) );

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'cleanblog_logo', array(
'label' => __( 'Upload Logo', 'cleanblog-pro' ),
'section' => 'cleanblog_header_section',
'settings' => 'cleanblog_logo',
'priority' => 3
) ) );
 
// Logo Width
$wp_customize->add_setting( 'cleanblog_logo_width', array(
'default'   =>'250',
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_logo_width', array(
'label' => __( 'Logo Width (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_header_section',
'type' => 'text',
'priority' => 4
) );   

// Logo Top Margin
$wp_customize->add_setting( 'cleanblog_logo_top', array(
'default'   =>'50',
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_logo_top', array(
'label' => __( 'Logo Top Margin (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_header_section',
'type' => 'text',
'priority' => 5
) );  

// Logo Bottom Margin
$wp_customize->add_setting( 'cleanblog_logo_bottom', array(
'default'   =>'50',
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_logo_bottom', array(
'label' => __( 'Logo Bottom Margin (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_header_section',
'type' => 'text',
'priority' => 6
) );

// Margin Between Logo and Tagline
$wp_customize->add_setting( 'cleanblog_tagline_margin', array(
'default'   =>'5',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_tagline_margin', array(
'label' => __( 'Margin Between Logo and Tagline (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_header_section',
'type' => 'text',
'priority' => 7
) );

// Show Tagline
$wp_customize->add_setting( 'cleanblog_show_tagline', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_show_tagline', array(
'label'      => __('Show/Hide Tagline', 'cleanblog-pro'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_show_tagline',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' => 8
) ); 

// Show Search
$wp_customize->add_setting( 'cleanblog_show_search', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_show_search', array(
'label'      => __('Show/Hide Search Form', 'cleanblog-pro'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_show_search',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' => 9
) ); 

// Stick Topbar
$wp_customize->add_setting( 'cleanblog_sticky_topbar', array(
'default'   => 'off',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_sticky_topbar', array(
'label'      => __('On/Off Sticky Top Bar', 'cleanblog-pro'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_sticky_topbar',
'type'       => 'radio',
'choices'    => array(
'on' => __('On', 'cleanblog-pro'),
'off' => __('Off', 'cleanblog-pro'),
),
'priority' => 10
) ); 

//Header Ad Text
$wp_customize->add_setting( 'cleanblog_top_ad', array(
'default' => '',
'sanitize_callback' => 'balanceTags',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_top_ad', array(
'label' => __( 'Header Ad Code', 'cleanblog-pro' ),
'section' => 'cleanblog_header_section',
'type' => 'textarea',
'priority' => 11
) );

//## Footer Section
 
$wp_customize->add_section( 'cleanblog_footer_section', array(
'title'          => __( 'Footer', 'cleanblog-pro' ),
'priority'       => 36,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'footer_message',
array(
'section'  => 'cleanblog_footer_section',
'description' => __( 'Adjust your site\'s footer settings and widget areas to the specific number desired, and turn on or off the various parts as needed.', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End 

//Footer widgets
$wp_customize->add_setting( 'cleanblog_footer_widgets_show', array(
'default'   => 'none',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_footer_widgets_show', array(
'label'      => __('Footer Widgets', 'cleanblog-pro'),
'section'    => 'cleanblog_footer_section',
'settings'   => 'cleanblog_footer_widgets_show',
'type'       => 'radio',
'choices'    => array(
'none' => __('None (Disables Footer Widgets)', 'cleanblog-pro'),
'one' => __('One', 'cleanblog-pro'),
'two' => __('Two', 'cleanblog-pro'),
'three' => __('Three', 'cleanblog-pro'),
),
'priority' =>2
) ); 
//Footer socket Show/Hide	
$wp_customize->add_setting( 'cleanblog_footer_socket', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_footer_socket', array(
'label'      => __('Show/Hide Footer Socket', 'cleanblog-pro'),
'section'    => 'cleanblog_footer_section',
'settings'   => 'cleanblog_footer_socket',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' =>3
) ); 	

//Footer copyright Show/Hide	
$wp_customize->add_setting( 'cleanblog_footer_copyright_show', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_footer_copyright_show', array(
'label'      => __('Show/Hide Footer Copyright', 'cleanblog-pro'),
'section'    => 'cleanblog_footer_section',
'settings'   => 'cleanblog_footer_copyright_show',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' =>4
) ); 	
/* */
//Footer copyright Text
$wp_customize->add_setting( 'cleanblog_footer_copyright', array(
'default' => sprintf( __( 'Copyright 2015 CleanBlog | Theme by %s', 'cleanblog-pro' ), '<a href="http://airthemes.net/cleanblog" target="_blank">AirThemes</a>' ),
'sanitize_callback' => 'balanceTags',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_footer_copyright', array(
'label' => __( 'Copyright Content', 'cleanblog-pro' ),
'section' => 'cleanblog_footer_section',
'type' => 'textarea',
'priority' => 5
) );  

//## Slider Section

$wp_customize->add_section( 'cleanblog_slider_section', array(
'title'          => __( 'Slider', 'cleanblog-pro' ),
'priority'       => 35,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'slider_message',
array(
'section'  => 'cleanblog_slider_section',
'description' => __( 'Adjust your slider settings and customize slider posts.', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End  

//Slider Type	
$wp_customize->add_setting( 'cleanblog_slider_type', array(
'default'   => 'default',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_type', array(
'label'      => __('Home Slider Type', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_type',
'type'       => 'select',
'choices'    => array(
'default' => __('Default Slider (Single Image)', 'cleanblog-pro'),
'modern_carousel' => __('Modern Carousel (3 Images)', 'cleanblog-pro'),
'carousel' => __('Carousel Slider (3 Images)', 'cleanblog-pro'),
'carousel2' => __('Carousel Slider (2 Images)', 'cleanblog-pro'),
'metro' => __('Metro Slider (5 Images)', 'cleanblog-pro'),
),
'priority' => 2
) ); 	

//Slider Show/Hide	
$wp_customize->add_setting( 'cleanblog_slider_show', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_show', array(
'label'      => __('Show/Hide Slider', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_show',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' => 3
) ); 	

//Slider Posts
$wp_customize->add_setting( 'cleanblog_slider_posts', array(
'default'   => 'ASC',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_posts', array(
'label'      => __('Slider Posts', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_posts',
'type'       => 'radio',
'choices'    => array(
'ASC' => __('Recent Posts', 'cleanblog-pro'),
'comment_count' => __('Popular Posts', 'cleanblog-pro'),
'rand' => __('Random Posts', 'cleanblog-pro'),
'custom' => __('Custom (Add Posts by IDs)', 'cleanblog-pro'),
),
'priority' => 4
) ); 	

//Slider Categories
$wp_customize->add_setting( 'cleanblog_slider_category', array(
'default'   => '0',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_category', array(
'label'      => __('Slider Category', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_category',
'type'       => 'select',
'choices'    => get_categories_select(),
'priority' => 5
) ); 

// Slider Number of Posts 
$wp_customize->add_setting( 'cleanblog_slider_posts_num', array(
'default'   => '10',
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_slider_posts_num',
array(
'label'  => __('Number of Posts', 'cleanblog-pro'),
'section'  => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_posts_num',
'type' => 'textdesc',
'description' => __('Enter number of posts do you want show in the slider. Show all posts enter value "-1".', 'cleanblog-pro'),
'priority' => 6,
)));

// Slider Custom Posts id
$wp_customize->add_setting( 'cleanblog_slider_custom_id', array(
'default'   => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_slider_custom_id',
array(
'label'  => __('Posts IDs', 'cleanblog-pro'),
'section'  => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_custom_id',
'type' => 'textdesc',
'description' => __('Add your own posts Ids separated by comma. Ex: 8,12,17,25', 'cleanblog-pro'),
'priority' => 7,
)));
//Slider Automatically Transition	
$wp_customize->add_setting( 'cleanblog_slider_auto', array(
'default'   => 'true',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_auto', array(
'label'      => __('Automatically Transition', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_auto',
'type'       => 'radio',
'choices'    => array(
'true' => __('Yes', 'cleanblog-pro'),
'false' => __('No', 'cleanblog-pro'),
),
'priority' => 8
) ); 	

//Slider Transition	Mode
$wp_customize->add_setting( 'cleanblog_slider_mode', array(
'default'   => 'horizontal',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_mode', array(
'label'      => __('Transition Mode', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_mode',
'type'       => 'radio',
'choices'    => array(
'horizontal' => __('Slide', 'cleanblog-pro'),
'fade' => __('Fade', 'cleanblog-pro'),
),
'priority' => 9
) ); 	

//Slider Controls
$wp_customize->add_setting( 'cleanblog_slider_controls', array(
'default'   => true,
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_controls', array(
'label'      => __('Show/Hide Slider Controls', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_controls',
'type'       => 'radio',
'choices'    => array(
true => __('Show', 'cleanblog-pro'),
false => __('Hide', 'cleanblog-pro'),
),
'priority' => 10
) );
	
//Slider Date
$wp_customize->add_setting( 'cleanblog_slider_date', array(
'default'   => true,
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_date', array(
'label'      => __('Show/Hide Date in the Slider', 'cleanblog-pro'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_date',
'type'       => 'radio',
'choices'    => array(
true => __('Show', 'cleanblog-pro'),
false => __('Hide', 'cleanblog-pro'),
),
'priority' => 11
) );

//Slider Speed
$wp_customize->add_setting( 'cleanblog_slider_speed', array(
'default'   => '1000',
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_speed', array(
'label' => __( 'Transition Speed (ms)', 'cleanblog-pro' ),
'section' => 'cleanblog_slider_section',
'type' => 'text',
'priority' => 12
) );

//Slider Pause
$wp_customize->add_setting( 'cleanblog_slider_pause', array(
'default'   => '5000',
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_pause', array(
'label' => __( 'Pause Time (ms)', 'cleanblog-pro' ),
'section' => 'cleanblog_slider_section',
'type' => 'text',
'priority' => 13
) );

//## Layout Section

$wp_customize->add_section( 'cleanblog_layout_section', array(
'title'          => __( 'Layout', 'cleanblog-pro' ),
'priority'       => 35,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'layout_message',
array(
'section'  => 'cleanblog_layout_section',
'description' => __( 'Select your site\'s layout options here and manage blog listing layouts.', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End  

//Layout Type	
$wp_customize->add_setting( 'cleanblog_content_layout_type', array(
'default'   => 'wide-layout',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_content_layout_type', array(
'label'      => __('Layout Type', 'cleanblog-pro'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_content_layout_type',
'type'       => 'radio',
'choices'    => array(
'wide-layout' => __('Wide Layout', 'cleanblog-pro'),
'box-layout' => __('Box Layout', 'cleanblog-pro'),
),
'priority' =>2
) );

//Layout	
$wp_customize->add_setting( 'cleanblog_content_layout', array(
'default'   => 'right',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_content_layout', array(
'label'      => __('Default Layout', 'cleanblog-pro'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_content_layout',
'type'       => 'radio',
'choices'    => array(
'right' => __('Content Left, Sidebar Right', 'cleanblog-pro'),
'left' => __('Sidebar Left, Content Right', 'cleanblog-pro'),
'full' => __('Fullwidth', 'cleanblog-pro'),
),
'priority' => 3
) );
//Home Layout	
$wp_customize->add_setting( 'cleanblog_home_layout', array(
'default'   => 'default',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_home_layout', array(
'label'      => __('Home Page Layout', 'cleanblog-pro'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_home_layout',
'type'       => 'radio',
'choices'    => array(
'default' => __('Default', 'cleanblog-pro'),
'right' => __('Content Left, Sidebar Right', 'cleanblog-pro'),
'left' => __('Sidebar Left, Content Right', 'cleanblog-pro'),
'full' => __('Fullwidth', 'cleanblog-pro'),
),
'priority' => 4
) );

//Single Post Layout	
$wp_customize->add_setting( 'cleanblog_single_post_layout', array(
'default'   => 'default',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_single_post_layout', array(
'label'      => __('Single Post Layout', 'cleanblog-pro'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_single_post_layout',
'type'       => 'radio',
'choices'    => array(
'default' => __('Default', 'cleanblog-pro'),
'right' => __('Content Left, Sidebar Right', 'cleanblog-pro'),
'left' => __('Sidebar Left, Content Right', 'cleanblog-pro'),
'full' => __('Fullwidth', 'cleanblog-pro'),
),
'priority' => 5
) );
// Layout Width
$wp_customize->add_setting( 'cleanblog_content_width', array(
'default'   => '1100',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_content_width', array(
'type'        => 'number',
'priority'    => 6,
'section'     => 'cleanblog_layout_section',
'settings'   => 'cleanblog_content_width',
'label'       => __('Content Width (px)','cleanblog-pro'),
'description' => __('Enter value between 800px and 1400px.','cleanblog-pro'),
'input_attrs' => array(
'min'   => 800,
'max'   => 1400,
'step'  => 10,
'value' => 1100,
),
) );

//## Blog Section

$wp_customize->add_section( 'cleanblog_blog_section', array(
'title'          => __( 'Blog', 'cleanblog-pro' ),
'priority'       => 38,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'blog_message',
array(
'section'  => 'cleanblog_blog_section',
'description' => __( 'Adjust the style and layout of your blog using the settings below. This will effect the posts index page and archive, or search results pages of your blog. ', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End 

//Blog Default Style	
$wp_customize->add_setting( 'cleanblog_content_styles', array(
'default'   => 'grid',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_content_styles', array(
'label'      => __('Blog Default Style', 'cleanblog-pro'),
'section'    => 'cleanblog_blog_section',
'settings'   => 'cleanblog_content_styles',
'type'       => 'radio',
'choices'    => array(
'standard' => __('Standard Layout', 'cleanblog-pro'),
'list' => __('List Layout', 'cleanblog-pro'),
'grid' => __('Grid Layout', 'cleanblog-pro'),
),
'priority' => 2,
) );

//Blog Archive Style	
$wp_customize->add_setting( 'cleanblog_archive_style', array(
'default'   => 'grid',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_archive_style', array(
'label'      => __('Blog Archive Style', 'cleanblog-pro'),
'section'    => 'cleanblog_blog_section',
'settings'   => 'cleanblog_archive_style',
'type'       => 'radio',
'choices'    => array(
'standard' => __('Standard Layout', 'cleanblog-pro'),
'list' => __('List Layout', 'cleanblog-pro'),
'grid' => __('Grid Layout', 'cleanblog-pro'),
),
'priority' => 3,
) );

//First Full Post	
$wp_customize->add_setting( 'cleanblog_first_full', array(
'default'   => false,
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_first_full', array(
'label'      => __('First Full Post', 'cleanblog-pro'),
'section'    => 'cleanblog_blog_section',
'settings'   => 'cleanblog_first_full',
'type'       => 'radio',
'choices'    => array(
true => __('On', 'cleanblog-pro'),
false => __('Off', 'cleanblog-pro'),
),
'priority' => 4,
) );

$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'blog_list_title',
array(
'section'  => 'cleanblog_blog_section',
'label' => __( 'Show/hide Elements in Posts List', 'cleanblog-pro' ),
'type'     => 'title',
'priority' => 5,
)));


// Standerd Featured Image
$wp_customize->add_setting('cleanblog_list_featured_image_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_featured_image_show',array(
'label'     => __('Featured Image','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_list_featured_image_show',
'type'      => 'checkbox',
'priority' => 6,
)
)
);

// Standerd Category
$wp_customize->add_setting('cleanblog_list_category_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_category_show',array(
'label'     => __('Category','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_list_category_show',
'type'      => 'checkbox',
'priority' => 7,
)
)
);

// Standerd Date
$wp_customize->add_setting('cleanblog_list_date_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1',
 
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_date_show',array(
'label'     => __('Date','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_list_date_show',
'type'      => 'checkbox',
'priority' => 8,
)
)
);

// Standerd Author
$wp_customize->add_setting('cleanblog_list_author_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_author_show',array(
'label'     => __('Author','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_list_author_show',
'type'      => 'checkbox',
'priority' => 9,
)
)
);

// Standerd Comments
$wp_customize->add_setting('cleanblog_list_comments_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_comments_show',array(
'label'     => __('Comment Counts','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_list_comments_show',
'type'      => 'checkbox',
'priority' => 10,
)));

// Standerd Social Share
$wp_customize->add_setting('cleanblog_list_share_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_share_show',array(
'label'     => __('Share Icons','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_list_share_show',
'type'      => 'checkbox',
'priority' => 11,
)));

//Single Post Templates	
$wp_customize->add_setting( 'cleanblog_single_template', array(
'default'   => 'single',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_single_template', array(
'label'      => __('Single Page Template', 'cleanblog-pro'),
'section'    => 'cleanblog_blog_section',
'settings'   => 'cleanblog_single_template',
'type'       => 'select',
'choices'    => array(
'single' => __('Template 01', 'cleanblog-pro'),
'single2' => __('Template 02', 'cleanblog-pro'),
'single3' => __('Template 03', 'cleanblog-pro'),
'single4' => __('Template 04', 'cleanblog-pro'),
),
'priority' => 11,
) );

$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'blog_single_title',
array(
'section'  => 'cleanblog_blog_section',
'label' => __( 'Show/hide Elements in Single Post', 'cleanblog-pro' ),
'type'     => 'title',
'priority' => 12,
)));

// Single Featured Image
$wp_customize->add_setting('cleanblog_single_featured_image_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_featured_image_show',array(
'label'     => __('Featured Image','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_featured_image_show',
'type'      => 'checkbox',
'priority' => 13,
)
)
);

// Single Category
$wp_customize->add_setting('cleanblog_single_category_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_category_show',array(
'label'     => __('Category','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_category_show',
'type'      => 'checkbox',
'priority' => 14,
)
)
);

// Single Date
$wp_customize->add_setting('cleanblog_single_date_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_date_show',array(
'label'     => __('Date','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_date_show',
'type'      => 'checkbox',
'priority' => 15,
)
)
);

// Single Author
$wp_customize->add_setting('cleanblog_single_auth_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_auth_show',array(
'label'     => __('Author','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_auth_show',
'type'      => 'checkbox',
'priority' => 16,
)
)
);
// Single Comments
$wp_customize->add_setting('cleanblog_single_comments_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_comments_show',array(
'label'     => __('Comment Counts','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_comments_show',
'type'      => 'checkbox',
'priority' => 17,
)
)
);

// Single Social Share
$wp_customize->add_setting('cleanblog_single_share_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_share_show',array(
'label'     => __('Share Icons','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_share_show',
'type'      => 'checkbox',
'priority' => 18,
)));

// Single Tags
$wp_customize->add_setting('cleanblog_single_tags_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_tags_show',array(
'label'     => __('Tags','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_tags_show',
'type'      => 'checkbox',
'priority' => 19,
)));
// Single Author Bio Info
$wp_customize->add_setting('cleanblog_single_author_bio_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '0'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_author_bio_show',array(
'label'     => __('Author Bio Info','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_author_bio_show',
'type'      => 'checkbox',
'priority' => 20,
)));	

// Single Next Previous
$wp_customize->add_setting('cleanblog_single_next_prev_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '0'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_next_prev_show',array(
'label'     => __('Next Previous Posts','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_next_prev_show',
'type'      => 'checkbox',
'priority' => 21,
)));

// Single Related Posts
$wp_customize->add_setting('cleanblog_single_relatedpost_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'esc_url_raw',
'default'    => '0'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_relatedpost_show',array(
'label'     => __('Related Posts','cleanblog-pro'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_relatedpost_show',
'type'      => 'checkbox',
'priority' => 22,
)));
		
// Read More Text
$wp_customize->add_setting( 'cleanblog_read_more_text', array(
'default'   => 'Read More',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_read_more_text', array(
'label' => __( 'Read More Text', 'cleanblog-pro' ),
'section' => 'cleanblog_blog_section',
'type' => 'text',
'priority' => 23,
) ); 

//## Page Section

$wp_customize->add_section( 'cleanblog_page_section', array(
'title'          => __( 'Page', 'cleanblog-pro' ),
'sanitize_callback' => 'esc_url_raw',
'priority'       => 39,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'page_message',
array(
'section'  => 'cleanblog_page_section',
'description' => __( 'Adjust the style and layout of your page using the settings below.', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));

// Single Social Share
$wp_customize->add_setting('cleanblog_page_share_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_page_share_show',array(
'label'     => __('Show Share Icons','cleanblog-pro'),
'section'   => 'cleanblog_page_section',
'settings'  => 'cleanblog_page_share_show',
'type'      => 'checkbox',
'priority' => 2,
)));

// ## Styles

$wp_customize->add_section( 'cleanblog_style_section', array(
'title'          => __( 'Styles', 'cleanblog-pro' ),
'priority'       => 39,
) );
//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'styles_message',
array(
'section'  => 'cleanblog_style_section',
'label' => __( 'Main Styles', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 1,
)));
//Section Top Message End

// Main Color
$wp_customize->add_setting('cleanblog_primary_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#C09E77'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_primary_color', 
	array(
		'label'      => __( 'Primary Color', 'cleanblog-pro' ),
		'description'      => __( 'Primary color for link, colored elements, etc..', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_primary_color',
		'priority' => 2,
	)));

// Secondary Color
$wp_customize->add_setting('cleanblog_secondary_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#A46B2B'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_secondary_color', 
	array(
		'label'      => __( 'Secondary Color', 'cleanblog-pro' ),
		'description'      => __( 'Links hover, colored elements hover, etc..', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_secondary_color',
		'priority' => 3,
	)));	
// Main Background Color
$wp_customize->add_setting('cleanblog_main_background_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#14141B'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_main_background_color', 
	array(
		'label'      => __( 'Primary Background Color', 'cleanblog-pro' ),
		'description'      => __( 'Background of some elements like widget titles, category links, etc..', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_main_background_color',
		'priority' => 4,
	)));

// Body Text Color
$wp_customize->add_setting('cleanblog_body_text_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#333333'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_body_text_color', 
	array(
		'label'      => __( 'Body Text Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_body_text_color',
		'priority' => 5,
	)));
// Post Title Color
$wp_customize->add_setting('cleanblog_post_title_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#14141B'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_post_title_color', 
	array(
		'label'      => __( 'Post Title Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_post_title_color',
		'priority' => 6,
	)));
// Link Color
$wp_customize->add_setting('cleanblog_body_link_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#C09E77'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_body_link_color', 
	array(
		'label'      => __( 'Body Link Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_body_link_color',
		'priority' => 7,
	)));
// Link Hover Color
$wp_customize->add_setting('cleanblog_body_link_hover_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#A46B2B'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_body_link_hover_color', 
	array(
		'label'      => __( 'Body Link Hover Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_body_link_hover_color',
		'priority' => 8,
	)));
	
//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'styles_message2',
array(
'section'  => 'cleanblog_style_section',
'label' => __( 'Header Styles', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 9,
)));
//Section Top Message End

// Header Background Color
$wp_customize->add_setting('cleanblog_header_background_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#14141B'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_header_background_color', 
	array(
		'label'      => __( 'Header Background Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_header_background_color',
		'priority' => 10,
	)));
// Menu Text Color
$wp_customize->add_setting('cleanblog_menu_text_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#ffffff'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_menu_text_color', 
	array(
		'label'      => __( 'Menu Text Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_menu_text_color',
		'priority' => 11,
	)));	
// Menu Text Hover Color
$wp_customize->add_setting('cleanblog_menu_text_hover_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#C09E77'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_menu_text_hover_color', 
	array(
		'label'      => __( 'Menu Text Hover Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_menu_text_hover_color',
		'priority' => 12,
	)));
// Menu Text Divider Color
$wp_customize->add_setting('cleanblog_menu_dividers_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#333333'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_menu_dividers_color', 
	array(
		'label'      => __( 'Menu Dividers Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_menu_dividers_color',
		'priority' => 13,
	)));
// Header Icons Color
$wp_customize->add_setting('cleanblog_header_icons_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#C09E77'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_header_icons_color', 
	array(
		'label'      => __( 'Header Icons Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_header_icons_color',
		'priority' => 14,
	)));
// Header Icons Hover Color
$wp_customize->add_setting('cleanblog_header_icons_hover_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#ffffff',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_header_icons_hover_color', 
	array(
		'label'      => __( 'Header Icons Hover Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_header_icons_hover_color',
		'priority' => 15,
	)));
// Header Search Box Color
$wp_customize->add_setting('cleanblog_header_search_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#aaaaaa',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_header_search_color', 
	array(
		'label'      => __( 'Header Search Box Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_header_search_color',
		'priority' => 16,
	)));
// Logo Text Color
$wp_customize->add_setting('cleanblog_logo_text_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#484848',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_logo_text_color', 
	array(
		'label'      => __( 'Logo Text Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_logo_text_color',
		'priority' => 17,
	)));
// Tagline Text Color
$wp_customize->add_setting('cleanblog_tagline_text_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#C09E77',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_tagline_text_color', 
	array(
		'label'      => __( 'Tagline Text Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_tagline_text_color',
		'priority' => 18,
	)));

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'styles_message3',
array(
'section'  => 'cleanblog_style_section',
'label' => __( 'Background Color', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 19,
)));
//Section Top Message End

// Body Background Color
$wp_customize->add_setting('cleanblog_body_background_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#ffffff',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_body_background_color', 
	array(
		'label'      => __( 'Body Background Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_body_background_color',
		'priority' => 20,
	)));
	
// Container Background Color
$wp_customize->add_setting('cleanblog_container_background_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#ffffff',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_container_background_color', 
	array(
		'label'      => __( 'Container Background Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_container_background_color',
		'priority' => 21,
	)));		
	
//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'styles_message4',
array(
'section'  => 'cleanblog_style_section',
'label' => __( 'Footer Styles', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 22,
)));
//Section Top Message End	

// Foooter Widgets Background Color
$wp_customize->add_setting('cleanblog_foooter_widgets_background_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#2F2F33',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_foooter_widgets_background_color', 
	array(
		'label'      => __( 'Foooter Widgets Background Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_foooter_widgets_background_color',
		'priority' => 23,
	)));
	
// Foooter Widgets Text Color
$wp_customize->add_setting('cleanblog_foooter_widgets_text_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#ffffff',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_foooter_widgets_text_color', 
	array(
		'label'      => __( 'Foooter Widgets Text Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_foooter_widgets_text_color',
		'priority' => 24,
	)));	

// Foooter Copyright Background Color
$wp_customize->add_setting('cleanblog_foooter_copyright_background_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#14141B',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_foooter_copyright_background_color', 
	array(
		'label'      => __( 'Foooter Copyright Background Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_foooter_copyright_background_color',
		'priority' => 25,
	)));	
// Foooter Copyright Text Color
$wp_customize->add_setting('cleanblog_foooter_copyright_text_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#837874',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_foooter_copyright_text_color', 
	array(
		'label'      => __( 'Foooter Copyright Text Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_foooter_copyright_text_color',
		'priority' => 26,
	)));

// Footer Icons Color
$wp_customize->add_setting('cleanblog_footer_icons_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#C09E77'
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_footer_icons_color', 
	array(
		'label'      => __( 'Footer Icons Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_footer_icons_color',
		'priority' => 27,
	)));
	
// Footer Icons Hover Color
$wp_customize->add_setting('cleanblog_footer_icons_hover_color', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '#ffffff',
));
$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize,'cleanblog_footer_icons_hover_color', 
	array(
		'label'      => __( 'Footer Icons Hover Color', 'cleanblog-pro' ),
		'section'    => 'cleanblog_style_section',
		'settings'   => 'cleanblog_footer_icons_hover_color',
		'priority' => 28,
	)));
	
##Typography	
$wp_customize->add_section( 'cleanblog_typography_section', array(
'title'          => __( 'Typography', 'cleanblog-pro' ),
'priority'       => 40,
) );	
//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'typography_message',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Header', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 1,
)));
//Section Top Message End

//Menu Fonts
$wp_customize->add_setting('cleanblog_menu_font', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => 'source_sans_pro',
));
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_menu_font',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Menu Font', 'cleanblog-pro' ),
'type'     => 'fonts',
'settings'   => 'cleanblog_menu_font',
'priority' => 2,
)));	

// Menu Font Size (px)
$wp_customize->add_setting( 'cleanblog_menu_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'14'
 ) );

$wp_customize->add_control( 'cleanblog_menu_font_size', array(
'label' => __( 'Menu Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 3
) );

//Logo Font
$wp_customize->add_setting('cleanblog_logo_font', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => 'open_sans',
));
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_logo_font',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Logo Font', 'cleanblog-pro' ),
'type'     => 'fonts',
'settings'   => 'cleanblog_logo_font',
'priority' => 4,
)));	

// Logo Font Size (px)
$wp_customize->add_setting( 'cleanblog_logo_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'50'
 ) );

$wp_customize->add_control( 'cleanblog_logo_font_size', array(
'label' => __( 'Logo Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 5
) );

//Tagline Font
$wp_customize->add_setting('cleanblog_tagline_font', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => 'open_sans',
));
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_tagline_font',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Tagline Font', 'cleanblog-pro' ),
'type'     => 'fonts',
'settings'   => 'cleanblog_tagline_font',
'priority' => 6,
)));	

//Tagline Font Size (px)
$wp_customize->add_setting( 'cleanblog_tagline_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'17'
 ) );

$wp_customize->add_control( 'cleanblog_tagline_font_size', array(
'label' => __( 'Tagline Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 7
) );
//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'typography_message2',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Body', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 8,
)));
//Section Top Message End

//Body Font
$wp_customize->add_setting('cleanblog_body_font', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => 'open_sans',
));
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_body_font',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Body Font', 'cleanblog-pro' ),
'type'     => 'fonts',
'settings'   => 'cleanblog_body_font',
'priority' => 9,
)));
//Body Font Size (px)
$wp_customize->add_setting( 'cleanblog_body_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'14'
 ) );

$wp_customize->add_control( 'cleanblog_body_font_size', array(
'label' => __( 'Body Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 10
) );
//Body Line Height (px)
$wp_customize->add_setting( 'cleanblog_body_line_height', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'24'
 ) );

$wp_customize->add_control( 'cleanblog_body_line_height', array(
'label' => __( 'Body Line Height (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 11
) );

//Post List Line Height (px)
$wp_customize->add_setting( 'cleanblog_list_line_height', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'22'
 ) );

$wp_customize->add_control( 'cleanblog_list_line_height', array(
'label' => __( 'Post List Line Height (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 12
) );

//Title Font
$wp_customize->add_setting('cleanblog_title_font', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => 'open_sans',
));
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_title_font',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Title Font', 'cleanblog-pro' ),
'type'     => 'fonts',
'settings'   => 'cleanblog_title_font',
'priority' => 13,
)));

//Single Page Title Font Size (px)
$wp_customize->add_setting( 'cleanblog_single_title_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'24'
 ) );

$wp_customize->add_control( 'cleanblog_single_title_font_size', array(
'label' => __( 'Single Page/Post Title Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 14
) );
//List/Grid Layout Title Font Size (px)
$wp_customize->add_setting( 'cleanblog_list_grid_title_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'20'
 ) );

$wp_customize->add_control( 'cleanblog_list_grid_title_font_size', array(
'label' => __( 'List/Grid Layout Title Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 15
) );	
//Standard Layout Title Font Size (px)
$wp_customize->add_setting( 'cleanblog_standard_title_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'24'
 ) );

$wp_customize->add_control( 'cleanblog_standard_title_font_size', array(
'label' => __( 'Standard Layout Title Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 16
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'typography_message4',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Slider', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 17,
)));
//Section Top Message End

//Slider Title Font
$wp_customize->add_setting('cleanblog_slider_title_font', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => 'open_sans',
));
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_slider_title_font',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Slider Title Font', 'cleanblog-pro' ),
'type'     => 'fonts',
'settings'   => 'cleanblog_slider_title_font',
'priority' => 18,
)));
//Slider Title Font Size (px)
$wp_customize->add_setting( 'cleanblog_slider_title_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'18'
 ) );
$wp_customize->add_control( 'cleanblog_slider_title_font_size', array(
'label' => __( 'Slider Title Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 19
) );
		
//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'typography_message3',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Widgets', 'cleanblog-pro' ),
'type'     => 'heading',
'priority' => 20,
)));
//Section Top Message End
//Widget Title Font
$wp_customize->add_setting('cleanblog_widget_title_font', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => 'open_sans',
));
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_widget_title_font',
array(
'section'  => 'cleanblog_typography_section',
'label' => __( 'Widget Title Font', 'cleanblog-pro' ),
'type'     => 'fonts',
'settings'   => 'cleanblog_widget_title_font',
'priority' => 21,
)));
//Widgets Title Font Size (px)
$wp_customize->add_setting( 'cleanblog_widgets_title_font_size', array(
'sanitize_callback' => 'cleanblogg_sanitize_int',
'transport' => 'refresh',
'default' =>'22'
 ) );
$wp_customize->add_control( 'cleanblog_widgets_title_font_size', array(
'label' => __( 'Widgets Title Font Size (px)', 'cleanblog-pro' ),
'section' => 'cleanblog_typography_section',
'type' => 'text',
'priority' => 22
) );

//## Custom CSS Section
$wp_customize->add_section( 'cleanblog_custom_section', array(
'title'          => __( 'Custom CSS', 'cleanblog-pro' ),
'sanitize_callback' => 'esc_url_raw',
'priority'       => 41,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'custom_sec_message',
array(
'section'  => 'cleanblog_custom_section',
'description' => __( 'Add your custom CSS code without "Style" tag.', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));

// Custom CSS
$wp_customize->add_setting( 'cleanblog_custom_css', array(
'default'   => '',
'sanitize_callback' => 'wp_filter_nohtml_kses',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_custom_css', array(
'label' => __( 'Quick CSS', 'cleanblog-pro' ),
'section' => 'cleanblog_custom_section',
'type' => 'textarea',
'priority' => 2
) );

//## Woocommerce Section

$wp_customize->add_section( 'cleanblog_woo_section', array(
'title'          => __( 'Woocommerce', 'cleanblog-pro' ),
'priority'       => 41,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'woo_message',
array(
'section'  => 'cleanblog_woo_section',
'description' => __( 'These settings will affect to the WooCommerce plugin settings. ', 'cleanblog-pro' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End 

//Show/Hide	Header Cart Icon
$wp_customize->add_setting( 'cleanblog_header_cart_icon', array(
'default'   => 'show',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_header_cart_icon', array(
'label'      => __('Show/Hide Header Cart Icon', 'cleanblog-pro'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_header_cart_icon',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblog-pro'),
'hide' => __('Hide', 'cleanblog-pro'),
),
'priority' => 2
) );

//Products Archive Layout	
$wp_customize->add_setting( 'cleanblog_products_archive_layout', array(
'default'   => 'right',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_products_archive_layout', array(
'label'      => __('Products Archive Layout', 'cleanblog-pro'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_products_archive_layout',
'type'       => 'radio',
'choices'    => array(
'right' => __('Content Left, Sidebar Right', 'cleanblog-pro'),
'left' => __('Sidebar Left, Content Right', 'cleanblog-pro'),
'full' => __('Fullwidth', 'cleanblog-pro'),
),
'priority' => 3
) );

//Single Product page Layout	
$wp_customize->add_setting( 'cleanblog_single_product_layout', array(
'default'   => 'right',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_single_product_layout', array(
'label'      => __('Single Product page Layout', 'cleanblog-pro'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_single_product_layout',
'type'       => 'radio',
'choices'    => array(
'right' => __('Content Left, Sidebar Right', 'cleanblog-pro'),
'left' => __('Sidebar Left, Content Right', 'cleanblog-pro'),
'full' => __('Fullwidth', 'cleanblog-pro'),
),
'priority' => 4
) );

// Products Pre Page
$wp_customize->add_setting( 'cleanblog_woo_products_pre_page', array(
'default'   => '12',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_woo_products_pre_page', array(
'type'        => 'number',
'priority'    => 5,
'section'     => 'cleanblog_woo_section',
'settings'   => 'cleanblog_woo_products_pre_page',
'label'       => __('Products Pre Page in Archive','cleanblog-pro'),
'description' => __('Add your value between 1 and 100','cleanblog-pro'),
'input_attrs' => array(
'min'   => 1,
'max'   => 100,
'step'  => 1,
'value' => 12,
),
) );

//Number of Columns in Archive
$wp_customize->add_setting( 'cleanblog_woo_archive_column', array(
'default'   => 4,
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_woo_archive_column', array(
'label'      => __('Number of Columns for Archive', 'cleanblog-pro'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_woo_archive_column',
'type'       => 'select',
'choices'    => array(
2 => __('2 Column', 'cleanblog-pro'),
3 => __('3 Column', 'cleanblog-pro'),
4 => __('4 Column', 'cleanblog-pro'),
5 => __('5 Column', 'cleanblog-pro'),
6 => __('6 Column', 'cleanblog-pro'),
),
'priority' => 6
) );

//Number of Columns for Related & Up-Sells
$wp_customize->add_setting( 'cleanblog_woo_related_column', array(
'default'   => 4,
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_woo_related_column', array(
'label'      => __('Number of Columns for Related & Up-Sells', 'cleanblog-pro'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_woo_related_column',
'type'       => 'select',
'choices'    => array(
2 => __('2 Column', 'cleanblog-pro'),
3 => __('3 Column', 'cleanblog-pro'),
4 => __('4 Column', 'cleanblog-pro'),
5 => __('5 Column', 'cleanblog-pro'),
6 => __('6 Column', 'cleanblog-pro'),
),
'priority' => 7
) );

//Number of Columns for Gallery Thumbnails
$wp_customize->add_setting( 'cleanblog_woo_gallery_thumb_column', array(
'default'   => 4,
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_woo_gallery_thumb_column', array(
'label'      => __('Number of Columns for Gallery Thumbnails', 'cleanblog-pro'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_woo_gallery_thumb_column',
'type'       => 'select',
'choices'    => array(
2 => __('2 Column', 'cleanblog-pro'),
3 => __('3 Column', 'cleanblog-pro'),
4 => __('4 Column', 'cleanblog-pro'),
5 => __('5 Column', 'cleanblog-pro'),
6 => __('6 Column', 'cleanblog-pro'),
8 => __('8 Column', 'cleanblog-pro'),
),
'priority' => 8
) );
		
}
function cleanblogg_sanitize_value( $value ) {
    return $value;
}
function cleanblogg_sanitize_int( $value ) {
	$int_value = intval($value);
    return $int_value;
}
//Customizer javascript
function cleanblog_customizer_query() {

	wp_enqueue_script( 'cleanblog_customizer_script', get_template_directory_uri() . '/js/customizer.js', array("jquery"), '20160701', true  );
	
}
add_action( 'customize_controls_enqueue_scripts', 'cleanblog_customizer_query' );

//Customizer Styles	
function cleanblogg_customizer_stylesheet() { ?>
<style>
.customize-control select{
	width:100%;
	}
#customize-control-cleanblog_custom_css textarea{
	min-height:300px;
	}
</style>
<?php
}
add_action( 'customize_controls_print_styles', 'cleanblogg_customizer_stylesheet' );
?>