<?php
    require_once 'init.php';
    //require_once 'functions.php';
    if(!$currentUser) {
        header('Location: index.php');
        exit();
    }

?>
<?php include 'header.php'; ?>
    <?php  if ( isset($_POST['number1']) && isset($_POST['number2']) ) : ?>
    <?php 
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $sum = sum($number1, $number2);

        // <!--- echo sum($_POST['number1'], $_POST['number2'] ); -->
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $number1; ?> + <?php echo $number2; ?> = <?php echo $sum; ?>
    </div>
<?php else: ?>

    <form action="sum.php" method="POST">
        <div class="form-group">
            <label for="number1">Number one</label>
            <input type="text" class="form-control"
                id="number1" name="number1"
            >
        </div>
        <div class="form-group">
            <label for="number2">Number two</label>
            <input type="text" class="form-control"
                id="number2" name="number2"
            >
        </div>
        <button type="submit" class="btn btn-primary">SUM</button>
        <!-- <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" value="Upload file">
        </form> -->
    </form>
<?php endif; ?>
<?php include 'footer.php'; ?>