<h1 class="page-header">
    Nuevo Registro
</h1>


<form id="frm-usuario" action="?c=usuario&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus Apellidos" data-validacion-tipo="requerido|min:100" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Ingrese Email" data-validacion-tipo="requerido|min:100" />
    </div>
      <div class="form-group">
        <label>Passsword</label>
        <input type="password" name="password" class="form-control" placeholder="Ingrese Email" data-validacion-tipo="requerido|min:100" />
    </div>

    <hr />

    <div class="text-right">
        <a class="btn btn-danger" href="?c=usuario&a=Index"> Cancelar</a>
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

