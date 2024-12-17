<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1 class="mt-3">Editar Invitado</h1>
<!-- Mostrar mensajes de error de validación -->
<?php if (session()->has('validationErrors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('validationErrors') as $field => $error): ?>
                <li><strong><?= esc($field) ?>:</strong> <?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Mostrar mensajes de éxito -->
<?php if (session()->has('message')): ?>
    <div class="alert alert-success">
        <?= session('message') ?>
    </div>
<?php endif; ?>

<form method="POST" action="<?= base_url("guests/{$guest['id']}/update") ?>" class="mt-3">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= esc($guest['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= esc($guest['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Teléfono</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?= esc($guest['phone']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
<?= $this->endSection() ?>
