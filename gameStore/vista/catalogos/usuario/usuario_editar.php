<h1 class="page-header">
    <?php echo $usu ->getUsuarioKey() != null ? $tip->nombre : 'Nuevo Registro'; ?>
</h1>


<form id="frm-tipucto" action="?c=usuario&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="usuarioKey" value="<?php echo $usu->usuarioKey; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $usu->nombre; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="apellidos" value="<?php echo $tip->apellidos; ?>" class="form-control" placeholder="Ingrese la descripcion" data-validacion-tipo="requerido|min:100" />
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
