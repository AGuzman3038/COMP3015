<?php

    $users = $data['users'];

?>


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Usuarios</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th class='text-center'>
                            <a href='index.php?url=user/create/' class='btn btn-primary'>Crear</a>
                            </th>
                        <!-- Otros campos según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <!-- Otros campos según sea necesario -->
                            <td class='text-center'>
                                <a href='index.php?url=user/update/<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>' class='btn btn-success'>Editar</a>
                                <a href='index.php?url=user/delete/<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>' class='btn btn-danger'>Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
