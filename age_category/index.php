<?php


include ("../config.php");



/* api link
 * 
 * url : http://localhost/austim/api/age_category/
 *
 */


$query = "select * from age_category";


$result = mysqli_query($conn, $query);
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

$img_path = $actual_link."/Images/categoryImages/";
$content = array();
$response['age_category'] = array();
if ($result) {

    while ($row = mysqli_fetch_object($result)) {

        $content['id'] = $row->id;
        $content['title'] = $row->title;
        $content['desc'] = $row->age_desc;
        $content['create_date'] = $row->create_time;
        if ($row->image == "") {
            $content['image'] = NULL;
        } else {

            $content['image'] = $img_path . $row->image;
        }


        array_push($response['age_category'], $content);
    }
}

 header('Content-type: application/json');
echo json_encode($response);


