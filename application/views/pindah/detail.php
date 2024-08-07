<?php $this->load->view('_partials/header.php'); ?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php $this->load->view('_partials/navbar.php'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Penduduk Pindah</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Detail</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="mb-0">
                                <p>Detail Data Penduduk Pindah</p>
                                <br>
                            </div>
                            <div class="col-md-3">
                                <a href="<?=base_url('/pindah/edit/'.$penduduk->id) ?>"class="btn btn-primary btn-sm ms-auto">
                                            <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                    
                        </div>
                        <div class="card-body">
                                <form id="pendudukForm" action="<?=site_url('Pindah/store/'.$penduduk->id); ?>" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="no_kk">No KK:</label>
                                                        <div class="input-group mb-4">
                                                    
                                                        <input class="form-control" value="<?=$penduduk->no_kk?>" type="text" name="no_kk" id="no_kk" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="no_kk">NIK:</label>
                                                            <input type="text" value="<?=$penduduk->nik?>" class="form-control" id="nik" name="nik" disabled>
                                                        </div>
                                                </div>
                                        </div>

                                            <!-- baris kedua -->
                                            <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama_lengkap">Nama Lengkap:</label>
                                                            <input type="text" value="<?=$penduduk->nama_lengkap?>" class="form-control" id="nama_lengkap" name="nama_lengkap" disabled>
                                                        </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pendidikan">Pendidikan:</label>
                                                            <input type="text" value="<?=$penduduk->pendidikan?>" class="form-control" id="pendidikan" name="pendidikan" disabled>
                                                        </div>
                                                        </div>
                                                
                                            </div>

                                            <!-- baris ke tiga -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status_dalam_keluarga">Status Dalam Keluarga:</label>
                                                            <input type="text" value="<?=$penduduk->status_dalam_keluarga?>" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" disabled>
                                                            
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="pekerjaan">Pekerjaan:</label>
                                                        <input type="text" value="<?=$penduduk->pekerjaan?>" class="form-control" id="pekerjaan" name="pekerjaan" disabled>

                                                    </div>
                                                </div>

                                            </div>

                                            <!-- baris empat -->
                                            <div class="row">
                                                    <div class="col-md-6">
                                                                <div class="form-group">
                                                                        <label for="status_perkawinan">Status Perkawinan:</label>
                                                                        <input type="text" value="<?=$penduduk->status_perkawinan?>" class="form-control" id="status_perkawinan" name="status_perkawinan" disabled>
                                                                    </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="alamat">alamat:</label>
                                                        <input type="text" value="<?=$penduduk->alamat?>" class="form-control" id="alamat" name="alamat" disabled>
                                                    </div>
                                                    </div>

                                                
                                            </div>

                                            <!-- baris ke lima -->
                                            <div class="row">
                                                <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                                    <input type="text" value="<?=$penduduk->jenis_kelamin?>" class="form-control" id="jenis_kelamin" name="jenis_kelamin" disabled>
                                                    
                                                </div>


                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="rt">RT:</label>
                                                        <input type="text" value="<?=$penduduk->rt?>" class="form-control" id="rt" name="rt" disabled>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="rw">RW:</label>
                                                        <input type="text"value="<?=$penduduk->rw?>"  class="form-control" id="rw" name="rw" disabled>
                                                    </div>
                                                    </div>
                                            </div>

                                            <!-- baris ke enam -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir:</label>
                                                    <input type="text" value="<?=$penduduk->tempat_lahir?>" class="form-control" id="tempat_lahir" name="tempat_lahir" disabled>
                                                </div>

                                                </div>
                                                <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="kelurahan">Kelurahan:</label>
                                                    <input type="text" value="<?=isset($penduduk->kelurahan) ? $penduduk->kelurahan : $penduduk->kelurahan_lama ?>" class="form-control" id="kelurahan" name="kelurahan" disabled>
                                                </div>

                                                </div>
                                            </div>

                                            <!-- baris ke tujuh -->
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                                                            <input type="text" value="<?=$penduduk->tanggal_lahir?>" class="form-control" id="tanggal_lahir" name="tanggal_lahir" disabled>
                                                        </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="agama">Agama:</label>
                                                        <input class="form-control" type="text" value="<?=$penduduk->agama?>" disabled>
                                                        </select>
                                                    </div>
                                                </div>          
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 ">
                                                  
                                                        <div class="form-group">
                                                            <label for="kelurahan_baru">Kelurahan:</label>
                                                            <input type="text" value="<?=isset($penduduk->kelurahan_baru) ? $penduduk->kelurahan_baru : ' ' ?>" class="form-control" id="kelurahan_baru" name="kelurahan_baru" disabled>
                                                        </div>

                                                </div>
                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="kota_baru">Kota / Kab Baru:</label>
                                                                        <input type="text" value="<?=isset($penduduk->kota_baru) ? $penduduk->kota_baru : ' ' ?>" class="form-control" id="kota_baru" name="kota_baru" disabled>
                                                                    </div>
                                                    </div>


                                                
                                            </div>

                                            <!-- baris ke delapan -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="file">File:</label>
                                                            <iframe src="<?php echo base_url(empty($penduduk->file) ? 'images/no_data.png' : 'images/' . $penduduk->file); ?>" width="100%" height="400px">
                                                            </iframe>    
                                                        </div>
                                                </div>

                                               

                                            </div>

                                            <div class="row">
                                            </div>
                                </form>   
                        </div>
                    </div>
            </div>
        </div>
</div>



<?php $this->load->view('_partials/footer.php'); ?>
