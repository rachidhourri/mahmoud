<?php get_header(); ?>
<?php global $archi_option; ?>
<?php if($archi_option['subpage-switch']!=false){ ?>

    <!-- subheader begin -->
    <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                      <?php printf( __( 'Search results for: %s', 'archi' ), get_search_query() ); ?>
                    </h1>
                    <?php archi_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

<?php }else{ ?>
    <section class="no-subpage"></section>
<?php } ?>

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] == 2 ){ ?>
                <div class="col-md-4">
                  <?php get_sidebar();?>
                </div>
            <?php } ?>

            <div class="<?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] != 1 ){echo 'col-md-8';}else{echo 'col-md-12';}?>">
                <?php if(have_posts()) : ?> 
                <ul class="blog-list">
                    <?php 
                      while (have_posts()) : the_post();
                      get_template_part( 'content', get_post_format() ) ;   // End the loop.
                      endwhile;
                    ?>

                </ul>
                <?php else: ?>
                    <h1><?php _e('Nothing Found Here!', 'archi'); ?></h1>
                <?php endif; ?> 

                <div class="text-center">
                    <ul class="pagination">
                        <?php echo archi_pagination(); ?>
                    </ul>
                </div>
            </div>
            <?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] == 3 ){ ?>
                <div class="col-md-4">
                  <?php get_sidebar();?>
                </div>
            <?php } ?>
            
        </div>
    </div>
</div>
<!-- content close -->
<?php get_footer(); ?>


