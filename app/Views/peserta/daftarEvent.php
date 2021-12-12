<?= $this->extend('layout/peserta/template'); ?>
<?= $this->section('content'); ?>

<style>
  .card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
    height: 200px;
  }
  </style>

<body class="bg-kuning">

  <!-- Flasher message-->
  <div class="row mt-100 justify-content-center">
    <div class="col-10">
      <div class="mb-3">
        <?php if (session()->getFlashdata('error')): ?>
        <div class="row mt-5">
          <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error'); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <?php if (session()->getFlashdata('success')): ?>
        <div class="row mt-5">
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success'); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- Akhir Flasher message-->

  <!-- Search -->
  <h1 class="mt-150 text-center text-coklat fw-bolder mb-4">DAFTAR EVENT</h1>
  <div class="row justify-content-center">
    <div class="col-md-9 col-10">
      <form class="d-flex shadow" action="http://localhost/eventkita/public/peserta/cariEvent" method="POST">
        <input class="form-control fs-md-4 p-md-3" type="text" placeholder="Cari event yang mau kamu ikuti.." aria-label="Search" name="search" />
        <button class="btn btn-primary" type="submit" style="width: 100px;">
          <i class="bi bi-search fs-3"></i>
        </button>
      </form>
    </div>
  </div>
  <!-- Search Akhir -->


  <?php  
  
    if(count($daftar_event) == 0)
    {
      echo '
      <div class="container text-center mt-5">
      <div class="row">
        <div class="col">
          <h3 class="mt-5">Maaf🙏, Event dengan nama "'. $keyword .'" tidak ditemukan</h3>
        </div>
      </div>
    </div>';
    }
  
  ?>

  <!-- Daftar Event -->
  <div class="container mt-5">
    <div class="row mt-5 justify-content-start">
      <?php 
        $index = 0;
        foreach($daftar_event as $event): 
        $status = $statusMulai[$index];
      ?>
      <div class="col-md-4 my-3">
        <a href="<?= base_url('peserta/detail/' . $event['id']) ?>">
          <div class="card shadow">
            <img width="214" height="380" src="<?= base_url('img/poster webinar/' . $event['poster']); ?>" class="card-img-top" width="400" height="400" />
            <div class="card-body">
              <h5 class="card-title"><?= $event['nama']; ?></h5>
              <?php if($status == 'Sudah Mulai')
                {
                  echo '<span class="badge bg-danger">Sudah Mulai</span>';
                }else
                {
                  echo '<span class="badge bg-primary">Belum Mulai</span>';
                }
              ?>
              <p class="card-text mt-3">
                <i class="bi bi-calendar-date-fill"></i>
                <?= $jadwal_event[$index]; ?>
                <br />
                <i class="bi bi-person-fill"></i>
                <?= $event['jumlah_pendaftar']; ?> Peserta
              </p>
            </div>
          </div>
        </a>
      </div>
      <?php 
      $index++;
      endforeach; ?>
    </div>
  </div>
  <!-- Akhir Daftar Event -->

  <!-- Pagination -->
<?php if($cari == false) : ?>
  <nav aria-label="Page navigation example">
    <ul class="pagination pagination-lg justify-content-center mt-5">
      <li class="page-item">
        <?php if($halamanAktif>1): ?>
          <a class="page-link" href="<?= base_url('peserta/daftarEvent/'.$halamanAktif-1)?>">Previous</a>
        <?php endif ; ?>
      </li>
      <?php for($i = 1 ; $i <= $jumlahHalaman ; $i++) : ?>
        <?php if($i == $halamanAktif): ?>
          <li class="page-item active"><a class="page-link" href="<?= base_url('peserta/daftarEvent/'.$i)?>"><?= $i ?></a></li>
        <?php endif; ?>
        <?php if($i != $halamanAktif): ?>
          <li class="page-item"><a class="page-link" href="<?= base_url('peserta/daftarEvent/'.$i)?>"><?= $i ?></a></li>
        <?php endif; ?>
      <?php endfor; ?>
      
      <li class="page-item">
        <?php if($halamanAktif<$jumlahHalaman): ?>
          <a class="page-link" href="<?= base_url('peserta/daftarEvent/'.$halamanAktif+1)?>">Next</a>
        <?php endif ; ?>
      </li>
    </ul>
  </nav>
<?php endif; ?>
<!-- Akhir Pagination -->
  <?= $this->endSection(); ?>