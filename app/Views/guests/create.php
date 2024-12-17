<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1 class="mt-3">Crear Invitado</h1>

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

<form method="post" action="<?= base_url('guests/store') ?>" class="mt-3">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Teléfono</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?= old('phone') ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?= $this->endSection() ?>
