            <?php wp_footer(); ?>

            <a href="#intro" class="scroll-top">
                <i class="fa fa-arrow-up"></i>
            </a>

            <?php the_field( 'body_scripts_end', 'options' ); ?>

            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/<?php echo get_locale() ?>/sdk.js#xfbml=1&version=v2.9&appId=303236470134282";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

    </body>
</html>