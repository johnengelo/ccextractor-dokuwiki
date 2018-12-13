<?php
/**
 * Created by PhpStorm.
 * User: johnchew
 * Date: 12/11/2018
 * Time: 12:49 AM
 */

if (!defined('DOKU_INC')) {
    die();
}

function tpl_searchform_ccextractor($ajax = true, $autocomplete = true)
{
    global $lang;
    global $ACT;
    global $QUERY;

    // Don't print the search form if search action has been disabled
    if (!actionOK('search')) {
        return false;
    }

    echo '<form id="navbar_search" action="'.wl().'" accept-charset="utf-8" class="p-3 search form-inline" method="get" role="search">';
    echo '<input type="hidden" style="margin-left: 0px; border-radius: 20px; border-color: #F36F38; width: 100px; background-color: rgba(0,0,0,0); color: #F36F38;" name="do" value="search" />';
    echo '<label class="sr-only" for="search">Search Term</label>';
    echo '<input class="edit form-control empty" type="text" ';
    if ($ACT == 'search') {
        print 'value="'.htmlspecialchars($QUERY).'" ';
    }
    print 'placeholder="&ensp;'.$lang['btn_search'].'" ';
    if (!$autocomplete) {
        print 'autocomplete="off" ';
    }
    echo 'id="qsearch__in" accesskey="f" name="id" class="edit form-control" title="[F]" />';
//  print '<button type="submit" title="'.$lang['btn_search'].'">'.$lang['btn_search'].'</button>';
                if ($ajax) {
                    print '<div id="qsearch__out" class="ajax_qsearch JSpopup"></div>';
                }
    echo '</form>';

    return true;
}

/**
 * Hierarchical breadcrumbs
 *
 * This will return the Hierarchical breadcrumbs.
 *
 * Config:
 *    - $conf['youarehere'] must be true
 *    - add $lang['youarehere'] if $printPrefix is true
 *
 * @param bool $printPrefix print or not the $lang['youarehere']
 * @return string
 */

function tpl_youarehere_ccx($printPrefix = false)
{
    global $conf;
    global $lang;

    // check if enabled
    if (!$conf['youarehere']) {
        return;
    }

    // print intermediate namespace links
    $htmlOutput = '<ol class="breadcrumb">'.PHP_EOL;

    // Print the home page
    $htmlOutput .= '<li>'.PHP_EOL;
    if ($printPrefix) {
        $htmlOutput .= $lang['youarehere'].' ';
    }
    $page = $conf['start'];
    $htmlOutput .= tpl_link(wl($page), '<span class="fas fa-home" aria-hidden="true"></span>', 'title="'.tpl_pagetitle($page, true).'"', $return = true);
    $htmlOutput .= '</li>'.PHP_EOL;

    // Print the parts if there is more than one
    global $ID;
    $idParts = explode(':', $ID);
    if (count($idParts) > 1) {

        // Print the parts without the last one ($count -1)
        $page = '';
        for ($i = 0; $i < count($idParts) - 1; ++$i) {
            $page .= $idParts[$i].':';

            // Skip home page of the namespace
            // if ($page == $conf['start']) continue;

            // The last part is the active one
            // if ($i == $count) {
            //      $htmlOutput .= '<li class="active">';
            // } else {
            //      $htmlOutput .= '<li>';
            // }

            $htmlOutput .= '<li>';
            // html_wikilink because the page has the form pagename: and not pagename:pagename
            $htmlOutput .= html_wikilink($page);
            $htmlOutput .= '</li>'.PHP_EOL;
        }
    }

    // Skipping Wiki Global Root Home Page
    //    resolve_pageid('', $page, $exists);
    //    if(isset($page) && $page == $idPart.$idParts[$i]) {
    //        echo '</ol>'.PHP_EOL;
    //        return true;
    //    }
    //    // skipping for namespace index
    //    $page = $idPart.$idParts[$i];
    //    if($page == $conf['start']) {
    //        echo '</ol>'.PHP_EOL;
    //        return true;
    //    }

    // print current page
    //    print '<li>';
    //    tpl_link(wl($page), tpl_pagetitle($page,true), 'title="' . $page . '"');
    $htmlOutput .= '</li>'.PHP_EOL;
    // close the breadcrumb
    $htmlOutput .= '</ol>'.PHP_EOL;

    return $htmlOutput;
}
