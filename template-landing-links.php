<?php
/*
Template: WPM Social Influencer Links Template
*/
\the_post();

$links = new \WP_Query([
    'post_type' => 'wpm-landing-link',
    'posts_per_page' => 999,
    'orderby' => [
        'menu_order' => 'asc',
        'date' => 'desc',
        'title' => 'asc',
    ]
]);

$enable_hooks = !\get_field( 'wpmll_opt_disable_hooks' );

$theme = \get_field( 'wpmll_opt_theme' ) == 'Dark' ? 'dark' : 'light';

?>
<!doctype html>
<html>
<head>
    <title><?php \wp_title( '' ); ?></title>
    
    <?php
        if ( $enable_hooks ) 
            \wp_head(); 

        echo \get_field( 'wpmll_opt_embed-head' ); 
    ?>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="<?php echo \plugins_url( '/assets/style.css', __FILE__ ); ?>" type="text/css" rel="stylesheet">

    <style type="text/css">
    body.wpm-ll-body {
        <?php if ( $value = \get_field( 'wpmll_opt_bg_color' ) ) : ?>
        background: <?php echo \esc_html( $value ); ?> !important;
        <?php endif; ?>
        <?php if ( $value = \get_field( 'wpmll_opt_text_color' ) ) : ?>
        color: <?php echo \esc_html( $value ); ?> !important;
        <?php endif; ?>
    }
    <?php if ( $value = \get_field( 'wpmll_opt_link_color' ) ) : ?>
    body.wpm-ll-body a:not(.wpm-ll-button) { color: <?php echo \esc_html( $value ); ?> !important; }
    <?php endif; ?>
    </style>
</head>
<body class="wpm-ll-body wpm-ll-body-<?php echo \esc_attr( $theme ); ?>">

    <?php
        if ( $enable_hooks ) 
            \wp_body_open(); 

        echo \get_field( 'wpmll_opt_embed-body' );
    ?>

    <section id="wpm-ll-main">
        <header>
            <?php if ( \has_post_thumbnail() ) : ?>
            <div class="wpm-ll-thumb">
                <?php \the_post_thumbnail( 'thumbnail' ); ?>
            </div>
            <?php endif; ?>
            <div class="wpm-ll-title">
                <h1><?php \the_title(); ?></h1>
            </div>
            <div class="wpm-ll-intro">
                <?php \the_content(); ?>
            </div>
        </header>
        <article>
            
            <?php if ( $links->have_posts() ) : ?>

            <ol class="wpm-ll-links">

                <?php while ( $links->have_posts() ) : $links->the_post(); ?>

                <li id="wpm-ll-link-<?php echo (int) \get_the_ID(); ?>">

                    <a href="<?php echo \esc_url( \get_field( 'wpmll_url' ) ); ?>" target="_blank" style="<?php
                        if ( $value = \get_field( 'wpmll_color_bg' ) )
                        {
                            echo 'background-color:' . \esc_attr( $value ) . ';';
                        }
                        if ( $value = \get_field( 'wpmll_color_text' ) )
                        {
                            echo 'color:' . \esc_attr( $value ) . ';';
                        }
                    ?>" class="wpm-ll-button">

                        <?php \the_title(); ?>
                        
                        <?php if ( $byline = \get_field( 'wpmll_byline' ) ) : ?>
                        
                        <span class="wpm-ll-link-desc">
                            <?php echo \esc_html( $byline ); ?>
                        </span>

                        <?php endif; ?>
                    </a>

                </li>

                <?php endwhile; \wp_reset_query(); ?>

            </ol>

            <?php endif; ?>

        </article>
        <footer id="wpm-ll-footer">
            <div class="wpm-ll-footer-content">
                
                <?php $social = \WPM\Influencer_Links::get_social_links( \get_the_ID() ); if ( \count( $social ) > 0 ) : ?>
                <div class="wpm-ll-social">
                    <?php 
                        $out = '';
                        foreach ( $social as $network => $url ) 
                        {
                            $label = \esc_html( \WPM\Influencer_Links::get_social_label( $network ) );
                            $out .= '<a target="_blank" href="' . \esc_url( $url ) .'" title="' . $label . '"><span>' 
                                 . $label . '</span></a> | ';
                        }
                        echo \rtrim( $out, ' | ' );
                    ?>
                </div>
                <?php endif; ?>

                <?php if ( $outro = \get_field( 'wpmll_opt_outro' ) ) : ?>

                <div class="wpm-ll-footer-outro"><?php echo $outro; ?></div>

                <?php endif; ?>

            </div>
        </footer>
        <div class="wpm-ll-built">
            <p>
                Generated with <a href="https://wpmaintainer.com">Social Influencer Links</a> 
                plugin from <a href="https://wpmaintainer.com" target="_blank">WP Maintainer</a>.
            </p>
        </div>
        <?php if ( \current_user_can( 'edit_page' ) ) : ?>
        <div class="wpm-ll-edit"><?php \edit_post_link( 'Edit This Page' ); ?></div>
        <?php endif; ?>
    </section>

    <?php
        if ( $enable_hooks ) 
            \wp_footer(); 

        echo \get_field( 'wpmll_opt_embed-footer' ); 
    ?> 


</body>
</html>
