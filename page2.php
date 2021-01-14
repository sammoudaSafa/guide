<?php
include_once'./inc_functions.php';
include_once'./dbconfig/dbconfig.php';
include_once './inc_header.php';
$req= get_users();
$query = $req->fetchAll();
$count=count_users($query);
// var_dump($count);
?>
<main>
    <h2><?php echo "Nombre des clients inscrits est: ". $count ?></h2>
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
    <button type="button" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-arrow-left"></i>
      <a href="index.php"> Précédent </a>
    </button>
    <button type="button" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-arrow-right"></i>
      <a href="page3.php"> Suivant </a>
    </button>
  </div>
    </div>
  </div>
</section>
<?php
include_once './inc_footer.php';
?>