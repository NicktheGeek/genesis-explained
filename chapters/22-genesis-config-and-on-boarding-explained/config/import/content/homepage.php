<?php
/**
 * Genesis Explained
 *
 * Homepage content optionally installed after theme activation.
 *
 * @package genesis-explained
 * @author  Nick Croft
 * @license GPL-2.0-or-later
 */

$genesis_explained_header_image_url = get_stylesheet_directory_uri() . '/config/import/images/windows.jpg';

$genesis_explained_homepage_content = <<<HTML
<!-- wp:image {"id":1935,"align":"full"} -->
<figure class="wp-block-image alignfull"><img src="$genesis_explained_header_image_url" alt="" class="wp-image-1935"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>This is a simple paragraph block, but your imported content can contain much more exciting content than this.</p>
<!-- /wp:paragraph -->
HTML;

return $genesis_explained_homepage_contents;
