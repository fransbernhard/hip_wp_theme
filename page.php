<?php get_header(); ?>

<div class="page-container" id="home">
	<div class="hero-wrapper">
		<h1><?php the_field('hero_title') ?></h1>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<p class="p_first"><?php the_content(); ?></p>
		<?php endwhile; else : echo '<p>no content found</p>';endif; ?>
		<button class="hero_btn"><?php the_field('hero_btn') ?></button>
		<p class="p_second"><?php the_field('hero_text') ?></p>
		<img src="<?php the_field('hero_img')?>" alt="imagez" class="hero_img">
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
		<?php $images = get_field('slider');
		$size = 'full';
		if( $images ): ?>
			<div class="arrow-container">
				<a onclick="plusSlides(-1)" class="control_prev"><</a>
				<a onclick="plusSlides(+1)" class="control_next">></a>

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

	<div class="offers" id="offers">
		<h2><?php the_field('offers_title');?></h2>
		<div class="post-container">
			<?php $args = array( 'post_type' => 'offers', 'posts_per_page' => 1000 );
		    $loop = new WP_Query( $args );
		    while ( $loop->have_posts() ) : $loop->the_post();?>
					<div class="post-content">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php get_template_part( 'template-parts/post/thumbnail-image' );
						endif;?>
						<div class="post-text">
							<h4><?php the_title(); ?></h4>
				      <p><?php the_content();?></p>
							<a class="post-link" href="<?php the_permalink(); ?>">Read more</a>
						</div>
					</div>
	    <?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>

	<div class="news" id="news">
		<img src="<?php the_field('news_image');?>" alt="News" />
		<div class="news-content">
			<h3><?php the_field('news_title');?></h3>
			<p><?php the_field('news_text');?></p>
		</div>
	</div>

	<div id="why">
		<div class="why-container">
			<h3><?php the_field('why_title');?></h3>
			<div class="why-content">
				<p class="first-p"><?php the_field('why_section_left');?></p>
				<p><?php the_field('why_section_right');?></p>
			</div>
		</div>
	</div>

	<div id="about">
			<ul class="filter-emplyee" id="filter-emplyee">
				<li class="filter-li active" onclick="filterEmplyee('team')"><p>Team</p></li>
				<li class="filter-li" onclick="filterEmplyee('board')"><p>Board of Directors</p></li>
				<li class="filter-li" onclick="filterEmplyee('advise')"><p>Advisory Board</p></li>
			</ul>
			<div class="about-people">
				<?php if( have_rows('about_employee') ): ?>
					<ul class="employee-list">
						<?php while( have_rows('about_employee') ): the_row();
							$name = get_sub_field('empoyee_name');
							$role = get_sub_field('employee_role');
							$desc = get_sub_field('employee_desc');
							$img = get_sub_field('employee_img');
							$class = get_sub_field('employee_class'); ?>

							<li class="employee <?php echo $class ?>">
								<div class="employee-img" style="background-image: url(<?php echo $img ?>);"></div>
								<p class="about-img-desc"><?php echo $desc ?></p>
								<div class="about-content">
									<h4><?php echo $name ?></h4>
								  <p><?php echo $role ?></p>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
	</div>

	<div class="contact" id="contact">
		<div class="contact-content">
			<h3><?php the_field('contact_title'); ?></h3>
			<p><?php the_field('contact_text'); ?></p>
			<?php the_field('contact'); ?>
		</div>
		<div class="company-info">
			<div class="acf-map" id="maps">
				<?php $location = get_field('location'); ?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
			<?php the_field('company_info'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
