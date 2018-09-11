<?php
get_header();
while(have_posts()){
    the_post(); ?>

    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>Dont forget to replace me later</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">

     <!-- dynamic handling of child pages -->
    <?php $theParentId = wp_get_post_parent_id(get_the_ID()); ?>
    <?php if($theParentId) { ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParentId); ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo get_the_title($theParentId); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
      </div>
    <?php } ?>


    <?php
    // know if the page is a parent or not
    $testArray = get_pages([
        'child_of' => get_the_ID()
    ]);
    if($theParentId || $testArray ) {  ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParentId); ?>"><?php echo get_the_title($theParentId); ?></a></h2>
        <ul class="min-list">
          <?php
          // know if the page is currently child or parent page
          if($theParentId){
            $findChildrenOf = $theParentId;
            } else {
                $findChildrenOf = get_the_ID();
            }
          wp_list_pages([
              'title_li' => NULL,
              'child_of' => $findChildrenOf,
              'sort_column' => menu_order
          ]); ?>
        </ul>
      </div>
    <?php } ?>

      <div class="generic-content">
        <?php the_content(); ?>
      </div>

    </div>

<?php }
get_footer();
?>
