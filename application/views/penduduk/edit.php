<?php $this->load->view('_partials/header.php'); ?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php $this->load->view('_partials/navbar.php'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Penduduk</li>
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
                    <p>Edit Data Penduduk</p>
                    <br>
                </div>
               
            </div>
            <div class="card-body">
            <form action="<?=site_url('penduduk/update/'.$penduduk->id); ?>" enctype="multipart/form-data" method="post">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="no_kk">No KK:</label>
                                        <div class="input-group mb-4">
                                    
                                        <input class="form-control" value="<?=$penduduk->no_kk?>" type="text" name="no_kk" id="no_kk" required>
                                        </div>
                                    </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_kk">NIK:</label>
                                            <input type="text" value="<?=$penduduk->nik?>" class="form-control" id="nik" name="nik" required>
                                        </div>
                                </div>
                            </div>

                            <!-- baris kedua -->
                            <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap:</label>
                                                    <input type="text" value="<?=$penduduk->nama_lengkap?>" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                                </div>
                                        </div>

                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pendidikan">Pendidikan:</label>
                                                    <select class="form-control" id="pendidikan" name="pendidikan">
                                                    <option value="" selected disabled> === Pilih ===</option>
                                                                        <?php foreach($master_data as $data) { 
                                                                            if($data->deskripsi == 'pendidikan')
                                                                        { $optpd = json_decode($data->value);
                                                                            foreach ($optpd as $item) {
                                                                                $selected = ($item == $penduduk->pendidikan) ? 'selected' : '';
                                                                                ?>
                                                                                <option value="<?php echo $item; ?>" <?php echo $selected; ?>><?php echo $item; ?></option>
                                                                            <?php  
                                                                            } 
                                                                        }
                                                                    } ?>
                                                    </select>
                                                </div>
                                        </div>
                                
                            </div>

                            <!-- baris ke tiga -->
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_dalam_keluarga">Status Dalam Keluarga:</label>
                                            <select class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" require>
                                            <option value="" selected disabled> === Pilih ===</option>
                                                <?php foreach($master_data as $data) { 
                                                    if($data->deskripsi == 'status_dalam_keluarga')
                                                { $opts = json_decode($data->value);
                                                    foreach ($opts as $item) {
                                                        $selected = ($item == $penduduk->status_dalam_keluarga) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?php echo $item; ?>" <?php echo $selected; ?>><?php echo $item; ?></option>
                                                    <?php  
                                                } 
                                            }
                                            } ?>
                                            </select>
                                            
                                        </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan:</label>
                                        <select class="form-control" id="pekerjaan" name="pekerjaan">
                                        <option value="" selected required> === Pilih ===</option>
                                                                <?php foreach($master_data as $data) { 
                                                                    if($data->deskripsi == 'pekerjaan')
                                                                { $optPE = json_decode($data->value);
                                                                    foreach ($optPE as $item) {
                                                                        $selected = ($item == $penduduk->pekerjaan) ? 'selected' : '';
                                                                        ?>
                                                                        <option value="<?php echo $item; ?>" <?php echo $selected; ?>><?php echo $item; ?></option>
                                                                    <?php  
                                                                } 
                                                                }
                                                            } ?>
                                                        </select>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- baris empat -->
                            <div class="row">
                                    <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="status_perkawinan">Status Perkawinan:</label>
                                                        <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                                                        <option value="" selected required> === Pilih ===</option>
                                                                <?php foreach($master_data as $data) { 
                                                                    if($data->deskripsi == 'status_kawin')
                                                                { $optsp = json_decode($data->value);
                                                                    foreach ($optsp as $item) {
                                                                        $selected = ($item == $penduduk->status_perkawinan) ? 'selected' : '';
                                                                        ?>
                                                                        <option value="<?php echo $item; ?>" <?php echo $selected; ?>><?php echo $item; ?></option>
                                                                    <?php  
                                                                } 
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">alamat:</label>
                                        <input type="text" value="<?=$penduduk->alamat?>" class="form-control" id="alamat" name="alamat" required maxlength="50" onkeyup="limitCharacters(this, 50)">
                                    </div>
                                    </div>

                                
                            </div>

                            <!-- baris ke lima -->

                            <div class="row">
                                <div class="col-md-6">

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="" selected required> === Pilih ===</option>
                                    <option value="LAKI-LAKI" <?php echo ($penduduk->jenis_kelamin == 'LAKI-LAKI') ? 'selected' : ''; ?>> LAKI-LAKI</option>
                                    <option value="PEREMPUAN" <?php echo ($penduduk->jenis_kelamin == 'PEREMPUAN') ? 'selected' : ''; ?>> PEREMPUAN </option>
                                        
                                    </select>
                                </div>


                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rt">RT:</label>
                                        <input type="number" value="<?=$penduduk->rt; ?>"min="1" max="10" id="rt" name="rt" class="form-control" required>                            
                                    </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="rw">RW:</label>
                                            <input type="number" value="<?=$penduduk->rw; ?>"min="1" max="10" id="rt" name="rw" class="form-control" required>
                                        </div>
                                    </div>
                            </div>

                            <!-- baris ke enam -->

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir:</label>
                                    <input type="text" value="<?=$penduduk->tempat_lahir?>" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                </div>

                                </div>
                                <div class="col-md-6">

                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan:</label>
                                    <input type="text" value="<?=$penduduk->kelurahan?>" class="form-control" id="kelurahan" name="kelurahan" required>
                                </div>

                                </div>
                            </div>

                            <!-- baris ke tujuh -->


                            <div class="row">
                                <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                                            <input type="date" value="<?=$penduduk->tanggal_lahir;?>"class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                        </div>

                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="agama">Agama:</label>
                                        <select class="form-control" id="agama" name="agama">
                                        <option value="" selected required> === Pilih ===</option>
                                                                <?php foreach($master_data as $data) { 
                                                                    if($data->deskripsi == 'agama')
                                                                { $optA = json_decode($data->value);
                                                                    foreach ($optA as $item) {
                                                                        $selected = ($item == $penduduk->agama) ? 'selected' : '';
                                                                        ?>
                                                                        <option value="<?php echo $item; ?>" <?php echo $selected; ?>><?php echo $item; ?></option>
                                                                    <?php  
                                                                
                                                            } 
                                                                }
                                                            } ?>
                                        </select>
                                    </div>
                                    

                                </div>

                            
                            </div>

                            <!-- baris ke delapan -->

                            <div class="row">
                                    <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="file">File:</label>
                                                    <input type="file" class="form-control" id="file" name="file">
                                                </div>

                                    </div>
                                

                                <div class="col-md-6">

                                <?php if (!empty($penduduk->file)) { ?>
                                <iframe src="<?php echo base_url('images/' . $penduduk->file); ?>" width="100%" height="400px"></iframe>
                            <?php } else { ?>   

                                <div class="text-center">
                                <iframe src="<?php echo base_url(empty($penduduk->file) ? 'images/no_data.png' : 'images/' . $penduduk->file); ?>" width="100%" height="400px"></iframe>

                                <p>no data</p>
                                </div>
                                
                            
                            <?php } ?>                                                    

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                <button type="submit" id="submitBtn" class="btn btn-primary">Update</button>
                                </div>
                            
                            </div>
                        
                    
                    </div>
            </form>
          </div>
        </div>
      </div>
</div>
<?php $this->load->view('_partials/footer.php'); ?>

<script>
function limitCharacters(inputField, maxLength) {
  var currentLength = inputField.value.length;

  if (currentLength > maxLength) {
    inputField.value = inputField.value.substring(0, maxLength);
  }
}
</script>