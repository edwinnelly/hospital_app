<?php
include "../config/controller.php";
$app = new controller;
//  echo $services_id = $app->post_request('services_id');
$hmo_id = $app->post_request('hmo_id');
$hmo_plan = $app->post_request('hmo_plan');
 $pid = $app->post_request('pid');
 $docid = $app->post_request('docid');
 $title = $app->post_request('title');
$cn = $_POST['services_id'];
if(isset($hmo_id,$pid,$title,$docid)) {
    foreach ($cn as $rr) {
         $query = "INSERT INTO `hmo_payment_requests` (`request_id`, `patient_id`, `hmo_id`, `service_id`, `amount_requested`, `status`,`docid`) VALUES (NULL, '$pid', '$hmo_id', '$rr', NULL, 'pending','$docid')";
        $get_category = $app->direct_insert($query);       
    }
    //create a discussion window
    $details_request ="INSERT INTO `hmo_request_window` (`id`, `title`, `request_key`,`pid`) VALUES (NULL, '$title', '$docid','$pid')";
    $get_category = $app->direct_insert($details_request);
    echo "success";
}








