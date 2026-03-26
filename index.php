<?php get_header(); ?>

<?php if (have_posts()) : ?>
  
  <?php while (have_posts()) : the_post(); ?>
    
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>

  <?php endwhile; ?>

<?php else : ?>

  <p><?php _e('Sorry, no posts matched your criteria.', 'seu-tema'); ?></p>

<?php endif; ?>  

<?php get_footer(); ?>