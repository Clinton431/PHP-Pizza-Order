<?php 

include('./config/db_connect.php');
// Mysqli or PDO 
$conn = mysqli_connect('localhost', 'clinton', 'clin1234', 'ninja_pitzar');
// check connection 

if(!$conn){
    echo 'Connection error:' .mysqli_connect_error(); 
}
// Write query for all Pitzars 
$sql = 'SELECT title, ingredients, id FROM pitzars ORDER BY created_at';

// MAke query & get the results 
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array 
$pitzars = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free results from memory 
mysqli_free_result($result);

// close the connection 
mysqli_close($conn);

// print_r(explode(',' , $pitzars[0]['ingredients'])); 

?>


<!DOCTYPE html>
<html>
    <?php  include('templates/header.php')?>
   
    <h4 class="center grey-text">Pitzars!</h4>

    <div class="container">
        <div class="row">

        <?php  foreach ($pitzars as $pitzar){ ?>


            <div class="col s6 md3">
                <div class="card z-depth-0">

                    <img src="./images/pizza 04.jpg" class="pizza" >
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pitzar['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $pitzar['ingredients']) as $ing){ ?>

                                <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php }?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text"  href="details.php?id=<?php echo $pitzar['id']?>">more info</a>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
    </div>
    <?php  include('templates/footer.php')?>

</html>