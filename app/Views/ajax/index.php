<?= $this->include('template/header'); ?>

<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Data Artikel</h1>

    <table class="table table-bordered" id="artikelTable">
        <thead class="table-primary text-center">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr><td colspan="4" class="text-center">Memuat data...</td></tr>
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>

<script>
$(document).ready(function () {
    function showLoading() {
        $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center">Memuat data...</td></tr>');
    }

    function loadData() {
        showLoading();
        $.ajax({
            url: "<?= base_url('ajax/getData'); ?>",
            method: "GET",
            dataType: "json",
            success: function (data) {
                let tableBody = "";
                if (data.length === 0) {
                    tableBody = '<tr><td colspan="4" class="text-center">Tidak ada data.</td></tr>';
                } else {
                    data.forEach(function (row) {
                        tableBody += `
                            <tr>
                                <td class="text-center">${row.id}</td>
                                <td>${row.judul}</td>
                                <td class="text-center">${row.status ?? '-'}</td>
                                <td class="text-center">
                                    <a href="<?= base_url('artikel/edit/') ?>${row.id}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">Hapus</button>
                                </td>
                            </tr>
                        `;
                    });
                }
                $('#artikelTable tbody').html(tableBody);
            },
            error: function () {
                $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center text-danger">Gagal memuat data.</td></tr>');
            }
        });
    }

    loadData();

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>" + id,
                method: "POST", // Gunakan POST karena HTML tidak dukung DELETE secara langsung
                data: { _method: 'DELETE' }, // Simulasikan DELETE
                success: function (res) {
                    if (res.status === 'OK') {
                        loadData();
                    } else {
                        alert('Gagal menghapus data.');
                    }
                },
                error: function () {
                    alert('Terjadi kesalahan saat menghapus.');
                }
            });
        }
    });
});
</script>

<?= $this->include('template/footer'); ?>
