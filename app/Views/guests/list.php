<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1 class="mt-3">Lista de Invitados</h1>
<a href="<?= base_url('guests/create') ?>" class="btn btn-primary my-3">Agregar Invitado</a>

<?php if (session()->has('message')): ?>
    <div class="alert alert-success">
        <?= session('message') ?>
    </div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($guests as $guest): ?>
        <tr>
            <td><?= esc($guest['name']) ?></td>
            <td><?= esc($guest['email']) ?></td>
            <td><?= esc($guest['phone']) ?></td>
            <td>
                <!-- Dropdown con opciones -->
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton<?= esc($guest['id']) ?>" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= esc($guest['id']) ?>">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('guests/' . $guest['id'] . '/edit') ?>">Editar</a>
                        </li>
                        <li>
                            <form action="<?= base_url('guests/' . $guest['id']) ?>/delete" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este invitado?');">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="dropdown-item text-danger">Eliminar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
