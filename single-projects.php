<!-- Single template for custom type 'projects' -->
<?php get_header(); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <main>

    </main>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>