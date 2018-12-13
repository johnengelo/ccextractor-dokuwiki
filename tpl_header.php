<?php
    /**
    * CCExtractor Template Header
    * @author John Chew
    * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
    */
    
if (!defined('DOKU_INC')) {
    die();
}
?>

<?php tpl_includeFile('header.html') ?>
<link href="css/userstyle.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<?php //echo $lang['skip_to_content']; ?>

<nav id="navbar" class="navbar navbar-expand-lg fixed-top" style="display: inline">
    <div class="container">
        <div class="navbar-nav">
            <li class="navbar-item" id="nav_logo">
                <?php
                // Get logo either out of the template images folder or data/media folder
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', 'images/ccx_logo&text.png' , 'images/logo.png', 'images/ccextractor_logotype.png' ), false, $logoSize);
                // Display logo in a link to the home page
                tpl_link(
                        wl(),
                        '<img src="'.$logo.'" '.$logoSize[1].' alt="" />'
                        );
                ?>
            </li>
        </div>

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
                    
                    <!-- Search Form | Custom Function -->
                    <?php tpl_searchform_ccextractor() ?>
                    
                    
                    <div class="tools_dropdown">
                            <?php
                            if (!empty($_SERVER['REMOTE_USER'])) { ?>
                                
                                <li class="nav-item dropdown">

                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarusertools"
                                       role="button" aria-haspopup="true" aria-expanded="false"
                                       title="<?php $lang['loggedinas'] . $_SERVER['REMOTE_USER'] ?>">
                                        <?php print '<i class="fas fa-user-circle" style="font-size: 2rem;"></i>'/* . ucfirst(editorinfo($_SERVER['REMOTE_USER'], true)); */?>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="navbarusertools">
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
                        
                            <?php
                            
                            // Page Tools
                            echo '<li class="nav-item dropdown">';

                            echo '<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarpagetools" role="button" aria-haspopup="true" aria-expanded="false" title="'.$lang['loggedinas'].$_SERVER['REMOTE_USER'].'">';
                            echo '<span class="dropdown_links"><i class="fas fa-wrench" style="font-size: 1.75rem;"></i></span>';
                            echo '</a>';

                            echo '<ul id="pagetools_navbar" class="dropdown-menu"  aria-labelledby="navbarpagetools">';

                            echo(new \dokuwiki\Menu\PageMenu())->getListItems('action dropdown-item nav-item ', false);

                            // Site Tools
                            echo(new \dokuwiki\Menu\SiteMenu())->getListItems('action dropdown-item nav-item ', false);

                            echo '</ul>';
                            echo '</li>';

                            
                            ?>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>