
    <div class="border border-secondary-300 p-4 ">
        <h2 class='text-info'>Crear Suplidor</h2>

        <form action="index.php?url=supplier/save/0" method="post" class='form'>
            <div class="form-group mb-3">
                <input type="hidden" name="id" value="0" required>
                <input type="hidden" name="accion" value="create">

                <label>Nombre</label>
                <input type="text" name="nombre" class='form-control' value="" required>
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" class='form-control' value="" required>
            </div>
            <div class="form-group mb-3">
                <label>Telefono</label>
                <input type="number" name="telefono" class='form-control'  placeholder="Telefono" 
                    value="" required>            
            </div>
            <div class="form-group">
                <a href='.' class='btn btn-secondary'>Cancelar</a>
                <button class='btn btn-primary' type="submit">Guardar</button>            
            </div>
        </form>
    </div>
