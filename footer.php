            </div> <!-- end #main -->
            
            <footer id="site-footer" class="row" role="contentinfo">
                <hr />
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="large-4 columns">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="large-4 columns">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="large-4 columns">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
                <?php endif; ?>
            </footer>
        
        </div><!-- end #inner-page -->
    </div><!-- end #page -->

     <?php if ( is_active_sidebar( 'panel-left' ) ) : ?>
        <div id="panel" class="left-panel">
            <div id="panel-inner" class="large-12 columns">
                <aside id="close-panel-widget" class="widget">
                    <a href="#"><?php _e('Close panel', 'smart_foundation'); ?><i  class="foundicon-remove"></i></a>
                </aside>
                <?php dynamic_sidebar( 'panel-left' ); ?>
            </div>
        </div>
        <div class="closing-panel"><a href="#"></a></div>
    <?php endif; ?>
    
    <div id="site-generator" class="row">
        <div class="large-12 columns">
            Nettløsningen er levert av <a href="http://smartmedia.no/" title="Trykk her for å gå til nettsiden" target="_blank">Smart Media AS</a>
            <!-- <span class="sep"> | </span>
    Design av <a href="http://www.wow-medialab.com" title="Trykk her for å gå til nettsiden" target="_blank">WOW medialab</a> -->
        </div>
    </div>

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($){
        $(document).foundation();
        var navigation = responsiveNav("#nav", {customToggle: "#menu-toggle"});
    });
</script>

</body>
</html>