<?php
/**
 * @author John Chew
 * @license GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * CCExtractor Footer
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) {
    die();
}

?>
<footer id="dokuwiki__footer" class="clearfix" style="padding-bottom: 0rem !important;">
    <br /><br />
    <div class="container text-center text-md-left" id="footer_container">

        <div class="row">

            <div class="col-md-6 mt-md-0 mt-3">

                <h4>
                    <?php
                    // Get logo either out of the template images folder or data/media folder
                    $logoSize = array();
                    $logo = tpl_getMediaFile(array(':wiki:logo.png','images/ccx_logotext_light.png'), false, $logoSize);
                    // Display logo in a link to the home page
                    tpl_link(
                            wl(),
                            '<img src="'.$logo.'" '.$logoSize[1].' alt="" />'
                            );
                    ?>
                </h4>

                <?php if ($conf['tagline']): ?>
                <p class="claim" id="footer_tagline"><?php echo $conf['tagline']; ?></p>
                <?php endif ?>

            </div>

            <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">GENERAL</h5>

            <ul class="list-unstyled">
              <li>
                <?php tpl_link(wl('about'), hsc('About Us'), 'title="About Us" class="footer-item"'); ?>
              </li>
              <li>
                <?php tpl_link(wl('download'), hsc('Download'), 'title="Download" class="footer-item"'); ?>
              </li>
              <li>
                <?php tpl_link(wl('documentation'), hsc('Documentation'), 'title="Documentation" class="footer-item"'); ?>
              </li>
              <li>
                <?php tpl_link(wl('installguide'), hsc('Installation Guide'), 'title="Installation Guide" class="footer-item"'); ?>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">SUPPORT</h5>

            <ul class="list-unstyled">
              <li>
                <?php tpl_link(wl('reporting-issues'), hsc('Reporting Issues'), 'title="Reporting Issues" class="footer-item"'); ?>
              </li>
              <li>
                <?php tpl_link(wl('slack-channel'), hsc('Slack Channel'), 'title="Slack Channel" class="footer-item"'); ?>
              </li>
              <li>
                <?php tpl_link(wl('mailinglist'), hsc('Mailing List'), 'title="Mailing List" class="footer-item"'); ?>
              </li>
              <li>
                <?php tpl_link(wl('github'), hsc('GitHub'), 'title="Mailing List" class="footer-item"'); ?>
              </li>
            </ul>

          </div>

        </div>

        <hr/>

        <div id="license" class="text-center" style="padding-top: 1em;">
        <?php tpl_license(''); ?>
        </div>

    </div>

    <div class="footer-copyright text-center">© 2018 Copyright:
        &ensp;<?php echo strip_tags($conf['title']) ?>
    </div>

    <br />
</footer>
