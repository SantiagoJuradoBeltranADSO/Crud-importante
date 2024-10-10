<div class="table">
    <div>Email</div>
    <div>User</div>
    <div>Acciones</div>      
    <?php 
    foreach($data['users'] as $key) {
        ?>
        <div>
            <?= $key['email']; ?>
        </div>
        <div>
            <?= $key['username']; ?>
        </div>
        <div>
            <a href="<?= URL ?>/users/edit/<?php echo $key['id'] ?>">Editar</a>
        </div>
        <?php     
    }
    ?>
</div>