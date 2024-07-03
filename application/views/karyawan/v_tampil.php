<div class="col-10">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success" onclick="addKaryawan()">+ Add Employees</button>
        </div>
        <div class="card-body">
            <table id="table_id" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Dept</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Add</h5>
            </div>
            <div class="modal-body form">
                <form id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_karyawan" />
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama Karyawan</label>
                        <div class="col-md-12">
                            <input name="nama" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">NIK</label>
                        <div class="col-md-12">
                            <input name="nik" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Gender</label>
                        <div class="col-md-12">
                            <select name="jk" class="form-control">
                                <option>All</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal Lahir</label>
                        <div class="col-md-12">
                            <input name="tgl_lahir" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Dept</label>
                        <div class="col-md-12">
                            <input name="dept" class="form-control" type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeModal()" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
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
        table = $('#table_id').DataTable({
            "ajax": {
                "url": "<?php echo site_url('karyawan/fetch_karyawan') ?>",
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
                    "data": "NamaKaryawan"
                },
                {
                    "data": "JenisKelamin"
                },
                {
                    "data": "TanggalLahir"
                },
                {
                    "data": "Dept"
                },
                {
                    "data": "Action"
                }
            ]
        });
    });

    function addKaryawan() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('karyawan/add') ?>";
        } else if (save_method == 'update') {
            url = "<?php echo site_url('karyawan/updateKaryawan') ?>";
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

    function editKaryawan(id) {
        save_method = 'update';
        $('#form')[0].reset();

        // Load data dari server
        $.ajax({
            url: "<?php echo site_url('karyawan/editKaryawan/') ?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id_karyawan"]').val(data.id_karyawan);
                $('[name="nama"]').val(data.nama);
                $('[name="nik"]').val(data.nik);
                $('[name="jk"]').val(data.jk);
                $('[name="tgl_lahir"]').val(data.tgl_lahir);
                $('[name="dept"]').val(data.dept);

                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Karyawan');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function deleteKaryawan(id) {
        if (confirm('Are you sure to delete this item?')) {
            $.ajax({
                url: "<?php echo site_url('karyawan/deleteKaryawan/') ?>/" + id,
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

    function closeModal() {
        $('#modal_form').modal('hide');
    }
</script>