
<!DOCTYPE html>
<html>
    <head>
        <title> Nákupný zoznam </title>
        <link rel="stylesheet" href="process.php">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    </head>
    <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Nákupný zoznam</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark active" href="stranka.php">Nákupný zoznam</a>
        </nav>
    </div>
    <?php require_once 'process.php'; ?>
    <div class="container">
    <?php
        if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                 <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                 ?>
            </div>
        <?php endif ?>


    <div class="container>
    <?php
        $mysqli = new mysqli('localhost', 'root', 'dtb456', 'data') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);

        ?>
        <div class=
        <div class="row justify-content-center">
            <table class=" table">
                <thead>
                    <tr>
                        <th>Názov</th>
                        <th>Popis</th>
                        <th colspan="2">Akcia</th>
                    </tr>
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td> <?php echo $row['nazov']; ?></td>
                    <td> <?php echo $row['popis']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id'] ?>"
                           class="btn btn-info">Upraviť</a>
                        <a href="index.php?delete=<?php echo $row['id'] ?>"
                           class="btn btn-danger">Zmazať</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
    <?php
        function pre_r($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>
    <div class="row justify-content-center">
        <form action="process.php" method="post">
            <input type="hidden" name="id" value="<?php /** @var process $id */
            echo $id ; ?>">
            <div class="form-group">
            <label>Názov</label>
            <input type="text" name="nazov" class="form-control"
                   value="<?php /** @var process $nazov */
                   echo $nazov; ?>" placeholder="Nazov položky">
            </div>
            <div class="form-group">
            <label> Popis receptu</label>
            <input type="text" name="popis" class="form-control"
                   value="<?php /** @var process $popis */
                   echo $popis; ?>" placeholder="popis receptu">
            </div>
            <div class="form-group">
                <?php
                /** @var process $update */
                if($update == true) :
                ?>
                <button type="submit" class="btn btn-info" name="update">Aktualizovať</button>
                <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">Uložiť</button>
            <?php endif; ?>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>


    </body>


</html>

