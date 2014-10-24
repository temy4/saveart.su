<?php if( __CMS_INCLUDED__ ): ?>

<?php
$allown_fsize = 3;
$allown_formats = array(
  'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
  'application/msword',
  'application/pdf'
);

if( isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK ){
    $retCode = 1;
    $retMsg  = '';
    //check if this is an ajax request
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        $retCode = -3;
        $retMsg  = 'Not an AJAX request';
        http_response_code(405);
    }
    
    //Is file size is less than allowed size.
    if ($_FILES["file"]["size"] > ( $allown_fsize * 1048576 ) ) {
        $retCode = -1;
        $retMsg  = 'File is too big';
        http_response_code(413);
    }
    
    if ( !in_array($_FILES['file']['type'], $allown_formats) ){
    	$retCode = -2;
    	$retMsg  = 'Unknown file format';
        http_response_code(415);
    }
    
    if ( $retCode > 0 ){
        global $rootPath;
        if( move_uploaded_file($_FILES['file']['tmp_name'], $rootPath.'/upload/tmp/'.md5($_FILES['file']['name'].time()).preg_match('(\.[^.]+)$', $_FILES['file']['name'])) ){
            $retMsg = md5($_FILES['file']['name'].time()).preg_match('(\.[^.]+)$', $_FILES['file']['name']);
        }
        else{
            $retCode = -99;
            http_response_code(413);
            $retMsg = 'Unknown error. Can not write file';
        }
    }

    echo json_encode( array('code' => $retCode, 'message' => $retMsg) );
}
else {
    echo json_encode( array('code' => -99, 'message' => 'Unknown error') );
}
?>

<?php else: ?>
	<?php http_response_code(403); ?>
<?php endif; ?>