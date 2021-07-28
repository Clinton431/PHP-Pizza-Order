<?php 
include("./config/db_connect.php");

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM pitzars WHERE id = $id_to_delete";
    if(mysqli_query($conn, $sql)){
        // success 
        header('Location: index.php');
    } {
        // failure 
        echo 'query error:' . mysqli_error($conn);
    }
}


// check GET parameter 
if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // make a sql
    $sql = "SELECT * FROM pitzars WHERE id = $id";
    // Get the query results 
    $result = mysqli_query($conn, $sql);
//    fetch the results inform of array format 
    $pitzar = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);

    
}
?>
<!DOCTYPE html>
<html>
<?php  include('templates/header.php')?>
<div class="container center grey-text">
<?php if($pitzar):  ?>
        <h4><?php echo htmlspecialchars($pitzar['title']); ?></h4>
        <p>Created by:<?php echo htmlspecialchars($pitzar['email']); ?></p>
            <p><?php echo date($pitzar['created_at']); ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($pitzar['ingredients']); ?></p>
    <!-- Delete form  -->
    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pitzar['id']?>">
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

    <?php else:?>

        <h5>No Such Pizza Exists! </h5>
    <?php endif;?>
</div>


<?php  include('templates/footer.php')?>

    
</body>
</html>