<?php $this->load->view('_partials/header.php'); ?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php $this->load->view('_partials/navbar.php'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Admin</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Add Data</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="mb-0">
                                <p>Form Admin</p>
                                <br>
                            </div>
                    
                        </div>
                        <div class="card-body">
                                <form id="adminForm" action="<?=site_url('Admin/store/'); ?>" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="nama_lengkap">nama lengkap</label>
                                                        <div class="input-group mb-4">
                                                        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="username">Username:</label>
                                                        <input type="text" class="form-control" id="username" name="username" required>
                                                    </div>
                                                </div>  
                        
                                        </div>

                                            <!-- baris kedua -->
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="role">role:</label>
                                                                <select class="form-control" id="role" name="role" required>
                                                                    <option value="" selected disabled> === Pilih ===</option>
                                                                    <option value="1"> Superadmin</option>
                                                                    <option value="2"> Kepala Desa </option>
                                                                    <option value="3"> Sekretaris </option>
                                                                </select>
                                                            </div>
                                                        </div> 

                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                        <label for="passsword">Password</label>
                                                                        <input type="text" class="form-control" id="password" name="password" required>
                                                                    </div>
                                                    </div>
                                            </div>

                                            <!-- baris ke tiga -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                <button type="submit" id="submitBtn" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                </form>   
                        </div>
                    </div>
            </div>
        </div>
</div>



<?php $this->load->view('_partials/footer.php'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Select the form and submit button
    var form = document.getElementById('adminForm');
    var submitBtn = document.getElementById('submitBtn');

    // Attach a click event listener to the submit button
    submitBtn.addEventListener('click', function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Check if all required inputs are filled
        var requiredInputs = form.querySelectorAll('input[required], select[required], textarea[required]');
        var isValid = true;
        requiredInputs.forEach(function(input) {
            if (!input.value) {
                isValid = false;
            }
        });

        // If all required inputs are filled, show Sweet Alert confirmation dialog
        if (isValid) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to submit the form.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5e72e4',
                cancelButtonColor: '#f5365c',
                confirmButtonText: 'Yes'
            }).then((result) => {
                // If the user confirms, submit the form
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } else {
            // If any required input is empty, show an error message
            Swal.fire({
                title: 'Oops...',
                text: 'Please fill in all required fields.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});

// validation

</script>
