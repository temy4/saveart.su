<?php if( __CMS_INCLUDED__ ): ?>
	
<?php
    //check if this is an ajax request
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        $retCode = -3;
        $retMsg  = 'Not an AJAX request';
        http_response_code(405);
        die ( json_encode( array( 'code' => $retCode, 'message' => $retMsg) ) );
    }


?>

<?php else: ?>
	<?php http_response_code(403); ?>
<?php endif; ?>