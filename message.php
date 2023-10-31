<?php
if (isset($_SESSION['message'])):
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Super! </strong><?php echo $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['message']);
endif;
?>

<?php
if (isset($_SESSION['message_erreur'])):
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Attention! </strong><?php echo $_SESSION['message_erreur'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['message_erreur']);
endif;
?>