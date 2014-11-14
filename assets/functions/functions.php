<?php
/**
 * Created by PhpStorm.
 * User: raitis
 * Date: 12/11/14
 * Time: 23:08
 */

    function get_page_by_id($id){

        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE page_id = {$id} ";
        $query .= "LIMIT 1";

        $page_set = mysqli_query($connection, $query);

        if($page = mysqli_fetch_assoc($page_set)) {
            return $page;
        } else {
            return null;
        };

    };


    function get_page_heading_by_id($id){

        $page_array = get_page_by_id($id);

        $page_heading = $page_array["page_heading"];

        return $page_heading;
    };


    function get_page_content_by_id($id){

        $page_array = get_page_by_id($id);

        $page_content = $page_array["page_content"];

        return $page_content;
    };


    function navigation($id){


    };