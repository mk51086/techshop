
<?php  
//Lidhja me databaz
function pdo_connect_mysql() {
    // Info-t e databazes MYSQL
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'techshop';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $e) {
    	echo('Lidhja me databaz deshtoi!'). "<br>" .$e->getMessage();
    }
}
?>
