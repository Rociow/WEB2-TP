<!-- formulario agregar tarea -->
<form action="nueva" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Título</label>
                <input required name="title" type="text" class="form-control">
            </div>
        </div>

        <div class="col-9">
            <div class="form-group">
                <label>Genero</label>
                <input required name="title" type="text" class="form-control">
            </div>
        </div>

        <div class="col-9">
            <div class="form-group">
                <label>Año</label>
                <input required name="title" type="text" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>
