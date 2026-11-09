<?php
ob_start();
?>

<div class="container text-center mt-5">
    <i class="bi bi-shield-fill text-secondary" style="font-size: 5rem;"></i>
    <div class="card border-0 shadow-sm mx-auto mt-4" style="max-width: 600px;">
        <div class="card-body p-4">
            <h2 class="mb-3">Welcome to ALT-DEO</h2>
            <p class="text-muted mb-0">
                Your one stop centre for natural deodorant
            </p>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
require_once 'layout.php';
?>