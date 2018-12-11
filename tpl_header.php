<?php
    /**
    * CCExtractor Template Header
    * @author John Chew
    * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
    */
if (!defined('DOKU_INC')) die();
?>

<?php tpl_includeFile('header.html') ?>
<link href="conf/userstyle.css" rel="stylesheet">
<?php //echo $lang['skip_to_content']; ?>

<nav id="navbar" class="navbar navbar-expand-md fixed-top" style="display: inline">
    <div class="container">
        <div class="navbar-nav">
            <li class="navbar-item">
                <?php
                // Get logo either out of the template images folder or data/media folder
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', 'images/ccextractor_logotype.png' ,'images/logo.png', /*':logo.png', 'images/logo.png'*/), false, $logoSize);
                // Display logo in a link to the home page
                tpl_link(
                        wl(),
                        '<img src="'.$logo.'" '.$logoSize[2].' alt="" />'
                        );
                ?>
            </li>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left mr-auto" style="padding-left: 1rem;">
                <li class="nav-item mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                    <?php tpl_link(wl('home'), hsc('HOME'), 'title="Home" class="nav-link"'); ?>
                </li>
                <li class="nav-item mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                    <?php tpl_link(wl('about'), hsc("ABOUT US"), 'title="About" class="nav-link"'); ?>
                </li>
                <li class="nav-item mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                    <?php tpl_link(wl('download'), hsc("DOWNLOAD"), 'title="Download" class="nav-link"'); ?>
                </li>
                <li class="nav-item dropdown mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownUserTool"
                       role="button" aria-haspopup="true" aria-expanded="false">
                        <?php print 'DOCUMENTATION' ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-dark navbar-right ml-auto">
                <?php tpl_searchform_ccextractor() ?>
                <div style="padding-left: 1em; display: inline;">
                <?php
                if (!empty($_SERVER['REMOTE_USER'])) { ?>

                    <li class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownUserTool"
                           role="button" aria-haspopup="true" aria-expanded="false"
                           title="<?php $lang['loggedinas'] . $_SERVER['REMOTE_USER'] ?>">
                            <?php print 'User ' . ucfirst(editorinfo($_SERVER['REMOTE_USER'], true)); ?>
                        </a>

                        <ul id="navBarUserTool" class="dropdown-menu" aria-labelledby="navbarDropdownUserTool">
                            <?php
                            echo (new \dokuwiki\Menu\UserMenu())->getListItems('action dropdown-item nav-item ', false);
                            ?>
                        </ul>
                    </li>

                    <?php
                        } else {
                        echo (new \dokuwiki\Menu\UserMenu())->getListItems('action nav-link ', false);
                        }
                    ?>
                </div>
            </ul>
        </div>

        <?php
        if ($conf['youarehere']) {
            tpl_youarehere();
        }
        ?>

    </div>
</nav>