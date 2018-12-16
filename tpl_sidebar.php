<?php
/**
 * @author John Chew
 * @license GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * CCExtractor Sidebar
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) {
    die();
}
?>

<aside class="col-12 col-md-2 p-0" id="leftsidebar">
    <!-- [ Sidebar ]  -->
    <nav class="navbar navbar-expand navbar-dark flex-md-column flex-row align-items-start py-2" id="sidebar">
        <div id="sidebar-collapse">
            <ul class="flex-md-column flex-row navbar-nav" id="sidebar-content">

                <li class="navbar-item" id="navbar_brand_sidebar">
                    <?php
                    // Get logo either out of the template images folder or data/media folder
                    $logoSize = array();
                    $logo = tpl_getMediaFile(array(':wiki:logo.png', 'images/logo_large.png', 'images/ccextractor_logotype.png' ), false, $logoSize);
                    // Display logo in a link to the home page
                    tpl_link(
                            wl(),
                            '<img src="'.$logo.'" alt="logo" />'
                            );
                    ?>
                </li>

                <div class="search">
                    <!-- Search Form | Custom Function -->
                    <?php tpl_searchform_ccextractor() ?>
                </div>
                <!-- To Do: TOC -->
                <div class="toc">

                </div>
                <?php tpl_toc(); ?>

            </ul>
        </div>
    </nav>
</aside>
