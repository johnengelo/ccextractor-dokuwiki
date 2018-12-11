<?php

	/**
	* @author John Chew
	* @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
    * Based on DokuWiki Default Template and Bootie Template by GerardNico
	*/
	
	if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
	header('X-UA-Compatible: IE=edge,chrome=1');

	$hasSidebar = page_findnearest($conf['sidebar']);
	$showSidebar = $hasSidebar && ($ACT == 'show');

?>

<!DOCTYPE html>
<html lang="<?php echo $conf['lang']?>" class="no-js">

<head>
	
    <meta charset="UTF-8" />
	
    <title><?php tpl_pagetitle()?></title>
    <script>(function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)</script>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="author" content="John Chew">
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
	
	<?php tpl_metaheaders() ?>
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/hover-min.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="<?php echo tpl_getMediaFile(array("conf/userstyle.css")); ?>" rel="stylesheet">
	
</head>

<body role="document">
    
    <?php
        require_once('conf/tpl_template_ccextractor.php');
        include('tpl_header.php')
    ?>
    
    <div class="dokuwiki">
        <?php if ($conf['tagline']): ?>
            <p><?php echo $conf['tagline']; ?></p>
        <?php endif ?>
        
        <?php html_msgarea() ?>
        
        <div class="row">
            
            <?php 
            if ($ACT == 'show' and $showSidebar and page_findnearest($conf['sidebar'])) {
                echo '<div role="main" class="col-md-9"/>';
            }
            else {
                echo '<div role="main" class="col-md-12"/>';
            }
            ?>
            
            <!-- Content: show, edit, etc., -->
            <?php tpl_flush() ?>


            <?php tpl_includeFile('pageheader.html') ?>
            
            <!-- Page Content | Start -->

            <div class="jumbotron" id="maincontent_bg" style="width: 100%; border-radius: 0px;">
                <div class="container">
                    <?php tpl_content($prependTOC = false) ?>
                </div>
            </div>

            <!-- Page Content | End -->
            
            <?php tpl_includeFile('pagefooter.html') ?>
            
            <div class="docInfo"><?php tpl_pageinfo() ?></div>
            <?php tpl_flush() ?>
            
            </div>
            
        </div>
        
        <?php if ($showSidebar and $ACT == 'show'): ?>
            <nav role="complementary" class="col-md-3" style="padding-top: 15px;">
            
                <nav class="bs-docs-sidebar hidden-prints">
                    <?php tpl_flush() ?>
                    <?php //tpl_includeFile('sidebarheader.html') ?>
                    <?php tpl_include_page($conf['sidebar'], 1, 1) ?>
                    <?php //tpl_includeFile('sidebarfooter.html') ?>
                    <a class="back-to-top" href="#top">Back to top </a>
                </nav>
            
            </nav>    
        <?php endif; ?>
        
    </div>
    
    <?php include('tpl_footer.html') ?>
    
    <div class="no"><?php tpl_indexerWebBug() ?></div>
    <div id="screen__mode" class="no"></div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>

</html>