<?php
function restful($data){
    header('Content-type: application/json');
    echo json_encode($data);
}

function response($result=0){
    $arr = array("message",$result) ;
    echo json_encode($arr);
}

function decodeimage($post){
    $dir='uploads/images/';
    $image_base64 = base64_decode($post);
    $file =  uniqid().'.jpg';
    file_put_contents($dir .$file, $image_base64);
    return $file;
}

function notification($Ids,$msg){
    $url = "https://fcm.googleapis.com/fcm/send";
    $serverKey="AAAA38Vfpsw:APA91bFD3Z1euwgblGKYKqAnA_8PZSG_2gX5qMlhxGiFSbERRfziCNsNsNF2r9SwIm1dpPOk552p6vsyN2o3wAdPBAa9rZDEQT37DMRFOUNx7RKXyp-BAdzIo32KD7rPF_SPKv-gi8B9";
    if (!is_array($Ids)){
        $token = array($Ids);
    }else{
        $token=$Ids;
    }
    $msg['sound']="default";
    $msg["badge"]='1';
    $arrayToSend = array('registration_ids' => $token, 'notification' => $msg,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    $response = curl_exec($ch);
    if ($response === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
}

function thumbs($data,$folder){
    $CI =& get_instance();
    $config['image_library'] = 'gd2';
    $config['source_image'] =$data['full_path'];
    $config['new_image'] = 'uploads/'.$folder.'/thumbs/'.$data['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['thumb_marker']='';
    $config['width'] = 275;
    $config['height'] = 250;
    $CI->load->library('image_lib', $config);
    $CI->image_lib->resize();
}

function Jupload_image($file_name,$folder){
    $CI =& get_instance();
    $config['upload_path'] = 'uploads/'.$folder;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '1000000000';
    $config['encrypt_name']=true;
    $CI->load->library('upload',$config);
    if(! $CI->upload->do_upload($file_name)){
         $error = $CI->upload->display_errors();
        return $error;
    }else{
        $datafile = $CI->upload->data();
        return  $datafile['file_name'];
    }
}

function Jupload_muli_image($input_name ,$folder){
    $filesCount = count($_FILES[$input_name]['name']);
    for($i = 0; $i < $filesCount; $i++){
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[]=upload_image("userFile",$folder);
    }
    return $all_img; 
}

?>