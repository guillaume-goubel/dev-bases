<?php 

require_once __DIR__.'/config/database.php';

// sleep(2);

function isAjax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

$names = null;
$formIsvalid = false;

if(!empty($_POST)){
    $names = $_POST['names'];
    $formIsvalid = true;
}

if(empty($_POST)){
    header('500 Internal Server Error', true, 500);
    die('vous devez préciser un nom');
}

if($formIsvalid){

$sql = "INSERT INTO products (`names`) VALUES (:names)";
            
$insert = $db->prepare($sql);
$insert ->bindValue(':names', $names, PDO::PARAM_STR);
$insert ->execute();

if(isAjax()){ 

    $lastIdProducts = $db->lastInsertId();
    $queryUserSql = 'SELECT * FROM `products`
                 WHERE id_products = :id_products';

    $query = $db->prepare($queryUserSql);
    $query->bindValue(':id_products', $lastIdProducts, PDO::PARAM_INT);
    $query->execute();
    
    $result = $query->fetch();

    ?>

        <tr>

            <td></td>
            <td>
                <?= $result['names'] ?>
            </td>
            <td>
                <a href="delete.php?id=<?=$result['id_products']?>" type="button" class="btn btn-danger">Effacer</a>
            </td>

        </tr>
<?php
}


else{
    header('location:index.php');
}

}

?>