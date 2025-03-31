<?php get_header(); ?>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; else : ?>
        <p>記事が見つかりませんでした。</p>
    <?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
