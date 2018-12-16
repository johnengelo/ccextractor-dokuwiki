<?php

namespace dokuccx\Menu;

/**
 * Class PageMenu
 *
 * Actions manipulating the current page. Shown as a floating menu in the dokuwiki template
 */
class PageMenu extends AbstractMenu {

    protected $view = 'page';

    protected $types = array(
        '<i class="fas fa-pencil"></i>&ensp;Edit',
        '<i class="fas fa-redo-alt"></i>"&ensp;Revert',
        '<i class="fas fa-scroll"></i>&ensp;Revisions',
        '<i class="fas fa-link"></i>&ensp;Backlink',
        '<i class="fas fa-plus-circle"></i>&ensp;Subscribe',
        '<i class="fas fa-arrow-circle-up"></i>&ensp;Top',
    );

}

?>