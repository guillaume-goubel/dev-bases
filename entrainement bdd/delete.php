<?php 

require_once __DIR__.'/partials/header.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0; 

$sql = "DELETE FROM products  
            WHERE id_products = :id ";

$delete = $db->prepare($sql);
$delete ->bindValue(':id', $id, PDO::PARAM_INT);
$delete ->execute();  


?>
 
<body>


<div class="container">
     


<div class="span10 offset1">


<div class="row">


<h3>Delete a user</h3>
<p>

</div>
<p>

                     

<form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id ?>"/>
                      
Are you sure to delete ?


<div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="index.php">No</a>
</div>
<p>

                    </form>
<p>
</div>
<p>

                 
</div>
<p>

<?php 

require_once __DIR__.'/partials/footer.php';

?>