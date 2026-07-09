<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

History Seluruh Pembelian
<hr>

<div class="table-responsive">

<table class="table datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>ID Pembelian</th>
            <th>Pembeli</th>
            <th>Waktu Pembelian</th>
            <th>Total Bayar</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    <?php if (!empty($transactions)) : ?>

        <?php foreach ($transactions as $index => $item) : ?>

        <tr>

            <td><?= $index+1 ?></td>

            <td><?= $item['id'] ?></td>

            <td><?= $item['username'] ?></td>

            <td><?= $item['created_at'] ?></td>

            <td><?= number_to_currency($item['total_harga'],'IDR') ?></td>

            <td><?= $item['alamat'] ?></td>

            <td>

                <?php if($item['status']==1){ ?>

                    <span class="badge bg-success">
                        Sudah Selesai
                    </span>

                <?php }else{ ?>

                    <span class="badge bg-warning">
                        Belum Selesai
                    </span>

                <?php } ?>

            </td>

            <td>

                <button
                    type="button"
                    class="btn btn-success btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#detailModal-<?= $item['id'] ?>">
                    Detail
                </button>

                <a
                    href="<?= base_url('pembelian/status/'.$item['id']) ?>"
                    class="btn btn-info btn-sm">

                    Ubah Status

                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    <?php endif; ?>

    </tbody>

</table>

</div>



<?php if (!empty($transactions)) : ?>

<?php foreach ($transactions as $item) : ?>

<div class="modal fade"
id="detailModal-<?= $item['id'] ?>"
tabindex="-1">

<div class="modal-dialog modal-dialog-centered">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">

Detail Transaksi #<?= $item['id'] ?>

</h5>

<button
type="button"
class="btn-close"
data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

<?php if (!empty($products[$item['id']])) : ?>

<?php foreach ($products[$item['id']] as $index2=>$item2) : ?>

<?= ($index2+1).")" ?>

<?php
$imagePath = FCPATH.'img/'.$item2['foto'];

if(!empty($item2['foto']) && file_exists($imagePath)):
?>

<div class="my-2">

<img
src="<?= base_url('img/'.$item2['foto']) ?>"
width="100"
class="img-thumbnail">

</div>

<?php endif; ?>

<strong>

<?= $item2['nama'] ?>

</strong>

<br>

Harga :

<?= number_to_currency($item2['harga'],'IDR') ?>

<br>

Jumlah :

<?= $item2['jumlah'] ?> pcs

<br>

Subtotal :

<?= number_to_currency($item2['subtotal_harga'],'IDR') ?>

<hr>

<?php endforeach; ?>

<?php endif; ?>

<strong>

Ongkir :

<?= number_to_currency($item['ongkir'],'IDR') ?>

</strong>

</div>

</div>

</div>

</div>

<?php endforeach; ?>

<?php endif; ?>

<?= $this->endSection() ?>