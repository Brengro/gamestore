<h1 class="page-header">Alta Usuarios </h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=usuario&a=Nuevo">Nuevo Usuario</a>
    <!--a class="btn btn-primary" href="?c=usuario&a=Reporte">Reporte PDF</a-->
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th style="width:120px;">Apellidos</th>
            <th style="width:120px;">email</th>
          
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre ; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td><?php echo $r->email; ?></td>
            <td>
                <a class="btn btn-success " href="?c=usuario&a=Crud&usuarioKey=<?php echo $r->usuario_key; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=usuario&a=Eliminar&usuarioKey=<?php echo $r->usuario_key; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

