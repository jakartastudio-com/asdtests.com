<?php

include ("config.php");



/* api link
 * 
 * url : http://localhost/austim/austim/api/content.php?page_name=term_and_condition
 *
 */
$pname = $_GET['page_name'];
$query = "SELECT * FROM `page_content` WHERE page_name = '$pname'";


if(!empty($pname)){
$result = mysqli_query($conn, $query);

$content=array();
$response['page_content'] = array();
    if ($result) {
        
        while ($row = mysqli_fetch_object($result)) {
            $content['desc'] = $row->page_desc;
           
        }
    }
    
}


echo json_encode($content);
