<div class="col">
    <div class="card">
        <div class="card-header">
            Cari Berdasarkan :
            <select id="" class="form-control">
                <option>-- Silahkan Pilih ---</option>
                <option value="semua">All</option>
                <option value="tidak">Tidak Absen</option>
                <option value="datang">Datang Paling Pagi</option>
                <option value="pulang">Pulang Paling Cepat</option>
                <option value="lama">Paling Lama Kerja</option>
            </select>
        </div>
        <div class="card-body">
            <div class="data-paling-cepat">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Waktu Datang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampilDatang as $t) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $t['nik']; ?></td>
                                <td><?= $t['nama']; ?></td>
                                <td><?= $t['masuk']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="pulang-paling-cepat">
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Waktu Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampilPulang as $t) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $t['nik']; ?></td>
                                <td><?= $t['nama']; ?></td>
                                <td><?= $t['keluar']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="paling-lama-kerja">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Durasi Kerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampilKerja as $t) : ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $t['nik']; ?>
                                </td>
                                <td>
                                    <?= $t['nama']; ?>
                                </td>
                                <td>
                                    <?= $t['durasi_kerja']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="tidak-absen">
                <table id="example3" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Dept</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampilTabsen as $t) : ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $t['nik']; ?>
                                </td>
                                <td>
                                    <?= $t['nama']; ?>
                                </td>
                                <td>
                                    <?= $t['jk']; ?>
                                </td>
                                <td>
                                    <?= $t['tgl_lahir']; ?>
                                </td>
                                <td>
                                    <?= $t['dept']; ?>
                                </td>
                                <td>
                                    <?= $t['masuk']; ?>
                                </td>
                                <td>
                                    <?= $t['keluar']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="tampil-semua">
                <table id="example4" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Dept</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampilAll as $t) : ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $t['nik']; ?>
                                </td>
                                <td>
                                    <?= $t['nama']; ?>
                                </td>
                                <td>
                                    <?= $t['jk']; ?>
                                </td>
                                <td>
                                    <?= $t['tgl_lahir']; ?>
                                </td>
                                <td>
                                    <?= $t['dept']; ?>
                                </td>
                                <td>
                                    <?= $t['masuk']; ?>
                                </td>
                                <td>
                                    <?= $t['keluar']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>

<script>
    $('#example').DataTable();
</script>
<script>
    $('#example1').DataTable();
</script>
<script>
    $('#example2').DataTable();
</script>
<script>
    $('#example3').DataTable();
</script>
<script>
    $('#example4').DataTable();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tangkap elemen select
        var selectElement = document.querySelector('.form-control');

        // Tangkap elemen div yang berisi tabel-tabel
        var dataPalingCepatDiv = document.querySelector('.data-paling-cepat');
        var pulangPalingCepatDiv = document.querySelector('.pulang-paling-cepat');
        var palingLamaKerjaDiv = document.querySelector('.paling-lama-kerja');
        var tidakAbsenDiv = document.querySelector('.tidak-absen');
        var tampilSemuaDiv = document.querySelector('.tampil-semua');

        // Sembunyikan semua tabel saat halaman dimuat
        dataPalingCepatDiv.style.display = 'none';
        pulangPalingCepatDiv.style.display = 'none';
        palingLamaKerjaDiv.style.display = 'none';
        tidakAbsenDiv.style.display = 'none';
        tampilSemuaDiv.style.display = 'none';

        // Tambahkan event listener untuk perubahan pada elemen select
        selectElement.addEventListener('change', function() {
            // Sembunyikan semua tabel saat ada perubahan
            dataPalingCepatDiv.style.display = 'none';
            pulangPalingCepatDiv.style.display = 'none';
            palingLamaKerjaDiv.style.display = 'none';
            tidakAbsenDiv.style.display = 'none';
            tampilSemuaDiv.style.display = 'none';

            // Tampilkan tabel yang sesuai dengan opsi yang dipilih
            if (selectElement.value === 'datang') {
                dataPalingCepatDiv.style.display = 'block';
            } else if (selectElement.value === 'pulang') {
                pulangPalingCepatDiv.style.display = 'block';
            } else if (selectElement.value === 'lama') {
                palingLamaKerjaDiv.style.display = 'block';
            } else if (selectElement.value === 'tidak') {
                tidakAbsenDiv.style.display = 'block';
            } else if (selectElement.value === 'semua') {
                tampilSemuaDiv.style.display = 'block';
            }
        });
    });
</script>