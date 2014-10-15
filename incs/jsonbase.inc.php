<?
class JB {
    protected $self = array();

    public function __construct( $dataset ) {
		if( file_exists($rootPath.'/data/'.$dataset.'.json') ){
			$json_data = file_get_contents($rootPath.'/data/'.$dataset.'.json');
			$php_data = json_decode($json_data);

			return $php_data;
		}
    }
}
?>