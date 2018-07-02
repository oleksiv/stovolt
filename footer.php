        </div><!--End of WRAPPER_CENTER-->
        <div class="footer">
            <div class="footer_center">
                <div class="row">
                    <div class="col-md-3"><?php dynamic_sidebar('footer_content_1'); ?></div>
                    <div class="col-md-3"><?php dynamic_sidebar('footer_content_2'); ?></div>
                    <div class="col-md-3"><?php dynamic_sidebar('footer_content_3'); ?></div>
                    <div class="col-md-3"><?php dynamic_sidebar('footer_content_4'); ?></div>
                </div>
            </div>
        </div>


        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter28406681 = new Ya.Metrika({id:28406681,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true});
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="//mc.yandex.ru/watch/28406681" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-59182392-1', 'auto');
            ga('send', 'pageview');

        </script>
        <?php wp_footer(); ?>

    </body>
</html>

       <!-- <?php /* echo get_num_queries(); */?> queries in <?php /* timer_stop(1); */?> seconds.-->