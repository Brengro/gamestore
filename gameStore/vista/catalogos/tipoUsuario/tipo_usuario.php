<h1 class="page-header">Tipo Usuarios </h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=tipoUsuario&a=Nuevo">Nuevo Tipo Usuario</a>
    <a class="btn btn-primary" href="?c=tipoUsuario&a=Reporte">Reporte PDF</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Key</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Descripcion</th>
  
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->tipoUsuarioKey ; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td>
                <a class="btn btn-success " href="?c=tipoUsuario&a=Crud&tipoUsuarioKey=<?php echo $r->tipoUsuarioKey; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=tipoUsuario&a=Eliminar&tipoUsuarioKey=<?php echo $r->tipoUsuarioKey; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

