<?php
/**
 * Template Name: Portfolio3
 *
 * A custom page template for portfolio page.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Venturex
 * @since Venturex 1.0
 */

get_header(); ?>

		<div id="main">
				
				<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
				yoast_breadcrumb('<div id="breadcrumbs">','</div>');
				} ?>
				
			
				<?php
				include_once (TEMPLATEPATH . '/title.php');
				 ?>
				 
				 <?php the_content( __( 'Continue Reading', 'templatesquare' ) ); ?>
				 
				 
				 
				<?php $values = get_post_custom_values("category-include"); $cat=$values[0];  ?>
				<?php global $more;	$more = 0;?>
				<?php $catinclude = 'portfoliocat='.$cat;?>
				<?php query_posts('&' . $catinclude .' &paged='.$paged.'&showposts=6'); ?>
				
				<div id="gallery-pf">
					<ul class="pf-type3">
					<?php 
					$i=1;
					if ( have_posts() ) while ( have_posts() ) : the_post(); 
					if(($i%3) == 0){ $addclass = "nomargin";	}	
					?>
					
					
					<?php
						$custom = get_post_custom($post->ID);
						$cf_thumb = $custom["thumb"][0];
						$cf_lightbox = $custom["lightbox"][0];
						
						if($cf_thumb!=""){
							$cf_thumb = "<img src='" . $cf_thumb . "' alt=''  width='266' height='166' class='fade alignnone'/>";
						}
					?>
					
						<li class="<?php echo $addclass; ?>">
						<div class="pf-img-type3">
						<?php if($cf_lightbox!=""){ ?>
						<a class="image" href="<?php echo $cf_lightbox;?>" rel="prettyPhoto[mixed]" title="<?php the_title();?>"><?php if($cf_thumb!=""){ echo $cf_thumb; }else{ the_post_thumbnail( 'portfolio3-post-thumbnail', array('class' => 'fade alignnone') );} ?></a>
					<?php }else{ ?>
						<a href="<?php the_permalink() ?>" title="<?php _e('Permanent Link to', 'templatesquare');?> <?php the_title_attribute(); ?>" ><?php if($cf_thumb!=""){ echo $cf_thumb; }else{ the_post_thumbnail( 'portfolio3-post-thumbnail', array('class' => 'fade alignnone') );} ?></a>
						<?php } ?>
						</div>
						<div class="pf-text-type3">
						<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'templatesquare' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p><?php $excerpt = get_the_excerpt(); echo ts_string_limit_words($excerpt,20).'... ';?> </p>
						</div>
						</li>
						<?php $i++; $addclass = ""; endwhile; ?>
					</ul>
					<div class="clear"></div>
				</div>
				
				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			
					 <?php if(function_exists('wp_pagenavi')) { ?>
						 <?php wp_pagenavi(); ?>
					 <?php }else{ ?>
				<div id="nav-below" class="navigation nav2">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Prev', 'templatesquare' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&raquo;</span>', 'templatesquare' ) ); ?></div>
				</div><!-- #nav-below -->
					<?php }?>
				<?php endif; ?>
				<?php wp_reset_query();?>
				 
		</div><!-- end #main -->
		
<?php get_footer(); ?>
