<?php

//Must be run within DokuWiki
if (!defined('DOKU_INC')) {
    die();
}

?>

<? tpl_includeFile('header.html'); ?>

<nav id="navbar" class="navbar navbar-expand-lg sticky">
    <div class="navbar-nav" id="navbar_logo">
        <li class="navbar-item">
            <?php
            // Get logo either out of the template images folder or data/media folder
            $logoSize = array();
            $logo = tpl_getMediaFile(array(':wiki:logo.png', 'images/ccx_logotext_light.png' , 'images/logo.png', 'images/ccextractor_logotype.png' ), false, $logoSize);
            // Display logo in a link to the home page
            tpl_link(
                    wl(),
                    '<img src="'.$logo.'" '.$logoSize[1].' alt="" />'
                    );
            ?>
        </li>
    </div>
    <div class="container" id="header-container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_contents" aria-controls="navbar_contents" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars" style="color: #F36F38;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar_contents">
            <div class="wrapper">
                <ul class="nav navbar-nav navbar-left mr-auto" style="padding-left: 1rem;">
                    <li class="nav-item mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                        <?php tpl_link(wl('home'), hsc('HOME'), 'title="Home | CCExtractor" class="nav-link"'); ?>
                    </li>
                    <li class="nav-item mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                        <?php tpl_link(wl('about'), hsc("ABOUT US"), 'title="About | CCExtractor" class="nav-link"'); ?>
                    </li>
                    <li class="nav-item mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                        <?php tpl_link(wl('download'), hsc("DOWNLOAD"), 'title="Download | CCExtractor" class="nav-link"'); ?>
                    </li>
                    <li class="nav-item mr-auto hvr_underline-from-left" style="padding-left: 5px;">
                        <?php tpl_link(wl('documentation'), hsc("DOCUMENTATION"), 'title="Documentation | CCExtractor" class="nav-link"'); ?>
                    </li>
                </ul>
            </div>

            <div>
                <ul class="nav navbar-nav navbar-dark">

                    <div class="tools_dropdown">
                        <?php if (!empty($_SERVER['REMOTE_USER'])) { ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarusertools" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php print '<i class="fas fa-user-circle" style="font-size: 2rem;"></i>'/* . ucfirst(editorinfo($_SERVER['REMOTE_USER'], true)); */?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarusertools">
                                <p align="left" style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.5rem; color: #EF4648;"><?php echo 'Logged in as: ' . '<strong>' . $_SERVER['REMOTE_USER'] . '</strong>' ?></p>
                                <hr>
                                <?php
                                    echo (new \dokuwiki\Menu\UserMenu())->getListItems('action dropdown-item nav-item ', false);
                                ?>
                            </ul>
                        </li>

                        <?php } else { ?>
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarlogin" role="button" aria-haspopup="false" aria-expanded="false">
                                <?php print '<i class="fas fa-sign-in-alt" style="font-size: 2rem;"></i>'/* . ucfirst(editorinfo($_SERVER['REMOTE_USER'], true)); */?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarlogin">
                                <?php
                                    echo (new \dokuwiki\Menu\UserMenu())->getListItems('action dropdown-item nav-link ', false);
                                ?>
                            </ul>
                        <?php } ?>

                        <!-- Page Tools -->

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarpagetools" role="button" aria-haspopup="true" aria-expanded="false" title="<?php echo $lang['loggedinas'].$_SERVER['REMOTE_USER']?>">
                                <span class="dropdown_links pull-left"><i class="fas fa-sliders-h" style="font-size: 2rem;"></i></span>
                            </a>

                            <ul id="pagetools_navbar" class="dropdown-menu"  aria-labelledby="navbarpagetools">
                                <?php echo (new \dokuwiki\Menu\PageMenu())->getListItems('action dropdown-item nav-item ', false); ?>
                                <!-- Site Tools -->
                                <?php echo(new \dokuwiki\Menu\SiteMenu())->getListItems('action dropdown-item nav-item ', false); ?>
                            </ul>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>
