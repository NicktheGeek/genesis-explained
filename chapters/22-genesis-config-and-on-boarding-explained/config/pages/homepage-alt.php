<?php
/**
 * Genesis Explained
 *
 * Homepage content optionally installed after theme activation.
 *
 * Alternate version uses output buffering with i18n.
 *
 * @package genesis-explained
 * @author  Nick Croft
 * @license GPL-2.0-or-later
 */

ob_start();
?>

<!-- wp:paragraph -->
<p><?php esc_html_e( 'This is a simple paragraph block, but your imported content can contain much more exciting content than this.', 'genesis-explained' ); ?></p>
<!-- /wp:paragraph -->

<?php
return ob_get_clean();
