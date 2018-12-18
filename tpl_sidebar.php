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

<aside class="col-md-2 p-0">
    <!-- [ Sidebar ]  -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="sidebar-logo" style="margin-left: auto; margin-right: auto;">
              <?php
              $logoSize = array();
              $logo = tpl_getMediaFile(array(':wiki:logo.png', 'images/logo_large.png', 'images/ccextractor_logotype.png' ), false, $logoSize);
              tpl_link(
                      wl(),
                      '<img src="'.$logo.'" '.$logoSize[1].' alt="" />'
                      );
              ?>
          </li>
          <li>
              <?php tpl_searchform_ccextractor() ?>
          </li>
          <div class="toc-div">
              <h5 class="pl-3" id="toc-title">Table of Contents</h5>
              <nav class="pl-3" id="toc" data-toggle="toc"></nav>
          </div>
        </ul>
      </div>
    </nav>
</aside>
