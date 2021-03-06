<?php
/**
 * Template part for displaying highlight posts slider section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Lawyer Gravity 1.0.0
 */

$highlight_category_id = business_gravity_get_option( 'highlight_category' );
$args = array(
	'posts_per_page'      => 3,
	'offset'              => 0,
	'category'            => $highlight_category_id,
	'ignore_sticky_posts' => 1
);
$posts_array = get_posts( $args );

if( count( $posts_array ) > 0 && !business_gravity_get_option( 'disable_highlight' ) ){
	?>
	<section class="wrapper block-highlight">
		<div class="container">
			<div class="section-title-group">
				<h2 class="section-title"><?php echo wp_kses_post( business_gravity_get_option( 'highlight_section_title' ) ); ?></h2>
			</div>
		</div>
		<div class="block-highlight-inner">
			<div class="controls"></div>
			<div class="container">
				<div class="highlight-slider owl-carousel">
					<?php
					foreach ( $posts_array as $post ) : setup_postdata( $post );
						$image = business_gravity_get_thumbnail_url( array( 'size' => 'business-gravity-1170-710' ) );
						?>
						<div class="slide-item">
							<div class="slide-inner">
								<div class="post-content-inner-wrap">
									<div class="thumb-outer">
										<div class="thumb-inner post-thumb">
											<?php the_post_thumbnail( 'business-gravity-1170-710' ); ?>
											<a href="<?php the_permalink(); ?>"></a>
										</div>
										<div class="meta">
											<?php
											if( 'post' == get_post_type() ):
												$cat = business_gravity_get_the_category();
												if( $cat ):
													?>
													<span class="cat">
														<?php
														$term_link = get_category_link( $cat[ 0 ]->term_id );
														?>
														<a href="<?php echo esc_url( $term_link ); ?>">
															<?php echo esc_html( $cat[0]->name ); ?>
														</a>
													</span>
													<?php
												endif;
											endif;
											?>
										</div>
									</div>
									<div class="post-content">
										<header class="post-title">
											<h3>
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h3>
										</header>
										<div class="post-text"><?php business_gravity_excerpt( 15, true, '&hellip;' );
											if( get_edit_post_link()){
												business_gravity_edit_link();
											}  
										?>
										</div>
										<div class="button-container">
											<a href="<?php the_permalink(); ?>" class="button-text">
												<?php esc_html_e( 'Learn More', 'lawyer-gravity' ); ?>
											</a>
										</div>
										<div class="post-inner">
											<div class="meta">
												<?php
												if( 'post' == get_post_type() ){
													?>	
													<div class="post-footer-detail">
														<span class="author-name">
															<span><?php echo esc_html__( 'by:', 'lawyer-gravity' ); ?></span>
															<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
																<?php echo get_the_author(); ?>
															</a>
														</span>
					
														<?php
														if( 'post' == get_post_type() ){
															?>	
															<span class="meta-date">
																<a href="<?php echo esc_url( business_gravity_get_day_link() ); ?>" class="date">
									    									<span class="day">
									    									<?php
									    										echo esc_html(get_the_date('M j, Y')); ?>
									    									</span>
									    								</a>
															</span>
														<?php }
														?>
														<span class="comment-link">
															<a href="<?php comments_link(); ?>">
																<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>
															</a>
														</span>
													</div>
												<?php } ?>
											</div>
											<?php if( 'post' == get_post_type() ): ?>
												<div class="post-format-outer">
													<span class="post-format">
														<span class="kfi <?php echo esc_attr( business_gravity_get_icon_by_post_format() ); ?>"></span>
													</span>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					endforeach;
					wp_reset_postdata(); 	
					?>
				</div>
			</div>
			<div id="after-slider"></div>
		</div>
	</section>
	<?php
}