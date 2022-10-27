<?php get_header(); ?>

<section class="single__hero">
  <div class="single__hero-background">
    <div class="single__hero-left">
      <span class="single__hero-date"><?php the_date(); ?></span>
      <h1><?php the_title(); ?></h1>
      <span class="cats"><span class="posted-in">Posted In: </span><?php the_category(', ') ?></span>
    </div>
    <div class="single__hero-right">
      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" />
    </div>
  </div>
  <div class="single__hero-container"></div>
</section>

<section>
  <div class="single__content">
    <div class="single__content-content">
      <?php the_content(); ?>
    </div>
    <div class="single__content-sidebar">
		<?php if ( is_active_sidebar( 'sidebar_content' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar_content' ); ?>
		<?php endif; ?>
    </div>
  </div>
</section>

<style>

  header.header {
    display: none !important;
  }

  h1, h2, h3, h4, h5 {
    line-height: 1.3;
    letter-spacing: 0;
    text-align: left;
    margin: 3rem 0;
    padding-bottom: 1rem;
    border-bottom: 1px solid rgba(0,0,0,.1);
    max-width: 90%;
  }
  p {
    margin-bottom: 1rem !important;
  }
  }
  h1 {
    font-size: 3.5rem !important;
  }
  h2 {
    font-size: 3rem !important;
  }
  h3 {
    font-size: 2.75rem !important;
  }
  h4 {
    font-size: 2.5rem !important;
  }
  h5 {
    font-size: 2.25rem !important;
  }
  .single__hero {
    height: 525px;
    background: #212121;
    position: relative;
    overflow: hidden;
    align-items: center;
  }
  .single__hero-background {
    display: grid;
    grid-template-columns: repeat(7, minmax(0, 1fr));
    height: 100%;
    width: 100%;
  }
  .single__hero-left {
    grid-column: span 3 / span 3;
    background: #212121;
    padding: 5rem 3rem;
  }
  .single__hero-left h1 {
    color: white;
    line-height: 1.1;
    margin: 0;
  }
  .single__hero-date {
    color: #ff797c;
    font-size: 0.85rem;
    margin-bottom: 1rem;
    display: block;
  }
  .single__hero-right {
    grid-column: span 4 / span 4;
    position: relative;
    overflow: hidden;
  }
  .single__hero-right img {
    position: absolute;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    object-fit: cover;
  }
  .single__content {
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    grid-gap: 6rem;
    width: 1200px;
    padding: 3rem 0;
    margin: 0 auto;
    margin-bottom: 4rem;
  }
  .single__content ul {
    padding-left: 1rem;
    margin: 0 1rem;
  }
  .single__content ul li {
    margin-bottom: 1rem;
  }
  .single__content-content {
    grid-column: span 8 / span 8;
  }
  .single__content-sidebar {
    grid-column: span 4 / span 4;
    background: #f9f9f9;
    padding: 2rem;
    border-radius: 5px;
  }
  .cats {
    position: absolute;
    bottom: 4rem;
    font-size: 16px;
  }
  .cats a {
    color: #ff797c;
  }
  .posted-in {
    color: white;
    font-weight: 600;
  }
  
  
  footer {
    border-top: 1px solid rgba(0,0,0,.2);
  }
  
  @media(max-width: 992px) {
      h1 {
        font-size: 2rem;
      }
      h2 {
        font-size: 1.75rem;
      }
      h3 {
        font-size: 1.5rem;
      }
      h4 {
        font-size: 1.25rem;
      }
      h5 {
        font-size: 15rem;
      }
    .single__hero {
      height: auto;
    }
    .single__hero-background {
      display: block;
    }
    .single__hero-right {
      height: 300px;
    }
    .single__content {
      padding: 0 1rem;
      display: block;
      width: 100%;
      margin: 0 auto;
    }
   .single__hero-left {
     padding: 2.5rem 1.5rem;
   }
   .cats {
     position: relative;
     bottom: auto;
   }
  }
</style>

<?php get_footer(); ?>