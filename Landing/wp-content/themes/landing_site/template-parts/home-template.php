<?php
/* 
    Template Name: Home Template
*/
get_header('home');
?>

<!-- hero -->
<div class="hero">

    <div class="hero__slider swiper-container">

        <div class="swiper-wrapper">
            <?php

            $args = array(
                'post_type' => 'post',
                'post__in' => array(189, 315, 317),
                'orderby' => 'post__in',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <article class="hero__slide swiper-slide">
                        <div class="hero__entry-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
                        <div class="hero__entry-text">
                            <div class="hero__entry-text-inner">
                                <div class="hero__entry-meta">
                                    <span class="cat-links">
                                        <a href=""></a>
                                    </span>
                                </div>
                                <h2 class="hero__entry-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <?php the_excerpt(); ?>
                                <a class="hero__more-link" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div> <!-- swiper-wrapper -->

        <!-- <div class="swiper-pagination"></div> -->

    </div> <!-- end hero slider -->

    <a href="#bricks" class="hero__scroll-down smoothscroll">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
        </svg>
        <span>Scroll</span>
    </a>

</div> <!-- end hero -->

<div id="bricks" class="bricks">
    <div class="masonry">
        <div class="bricks-wrapper">
            <div class="grid-sizer"></div>
            <?php
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) { // In case 'page' is used instead
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            $args = array(
                'post_type'      => 'post',
                'post__not_in' => array(189, 200, 256),
                'posts_per_page' => 12,
                'orderby'        => 'date',
                'order'          => 'ASC',
                'paged' => $paged,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
            <article <?php post_class('brick entry'); ?>>
                <div class="entry__thumb">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium'); // Set thumbnail size
                        }
                        ?>
                    </a>
                </div>
                <div class="entry__text">
                    <!-- Display categories -->
                    <div class="entry__meta">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="entry__category-link">' . esc_html($category->name) . '</a> ';
                            }
                        }
                        ?>
                    </div>

                    <h2 class="entry__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="entry__excerpt"><?php the_excerpt(); ?></p>
                </div>
            </article>
            <?php
                endwhile;
                // Pagination
                wp_reset_postdata();
                else :
                    echo 'No posts found';
                endif;
            ?>
        </div> <!-- End of bricks-wrapper -->
    </div>
    <div class="pgn"> 
    <?php
        echo paginate_links(array(
            'current'   => $paged,
            'total'     => $query->max_num_pages,
            'prev_text' => __('« Previous'),
            'next_text' => __('Next »'),
        ));
        ?>
        </div>

</div><!-- End of bricks -->
<?php get_footer(); ?>