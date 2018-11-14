<?php get_header(); ?>
<?php global $archi_option; ?>
<?php if($archi_option['subpage-switch']!=false){ ?>

	<section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom"
		<?php if( function_exists( 'rwmb_meta' ) ) { ?>       
	        <?php $images = rwmb_meta( '_cmb_subheader_image', "type=image" ); ?>
	        <?php if($images){ foreach ( $images as $image ) { ?>
	        <?php $img =  $image['full_url']; ?>
	          style="background-image: url('<?php echo esc_url($img); ?>');"
	        <?php } } ?>
	    <?php } ?>
	>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">                
	                <h1><?php the_title(); ?></h1>
	                <?php archi_breadcrumbs(); ?>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- subheader close -->

<?php }else{ ?>
    <section class="no-subpage"></section>
<?php } ?>


<div id="content">
	<div class="container">
		<div class="row">
			<?php if(isset($archi_option['single-service-layout']) && $archi_option['single-service-layout']== 2 ){ ?>
				<div class="col-md-3">
					<?php
						$servicemenu = array(
							'theme_location'  => 'service-menu',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
							'walker'          => new wp_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="services-list">%3$s</ul>',
							'depth'           => 0,
						);
						if ( has_nav_menu( 'service-menu' ) ) {
							wp_nav_menu( $servicemenu );
						}
					?> 					
				</div>
			<?php } ?>
			
			<div class="<?php if(isset($archi_option['single-service-layout']) && $archi_option['single-service-layout']== 2 || $archi_option['single-service-layout']== 3 ){ echo 'col-md-9'; }else{} ?>">
				<?php while (have_posts()) : the_post()?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>

			<?php if(isset($archi_option['single-service-layout']) && $archi_option['single-service-layout']== 3 ){ ?>
				<div class="col-md-3">
					<?php
						$servicemenu = array(
							'theme_location'  => 'service-menu',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
							'walker'          => new wp_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="services-list">%3$s</ul>',
							'depth'           => 0,
						);
						if ( has_nav_menu( 'service-menu' ) ) {
							wp_nav_menu( $servicemenu );
						}
					?> 				
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>