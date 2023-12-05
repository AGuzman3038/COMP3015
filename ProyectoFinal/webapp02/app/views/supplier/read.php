<?php
    $user = $data['user'];
?>
<?php if ($user): ?>
    <h1><?php echo $user['nombre']; ?></h1>
    <p>Email: <?php echo $user['email']; ?></p>
    <!-- Más detalles del usuario aquí -->
<?php else: ?>
    <p>Usuario no encontrado.</p>
<?php endif; ?>