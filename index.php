<?php

include 'config/db_connect.php' ;

//write query for all pizza
$sql = "SELECT title, ingredients, id FROM pizza ORDER BY created_at";

// make query and get results

$result = mysqli_query($conn, $sql);

//fetch results in rows as array

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result set to free up memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

// explode(",", $pizzas[0]['ingredients']);


?>

<!DOCTYPE html>
<html lang="en">
<?php include 'template/header.php'; ?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']);?></h6>
                        <ul>
                            <?php $ingredients = explode(",", $pizza['ingredients']);
                            foreach ($ingredients as $ingredient):?>
                                <li><?php echo htmlspecialchars($ingredient);?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="card-action right-align">
                    <a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>">MORE INFO</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'template/footer.php'; ?>

</html>