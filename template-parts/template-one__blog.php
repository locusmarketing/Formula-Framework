<div class="container">
  <div class="post-grid">

  <?php $args = array( 'post_type' => 'post', 'posts_per_page' => 99999, );
   $loop = new WP_Query( $args );  while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>

    <div class="single__post faded">
      <a href="<?php the_permalink(); ?>" class="single__post-image" <?php if($img) : ?>style="background-image: url(<?php echo $img[0]; ?>);"<?php endif; ?>></a>
      <div class="single__post-content">
        <div class="single__post-cat">
          <?php the_category(', ') ?>
        </div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
        <a href="<?php the_permalink(); ?>" class="button">View Post</a>
      </div>
    </div>

  <?php endwhile; ?>

<?php wp_reset_postdata(); ?>

</div>
</div>




<style>
.container {
  position: relative;
  width: 1400px;
  max-width: 100%;
  padding: 5rem 2.5rem;
  margin: 3rem auto;
}
#sidebar {
  display: none;
}
.post-grid {
  display: grid;
  grid-template-columns: repeat(12, minmax(0, 1fr));
  gap: 4rem;
}
.single__post {
  border: 2px solid rgba(0,0,0,.05);
  background: white;
}
.single__post p {
  font-size: 18px;
  color: #888;
}
.single__post {
  grid-column: span 6 / span 6;
  transition: all .3s ease !important;
  display: block;
  position: relative;
}
.single__post:hover {
  box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  transform: translateY(-6px) !important;
}
.single__post:nth-child(1), .single__post:nth-child(2), .single__post:nth-child(3) {
  grid-column: span 4 / span 4;
}
.single__post:nth-child(6), .single__post:nth-child(7), .single__post:nth-child(8), .single__post:nth-child(9) {
  grid-column: span 6 / span 6;
}
.single__post-content {
  padding: 2.5rem;
}
.single__post h2, .single__post h2 a {
  font-size: 20px;
  color: #212121;
}
.single__post .single__post-image {
  display: block;
  background: #efefef;
  margin-bottom: 16px;
  height: 400px;
  background-size: cover;
  background-position: center;
}
.single__post:nth-child(1) .single__post-image, .single__post:nth-child(2) .single__post-image, .single__post:nth-child(3) .single__post-image {
  display: block;
  background: #efefef;
  margin-bottom: 16px;
  height: 235px;
  background-size: cover;
  background-position: center;
}
.single__post .single__post-image:nth-child(6) {
  display: block;
  background: #efefef;
  margin-bottom: 16px;
  height: 800px;
  background-size: cover;
  background-position: center;
}
.single__post-cat {
  margin-bottom: 3rem;
  display: block;
}
.single__post-cat a {
  font-size: 12px;
  color: white;
  background: #212121;
  padding: 6px 14px;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 2px;;
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
  .single__post {
    grid-column: span 12 / span 12 !important;
  }
}
</style>
