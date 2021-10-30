<?php

include('../config.php');

/* api link
 * 
 * url : http://localhost/austim/api/option/option.php?question_id=1
 *
 */


$question_id = $_GET['question_id'];
$query = "select * from option_master where question_id=" . $question_id;


$result = mysqli_query($conn, $query);

$option = array();
$response['option'] = array();
if ($result) {

    while ($row = mysqli_fetch_object($result)) {

        $option['id'] = $row->id;
        $option['option_desc'] = $row->option_desc;
        $option['question_id'] = $row->question_id;
        $option['point'] = $row->point;   
        $option['create_date'] = $row->create_time;
        array_push($response['option'], $option);
    }
}
 header('Content-type: application/json');
echo json_encode($response);



