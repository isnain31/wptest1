<?php get_header(); ?>
<?php $content_layout= get_theme_mod( 'cleanblog_content_layout', 'right'); ?>
<div class="cb-content <?php echo 'cb-'.$content_layout; ?>">
	<div class="container-fluid">
    	<div class="row">
    		<div class="cb-main <?php if($content_layout == 'full'){echo 'col-sm-12';} else {echo 'col-md-8';}?>">
				<div class="archive-title">
					<?php if ( is_day() ) : ?>
					<h1>
                    	<span><?php _e( 'Daily Archives :',  'cleanblogg' );?></span>
						<?php echo get_the_date();?> 
                    </h1>
					<?php elseif ( is_month() ) : ?>
					<h1>
                		<span><?php _e( 'Monthly Archives :',  'cleanblogg' ); ?></span>
						<?php echo get_the_date( 'F Y' ); ?> 
                	</h1>
					<?php elseif ( is_year() ) : ?>
					<h1>
                		<span><?php _e( 'Yearly Archives :',  'cleanblogg' ); ?> </span>
						<?php echo get_the_date( 'Y' );?>
                	</h1>
            		<?php elseif ( is_author() ) : ?>
					<h1>
                		<span><?php _e( 'Author Archives :',  'cleanblogg' ); ?> </span>
						<?php echo get_the_author();?>
                	</h1>
            		<?php elseif ( is_tag() ) : ?>
					<h1>
                		<span><?php _e( 'Tag Archives :',  'cleanblogg' ); ?> </span>
						<?php echo single_tag_title();?>
                	</h1>     
					<?php else : ?>
					<h1> <?php _e( 'Archives',  'cleanblogg' ); ?> </h1>
					<?php endif; ?>
				</div>
				<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); 
				get_template_part( 'content');
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