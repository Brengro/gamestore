<h1 class="page-header">
    <?php echo $tip->tipoUsuarioKey != null ? $tip->nombre : 'Nuevo Registro'; ?>
</h1>


<form id="frm-tipucto" action="?c=tipoUsuario&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tipoUsuariokey" value="<?php echo $tip->tipoUsuarioKey; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $tip->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $tip->descripcion; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:100" />
    </div>

   

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-tipucto").submit(function(){
            return $(this).validate();
        });
    });
</script>
