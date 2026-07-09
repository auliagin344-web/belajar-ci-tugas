<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
if (session()->getFlashData('success')) {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close">
    </button>
</div>
<?php
}
?>

<?php if ($discount) : ?>

<div class="alert alert-success text-center">

    <strong>
        Hari ini ada diskon
        <?= number_to_currency($discount['nominal'], 'IDR') ?>
        untuk setiap produk
    </strong>

</div>

<?php endif; ?>

<div class="row">

<?php foreach ($products as $item) : ?>

<?php

$harga = $item['harga'];

if ($discount) {

    $harga = $item['harga'] - $discount['nominal'];

    if ($harga < 0) {
        $harga = 0;
    }

}

?>

<div class="col-lg-6">

<?= form_open('keranjang') ?>

<?= form_hidden('id', (string)$item['id']) ?>
<?= form_hidden('nama', $item['nama']) ?>
<?= form_hidden('harga', (string)$harga) ?>
<?= form_hidden('foto', $item['foto']) ?>

<div class="card">

<div class="card-body">

<img
src="<?= base_url('img/' . $item['foto']) ?>"
width="50%"
alt="">

<h5 class="card-title">

<?= $item['nama'] ?>

<br>

<?php if ($discount) : ?>

<small class="text-danger">

<s>

<?= number_to_currency($item['harga'], 'IDR') ?>

</s>

</small>

<br>

<strong>

<?= number_to_currency($harga, 'IDR') ?>

</strong>

<?php else : ?>

<?= number_to_currency($item['harga'], 'IDR') ?>

<?php endif; ?>

</h5>

<button
type="submit"
class="btn btn-info rounded-pill">

Beli

</button>

</div>

</div>

<?= form_close() ?>

</div>

<?php endforeach ?>

</div>

<?= $this->endSection() ?>