<?php if(isset($data_controller['errors']) && count($data_controller['errors']) != 0) { ?>

    <div class="alert alert-secondary" role="alert">
        <?php 
            #echo $data_controller['error']; 

            foreach ($data_controller['errors'] as $key => $error) {
                echo $error;
            }    
        ?>
    </div>

<?php } ?>    

<!-- Hiển thị lỗi nếu có session error -->
<?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') {?>

    <div class="alert alert-secondary" role="alert"><?=$_SESSION['error']?></div>

<?php } ?>


<!-- Hiển thị thành công nế có session success -->
<?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

    <div class="alert alert-secondary" role="alert"><?=$_SESSION['success']?></div>

<?php } ?>

<?=Helper::removeAlert()?>