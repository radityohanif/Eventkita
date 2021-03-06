<?= $this->extend('layout/peserta/template'); ?>
<?= $this->section('content'); ?>

<body class="bg-kuning">
    <!-- Foto Profil -->
    <h2 class="mt-150 text-center text-coklat fw-bolder mb-4">PROFIL SAYA</h2>
    <div class="row mt-1 justify-content-center">
        <div class="col text-center">
            <img src="<?= base_url('/img/foto profil/' . $profil['gambar_profil']); ?>" alt="foto profil saya"
                width="200" class="img-fluid rounded-circle shadow" />
        </div>
    </div>
    <!-- Foto Profil Akhir -->

    <!-- Biodata -->
    <fieldset disabled>
        <div class="row mt-5 justify-content-center">
            <div class="col-4">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="<?= $profil['nama']; ?>" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email"
                        placeholder="<?= $profil['email']; ?>" />
                </div>
                <div class="mb-3">
                    <label for="ttl" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="ttl"
                        placeholder="<?= $profil['tanggal_lahir']; ?>" />
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username"
                        placeholder="<?= $profil['username']; ?>" />
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="nohp"
                        placeholder="<?= $profil['no_hp']; ?>" />
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jk" placeholder="<?= $profil['jk']; ?>" />
                </div>
                <!-- </form> -->
            </div>
        </div>
    </fieldset>
    <!-- Akhir Biodata -->
    <div class="container mt-3">
        <div class="row justify-content-center mb-4">
            <div class="col-5">
                <a href="<?= base_url('peserta/edit') ?>" class="btn btn-primary container-fluid fw-bold py-2">Ubah Profil</a>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>