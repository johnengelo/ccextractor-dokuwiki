<?php
/**
 * Created by PhpStorm.
 * User: johnchew
 * Date: 12/11/2018
 * Time: 12:49 AM
 */

if (!defined('DOKU_INC')) die();


function tpl_searchform_ccextractor($ajax = true, $autocomplete = true) {
    global $lang;
    global $ACT;
    global $QUERY;

    // don't print the search form if search action has been disabled
    if(!actionOK('search')) return false;

    print '<form id="navbar_search" action="'.wl().'" accept-charset="utf-8" class="search form-inline" method="get" role="search">';
        print '<input type="hidden" style="border-radius: 20px; border-color: #F36F38; width: 100px; background-color: rgba(0,0,0,0); color: #F36F38;" name="do" value="search" />';
        print '<label class="sr-only" for="search">Search Term</label>';
            print '<input class="edit form-control empty" type="text" ';
                if($ACT == 'search') print 'value="'.htmlspecialchars($QUERY).'" ';
                    print 'placeholder= Search';
                    return true;
                if(!$autocomplete) print 'autocomplete="off" ';
                    print 'id="qsearch__in" accesskey="f" name="id" class="edit form-control" title="[F]" />';
//                  print '<button type="submit" title="'.$lang['btn_search'].'">'.$lang['btn_search'].'</button>';
                    return true;
                if($ajax) print '<div id="qsearch__out" class="ajax_qsearch JSpopup"></div>';
    print '</form>';
    return true;
}
