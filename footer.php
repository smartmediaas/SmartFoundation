                </section> <!-- end #main -->
                
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
        
        <div id="site-generator" class="row">
            <div class="large-12 columns">
                Nettløsningen er levert av <a href="http://smartmedia.no/" title="Trykk her for å gå til nettsiden" target="_blank">Smart Media AS</a>
                <!-- <span class="sep"> | </span>
        Design av <a href="http://www.wow-medialab.com" title="Trykk her for å gå til nettsiden" target="_blank">WOW medialab</a> -->
            </div>
        </div>
        
        <?php if(is_active_sidebar('sidebar-1')): ?>
        <div id="panel-left" data-role="panel"  data-position="left" data-display="overlay">		
            <?php dynamic_sidebar('panel-left'); ?>
        </div>
        <?php endif; ?>
        
        <?php if(is_active_sidebar('panel-right')): ?>
        <div id="panel-right" data-role="panel"  data-position="right" data-display="reveal">			
            <?php dynamic_sidebar('panel-right'); ?>
        </div>
        <?php endif; ?>
        
    </div><!-- end #wrapper -->
</div><!-- end #jmwrapper -->
<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($){
        $(document).foundation();
        
        $( "#panel-left" ).trigger( "updatelayout" );
        $( "#panel-right" ).trigger( "updatelayout" );
            
        $( document ).on( "swipeleft swiperight", "#jmwrapper", function( e ) {
            // We check if there is no open panel on the page because otherwise
            // a swipe to close the left panel would also open the right panel (and v.v.).
            // We do this by checking the data that the framework stores on the page element (panel: open).
            if ( $.mobile.activePage.jqmData( "panel" ) !== "open" ) {
                if ( e.type === "swipeleft"  ) {
                    $( "#panel-right" ).panel( "open" );
                } else if ( e.type === "swiperight" ) {
                    $( "#panel-left" ).panel( "open" );
                }
            }
        });
        $( document ).on( "mobileinit", function() {
            $.mobile.panel.prototype.options.initSelector = "#panel-right";
        });
    });
</script>

</body>
</html>