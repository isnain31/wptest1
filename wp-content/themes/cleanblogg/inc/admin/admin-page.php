<?php function cleanblogg_info_function(){ 
$cleanblogg_theme_data = wp_get_theme();
?>
	 <div id="cb-info" class="wrap">
	<h1>Welcome to CleanBlogg <?php echo $cleanblogg_theme_data->get( 'Version' );?></h1>
    <div class="cb-box-area">
    <div class="cb-row">
        <div class="cb-span-4">
            <div class="cb-info-box">
                <h3>Theme Options</h3>
                <p>Edit the theme using WordPress live customizer.</p>
                <p class="cb-info-button"><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary">Customize</a></p>
            </div>
        </div>
        <div class="cb-span-4">
            <div class="cb-info-box">
                <h3>CleanBlogg Features</h3>
                <p>See what you can do using ClenBlogg theme.</p>
                <p class="cb-info-button"><a href="https://airthemes.net/cleanblogg/" class="button button-secondary" target="_blank">Features</a></p>
            </div>
    	</div>
        <div class="cb-span-4">
            <div class="cb-info-box">
                <h3>Online Demo</h3>
                <p>View CleanBlogg full features in online demo.</p>
                <p class="cb-info-button"><a href="http://airthemes.net/cleanblog/demo/" class="button button-secondary" target="_blank">View Demo</a></p>
            </div>
        </div>
    </div>
    <div class="cb-row">
        <div class="cb-span-4 cb-lg">
            <div class="cb-info-box">
                <h3>Buy Pro version</h3>
                <p>Need more features, supports, and fast loading theme?</p>
                <p class="cb-info-button"><a href="https://airthemes.net/cleanblogg/" class="button button-secondary" target="_blank">Buy Pro Version</a></p>
            </div>
        </div>
        <div class="cb-span-4 cb-lg">
            <div class="cb-info-box">
                <h3>Email Support</h3>
                <p>Go to our email support page. This option for premium users only</p>
                <p class="cb-info-button"><a href="https://airthemes.net/support/" class="button button-secondary" target="_blank">Premium Support</a></p>
            </div>
    	</div>
        <div class="cb-span-4 cb-lg">
            <div class="cb-info-box">
                <h3>Online Documentation</h3>
                <p>It is easy to use CleanBlogg theme. Use our documentation.</p>
                <p class="cb-info-button"><a href="https://airthemes.net/cleanblogg/documentation/" class="button button-secondary" target="_blank">Documentation</a></p>
            </div>
        </div>
    </div>
     <div class="cb-row">
        <div class="cb-span-4 cb-lg">
            <div class="cb-info-box">
                <h3>Rate this theme</h3>
                <p>Do you like CleanBlogg theme? Your 5 star review is very important to us.</p>
                <p class="cb-info-button"><a href="https://wordpress.org/support/theme/cleanblogg/reviews/#new-post" class="button button-secondary" target="_blank">Rate CleanBlogg</a></p>
            </div>
        </div>
        <div class="cb-span-4 cb-lg">
            <div class="cb-info-box">
                <h3>CleanBlogg Support Forum</h3>
                <p>WordPress community-based support forum.</p>
                <p class="cb-info-button"><a href="https://wordpress.org/support/theme/cleanblogg" class="button button-secondary" target="_blank">Support</a></p>
            </div>
    	</div>
        <div class="cb-span-4 cb-lg">
            <div class="cb-info-box">
                <h3>Translate CleanBlogg</h3>
                <p>Help to translate CleanBlogg in to your language.</p>
                <p class="cb-info-button"><a href="https://translate.wordpress.org/projects/wp-themes/cleanblogg" class="button button-secondary" target="_blank">Translate CleanBlogg</a></p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </div>
    
    <h1>CleanBlogg Free vs Pro</h1>
    
    <table class="free-vs-pro widefat fixed" width="100%">
    <tr class="free-vs-pro-header">
    	<th width="230"></th>
        <th class="free">Free</th>
        <th class="pro">Pro</th>
    </tr>
    <tr>
    	<th class="th-items">Home Page Slider</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">3 Blog layouts</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Clean and Validate Code</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Fully Responsive</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Cross-Browser Compatibility</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">SEO Ready</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Powerful WordPress Live Customizer</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Custom Logo & Favicon</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Responsive Menu</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Widgetized Footer</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Posts Tab Widget</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Custom Posts Widget</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Social Widget</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr><tr>
    	<th class="th-items">Left Sidebar, Right Sidebar and Full Width Layouts</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Header/Footer Social Icons</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Sticky Top Header</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Related Posts Feature</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Single Page Author Info Box</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Translation Ready</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">RTL language Support</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Contact Form 7 Support</td>
        <td><span class="dashicons dashicons-yes"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Unlimited Colors</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Google Fonts</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Typography Options</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Post Social Share</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">About Me Widget</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Advertisenent Widget</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Facebook Like Box Widget</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Instagram Feed Widget</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">MailChimp Subscriber Widget</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">One Year Email Support</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Child Theme</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Demo Content</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr>
    	<th class="th-items">Speed Optimized</td>
        <td><span class="dashicons dashicons-no-alt"></span></td>
        <td><span class="dashicons dashicons-yes"></span></td>
    </tr>
    <tr class="button-row">
    	<th class="th-items"></td>
        <th></td>
        <th><a href="https://airthemes.net/cleanblogg/" class="buy-pro" target="_blank">Buy Pro</a></td>
    </tr>
    </table>
    
    </div>
	<?php }
add_action( 'admin_menu', 'cleanblogg_info_page' );

function cleanblogg_info_page(){
add_theme_page('CleanBlogg Info', 'CleanBlogg Info','manage_options', 'cleanblogg_info', 'cleanblogg_info_function');
}