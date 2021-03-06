<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Venturex
 * @since Venturex 1.0
 */
?>
</div><!-- end #container-content -->
<div id="container-footer">
		<div id="footer">
			<?php $foot= stripslashes(get_option('templatesquare_footer'))?>
			<?php if($foot==""){?>
			<?php _e('Copyright', 'templatesquare'); ?> &copy;
			<?php global $wpdb;
			$post_datetimes = $wpdb->get_results("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970");
			if ($post_datetimes) {
				$firstpost_year = $post_datetimes[0]->firstyear;
				$lastpost_year = $post_datetimes[0]->lastyear;

				$copyright = $firstpost_year;
				if($firstpost_year != $lastpost_year) {
					$copyright .= '-'. $lastpost_year;
				}
				$copyright .= ' ';

				echo $copyright;
				bloginfo('name');
			}
		?>. <?php _e('All rights reserved.', 'templatesquare'); ?>

			<?php }else{?>
			<?php echo $foot; ?>
			<?php } ?>
		</div><!-- end #footer -->
		<div id="bottom-footer"></div><!-- end #bottom-footer -->
</div><!-- end #container-footer -->
<?php
	/* Always have wp_footer() just before the closing <!-- Shared on http://www.MafiaShare.net --></body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<?php $google = stripslashes(get_option('templatesquare_google'));?>
<?php if($google==""){?>
<?php }else{?>
<?php echo $google; ?>
<?php } ?>

<!-- Shared on http://www.MafiaShare.net --></body>
</html>
