<?php 
    if (isset($_SESSION['message'])): 
?>


<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
</div>

<?php 
    unset($_SESSION['message']); 
    endif;
?>


