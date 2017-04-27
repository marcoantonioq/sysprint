<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-block alert-success" onclick="this.classList.add('hidden')"><?php echo $message; ?></div>