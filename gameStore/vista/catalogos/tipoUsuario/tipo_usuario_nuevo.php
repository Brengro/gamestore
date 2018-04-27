<h1 class="page-header">
    Nuevo Registro
</h1>


<form id="frm-proveedor" action="?c=tipoUsuario&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Descripción</label>
        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción" data-validacion-tipo="requerido|min:100" />
    </div>

    <hr />

    <div class="text-right">
        <a class="btn btn-danger " href="?c=usuario&a=Index">Cancelar</a>
        <button class="btn btn-primary">Guardar</button>
        
    </div>
</form>

