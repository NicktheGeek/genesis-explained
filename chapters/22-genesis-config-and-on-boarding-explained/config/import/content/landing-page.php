<?php
/**
 * Genesis Explained
 *
 * Landing page content optionally installed after theme activation.
 *
 * Alternate version uses output buffering with i18n.
 *
 * @package genesis-explained
 * @author  Nick Croft
 * @license GPL-2.0-or-later
 */

$genesis_explained_header_image_url = get_stylesheet_directory_uri() . '/config/import/images/windows.jpg';

ob_start();
?>
<!-- wp:image {"id":1935,"align":"full"} -->
<figure class="wp-block-image alignfull"><img src="<?php echo esc_url( $genesis_explained_header_image_url ); ?>" alt="" class="wp-image-1935"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'This is a simple paragraph block, but your imported content can contain much more exciting content than this.', 'genesis-explained' ); ?></p>
<!-- /wp:paragraph -->

<?php
return ob_get_clean();
