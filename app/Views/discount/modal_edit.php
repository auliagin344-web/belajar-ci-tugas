<?php foreach($discounts as $discount): ?>

<div class="modal fade"
     id="editModal-<?= $discount['id'] ?>"
     tabindex="-1">

<div class="modal-dialog modal-dialog-centered">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">
Edit Data
</h5>

<button
type="button"
class="btn-close"
data-bs-dismiss="modal">
</button>

</div>

<?= form_open(base_url('diskon/edit/'.$discount['id'])) ?>

<?= csrf_field() ?>

<div class="modal-body">

<div class="mb-3">

<?= form_label('Tanggal') ?>

<?= form_input([

'type'=>'date',

'name'=>'tanggal',

'class'=>'form-control',

'value'=>$discount['tanggal'],

'readonly'=>true

]) ?>

</div>

<div class="mb-3">

<?= form_label('Nominal') ?>

<?= form_input([

'type'=>'number',

'name'=>'nominal',

'class'=>'form-control',

'value'=>$discount['nominal'],

'required'=>true

]) ?>

</div>

</div>

<div class="modal-footer">

<button
type="button"
class="btn btn-secondary"
data-bs-dismiss="modal">

Close

</button>

<?= form_submit(
'submit',
'Simpan',
['class'=>'btn btn-primary']
) ?>

</div>

<?= form_close() ?>

</div>

</div>

</div>

<?php endforeach ?>