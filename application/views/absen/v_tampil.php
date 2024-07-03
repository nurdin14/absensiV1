<div class="col-10">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success" onclick="addAbsensi()">+ Add Absensi</button>
        </div>
        <div class="card-body">
            <table id="table_id_absen" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Add Absensi</h5>
            </div>
            <div class="modal-body form">
                <form id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_absen" />
                    <div class="form-group">
                        <label class="control-label col-md-3">NIK</label>
                        <div class="col-md-12">
                            <select name="nik" class="form-control">
                                <option>All</option>
                                <?php foreach ($data as $d) : ?>
                                    <option value="<?= $d['nik'] ?>"><?= $d['nik']  ?> - <?= $d['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Masuk</label>
                        <div class="col-md-12">
                            <input type="datetime-local" name="masuk" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Keluar</label>
                        <div class="col-md-12">
                            <input type="datetime-local" name="keluar" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeModal()" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btnSave" onclick="saveAbsensi()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript">
    var save_method; // for save method string
    var table;

    $(document).ready(function() {
        table = $('#table_id_absen').DataTable({
            "ajax": {
                "url": "<?php echo site_url('absen/fetch_absen') ?>",
                "type": "GET",
                "dataSrc": "data"
            },
            "columns": [{
                    "data": "No"
                },
                {
                    "data": "Nik"
                },
                {
                    "data": "Masuk"
                },
                {
                    "data": "Keluar"
                },
                {
                    "data": "Action"
                }
            ]
        });
    });

    function addAbsensi() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
    }

    function saveAbsensi() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('absen/add') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo site_url('absen/update') ?>";
        }

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                $('#modal_form').modal('hide');
                table.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / updating data:' + errorThrown);
            }
        });
    }

    function editAbsen(id) {
        save_method = 'update';
        $('#form')[0].reset();

        // Load data dari server
        $.ajax({
            url: "<?php echo site_url('absen/editAbsensi/') ?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id_absen"]').val(data.id_absen);
                $('[name="nik"]').val(data.nik);
                $('[name="masuk"]').val(data.masuk);
                $('[name="keluar"]').val(data.keluar);

                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Absensi');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function deleteAbsen(id) {
        if (confirm('Are you sure to delete this item?')) {
            $.ajax({
                url: "<?php echo site_url('absen/deleteAbsen/') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }
</script>

</body>

</html>