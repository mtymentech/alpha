<?php get_header() ?>
<body <?php body_class(); ?>>
<?php get_template_part('hero') ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="posts">
				<?php while(have_posts()):the_post() ?>
					<div class="post <?php post_class() ?>">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h2 class="post-title">
										<?php the_title() ?>
									</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p class="text-center">
										<em><?php the_author_posts_link() ?></em><br/>
										<?php echo get_the_date() ?>
									</p>

								</div>
								<div class="col-md-12">
									<p class="text-center">
										<?php
										if(has_post_thumbnail()){
											$thumbnail_url = get_the_post_thumbnail_url(null,'large');
											printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
											the_post_thumbnail('full', array( 'class'=>'img-fluid'));
											echo "</a>";
										}
										?>
									</p>
									<?php the_content(); ?>

                                    <?php wp_link_pages(); ?>

								</div>
								<?php if( !post_password_required()): ?>
									<div class="col-md-12">
										<?php comments_template() ?>
									</div>
								<?php endif ?>
							</div>

						</div>
					</div>
				<?php endwhile ?>

			</div>
		</div>
		<div class="col-md-4">
			<?php if(is_active_sidebar('sidebar-1')){
				dynamic_sidebar('sidebar-1');
			} ?>
		</div>
	</div>
</div>
<?php get_footer() ?>