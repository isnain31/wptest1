<?php get_header(); 
if (!empty($_GET['sidebar'])):
$sidebar = $_GET['sidebar'];
if($sidebar == 'right'):
$content_layout = 'right';
elseif($sidebar == 'left'):
$content_layout = 'left';
else:
$content_layout = 'full';
endif;
else:
$home_layout = get_theme_mod( 'cleanblog_home_layout', 'default');
if($home_layout == 'default'):
$content_layout = get_theme_mod( 'cleanblog_content_layout', 'right'); 
else:
$content_layout = $home_layout;
endif;
endif;

$cleanblog_first_full = get_theme_mod( 'cleanblog_first_full', false); 
?>
<div class="cb-content <?php echo 'cb-'.$content_layout; ?>">
	<div class="container-fluid">
    	<div class="row">
    		<div class="cb-main <?php if($content_layout == 'full'): echo 'col-sm-12'; else : echo 'col-md-8';endif; if($cleanblog_first_full): echo " cb-first-full"; endif; ?>">
			<?php if ( have_posts() ) : 
					global $cleanblog_post_count;
					$cleanblog_post_count = 1;
					while ( have_posts() ) : the_post();
						get_template_part( 'content');
					$cleanblog_post_count ++;	
					endwhile; 
					cleanblogg_pagination();
				  else : 
				    get_template_part( 'content', 'none' ); 
				  endif; ?>            
        	</div>
            <?php if($content_layout != 'full'): ?>
            <div class="cb-side-bar col-sm-4">
        		<?php get_sidebar(); ?>
        	</div>
            <?php endif; ?>  
        </div>
    </div>	
</div>
<?php get_footer(); ?>