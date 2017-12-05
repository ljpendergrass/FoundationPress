<?php
/*
Template Name: Get Involved Landing Page
*/
get_header(); ?>

<div id="page-full-width get-involved-landing" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php
    // If a featured image is set, insert into layout and use Interchange
    // to select the optimal image size per named media query.
    if ( has_post_thumbnail( $post->ID ) ) : ?>
    	<header id=" " class="row visual-header about-programs" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
        <!-- Title -->
        <h1 class="text-center"><?php echo get_the_title(); ?></h1>
    	</header>
    <?php //todo: add elseif for no thumbnail/featured image
  endif; ?>

      <!-- Excerpt/intro -->
      <div class="row about-intro-block">
        <h3 class="excerpt text-center align-center">
          <?php $id = get_the_id();
            echo get_field("excerpt", $id, false);
          ?>
        </h3>
      </div>

      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content row">
        <?php the_content(); ?>
      </div>

      <?php do_action( 'foundationpress_page_before_comments' ); ?>
      <?php comments_template(); ?>
      <?php do_action( 'foundationpress_page_after_comments' ); ?>
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

<ul class="no-bullet row landing-page-menu">

<?php
$info = get_field("about_us_side_menu", get_the_id(), false); // info section from user

$contents = array();

if ( !empty($info) ) {
  foreach ($info as $page){
    $href = get_permalink($page);
    $title = get_the_title($page);
    $item = "<li class='small-12 medium-4 large-4 columns'><a class='button expanded' href='{$href}'><h5>{$title}</h5></a></li>";
    $contents[] = $item;
  };
  echo implode("\n", $contents);
};
?>
</ul>


</div>

<?php get_footer();
