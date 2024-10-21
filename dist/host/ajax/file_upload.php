<?php

//default declarations
//image upload size
$file_size_allowed = 3000000;
$min_size_compress = 500000;
//folder name for brand uploads
 $ticket_pic = "../../profile_pic/";
 $radio_pic = "../../radio_pic/";
//  $ticket_pic = "../profile_pic/";

function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);
}

function upload_img($file1, $file_size_allowed, $min_size_compress, $ticket_pic)
{
    $name = $_FILES[$file1]['name'];
    $tmpnm = $_FILES[$file1]['tmp_name'];
    $type = $_FILES[$file1]['type'];
    $size = $_FILES[$file1]['size'];

    // check file extension
    if (
        $type != 'image/jpeg'
        && $type != 'image/jpg'
        && $type != 'image/gif'
        && $type != 'image/png'
    ) {
        //echo "File Extension Not Allowed";
    } else {
        //this is the dir for the photo
        if ($size > $file_size_allowed) {
            return "file to large";
        } else {
            $tuname = base64_decode($_POST["$file1"]);
            $newname = str_shuffle('01234567891234567890');
            @$dir = "$ticket_pic" . $tuname . $newname . $name;
            @$dir1 = "" . $tuname . $newname . $name;
            if ($size > $min_size_compress) {
                // Compress Image
                $ui = compressImage($tmpnm, $dir, 40);
                if ($ui) {
                    move_uploaded_file($tmpnm, $dir);
                }
            } else {
                move_uploaded_file($tmpnm, $dir);
            }
            return $dir1;
        }
    }
}


