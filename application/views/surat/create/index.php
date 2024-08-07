<?php $this->load->view('_partials/header.php'); ?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php $this->load->view('_partials/navbar.php'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Surat</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Buat Surat</h6>
            </nav>
        </div>
    </nav>

<div class="container-fluid py-4">
        <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center mb-0">
                                <p>Buat Surat</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?=site_url('Surat/previewSurat'); ?>" method="post">
                            <div class="row">
                                        <div class="col-md-6">  
                                            <div class="form-group">
                                                <label for="jenis_surat">Jenis Surat:</label>
                                                <select class="form-control" id="jenis_surat" name="jenis_surat">
                                                    <option value="" selected disabled> === Pilih ===</option>
                                                    <option value="domisili"> Surat Keterangan Domisili</option>
                                                    <option value="pindah"> Surat Keterangan Pindah </option>
                                                    <option value="meninggal"> Surat Keterangan Meninggal </option>
                                                    <option value="kelahiran"> Surat Keterangan Kelahiran </option>
                                                </select>
                                            </div>
                                        </div>
                                        
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="dynamic_select">NIK:</label>
                                                    <select class="form-control" id="dynamic_select" name="nik">
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                </div>

                            <div class="row">
                                                <div class="col-md-6">
                                                <button type="submit" id="submitBtn" class="btn btn-primary">Generate</button>
                                                </div>
                                                        
                                            </div>


                            </form>
                        
                        </div>
                    </div>
           
        </div>
</div>



<?php $this->load->view('_partials/footer.php'); ?>
<script>
$(document).ready(function() {
            // Initialize Select2 on the dynamic select
            $('#dynamic_select').select2({
                placeholder: "=== Pilih ===",
                tags: false,
                minimumInputLength: 2,
            });

            $('#jenis_surat').change(function() {
                var jenis_surat = $(this).val();
                var url = '';

                if (jenis_surat == 'domisili') {
                    url = '<?php echo site_url('penduduk/get_options'); ?>';
                } else if (jenis_surat == 'pindah') {
                    url = '<?php echo site_url('pindah/get_options'); ?>';
                } else if (jenis_surat == 'meninggal') {
                    url = '<?php echo site_url('kematian/get_options'); ?>';
                } else if (jenis_surat == 'kelahiran') {
                    url = '<?php echo site_url('kelahiran/get_options'); ?>';
                }

                if (url !== '') {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#dynamic_select').empty();
                            $('#dynamic_select').append('<option value="" disabled selected>===pilih===</option>');
                            $.each(data, function(key, value) {
                                $('#dynamic_select').append('<option value="'+ value.nik +'">'+ value.nik +'</option>');
                            });

                           
                        },
                        error: function() {
                            alert('Failed to fetch data. Please try again.');
                        }
                    });
                }
            });
        });
    </script>