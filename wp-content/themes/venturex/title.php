<?php if(is_home()){ ?>
	<h1 class="pagetitle"><?php _e('Blog','templatesquare');?></h1><br />
<?php } else { ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $pagetitle = get_post_custom_values("page-title");?>
	<?php $pagedesc = get_post_custom_values("page-desc");?>
	<?php if($pagetitle == ""){ ?>
	<h1 class="page-title"><?php the_title(); ?></h1>
	<?php } else { ?>
	<h1 class="page-title"><?php echo $pagetitle[0]; ?></h1>
	<?php } ?>
	<?php if($pagedesc != ""){ ?>
	<span class="page-desc"><?php echo $pagedesc[0];?></span>
	<?php } ?>
	<?php endwhile; endif; ?>
	<?php wp_reset_query();?>
<?php } ?>


