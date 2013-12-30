<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Options Framework Theme
 */
?>
                </div><!-- div[role="main"] container -->
            </div><!-- div[role="main"] wrapper -->
        </div><!-- div[role="main"] -->
        <footer>
            <div class="wrapper">
                <div class="container">
                    
                </div><!-- footer container -->
            </div><!-- footer wrapper -->
        </footer><!-- footer -->

	</div><!-- #page -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
