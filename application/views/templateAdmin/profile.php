<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Profile</h1>
<div class="card" style="width: 18rem;">
  <img src="<?php echo base_url('assets/img/profile/') .$user['image']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nama : Manager</h5>
    <p class="card-text">Nama : <?php echo $user['name']; ?></p>
    <p class="card-text">Email : <?php echo $user['email']; ?></p>
    <p class="card-text">Tanggal Daftar : <?php echo date(' d F Y', $user['date_created']); ?></p>
    
  </div>
</div>
</div>
</div>