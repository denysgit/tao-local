			<?php $slidetype = get_option('templatesquare_slider_type');?>
			<?php if($slidetype=="slider1"){?>
				<ul id="slide">
					<?php
						query_posts("post_type=slider&post_status=publish&posts_per_page=-1&order=ASC");
						while ( have_posts() ) : the_post();
					?>
					<?php
						$custom = get_post_custom($post->ID);
						$sliderurl = $custom["slider-url"][0];
						$cf_thumb = $custom["thumb"][0];
					?>	
					<li>
						<?php if(has_post_thumbnail( $the_ID) || $cf_thumb!=""){ ?>		
							<?php
								if($sliderurl!=""){
									echo '<a href="'.$sliderurl.'">';
								} 
								if($cf_thumb!=""){
									echo "<img src='" . $cf_thumb . "' alt=''  width='920' height='280' />";
								}else{
									the_post_thumbnail( 'slider-post-thumbnail' );
								}
								if($sliderurl!=""){
									echo '</a>';
								} 
							?>
						<?php } ?>
					</li>
					<?php endwhile; ?>
					<?php wp_reset_query();?>
				</ul>
				<div id="pager"></div>
			
			<?php } else{?>
			
				<div id="slide2">
					<ul>
						<?php
							query_posts("post_type=slider&post_status=publish&posts_per_page=-1&order=ASC");
							while ( have_posts() ) : the_post();
						?>
						<?php
							$custom = get_post_custom($post->ID);
							$sliderurl = $custom["slider-url"][0];
							$cf_thumb = $custom["thumb"][0];
						?>	
						<li>
							<?php if(has_post_thumbnail( $the_ID) || $cf_thumb!=""){ ?>		
								<?php 
									if($sliderurl!=""){
										echo '<a href="'.$sliderurl.'">';
									} 
									if($cf_thumb!=""){
										echo "<img src='" . $cf_thumb . "' alt=''  width='920' height='280' />";
									}else{
										the_post_thumbnail( 'slider-post-thumbnail' );
									}
									if($sliderurl!=""){
										echo '</a>';
									} 
								?>
							<?php } ?>
						</li>
						<?php endwhile; ?>
						<?php wp_reset_query();?>
					</ul>
				</div>
			<?php } ?>
