<?php
$this->load->view('include/v_header');
$this->load->view('include/v_sidebar');
?>

<style>
    .box-header {
        width: 100%;
    }

    .box-header .filter-date {
        gap: 10px;
        display: flex;
        flex-wrap: wrap;
        align-items: end;
    }

    .box-header .filter-date .form-group {
        display: flex;
        flex-wrap: wrap;
    }

    .box-header .filter-date .form-group:last-of-type {
        gap: 10px;
    }

    .box-header .filter-date .form-group label {
        font-weight: 500;
    }

    .box-header .filter-date .form-group #btn_export {
        display: none;
    }

    @media (max-width: 1000px) {

        .box-header .filter-date {
            width: 100%;
            justify-content: center;
        }
    }

    .toasts-list {
        position: fixed;
        z-index: 9999;
        right: 0;
        top: 0;
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 20px;
        transition: .3s ease-in-out;
    }

    .toasts-list .toasts .toasts-body {
        min-width: 300px;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;
        padding: 12px 20px;
        border-radius: 10px;
        background: #dd4b39;
    }

    .toasts-list .toasts .toasts-body p {
        margin: 0;
    }

    .toasts-list .toasts .toasts-body .fa {
        margin-bottom: -3px !important;
    }

    .toasts-list .toasts .toasts-body p,
    .toasts-list .toasts .toasts-body .fa {
        color: #ffff;
    }

    .table .badge-warning {
        background: #dd4b39 !important;
    }

    .table .badge-success {
        background: #00a65a !important;
    }

    .table .badge-primary {
        background: #3c8dbc !important;
    }
</style>

<div class="content-wrapper">

    <div class="toasts-list">

    </div>

    <section class="content-header">
        <h1>
            Laporan
            <input type="hidden" name="pagenomer" id="pagenomer" value="1">
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Laporan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="filter-date">
                            <div class="form-group">
                                <label for="dari_tgl">Dari tanggal</label>
                                <input class="form-control" type="date" id="dari_tgl" require>
                            </div>

                            <div class="form-group">
                                <label for="ke_tgl">Ke tanggal</label>
                                <input class="form-control" type="date" id="ke_tgl" require>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="btn_search">Cari</button>
                                <button class="btn btn-success" id="btn_export">Export</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id='tamuList'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Datang</th>
                                    <th>Photo</th>
                                    <th>Identitas</th>
                                    <th>Keperluan</th>
                                    <th>Tujuan Ke</th>
                                    <th>ID Kartu Tamu</th>
                                    <th>Lampiran</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div id='pagination'></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
$this->load->view('include/v_footer');
?>

<script>
    $('.filter-date').on('click', '#btn_search', function() {
        let dari_tgl = $('#dari_tgl').val();
        let ke_tgl = $('#ke_tgl').val();

        $.ajax({
            url: 'laporan/filterByTanggal',
            method: 'POST',
            dataType: 'json',
            data: {
                dari_tgl: dari_tgl,
                ke_tgl: ke_tgl
            },
            success: function(response) {
                if (response.error) {
                    toasts(response.error);
                } else {
                    if (response.length > 0) {
                        $('#btn_export').show();
                        displayData(response);
                    } else {
                        toasts('Data tidak ditemukan');
                    }
                }
            }
        });

        function displayData(data) {
            let tableBody = $('#tamuList tbody');
            tableBody.empty();

            $.each(data, function(index, row) {
                let jenis_kelamin = (row.jenkel == 'L' ? 'Laki-laki' : 'Perempuan');

                if (row.photo) {
                    var foto = '<img width="100" height="100" class="profile-user-img img-responsive" src="<?php echo base_url() ?>assets/images/foto_tamu/' + row.photo + '" onclick="modalimage(this.src)">';
                } else {
                    var foto = '<img width="100" height="100" class="img-circle" src="<?php echo base_url() ?>assets/images/user_blank.png">';
                }

                if (row.status_kartu == 'y') {
                    var status_kartu = '<span class="badge badge-warning">Belum dikembalikan</span>'
                } else if (!row.serial_kartu) {
                    var status_kartu = ''
                } else {
                    var status_kartu = '<span class="badge badge-success">Selesai</span>'
                }

                if (row.lampiran) {
                    var lampiran = '<a href="' + '<?php echo base_url('assets/file_lampiran/'); ?>' + row.lampiran + '"><span class="badge badge-primary">Lampiran</span></a>'
                } else {
                    var lampiran = ''
                }

                let newRow = '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + row.tgl_datang + '</td>' +
                    '<td>' + foto + '</td>' +
                    '<td>' +
                    '<b>' + row.nama + '</b>' + ' (' + jenis_kelamin + ') ' +
                    '<br>' + row.alamat + '<br>' + 'No HP: ' + '<b>' + row.no_hp + '</b>' +
                    '</td>' +
                    '<td>' + row.keperluan + '</td>' +
                    '<td>' + row.tujuan + ' - ' + row.namatujuan + '</td>' +
                    '<td>' + (row.serial_kartu ? row.serial_kartu : 'Data tidak ada') +
                    '<br>' + status_kartu +
                    '</td>' +
                    '<td>' + lampiran + '</td>' +
                    '</tr>';
                tableBody.append(newRow);
            });
        }

        function toasts(message) {
            let toastElement = $(`
                <div class="toasts">
                    <div class="toasts-body">
                        <i class="fa fa-exclamation-triangle"></i>
                        <p id="toasts-message">${message}</p>
                    </div>
                </div>
            `);

            $('.toasts-list').append(toastElement.fadeIn(200));

            setTimeout(function() {
                toastElement.fadeOut(500, function() {
                    $(this).remove();
                });
            }, 3000);
        }
    });

    $('.filter-date').on('click', '#btn_export', function() {
        let dari_tgl = $('#dari_tgl').val();
        let ke_tgl = $('#ke_tgl').val();
        
        let url = '<?= base_url()?>laporan/to_excel?dari_tgl=' + dari_tgl + '&ke_tgl='+ ke_tgl + '';

        window.open(url)
    });
</script>

</body>

</html>