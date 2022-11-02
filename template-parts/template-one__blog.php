<div class="container">
  <div class="post-grid">

  <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 99999, );
   $loop = new WP_Query( $args );  while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>

    <div class="single__post faded">
      <a href="<?php the_permalink(); ?>" class="single__post-image" <?php if($img) : ?>style="background-image: url(<?php echo $img[0]; ?>);"<?php endif; ?>></a>
      <div class="single__post-content">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <!-- <p><?php // echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p> -->
        <!-- <a href="<?php // the_permalink(); ?>" class="button">View Post</a> -->
        <div class="single__post-cat">
          <span class="date-posted"><?php echo get_the_date(); ?></span>
          <span class="posted-in">Posted In: </span><?php the_category(', ') ?>
        </div>
      </div>
    </div>

  <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  </div>
</div>




<style>
html, body {
  background: #f9f9f9;
}
header.header {
  background: white;
}
.container {
  padding: 5rem 0;
}
.posted-in {
  font-size: 14px;
  margin-top: 0;
}
.date-posted {
  font-weight: 800;
  display: block;
  margin-bottom: 6px;
}
#sidebar {
  display: none;
}
.post-grid {
  display: grid;
  grid-template-columns: repeat(12, minmax(0, 1fr));
  gap: 3rem;
  padding: 0 2rem;
  width: 1400px;
  max-width: 100%;
  margin: 0 auto;
}
.single__post {
  text-align: left;
  padding: 2rem;
  background: white;
  border: 1px solid rgba(0,0,0,.05);
  border-radius: 5px;
  transition: all .3s ease;
}
.single__post:hover {
  box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
}
.single__post p {
  font-size: 18px;
  color: #888;
}
.single__post {
  grid-column: span 4 / span 4;
  transition: all .3s ease !important;
  display: block;
  position: relative;
}
.single__post-content {
  padding: 0;
}
.single__post h2 {
  text-align: left;
  margin-bottom: 1rem;
  margin-top: 0;
  line-height: 1.4;
}
.single__post h2, .single__post h2 a {
  font-size: 20px;
  transition: all .3s ease;
}
.single__post .single__post-image {
  display: block;
  background: #efefef;
  margin-bottom: 16px;
  height: 225px;
  background-size: cover;
  background-position: center;
  border-radius: 5px;
  transition: all .3s ease;
}

.single__post-cat, .single__post-cat a {
  font-size: 16px;
  line-height: 1.5;
  color: #444;
  margin-top: 0.15rem;
}
.single__post-cat a {
    font-weight: 600;
    display: inline-block;
    font-size: 14px;
}

.single__post .button {
  border: 2px solid rgba(0,0,0,.05);
  padding: 16px;
  text-align: center;
  color: #666;
  background: white;
  border-radius: 6px;
  margin-top: 32px;
  font-size: 14px;
  display: block;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  transition: all .3s ease;
}
.single__post .button:hover {
  color: white;
  background: #212121;
  border: none;
}


@media(max-width: 992px) {
  .post-grid {
    display: block;
    padding: 1rem;
  }
  .single__post {
    margin-bottom: 2rem;
  }
}
</style>
