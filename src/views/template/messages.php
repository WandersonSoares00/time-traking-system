<?php

if ($exception) {
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
