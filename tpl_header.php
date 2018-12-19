<?php

//Must be run within DokuWiki
if (!defined('DOKU_INC')) {
    die();
}

?>

<? tpl_includeFile('header.html'); ?>



<nav class="navbar navbar-expand-lg navbar-dark" id="header-nav">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggle" aria-controls="navbar-toggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-toggle">
        <div class="navbar-nav" id="navbar_logo">
            <li class="navbar-item">
                <?php
                // Get logo either out of the template images folder or data/media folder
                $logoSize = array();
                $logo = tpl_getMediaFile(array('images/ccx_logotext_light.png' , 'images/logo.png', 'images/ccextractor_logotype.png' ), false, $logoSize);
                // Display logo in a link to the home page
                tpl_link(
                        wl(),
                        '<img src="'.$logo.'" '.$logoSize[1].' alt="" />'
                        );
                ?>
            </li>
        </div>
        <ul class="navbar-nav mr-auto pl-3 mt-2 mt-lg-0">
            <li class="pr-4">
                <?php tpl_link(wl(), hsc('HOME'), 'title="Home" class="sidebar-item"'); ?>
            </li>
            <li class="pr-4">
                <?php tpl_link(wl('about'), hsc('ABOUT'), 'title="About" class="sidebar-item"'); ?>
            </li>
            <li class="pr-4">
                <?php tpl_link(wl('download'), hsc('DOWNLOAD'), 'title="Download" class="sidebar-item"'); ?>
            </li>
            <li class="pr-4">
                <?php tpl_link(wl('documentation'), hsc('DOCUMENTATION'), 'title="Documentation" class="sidebar-item"'); ?>
            </li>
            <li class="pr-4">
                <?php tpl_link(wl('programs'), hsc('PROGRAMS'), 'title="Programs" class="sidebar-item"'); ?>
            </li>
        </ul>
        <div class="dropdown-divs mr-5">
            <ul class="nav navbar-nav navbar-dark">
                <div class="tools_dropdown pr-4" style="display: inline-flex">
                    <?php if (!empty($_SERVER['REMOTE_USER'])) { ?>
                    <li class="nav-item dropdown pr-4">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarusertools" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php print '<i class="fas fa-user-circle" style="font-size: 2rem;"></i>'/* . ucfirst(editorinfo($_SERVER['REMOTE_USER'], true)); */?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarusertools">
                            <h5 align="center" style="color: #F36F38; padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.5rem;">Logged in as:</h5>
                            <i class="far fa-user-circle" style="color: #F36F38; font-size: 2.5rem; display: inline-block; width: 100%; text-align: center; padding-top: 1rem;"></i>
                            <p align="left" class="logged-in-text" style="display: inline-block; width: 100%; text-align: center; padding-top: 1.25rem"><strong><?php echo $_SERVER['REMOTE_USER'] ?></strong></p>
                            <hr>
                            <?php
                                echo (new \dokuwiki\Menu\UserMenu())->getListItems('action dropdown-item nav-item ', false);
                            ?>
                        </ul>
                    </li>

                    <?php } else { ?>
                        <a href="#" class="nav-link dropdown-toggle pr-4" data-toggle="dropdown" id="navbarlogin" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php print '<i class="fas fa-sign-in-alt" style="font-size: 2rem;"></i>'/* . ucfirst(editorinfo($_SERVER['REMOTE_USER'], true)); */?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarlogin">
                            <?php
                                echo (new \dokuwiki\Menu\UserMenu())->getListItems('action dropdown-item nav-item', false);
                            ?>
                        </ul>
                    <?php } ?>

                    <!-- Page Tools -->

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarpagetools" role="button" aria-haspopup="true" aria-expanded="false" title="<?php echo $lang['loggedinas'].$_SERVER['REMOTE_USER']?>">
                            <span><i class="fas fa-sliders-h" style="font-size: 2rem;"></i></span>
                        </a>

                        <ul id="pagetools_navbar" class="dropdown-menu"  aria-labelledby="navbarpagetools">
                            <?php echo (new \dokuwiki\Menu\PageMenu())->getListItems('action dropdown-item nav-item ', false); ?>
                            <!-- Site Tools -->
                            <?php echo(new \dokuwiki\Menu\SiteMenu())->getListItems('action dropdown-item nav-item ', false); ?>
                        </ul>
                    </li>
                </div>
                <li class="nav-item">
                    <a href="https://github.com/CCExtractor/ccextractor/" class="nav-link" role="button">
                        <span><i class="fab fa-github" style="font-size: 2rem;"></i></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
