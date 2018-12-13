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
	
    <title><?php tpl_pagetitle() ?> :: <?php echo strip_tags($conf['title']) ?></title>
    <script>(function (H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)</script>
    <meta name="viewport" content="width=device-width"/>
    <meta name="author" content="John Chew">
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
	
	<?php tpl_metaheaders() ?>
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/hover-min.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <link href="<?php echo tpl_getMediaFile(array("css/userstyle.css")); ?>" rel="stylesheet">
	
</head>

<body>
    
    <?php
        require_once('conf/tpl_template_ccextractor.php');
        include('tpl_header.php');
    ?>
    
    <div class="dokuwiki">
        
        <?php html_msgarea() ?>
        
        <div class="main">
            
            <!-- Breadcrumbs | Custom Breadcrumbs -->
            <?php
            if ($conf['youarehere']) {
                tpl_youarehere_bootstrap();
            }
            ?>
            
            <!-- Content: show, edit, etc., -->
            <?php tpl_flush() ?>
            <?php tpl_includeFile('pageheader.html') ?>
            
            <!-- Page Content | Start -->

            <div class="jumbotron" id="maincontent_bg" style="border-radius: 0px;">
                <div class="container">
                    <?php tpl_content($prependTOC = false) ?>
                </div>
            </div>

            <!-- Page Content | End -->
            
            <?php tpl_includeFile('pagefooter.html') ?>
            
            <?php tpl_pageinfo() ?>
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
    
    <?php 
        include('tpl_footer.php');
        //include('tpl_footer.html')
    ?>
    
    <div class="no"><?php tpl_indexerWebBug() ?></div>
    <div id="screen__mode" class="no"></div>
    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
</body>

</html>