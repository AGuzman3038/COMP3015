<?php

    $suppliers = $data['suppliers'];

?>


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Suplidores</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th class='text-center'>
                            <a href='index.php?url=supplier/create/' class='btn btn-primary'>Crear</a>
                            </th>
                        <!-- Otros campos según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $supplier): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($supplier['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($supplier['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($supplier['telefono'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <!-- Otros campos según sea necesario -->
                            <td class='text-center'>
                                <a href='index.php?url=supplier/update/<?php echo htmlspecialchars($supplier['id'], ENT_QUOTES, 'UTF-8'); ?>' class='btn btn-success'>Editar</a>
                                <a href='index.php?url=supplier/delete/<?php echo htmlspecialchars($supplier['id'], ENT_QUOTES, 'UTF-8'); ?>' class='btn btn-danger'>Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
