<?php

  include('../config.php');


  /*
   *
   * api link url : http://localhost/austim/api/language/
   * 
   */


  $query = "select * from language_master";


  $result = mysqli_query($conn, $query);

  $language = array();
  $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $img_path = $actual_link. "/Images/flags/";

  $response['language'] = array();
  if ($result) {

      while ($row = mysqli_fetch_object($result)) {

          $language['id'] = $row->id;
          $language['name'] = $row->language_name;
          $language['code'] = $row->language_code;
          $language['create_date'] = $row->create_time;
          $language['country_code'] = strtoupper($row->country_code);
          if ($row->image == "") {
              $language['image'] = NULL;
          } else {

              $language['image'] = $img_path . $row->image;
          }


          array_push($response['language'], $language);
      }
  }


// header('Content-type: application/json');
  header('Content-Type: application/json; charset=utf8mb4_bin');
  echo json_encode($response);



  