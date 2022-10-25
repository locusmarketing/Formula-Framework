<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>

  <div class="content-hero">
    <img src="<?php echo $img[0]; ?>" />
  </div>

  <div class="content-container faded">
    <div class="single__post-cat">
      <?php the_category(', ') ?>
    </div>
    <h1><?php the_title(); ?></h1>
    <div class="single-content" style="margin-bottom: 3rem;">
      <span class="post-date"><?php the_date(); ?></span>
      <img src="<?php echo $img[0]; ?>" />
      <?php the_content(); ?>
    </div>

    <?php if( is_singular('post')): ?><?php if (!dynamic_sidebar( 'After Blog Post' )):?><?php endif; ?><?php endif; ?>

    <?php if( is_single() ) : ?>

    <?php  foreach (get_comments() as $comment): ?>
        <div><?php echo $comment->comment_author; ?> said: "<?php echo $comment->comment_content; ?>".</div>
        <?php endforeach; ?>
    <?php comments_template(); ?>

    <?php endif; // close to check single.php ?>

  </div>

  <?php endwhile; endif; ?>

<style>
.row {
  width: 100%;
}
.background {
  background: white;
}
.single__post-cat {
  margin-bottom: 3rem;
  display: block;
}
.single__post-cat a {
  font-size: 12px;
  color: white;
  background: var(--primary);
  padding: 6px 14px;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 2px;;
}
.single-content img {
  margin-bottom: 45px;
  width: 100%;
}
.post-date {
  font-size: 18px;
  color: #666;
  font-weight: 500;
  display: block;
  margin-bottom: 32px;
  padding-top: 26px;
  display: block;
  width: 100%;
  border-top: 1px dashed rgba(0,0,0,.1);
}
.content-hero {
  position: relative;
  overflow: hidden;
  height: 350px;
  background: #212121;
}
.content-hero img {
  position: absolute;
  width: 110%;
  height: 110%;
  top: -5%;
  left: 0;
  object-fit: cover;
  filter: blur(10px);
  opacity: .9;
}
.content-container {
  background: white;
  padding: 5rem 6rem;
  border-top: 6px solid var(--primary);
  max-width: 1000px;
  margin: 0 auto;
  transform: translateY(-220px);
  -webkit-box-shadow: 0px -14px 43px -4px rgba(0,0,0,0.25);
  box-shadow: 0px -14px 43px -4px rgba(0,0,0,0.25);
}
.container {
  position: relative;
  width: 1400px;
  max-width: 100%;
  padding: 5rem 2.5rem;
  margin: 3rem auto;
}

.content-container h1 {
  font-size: 40px;
  margin-bottom: 32px;
  max-width: 85%;
}
.single-content p {
  font-size: 20px;
}
</style>
<?php get_footer(); ?>
