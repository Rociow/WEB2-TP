<?php require 'header.php' ?>

<ul class="list-group">
<?php foreach($directores as $director): ?>
    <li class="list-group-item item-task">
        <div class="label">
            <b><?= htmlspecialchars($director->nombre) ?></b> | <?=substr($director->nacionalidad,0,25)?> |  <?= $director->fecha_nacimiento ?>
        </div>
        <div class="actions">
            <a href="eliminar/<?= $director->id ?>" type="button" class='btn btn-danger btn-sm ml-auto'>Borrar</a>
            <a href="showFilms/<?= $director->id ?>" type="button" class='btn btn-danger btn-sm ml-auto'>Ver Películas</a>
        </div>
    </li>
<?php endforeach ?>
</ul>

<p class="mt-3"><small>Mostrando <?=$count?> peliculas</small></p>

<?php require 'footer.php' ?>



