<?php
include "../config/controller.php";
include "../checkers.php";
$app = new controller;
$id = $app->post_request('id_del_hmo');
if (isset($id)) {
    $query = "UPDATE 
    patient_test_radio o
JOIN 
    hmo_radio_group u
ON 
    o.test_id = u.case_id
SET 
    o.payment_status = 'paid', 
    o.payment_method = 'hmo', 
    o.status = 1
WHERE 
    u.profile_id = 1
    and o.patient_id=$id;
";
    $get_category = $app->direct_insert($query);

    if ($get_category == "success") {
        echo "success";
    }

}




