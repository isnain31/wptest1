<?php
function get_categories_select() {
  $teh_cats = get_categories();
  $results;
 
  $count = count($teh_cats);
  $results['0'] = 'All';
  for ($i=0; $i < $count; $i++) {
    if (isset($teh_cats[$i]))
      $results[$teh_cats[$i]->term_id] = $teh_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}
add_action( 'customize_register', 'cleanblogg_customize_register' );
function cleanblogg_customize_register($wp_customize) {
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Cleanblog_Customize_Misc_Control' ) ) :
class Cleanblog_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
            case 'desc' :
                echo '<p class="description">' . $this->description . '</p>';
                break;
 
            case 'heading':
                echo '<span class="customize-control-title" style="background-color: rgb(227, 227, 227);padding: 3px 5px;text-align: center;border: 1px solid rgb(183, 183, 183);margin: 0px -10px;">' . esc_html( $this->label ) . '</span>';
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
			
        }
    }
}
endif;
//## Social Section
$wp_customize->add_section( 'cleanblog_social_section', array(
'title'          => __( 'Social Links', 'cleanblogg' ),
'priority'       => 36,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'social_message',
array(
'section'  => 'cleanblog_social_section',
'description' => __( 'Set the URLs for your social media profiles here to be used in the Header and Footer. Keep the fields empty if you don\'t use.', 'cleanblogg' ),
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
'label'      => __('Show/Hide Header Social Icons', 'cleanblogg'),
'section'    => 'cleanblog_social_section',
'settings'   => 'cleanblog_social_in_header',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
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
'label'      => __('Show/Hide Footer Social Icons', 'cleanblogg'),
'section'    => 'cleanblog_social_section',
'settings'   => 'cleanblog_social_in_footer',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
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
'label' => __( 'Email', 'cleanblogg' ),
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
'label' => __( 'Facebook', 'cleanblogg' ),
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
'label' => __( 'Twitter', 'cleanblogg' ),
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
'label' => __( 'Google +', 'cleanblogg' ),
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
'label' => __( 'Instagram', 'cleanblogg' ),
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
'label' => __( 'Pinterest', 'cleanblogg' ),
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
'label' => __( 'LinkedIn', 'cleanblogg' ),
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
'label' => __( 'Tumblr', 'cleanblogg' ),
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
'label' => __( 'Flickr', 'cleanblogg' ),
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
'label' => __( 'Reddit', 'cleanblogg' ),
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
'label' => __( 'Youtube', 'cleanblogg' ),
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
'label' => __( 'Vimeo', 'cleanblogg' ),
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
'label' => __( 'RSS Feed', 'cleanblogg' ),
'section' => 'cleanblog_social_section',
'type' => 'text',
'priority' => 16
) );  

//## Header Section

$wp_customize->add_section( 'cleanblog_header_section', array(
'title'          => __( 'Header', 'cleanblogg' ),
'priority'       => 34,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'header_message',
array(
'section'  => 'cleanblog_header_section',
'description' => __( 'Manage elements of header', 'cleanblogg' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End

// Logo
$wp_customize->add_setting( 'cleanblog_logo', array(
'default' => '',
'sanitize_callback' => 'esc_url_raw', 
'transport' => 'refresh',
 ) );

$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'cleanblog_logo', array(
'label' => __( 'Upload Logo', 'cleanblogg' ),
'section' => 'cleanblog_header_section',
'settings' => 'cleanblog_logo',
'priority' => 2
) ) );

//Header Type
$wp_customize->add_setting( 'cleanblog_header_style', array(
'default'   => 'style1',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_header_style', array(
'label'      => __('Header Layout Style', 'cleanblogg'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_header_style',
'type'       => 'select',
'choices'    => array(
'style1' => __('Style 01 (Topbar W/ Menu + Below Logo)', 'cleanblogg'),
'style2' => __('Style 02 (Topbar + Below Logo + Below Menu)', 'cleanblogg'),
'style3' => __('Style 03 (Topbar W/ Menu + Logo left with Ad)', 'cleanblogg'),
'style4' => __('Style 04 - Logo + Bottom bar (Pro Version Only)', 'cleanblogg'),
'style5' => __('Style 05 - Inline Logo Menu &amp; Icons (Pro Version Only)', 'cleanblogg'),
),
'priority' => 3
) );
 
// Logo Width
$wp_customize->add_setting( 'cleanblog_logo_width', array(
'default'   =>'250',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_logo_width', array(
'label' => __( 'Logo Width (px)', 'cleanblogg' ),
'section' => 'cleanblog_header_section',
'type' => 'text',
'priority' => 4
) );   

// Logo Top Margin
$wp_customize->add_setting( 'cleanblog_logo_top', array(
'default'   =>'50',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_logo_top', array(
'label' => __( 'Logo Top Margin (px)', 'cleanblogg' ),
'section' => 'cleanblog_header_section',
'type' => 'text',
'priority' => 5
) );  

// Logo Bottom Margin
$wp_customize->add_setting( 'cleanblog_logo_bottom', array(
'default'   =>'50',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_logo_bottom', array(
'label' => __( 'Logo Bottom Margin (px)', 'cleanblogg' ),
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
'label' => __( 'Margin Between Logo and Tagline (px)', 'cleanblogg' ),
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
'label'      => __('Show/Hide Tagline', 'cleanblogg'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_show_tagline',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
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
'label'      => __('Show/Hide Search Form', 'cleanblogg'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_show_search',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
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
'label'      => __('On/Off Sticky Top Bar', 'cleanblogg'),
'section'    => 'cleanblog_header_section',
'settings'   => 'cleanblog_sticky_topbar',
'type'       => 'radio',
'choices'    => array(
'on' => __('On', 'cleanblogg'),
'off' => __('Off', 'cleanblogg'),
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
'label' => __( 'Header Ad Code', 'cleanblogg' ),
'section' => 'cleanblog_header_section',
'type' => 'textarea',
'priority' => 11
) );
//## Footer Section
 
$wp_customize->add_section( 'cleanblog_footer_section', array(
'title'          => __( 'Footer', 'cleanblogg' ),
'priority'       => 36,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'footer_message',
array(
'section'  => 'cleanblog_footer_section',
'description' => __( 'Adjust your site footer setting and widget areas to the specific number desired and turning on or off various parts as needed.', 'cleanblogg' ),
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
'label'      => __('Footer Widgets', 'cleanblogg'),
'section'    => 'cleanblog_footer_section',
'settings'   => 'cleanblog_footer_widgets_show',
'type'       => 'radio',
'choices'    => array(
'none' => __('None (Disables Footer Widgets)', 'cleanblogg'),
'one' => __('One', 'cleanblogg'),
'two' => __('Two', 'cleanblogg'),
'three' => __('Three', 'cleanblogg'),
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
'label'      => __('Show/Hide Footer Socket', 'cleanblogg'),
'section'    => 'cleanblog_footer_section',
'settings'   => 'cleanblog_footer_socket',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
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
'label'      => __('Show/Hide Footer Copyright', 'cleanblogg'),
'section'    => 'cleanblog_footer_section',
'settings'   => 'cleanblog_footer_copyright_show',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
),
'priority' =>4
) ); 	
/* */
//Footer copyright Text
$wp_customize->add_setting( 'cleanblog_footer_copyright', array(
'default' => sprintf( __( 'Copyright 2015 CleanBlog | Theme by %s', 'cleanblogg' ), '<a href="http://airthemes.net/cleanblog" target="_blank">AirThemes</a>' ),
'sanitize_callback' => 'balanceTags',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_footer_copyright', array(
'label' => __( 'Copyright Content', 'cleanblogg' ),
'section' => 'cleanblog_footer_section',
'type' => 'textarea',
'priority' => 5
) );  

//## Slider Section

$wp_customize->add_section( 'cleanblog_slider_section', array(
'title'          => __( 'Slider', 'cleanblogg' ),
'priority'       => 35,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'slider_message',
array(
'section'  => 'cleanblog_slider_section',
'description' => __( 'Adjust your slider settings and customize slider posts .', 'cleanblogg' ),
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
'label'      => __('Home Slider Type', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_type',
'type'       => 'select',
'choices'    => array(
'default' => __('Default Slider (Single Image)', 'cleanblogg'),
'modern_carousel' => __('Modern Carousel (3 Images)', 'cleanblogg'),
'carousel' => __('Carousel Slider (3 Images)', 'cleanblogg'),
'carousel2' => __('Carousel Slider (2 Images)', 'cleanblogg'),
'metro' => __('Metro Slider (5 Images)', 'cleanblogg'),
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
'label'      => __('Show/Hide Slider', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_show',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
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
'label'      => __('Slider Posts', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_posts',
'type'       => 'radio',
'choices'    => array(
'ASC' => __('Recent Posts', 'cleanblogg'),
'comment_count' => __('Popular Posts', 'cleanblogg'),
'rand' => __('Random Posts', 'cleanblogg'),
'custom' => __('Custom (Add Posts by IDs)', 'cleanblogg'),
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
'label'      => __('Slider Category', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_category',
'type'       => 'select',
'choices'    => get_categories_select(),
'priority' => 5
) ); 

// Slider Number of Posts 
$wp_customize->add_setting( 'cleanblog_slider_posts_num', array(
'default'   => '10',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'cleanblog_slider_posts_num',
array(
'label'  => __('Number of Posts', 'cleanblogg'),
'section'  => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_posts_num',
'type' => 'textdesc',
'description' => __('Enter number of posts do you want show in the slider. Show all posts enter value "-1" ', 'cleanblogg'),
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
'label'  => __('Posts IDs', 'cleanblogg'),
'section'  => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_custom_id',
'type' => 'textdesc',
'description' => __('Add your own posts Ids separated by comma. Ex: 8,12,17,25', 'cleanblogg'),
'priority' => 7,
)));

//Slider Automatically Transition	
$wp_customize->add_setting( 'cleanblog_slider_auto', array(
'default'   => true,
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_auto', array(
'label'      => __('Automatically Transition', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_auto',
'type'       => 'radio',
'choices'    => array(
true => __('Yes', 'cleanblogg'),
false => __('No', 'cleanblogg'),
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
'label'      => __('Transition Mode', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_mode',
'type'       => 'radio',
'choices'    => array(
'horizontal' => __('Slide', 'cleanblogg'),
'fade' => __('Fade', 'cleanblogg'),
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
'label'      => __('Show/Hide Slider Controls', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_controls',
'type'       => 'radio',
'choices'    => array(
true => __('Show', 'cleanblogg'),
false => __('Hide', 'cleanblogg'),
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
'label'      => __('Show/Hide Date in the Slider', 'cleanblogg'),
'section'    => 'cleanblog_slider_section',
'settings'   => 'cleanblog_slider_date',
'type'       => 'radio',
'choices'    => array(
true => __('Show', 'cleanblogg'),
false => __('Hide', 'cleanblogg'),
),
'priority' => 11
) );
//Slider Speed
$wp_customize->add_setting( 'cleanblog_slider_speed', array(
'default'   => '1000',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_speed', array(
'label' => __( 'Transition Speed (ms)', 'cleanblogg' ),
'section' => 'cleanblog_slider_section',
'type' => 'text',
'priority' => 12
) );

//Slider Pause
$wp_customize->add_setting( 'cleanblog_slider_pause', array(
'default'   => '5000',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_slider_pause', array(
'label' => __( 'Pause Time (ms)', 'cleanblogg' ),
'section' => 'cleanblog_slider_section',
'type' => 'text',
'priority' => 13
) );

//## Layout Section

$wp_customize->add_section( 'cleanblog_layout_section', array(
'title'          => __( 'Layout', 'cleanblogg' ),
'priority'       => 35,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'layout_message',
array(
'section'  => 'cleanblog_layout_section',
'description' => __( 'Select your site\'s layout options here and manage blog listing layouts', 'cleanblogg' ),
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
'label'      => __('Layout Type', 'cleanblogg'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_content_layout_type',
'type'       => 'radio',
'choices'    => array(
'wide-layout' => __('Wide Layout', 'cleanblogg'),
'box-layout' => __('Box Layout', 'cleanblogg'),
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
'label'      => __('Default Layout', 'cleanblogg'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_content_layout',
'type'       => 'radio',
'choices'    => array(
'right' => __('Content Left, Sidebar Right', 'cleanblogg'),
'left' => __('Sidebar Left, Content Right', 'cleanblogg'),
'full' => __('Fullwidth', 'cleanblogg'),
),
'priority' =>3
) );

//Home Layout	
$wp_customize->add_setting( 'cleanblog_home_layout', array(
'default'   => 'default',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_home_layout', array(
'label'      => __('Home Page Layout', 'cleanblogg'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_home_layout',
'type'       => 'radio',
'choices'    => array(
'default' => __('Default', 'cleanblogg'),
'right' => __('Content Left, Sidebar Right', 'cleanblogg'),
'left' => __('Sidebar Left, Content Right', 'cleanblogg'),
'full' => __('Fullwidth', 'cleanblogg'),
),
'priority' =>4
) );

//Single Post Layout	
$wp_customize->add_setting( 'cleanblog_single_post_layout', array(
'default'   => 'default',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_single_post_layout', array(
'label'      => __('Single Post Layout', 'cleanblogg'),
'section'    => 'cleanblog_layout_section',
'settings'   => 'cleanblog_single_post_layout',
'type'       => 'radio',
'choices'    => array(
'default' => __('Default', 'cleanblogg'),
'right' => __('Content Left, Sidebar Right', 'cleanblogg'),
'left' => __('Sidebar Left, Content Right', 'cleanblogg'),
'full' => __('Fullwidth', 'cleanblogg'),
),
'priority' =>5
) );

// Content Width
$wp_customize->add_setting( 'cleanblog_content_width', array(
'default'   => '1100',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_content_width', array(
'type'        => 'number',
'priority'    => 5,
'section'     => 'cleanblog_layout_section',
'settings'   => 'cleanblog_content_width',
'label'       => __('Content Width (px)','cleanblogg'),
'description' => __('Enter value between 800px and 1200px','cleanblogg'),
'input_attrs' => array(
'min'   => 800,
'max'   => 1200,
'step'  => 10,
'value' => 1100,
),
) );

//## Blog Section

$wp_customize->add_section( 'cleanblog_blog_section', array(
'title'          => __( 'Blog', 'cleanblogg' ),
'priority'       => 38,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'blog_message',
array(
'section'  => 'cleanblog_blog_section',
'description' => __( 'Adjust the style and layout of your blog using the settings below. This will affect the posts index page and archive or search results pages of your blog. ', 'cleanblogg' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End 

//Blog Default Style	
$wp_customize->add_setting( 'cleanblog_content_style', array(
'default'   => 'grid',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_content_style', array(
'label'      => __('Blog Default Style', 'cleanblogg'),
'section'    => 'cleanblog_blog_section',
'settings'   => 'cleanblog_content_style',
'type'       => 'radio',
'choices'    => array(
'standard' => __('Standard Layout', 'cleanblogg'),
'list' => __('List Layout', 'cleanblogg'),
'grid' => __('Grid Layout', 'cleanblogg'),
),
'priority' =>2
) );

//Blog Archive Style	
$wp_customize->add_setting( 'cleanblog_archive_style', array(
'default'   => 'grid',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_archive_style', array(
'label'      => __('Blog Archive Style', 'cleanblogg'),
'section'    => 'cleanblog_blog_section',
'settings'   => 'cleanblog_archive_style',
'type'       => 'radio',
'choices'    => array(
'standard' => __('Standard Layout', 'cleanblogg'),
'list' => __('List Layout', 'cleanblogg'),
'grid' => __('Grid Layout', 'cleanblogg'),
),
'priority' =>3
) );

$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'blog_list_title',
array(
'section'  => 'cleanblog_blog_section',
'label' => __( 'Show/Hide Elements in Posts List', 'cleanblogg' ),
'type'     => 'title',
'priority' => 4,
)));


// Standerd Featured Image
$wp_customize->add_setting('cleanblog_list_featured_image_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_featured_image_show',array(
'label'     => __('Featured Image','cleanblogg'),
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
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_category_show',array(
'label'     => __('Category','cleanblogg'),
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
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1',
 
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_date_show',array(
'label'     => __('Date','cleanblogg'),
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
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_author_show',array(
'label'     => __('Author','cleanblogg'),
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
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_list_comments_show',array(
'label'     => __('Comment Counts','cleanblogg'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_list_comments_show',
'type'      => 'checkbox',
'priority' => 10,
)));

//Single Post Templates	
$wp_customize->add_setting( 'cleanblog_single_template', array(
'default'   => 'template1',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'transport' => 'refresh',
 ) );

$wp_customize->add_control( 'cleanblog_single_template', array(
'label'      => __('Single Page Template', 'cleanblogg'),
'section'    => 'cleanblog_blog_section',
'settings'   => 'cleanblog_single_template',
'type'       => 'select',
'choices'    => array(
'template1' => __('Template 01', 'cleanblogg'),
'template2' => __('Template 02', 'cleanblogg'),
'template3' => __('Template 03 (Pro Version Only)', 'cleanblogg'),
'template4' => __('Template 04 (Pro Version Only)', 'cleanblogg'),
),
'priority' => 11
) );
	
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'blog_single_title',
array(
'section'  => 'cleanblog_blog_section',
'label' => __( 'Show/Hide Elements in Single Post', 'cleanblogg' ),
'type'     => 'title',
'priority' => 12,
)));

// Single Featured Image
$wp_customize->add_setting('cleanblog_single_featured_image_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_featured_image_show',array(
'label'     => __('Featured Image','cleanblogg'),
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
'label'     => __('Category','cleanblogg'),
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
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_date_show',array(
'label'     => __('Date','cleanblogg'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_date_show',
'type'      => 'checkbox',
'priority' => 15,
)
)
);
// Single Author
$wp_customize->add_setting('cleanblog_single_author_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_author_show',array(
'label'     => __('Author','cleanblogg'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_author_show',
'type'      => 'checkbox',
'priority' => 17,
)
)
); 

// Single Comments
$wp_customize->add_setting('cleanblog_single_comments_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_comments_show',array(
'label'     => __('Comment Counts','cleanblogg'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_comments_show',
'type'      => 'checkbox',
'priority' => 18,
)
)
);

// Single Tags
$wp_customize->add_setting('cleanblog_single_tags_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '1'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_tags_show',array(
'label'     => __('Tags','cleanblogg'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_tags_show',
'type'      => 'checkbox',
'priority' => 19,
)));
// Single Author Bio Info
$wp_customize->add_setting('cleanblog_single_author_bio_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '0'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_author_bio_show',array(
'label'     => __('Author Bio Info','cleanblogg'),
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
'label'     => __('Next Previous Posts','cleanblogg'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_next_prev_show',
'type'      => 'checkbox',
'priority' => 21,
)));	

// Single Related Posts
$wp_customize->add_setting('cleanblog_single_relatedpost_show', array(
'transport' => 'refresh',
'sanitize_callback' => 'cleanblogg_sanitize_value',
'default'    => '0'
));

$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,'cleanblog_single_relatedpost_show',array(
'label'     => __('Related Posts','cleanblogg'),
'section'   => 'cleanblog_blog_section',
'settings'  => 'cleanblog_single_relatedpost_show',
'type'      => 'checkbox',
'priority' => 22,
)));
	

//## Style Section

$wp_customize->add_section( 'cleanblog_style_section', array(
'title'          => __( 'Styles', 'cleanblogg' ),
'priority'       => 38,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'style_message',
array(
'section'  => 'cleanblog_style_section',
'description' => __( 'These Options are Available in CleanBlog Pro Version. <a href="http://airthemes.net/cleanblog/" target="_blank">View CleanBlog Pro Features</a>', 'cleanblogg' ),
'type'     => 'desc',
'priority' => 1,
)));
//Section Top Message End 

//## Typography Section
$wp_customize->add_section( 'cleanblog_typography_section', array(
'title'          => __( 'Typography', 'cleanblogg' ),
'sanitize_callback' => 'esc_url_raw',
'priority'       => 39,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'typography_message',
array(
'section'  => 'cleanblog_typography_section',
'description' => __( 'These Options are Available in CleanBlog Pro Version. <a href="http://airthemes.net/cleanblog/" target="_blank">View CleanBlog Pro Features</a>', 'cleanblogg' ),
'type'     => 'desc',
'priority' => 1,
)));

//## Custom CSS Section
$wp_customize->add_section( 'cleanblog_custom_section', array(
'title'          => __( 'Custom CSS', 'cleanblogg' ),
'sanitize_callback' => 'esc_url_raw',
'priority'       => 40,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'custom_sec_message',
array(
'section'  => 'cleanblog_custom_section',
'description' => __( 'Add your custom CSS code without "Style" tag.', 'cleanblogg' ),
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
'label' => __( 'Quick CSS', 'cleanblogg' ),
'section' => 'cleanblog_custom_section',
'type' => 'textarea',
'priority' => 2
) );

//## Woocommerce Section

$wp_customize->add_section( 'cleanblog_woo_section', array(
'title'          => __( 'Woocommerce', 'cleanblogg' ),
'priority'       => 41,
) );

//Section Top Message
$wp_customize->add_control( new Cleanblog_Customize_Misc_Control($wp_customize,'woo_message',
array(
'section'  => 'cleanblog_woo_section',
'description' => __( 'These settings will affect to the WooCommerce plugin settings. ', 'cleanblogg' ),
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
'label'      => __('Show/Hide Header Cart Icon', 'cleanblogg'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_header_cart_icon',
'type'       => 'radio',
'choices'    => array(
'show' => __('Show', 'cleanblogg'),
'hide' => __('Hide', 'cleanblogg'),
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
'label'      => __('Products Archive Layout', 'cleanblogg'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_products_archive_layout',
'type'       => 'radio',
'choices'    => array(
'right' => __('Content Left, Sidebar Right', 'cleanblogg'),
'left' => __('Sidebar Left, Content Right', 'cleanblogg'),
'full' => __('Fullwidth', 'cleanblogg'),
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
'label'      => __('Single Product page Layout', 'cleanblogg'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_single_product_layout',
'type'       => 'radio',
'choices'    => array(
'right' => __('Content Left, Sidebar Right', 'cleanblogg'),
'left' => __('Sidebar Left, Content Right', 'cleanblogg'),
'full' => __('Fullwidth', 'cleanblogg'),
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
'label'       => __('Products Pre Page in Archive','cleanblogg'),
'description' => __('Add your value between 1 and 100','cleanblogg'),
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
'label'      => __('Number of Columns for Archive', 'cleanblogg'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_woo_archive_column',
'type'       => 'select',
'choices'    => array(
2 => __('2 Column', 'cleanblogg'),
3 => __('3 Column', 'cleanblogg'),
4 => __('4 Column', 'cleanblogg'),
5 => __('5 Column', 'cleanblogg'),
6 => __('6 Column', 'cleanblogg'),
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
'label'      => __('Number of Columns for Related & Up-Sells', 'cleanblogg'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_woo_related_column',
'type'       => 'select',
'choices'    => array(
2 => __('2 Column', 'cleanblogg'),
3 => __('3 Column', 'cleanblogg'),
4 => __('4 Column', 'cleanblogg'),
5 => __('5 Column', 'cleanblogg'),
6 => __('6 Column', 'cleanblogg'),
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
'label'      => __('Number of Columns for Gallery Thumbnails', 'cleanblogg'),
'section'    => 'cleanblog_woo_section',
'settings'   => 'cleanblog_woo_gallery_thumb_column',
'type'       => 'select',
'choices'    => array(
2 => __('2 Column', 'cleanblogg'),
3 => __('3 Column', 'cleanblogg'),
4 => __('4 Column', 'cleanblogg'),
5 => __('5 Column', 'cleanblogg'),
6 => __('6 Column', 'cleanblogg'),
6 => __('8 Column', 'cleanblogg'),
),
'priority' => 8
) );

}
function cleanblogg_sanitize_value( $value ) {
    return $value;
}
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