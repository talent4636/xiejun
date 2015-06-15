<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Date: 15/6/14
 * Time: 下午6:46
 */

if($_GET){
//    header("Content-Type:text/xml; charset=utf8");
    //xml
//    $doc = new DOMDocument('1.0', 'utf-8');
//    $doc->formatOutput = true;
//    $doc->appendChild($doc->createElement("username", $_GET['username']));
//    $doc->appendChild($doc->createElement("content", $_GET['content']));
//    $xml = $doc->saveXML();

    //json
    $data = array(
        'username' => $_GET['username'],
        'content' => $_GET['content'],
    );
    $json = json_encode($data);

    //html
    $html = "<div class='comment'><h6>"
        .$_GET['username'].":</h6><p class='para'>"
        .$_GET['content']."</p></div>";

    switch($_GET['type']){
        case 'json':
            exit($json);
            break;
        case 'html':
            exit($html);
            break;
        case 'xml':
            exit($xml);
            break;
    }
}