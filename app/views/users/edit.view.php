<form action="" method="post">
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($data['user']['email']); ?>" required>
    </div>
    
    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($data['user']['username']); ?>" required>
    </div>
    
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="" placeholder="Ingresa nueva contraseña (opcional)">
    </div>

    <input type="hidden" name="id" value="<?php echo $data['user']['id']; ?>"> <!-- Asegúrate de enviar el ID del usuario -->

    <div>
        <button type="submit">Actualizar</button>
    </div>
</form>