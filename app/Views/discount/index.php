<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<?php if(session()->getFlashdata('failed')): ?>
<div class="alert alert-danger">
    <?= session()->getFlashdata('failed') ?>
</div>
<?php endif; ?>

<button class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#addModal">

    Tambah Data

</button>

<table class="table datatable">

<thead>

<tr>

<th>No</th>

<th>Tanggal</th>

<th>Nominal</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php foreach($discounts as $i=>$discount): ?>

<tr>

<td><?= $i+1 ?></td>

<td><?= $discount['tanggal'] ?></td>

<td><?= number_format($discount['nominal'],0,',','.') ?></td>

<td>

<button
class="btn btn-success"

data-bs-toggle="modal"

data-bs-target="#editModal-<?= $discount['id'] ?>">

Ubah

</button>

<a

href="<?= base_url('diskon/delete/'.$discount['id']) ?>"

class="btn btn-danger"

onclick="return confirm('Hapus data?')">

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