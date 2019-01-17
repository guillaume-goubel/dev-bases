<?php 

require_once __DIR__.'/partials/header.php';

sleep(2);
// die("L'article a été supprimé");

$id = $_GET['id']; 

$sql = "DELETE FROM products  
            WHERE id_products = :id ";
            
$delete = $db->prepare($sql);
$delete ->bindValue(':id', $id, PDO::PARAM_INT);
$delete ->execute();  
header('location:index.php');

?>

<?php 
require_once __DIR__.'/partials/footer.php';
?>