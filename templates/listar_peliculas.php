<?php require 'header.php' ?>
 
<h1> <?php echo $nombreDirector[0]->nombre ?> </h1>

<ul class="list-group">
<?php foreach($films as $film): ?>
    <li class="list-group-item item-task">
        <div class="label">
            <b><?= htmlspecialchars($film->titulo) ?></b> | <?= $film->year ?>
        </div>
        <div class="actions">
        
            <a href="eliminar/<?= $film->id ?>" type="button" class='btn btn-danger btn-sm ml-auto'>Borrar</a>
        </div>
    </li>
<?php endforeach ?>
</ul>

<p class="mt-3"><small>Mostrando <?=$count?> peliculas</small></p>

<?php require 'footer.php' ?>



