<?php

    $products = $data['products'];

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Suplidor</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th class='text-center'>
                            <a href='index.php?url=product/create/' class='btn btn-primary'>Crear</a>
                            </th>
                        <!-- Otros campos según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($product['suplidor'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($product['cantidad'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($product['precio'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <!-- Otros campos según sea necesario -->
                            
                            <td class='text-center'>
                                <a href='index.php?url=product/update/<?php echo htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>' class='btn btn-success'>Editar</a>
                                <a href='index.php?url=product/delete/<?php echo htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>' class='btn btn-danger'>Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
