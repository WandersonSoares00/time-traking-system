<?php

$errors = [];

if (isset($_SESSION["message"])){
    $message = $_SESSION["message"];
    unset($_SESSION["message"]);
}

if (isset($exception) and $exception != null) {
    $message = [
        "type" => "error",
        "message" => $exception->getMessage()
    ];
}
?>

<?php if(isset($message)): ?>
    <div class="my-3 alert alert-<?php echo $message['type'] === 'error' ? 'danger' : 'success' ?>" role="alert">
        <?php echo $message["message"] ?>
    </div>
<?php endif ?>

<?php
/*
if (isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
else if ($exception) {
    $message = [
        'type'    => 'error',
        'message' => $exception -> getMessage()
    ];
}
?>

<?php if (isset($message)): ?>
    <div class = "alert-msg" style="margin-top:8px; color: #d3130f;">    
        <?= $message['message'] ?>
    </div>
<?php endif ?>
*/