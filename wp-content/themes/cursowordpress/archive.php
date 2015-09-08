<?php
get_header();
?>
<div class="col-md-8 col-sm-12 col-xs-12">

    <?php
        if ( have_posts() ) //si hay posts
        {
            ?>
            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

            <?php
            while ( have_posts() ) //iniciamos el loop
            {
                the_post(); //obtenemos las funciones que devuelven los datos del post
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></h3>
                    </div>

                    <div class="panel-body">
                        <?php
                        if ( has_post_thumbnail() )
                        {
                            ?>
                            <div class="col-md-4">
                                <?php
                                the_post_thumbnail( 'thumbnail', array( 'class'  => 'img-responsive' ) );
                                ?>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?php the_content( __( 'Seguir leyendo' ), FALSE, ''); ?>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <p>
                            Autor: <?php the_author_posts_link(); ?>,
                            Categorías: <?php  echo get_the_category_list( ", ", '', $post_id ) ?>
                        </p>
                    </div>

                </div>
                <?php
            } //end while

            //template part pagination
            get_template_part("content", "pagination");

        } //end if
        else
        {
            get_template_part("content", "empty");
        }
        ?>
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12">
        <?php
        get_sidebar();
        ?>
    </div>
    <?php
    get_footer();
