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
    echo '<input type="hidden" name="do" value="search" />';
    echo '<label class="sr-only" for="search">Search Term</label>';
    echo '<div class="input-group">';
    echo '<input class="edit form-control empty" id="search_bar" aria-describedby="search_button_addon" type="text" ';
    if ($ACT == 'search') {
        print 'value="'.htmlspecialchars($QUERY).'" ';
    }
    print 'placeholder="&ensp;'.$lang['btn_search'].'" ';
    if (!$autocomplete) {
        print 'autocomplete="off" ';
    }
    echo 'id="qsearch__in" accesskey="f" name="id" class="edit form-control" title="[F]" />';
    echo '<div class="input-group-append">'.'<button class="btn" id="search_button_addon">'.'<i class="fas fa-search"></i>'.'</button>'.'</div>';
    echo '</div>';
    //print '<button class="btn" id="search_button" type="submit" title="'.$lang['btn_search'].'">'.'<i class="fas fa-search"></i>'.'</button>';
                if ($ajax) {
                    print '<div id="qsearch__out" class="ajax_qsearch JSpopup"></div>';
                }
    echo '</form>';

    return true;
}

/**
 *
 * Forked from DokuWiki inc/template.php
 *
 * Hierarchical breadcrumbs
 *
 * This code was suggested as replacement for the usual breadcrumbs.
 * It only makes sense with a deep site structure.
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author Nigel McNie <oracle.shinoda@gmail.com>
 * @author Sean Coates <sean@caedmon.net>
 * @author <fredrik@averpil.com>
 * @todo   May behave strangely in RTL languages
 *
 * @param string $sep Separator between entries
 * @param bool   $return return or print
 * @return bool|string
 */
function tpl_youarehere_ccx($sep = null, $return = false) {
    global $conf;
    global $ID;
    global $lang;

    // check if enabled
    if(!$conf['youarehere']) return false;

    //set default
    if(is_null($sep)) $sep = ' &ensp; <i class="fas fa-chevron-circle-right"></i> &ensp; ';

    $out = '';

    $parts = explode(':', $ID);
    $count = count($parts);

    $out .= '<span class="bchead">'.'<i class="fas fa-map-marker-alt">'.'</i>'.'&ensp;Current Page: &emsp;'.' </span>';

    // always print the startpage
    $out .= '<span class="home">' . tpl_pagelink(':'.$conf['start'], null, true) . '</span>';

    // print intermediate namespace links
    $part = '';
    for($i = 0; $i < $count - 1; $i++) {
        $part .= $parts[$i].':';
        $page = $part;
        if($page == $conf['start']) continue; // Skip startpage

        // output
        $out .= $sep . tpl_pagelink($page, null, true);
    }

    // print current page, skipping start page, skipping for namespace index
    resolve_pageid('', $page, $exists);
    if (isset($page) && $page == $part.$parts[$i]) {
        if($return) return $out;
        print $out;
        return true;
    }
    $page = $part.$parts[$i];
    if($page == $conf['start']) {
        if($return) return $out;
        print $out;
        return true;
    }
    $out .= $sep;
    $out .= tpl_pagelink($page, null, true);
    if($return) return $out;
    print $out;
    return $out ? true : false;
}
