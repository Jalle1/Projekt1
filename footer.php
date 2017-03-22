</main>

<footer id="footer">
    <div class="container">
        <div class="row top">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <?php if (get_field('about_title', 'options')) { ?>
                    <h4><?php the_field('about_title', 'options'); ?></h4>
                    <p><?php the_field('about_text', 'options'); ?></p>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-md-offset-1">
                <?php if (get_field('Kontaktuppgifter', 'options')) { ?>
                    <?php the_field('kontaktuppgifter', 'options'); ?>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-md-offset-1">
                <h4><?php the_field('social_media_title', 'options'); ?></h4>

                <?php $social = get_field('social' , 'options'); ?>

                <?php if ($social) : ?>
                    <ul class="social">
                        <?php foreach ( $social as $item ) : ?>
                            <li>
                                <i class="<?php echo $item['icon']; ?>"></i> <a href="<?php echo $item['link']; ?>"><?php echo $item['text']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="row bottom">
            <div class="col-xs-12">
                <p>Copyright &copy; Jakob Roslund, 2016</p>
            </div>
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>