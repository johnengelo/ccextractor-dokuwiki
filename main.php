<?php
/**
 * =============================
 *
 * CCExtractor DokuWiki Template
 * @author John Chew
 * @link https://github.com/johnengelo/ccextractor-dokuwiki
 * @license CC BY-SA 3.0
 *
 * =============================
 */


/* Must be run from within DokuWiki */
if (!defined('DOKU_INC')) {
    die();
}

header('X-UA-Compatible: IE=edge,chrome=1');

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT == 'show');

?>

<!DOCTYPE html>
<html lang="<?php echo $conf['lang']?>" class="no-js">

    <head>

        <meta charset="UTF-8" />

        <!-- [ Page Title ] -->
        <title><?php tpl_pagetitle(); ?> :: <?php echo strip_tags($conf['title']) ?></title>
        <script>(function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)</script>
        <meta name="viewport" content="width=device-width"/>
        <?php echo tpl_favicon(array('favicon', 'mobile')); ?>

        <!-- Favicon [forces an update to show the icon] -->
        <link rel="shortcut icon" href="images/favicon.ico?v=2" type="image/x-icon">

        <?php tpl_includeFile('meta.html') ?>

        <?php tpl_metaheaders() ?>

        <!-- [ Must be run after tpl_metaheaders() due to difference in jQuery versions ] -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- CCExtractor DokuWiki CSS Stylesheet -->
        <link href="<?php echo tpl_getMediaFile(array("css/mainstyle.less")); ?>" rel="stylesheet/less" type="text/css">

        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>

    </head>

    <body role="document">

        <?php
            // Functions Library
            require_once('conf/tpl_template_ccextractor.php');
            // Header File
            include('tpl_header.php');
        ?>

        <div class="main">

            <!-- [ Content: show, edit, etc., ] -->
            <?php tpl_flush() ?>
            <?php tpl_includeFile('pageheader.html') ?>

            <!-- [ Page Content | Start ] -->
            <div class="container-fluid">
                <div class="row">
                    <?php include('tpl_sidebar.php'); ?>
                    <!-- [ Main Content (Right-side) ] -->
                    <main class="col bg-faded py-3">
                        <!-- [ Sidebar Toggler ] -->
                        <button class="navbar-toggler ml-auto;" id="sidebar_button" type="button" data-toggle="collapse" data-target="#leftsidebar" aria-controls="leftsidebar" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        <!-- [ Breadcrumbs | Custom Breadcrumbs ] -->
                        <div class="container-fluid breadcrumbs colored-text main-bg mt-2 mb-2">
                            <div class="container-fluid">
                                <?php
                                    tpl_youarehere_ccx();
                                ?>
                            </div>
                        </div>

                        <!-- [ Page Content ] -->

                        <div class="jumbotron" id="maincontent_bg" style="border-radius: 0.25em;">
                            <div class="container">
                                <!-- [ Message Area ] -->
                                <?php html_msgarea() ?>
                                <!-- [ Main Page Content - Start ] -->

                                <?php tpl_content($prependTOC = false) ?>
                                <!-- [ Main Content - End] -->
                            </div>
                        </div>

                        <div class="container-fluid bg-faded ml-auto main-bg pt-2 pb-1" style="border-radius: 0.25em;">
                            <p class="colored-text" style="margin-top: 0.75rem;"><?php tpl_pageinfo() ?></p>
                        </div>

                    </main>
                </div>
            </div>

            <!-- [ Page Content | End ] -->

            <?php //tpl_includeFile('pagefooter.html') ?>
            <?php tpl_flush() ?>

        </div>

        <div class="no" style="display: none;">
            <?php tpl_indexerWebBug() ?>
        </div>
        <div id="screen__mode" class="no"></div>

        <!--<hr class="a11y"/> -->

        <!--
        <div id="dokuwiki__pagetools">
                <h3 class="a11y"><?php //echo $lang['page_tools']; ?></h3>
                <div class="tools">
                    <ul>
                        <?php //echo (new \dokuwiki\Menu\PageMenu())->getListItems(); ?>
                    </ul>
                </div>
            </div>
        </div>

        <a href="#dokuwiki__top" class="back-to-top hidden-print btn btn-default btn-sm" title="<?php echo $lang['skip_to_content'] ?>" accesskey="t"><i class="fa fa-chevron-up"></i></a>
        -->
        <?php
            include('tpl_footer.php');
        ?>

        <!-- [ jQuery CDN - Slim version (=without AJAX) ] -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- [ Popper.JS ] -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- [ Bootstrap JS ] -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
