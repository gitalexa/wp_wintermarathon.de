<?php remove_filter('the_content', 'wpautop');?>

<div class="article-container">
    <div class="article">
        <div class="article-image-wrapper">
            <img src="<?php echo CFS()->get('picture') ?>" alt="Article" class="article-image">
        </div>
        <div class="copyright-line"><?php echo CFS()->get('author') ?></div>
        <div class="article-text">
            <h3><?php the_title(); ?></h3>
            <div class="text-block"><?php echo wpautop(get_the_content(), true); ?></div>
            <p class="ellipsis">...</p>
        </div>
        <div class="expander"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/navi/plus.svg" alt="Plus">
            <div class="clear"></div>
        </div>
        <div class="share-plus-reducer">
            <?php if(CFS()->get("facebook")): ?>
            <div class="fb-share-container"><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="window.open(this.href, 'mywin', 'left=20,top=20,width=700,height=400,toolbar=1,resizable=0'); return false;">Teilen</a></div>
            <?php endif; ?>
            <div class="reducer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/navi/minus.svg" alt="Minus">
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<?php add_filter('the_content', 'wpautop'); ?>