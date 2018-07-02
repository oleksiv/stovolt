<?php get_header(); ?>

    <div class="row">
        <div class="col-xs-4 left_col">
            <?php dynamic_sidebar('left_sidebar'); ?>

        </div>
        <div class="col-xs-8 right_col category_template">
            <h1 class="page-title"><?php echo single_cat_title(); ?></h1>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <div class="date_published"><?php the_date(); ?></div>

                    <div class="blog-content-box clearfix">
                        <div class="blog-left">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php } ?>
                            </a>
                        </div>
                        <div class="blog-right">
                            <?php the_content(); ?>

                        </div>
                    </div>


                </div>

            <?php endwhile; ?>

                <div class="navigation">
                    <div class="next-posts"><?php next_posts_link(); ?></div>
                    <div class="prev-posts"><?php previous_posts_link(); ?></div>
                </div>

            <?php else : ?>

                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <h1>Not Found</h1>
                </div>

            <?php endif; ?>
        </div>
        <!--END content_side -->
    </div><!-- END content_wrapper -->

    <div class="after_content_widgets">
        <?php dynamic_sidebar('after_content'); ?>
    </div>

<?php get_footer(); ?>