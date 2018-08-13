<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 8/14/2018
 * Time: 12:29 AM
 */

$time_stamp_list = array();
if(isset($_SESSION['time_stamp_list'])){
    $time_stamp_list = $_SESSION['time_stamp_list'];
    $time_stamp_header = $_SESSION['time_stamp_header'];
}

$error = "";
if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
}
$message = "";
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <!-- Display icon -->
        <link rel="icon" href="" type="image/x-icon"/>
        <!-- Title Tags-->
        <title>Time Stamp</title>

        <!-- CSS -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- Custom -->
        <link href="/time_stamp.css" rel="stylesheet" />

    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>CRUD Interface for Time Stamp</h2>
                </div>
                <div class="container">
                    <?php if($error): ?>
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="card-header">
                                    <h4>Error</h4>
                                </div>
                                <p class="card-text">
                                    <?php echo $error; ?>
                                </p>
                            </div>
                        </div>
                    <?php elseif($message): ?>
                        <div class="card text-white bg-success">
                            <div class="card-header">
                                <h4>Success</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $message; ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <?php foreach($time_stamp_header as $header): ?>
                            <th>
                                <?php echo $header; ?>
                            </th>
                            <?php endforeach; ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($time_stamp_list as $time_stamp): ?>
                                <tr>
                                    <?php foreach($time_stamp_header as $field => $header): ?>
                                        <td>
                                            <?php if($field == "end" && !$time_stamp[$field]): ?>
                                                <form method="post" action="?action=update">
                                                    <button type="submit" class="btn btn-block">End</button>
                                                </form>
                                            <?php else: ?>
                                                <?php echo $time_stamp[$field]; ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <form method="post" action="?action=create">
                        <div>
                            <h3>Create New Time Stamp</h3>
                        </div>
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" class="form-control" name="user" placeholder="User">
                        </div>
                        <div class="form-group">
                            <label>Purpose</label>
                            <textarea type="text" class="form-control" name="purpose" placeholder="Purpose"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Start Stamp</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <!-- JQuery (allow individual page calls) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- Custom -->
        <script src="<?php base_url();?>/src/js/base.js"></script>
    </body>
</html>
