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
<html lang="<?php echo $conf['lang']?>">

    <head>

        <meta charset="UTF-8" />

        <!-- [ Page Title ] -->
        <title><?php echo strip_tags($conf['title']) ?> : <?php tpl_pagetitle(); ?></title>
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
        <link rel="stylesheet" href="https://cdn.rawgit.com/afeld/bootstrap-toc/v1.0.0/dist/bootstrap-toc.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- CCExtractor DokuWiki CSS Stylesheet -->
        <link href="<?php echo tpl_getMediaFile(array("css/mainstyle.less")); ?>" rel="stylesheet/less" type="text/css">
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>

    </head>

    <body role="document" data-spy="scroll" data-target="#toc">

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
                    <div class="col bg-faded py-3">
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
                            <div class="container" id="main-content">
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

                    </div>
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

        <!-- jQuery 3.3.1 CDN -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.js 1.14.3 CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Bootstrap.js 4.1.3 CDN -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Bootstrap Scrollspy TOC -->
        <script src="https://cdn.rawgit.com/afeld/bootstrap-toc/v1.0.0/dist/bootstrap-toc.min.js"></script>
</body>

</html>
