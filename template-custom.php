<?php
/**
 * Template Name: Home Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>


<h2>Blog</h2>
<ul>

<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>


<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>


<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>


<li><?php the_excerpt(__('(more…)')); ?></li>


<?php 
endwhile;
wp_reset_postdata();
?>
</ul>


<?php endwhile; ?>
