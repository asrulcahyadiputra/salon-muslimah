<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header" style="box-shadow: 7px 0px 7px rgba(0,0,0,0.75);">
            <div class="col-md-6">
                <h2>DASHBOARD</h2>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class=" breadcrumb mt-3 d-flex justify-content-end" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="row mt-5">
        <section class=" col-md-6 section">
            <!-- <div class="card" style="background-color:#e8e9eb; border-radius:20px; box-shadow: 0px 30px 10px -20px rgba(0,0,0,0.75);"> -->
            <div class="card" style="
                background: rgba(255, 255, 255, 0);
                border-radius: 16px;
                backdrop-filter: blur(1.2px);
                -webkit-backdrop-filter: blur(1.2px);
                border: 1px solid rgba(255, 255, 255, 0.29);
                box-shadow: 1px 4px 5px 3px rgba(0,0,0,0.75);
                ">
                <form action="/user/update/<?= user()->id; ?>" method="post" enctype="multipart/form-data" style="margin-top: -1.5rem;">
                    <input type="hidden" name="sampulLama" value="<?= user()->user_image ?>">
                    <div class="col-md text-center">
                        <img class="img-thumbnail img-preview" style="width: 80px; height: 80px; margin-top: 40px; border-radius: 50%;" src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" alt="gambar">
                        <div class="form-group row mt-3">
                            <label for="nama-user" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama-user" name="fullname" value="<?= user()->fullname ?>">
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="user_image" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="user_image" name="user_image" onchange="previewImg()">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    </div>
                                    <label class="custom-file-label" for="user_image"><?= user()->user_image; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" style="text-align: left; margin-left: 0.1rem;">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>