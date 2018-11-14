<?php 
get_header(); 
global $archi_option; 
$showall = (!empty($archi_option['portfolio_text_all'])) ? $archi_option['portfolio_text_all'] : 'All Project';
?>
<?php if($archi_option['subpage-switch']!=false){ ?>
  <!-- subheader begin -->
  <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom" <?php if($archi_option['portfolio_thumbnail'] != ''){ ?> style="background-image: url('<?php echo esc_url($archi_option['portfolio_thumbnail']['url']); ?>');" <?php } ?> >
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <?php if ($archi_option['portfolio_title'] != ''){ echo '<h1 class="page-title">' . esc_attr($archi_option['portfolio_title']) . '</h1>'; }else{ the_archive_title( '<h1 class="page-title">', '</h1>' ); } ?>
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
  <div id="content" class="padtop0">   
    <?php if($archi_option['archive_portfolio_filter']!=false){ ?>
      <div class="container">
        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                  <li><a href="#" data-filter="*" class="selected"><?php echo esc_attr($showall); ?></a></li>                    
                    <?php 
                      $categories = get_terms('categories');
                       foreach( (array)$categories as $categorie){
                        $cat_name = $categorie->name;
                        $cat_slug = $categorie->slug;
                        $cat_count = $categorie->count;
                      ?>
                      <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                    <?php } ?>                    
                </ul>
            </div>
        </div>        
        <!-- portfolio filter close -->
      </div>
    <?php } ?>
    <div id="gallery" class="gallery full-gallery de-gallery pf_full_width <?php if ($archi_option['portfolio_columns'] == 2) {echo 'pf_2_cols'; }elseif ($archi_option['portfolio_columns'] == 3) { echo 'pf_3_cols'; }elseif ($archi_option['portfolio_columns'] == 5) { echo 'pf_5_cols'; }elseif ($archi_option['portfolio_columns'] == 6) { echo 'pf_6_cols'; }else{} ?> wow fadeInUp" data-wow-delay=".3s">
          <?php 
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $args = array(   
              'post_type' => 'portfolio',   
              'posts_per_page' => $archi_option['portfolio_show'], 
              'paged' => $paged,             
            );  
            $wp_query = new WP_Query($args);
            while ($wp_query -> have_posts()) : $wp_query -> the_post();
            $cates = get_the_terms(get_the_ID(),'categories');
            $cate_name ='';
            $cate_slug = '';
            foreach((array)$cates as $cate){
                if(count($cates)>0){
                  $cate_name .= $cate->name.'<span>, </span> ' ;
                  $cate_slug .= $cate->slug .' ';     
                } 
            }           
          ?>             
          <!-- gallery item -->
          <div class="item <?php echo esc_attr($cate_slug); ?>">
              <div class="picframe">
                  <a <?php if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
                      <span class="overlay">
                          <span class="pf_text">
                              <span class="project-name"><?php the_title(); ?></span>
                          </span>
                      </span>
                  </a>
                  <?php 
                    if ( has_post_thumbnail() ) { 
                      the_post_thumbnail( 'thumb-portfolio' ); 
                    }
                  ?>
              </div>
          </div>
          <!-- close gallery item -->
         <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <div class="container">
        <div class="col-md-12">
            <div class="pagination text-center" style="width:100%;padding-top: 40px;">
                <?php
                    global $wp_query;
                    $big = 999999999;
                    echo paginate_links( array(
                      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                      'format' => '?paged=%#%',
                      'current' => max( 1, get_query_var('paged') ),
                      'total' => $wp_query->max_num_pages,                      
                        'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                        'next_text' => '<i class="fa fa-angle-double-right"></i>',       
                        'type'          => 'list',
                        'end_size'      => 3,
                        'mid_size'      => 3
                    ) );
                ?>
            </div>
        </div>
      </div>
  </div>
  <!-- content close -->

<?php get_footer(); ?>
