<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')) : ?>
<div class="alert alert-info alert-dismissible fade show">
    <?= session()->getFlashdata('success') ?>
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<?php if(session()->getFlashdata('failed')) : ?>
<div class="alert alert-danger alert-dismissible fade show">
    <?= session()->getFlashdata('failed') ?>
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<button class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#addModal">
    Tambah Data
</button>

<br><br>

<table class="table datatable">

<thead>

<tr>

<th>#</th>

<th>Tanggal</th>

<th>Nominal</th>

<th></th>

</tr>

</thead>

<tbody>

<?php foreach($discounts as $i=>$d): ?>

<tr>

<td><?= $i+1 ?></td>

<td><?= $d['tanggal'] ?></td>

<td><?= number_format($d['nominal']) ?></td>

<td>

<button
class="btn btn-success"
data-bs-toggle="modal"
data-bs-target="#editModal-<?= $d['id'] ?>">
Ubah
</button>

<a
href="<?= base_url('diskon/delete/'.$d['id']) ?>"
class="btn btn-danger"
onclick="return confirm('Yakin hapus data?')">

Hapus

</a>

</td>

</tr>

<?php endforeach ?>

</tbody>

</table>

<?= $this->include('discount/modal_add') ?>

<?= $this->include('discount/modal_edit') ?>

<?= $this->endSection() ?>