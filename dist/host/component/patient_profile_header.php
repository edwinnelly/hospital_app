<?php
//sql command
$query = "SELECT * FROM patient_data JOIN hmo ON patient_data.hmo_id = hmo.id WHERE patient_data.pid=$get_staff_id";
$get_data_details = $app->fetch_query($query);
foreach ($get_data_details as $data)
    ;

    ?>

<div class="card client-detail">
    <div class="body d-flex">
        <div class="profile-image mr-4">
            <img src="../profile_pic/<?php echo $data['photo']; ?>" alt="" height="100">
        </div>
        <div class="details">
            <h5 class="mt-0 mb-0"><?php echo $data['patient_name']; ?></h5>
            <span class="text-muted font-13"><?php echo $data['sex']; ?></span>
            <p class="mb-1"><?php echo $data['address']; ?></p>
            <p class="social-icon">
                <a class="px-2" title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                <a class="px-2" title="Facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                <a class="px-2" title="Google-plus" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                <a class="px-2" title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                <a class="px-2" title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
            </p>
            <div class="mt-2">
                <a href="patient_profile?fid=<?php echo $get_staff_id; ?>&&st=TWFya3NvbiBPIEhpbmxkYQ=="><button
                        class="btn btn-sm btn-primary" style="color:white">My Profile</button></a>
                <button class="btn btn-sm btn-default">Message</button>
            </div>
        </div>
    </div>
</div>