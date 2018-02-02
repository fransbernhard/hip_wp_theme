<?php get_header();

$images = get_field('slider');
$size = 'full';

?>

<div class="page-container" id="home">
	<div class="page-wrapper">
		<h1><?php the_field('title_first_section') ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
		<?php endwhile; else : echo '<p>no content found</p>';endif; ?>

		<button class="btn_first_section"><?php the_field('btn_first_section') ?></button>
		<p><?php the_field('text_first_section') ?></p>
		<img src="<?php the_field('img_first_section')?>" alt="imagez" class="img-first-section">
	</div>

	<div class="second-section">
		<div class="careplan" style="background-image: url(<?php the_field('careplan_bg_image'); ?>);">
			<img class="careplan_logo_img" src="<?php the_field('careplan_logo_img')?>" alt="">
			<a class="careplan-link" href="<?php the_field('careplan_link'); ?>">Read more</a>
		</div>
		<div class="hip" style="background-image: url(<?php the_field('hip_bg_image'); ?>);">
			<img class="hip_logo_img" src="<?php the_field('hip_logo_img')?>" alt="">
			<a class="hip_link" href="<?php the_field('hip_link'); ?>">Read more</a>
		</div>
	</div>

	<div class="slider-section" id="slider">
		<?php if( $images ): ?>
			<div class="arrow-container">
				<a onclick="plusSlides(+1)" class="control_next">></a>
	  		<a onclick="plusSlides(-1)" class="control_prev"><</a>
			</div>
      <ul class="slider">
        <?php foreach( $images as $image ): ?>
          <li class="slider-item">
          	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

		<!-- The dots/circles -->
		<!-- <div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span>
		  <span class="dot" onclick="currentSlide(2)"></span>
		  <span class="dot" onclick="currentSlide(3)"></span>
		</div> -->
	</div>

	<div class="services-section">
		<h1><?php the_field('services_title'); ?></h1>
		<h2>MIMI</h2>
		<?php $args = array( 'post_type' => 'post', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
      the_title();
      echo '<div class="entry-content">';
      the_content();
      echo '</div>';
    endwhile;?>
	</div>
</div>

<?php get_footer(); ?>
