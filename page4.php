<?php
include_once'./inc_functions.php';
include_once'./dbconfig/dbconfig.php';
include_once './inc_header.php';
// $profil=get_user_by_id(1);
// var_dump($profil);
?>
<main>
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h3>User cherché</h3>

    <button type="button" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-arrow-left"></i>
      <a href="page3.php"> Précédent </a>
    </button>
    <button type="button" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-arrow-right"></i>
      <a href="page5.php"> Suivant </a>
    </button>
  </div>
    </div>
  </div>
</section>
<?php
include_once './inc_footer.php';
?>