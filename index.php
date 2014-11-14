<?php
/**
 * Created by PhpStorm.
 * User: raitis
 * Date: 11/11/14
 * Time: 00:21
 */

    require_once("assets/db_connection.php");
    require_once("assets/functions/functions.php");
    require_once("libs/smarty/Smarty.class.php");

    $page_id = 1;

    if (isset($_GET["page_id"])) {
        $page_id = $_GET["page_id"];
    };

    $page_heading = get_page_heading_by_id($page_id);

    $page_content = get_page_content_by_id($page_id);

    $smarty = new Smarty;

    $smarty->assign('page_heading', $page_heading);

    $smarty->assign('page_content', $page_content);

    $smarty->display("assets/tpl/main.tpl");