<?php
/**
 * Created by PhpStorm.
 * User: raitis
 * Date: 12/11/14
 * Time: 23:08
 */

function mysql_prep($string) {

    global $connection;

    $escaped_string = mysqli_real_escape_string($connection, $string);

    return $escaped_string;

};


function confirm_query($result_set){

    if(!$result_set){

        die("Database query failed.");

    };

};


function get_all_pages(){

    global $connection;

    $query  = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE page_visible = 1 ";

    $page_set = mysqli_query($connection, $query);

    confirm_query($page_set);

    return $page_set;

};


function get_all_main_pages(){

    global $connection;

    $query  = "SELECT * FROM pages WHERE page_visible = 1 AND page_parent = 0;";
    $page_set = mysqli_query($connection, $query);

    confirm_query($page_set);

    return $page_set;

};


function find_subject_by_id($subject_id){

    global $connection;

    $safe_subject_id = mysqli_real_escape_string($connection, $subject_id);

    $query  = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE id = {$safe_subject_id} ";
    $query .= "LIMIT 1";

    $subject_set = mysqli_query($connection, $query);

    confirm_query($subject_set);

    if($subject = mysqli_fetch_assoc($subject_set)) {
        return $subject;
    } else {
        return null;
    };

};


function find_page_by_id($page_id){

    global $connection;

    $safe_page_id = mysqli_real_escape_string($connection, $page_id);

    $query  = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE id = {$safe_page_id} ";
    $query .= "LIMIT 1";

    $page_set = mysqli_query($connection, $query);

    confirm_query($page_set);

    if($page = mysqli_fetch_assoc($page_set)) {
        return $page;
    } else {
        return null;
    };

};


function find_selected_page(){

    global $current_subject;
    global $current_page;

    if  (isset($_GET["subject"])){
        $current_page = null;
        $current_subject = find_subject_by_id($_GET["subject"]);

    }	elseif (isset($_GET["page"])){
        $current_subject = null;
        $current_page = find_page_by_id($_GET["page"]);

    }	else {
        $current_subject = null;
        $current_page = null;
    };

}