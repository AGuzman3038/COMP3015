<?php
    $product = $data['product'];
?>
    <div class="border border-secondary-300 p-4 ">
        <h2 class='text-info'>Borrar Producto</h2>

        <form action="index.php?url=product/remove/<?php echo $product['id']; ?>" method="post" class='form'>
            <div class="form-group mb-3">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>" required>
                <input type="hidden" name="accion" value="update">

                <label>Nombre</label>
                <input type="text" name="nombre" class='form-control' value="<?php echo $product['nombre']; ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label>Suplidor</label>
                <input type="text" name="suplidor" class='form-control' value="<?php echo $product['suplidor']; ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label>Cantidad</label>
                <input type="text" name="cantidad" class='form-control' value="<?php echo $product['cantidad']; ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label>Precio</label>
                <input type="text" name="precio" class='form-control' value="<?php echo $product['precio']; ?>" readonly>
            </div>
            <div class="form-group">
                <div class="row alert alert-danger">
                    <div class="col-8">
                        <h3>¿Está seguro que desea borrar el récord?</h3>
                    </div>
                    <div class="col text-end">
                        <a href='.' class='btn btn-secondary'>Cancelar</a>
                        <a href="./index.php?url=product/remove/<?php echo $product['id']; ?>" class='btn btn-primary'>Borrar</a>
                        <!-- <button class='btn btn-primary' type="submit">Borrar</button>-->
                    </div>
                </div>
            </div>
        </form>
    </div>
