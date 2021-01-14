<?php
include_once'./inc_functions.php';
include_once'./dbconfig/dbconfig.php';
include_once './inc_header.php';
if (!empty($_POST['add_btn'])) {
if (!empty($_POST['tel'])) {
    add_renseignement();
  }
}
?>
<main>
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
    <form name="login" action="" method="POST">
            <fieldset>
                <label for="tel"><strong> Ajouter votre Téléphone:</strong></label><br>
                <input class="input" type="text" name="tel" placeholder="téléphone"><br>
                <input name='add_btn' class="btn" type="submit" value="Ajouter">
            </fieldset>
        </form>
    <button type="button" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-arrow-left"></i>
      <a href="page2.php"> Précédent </a>
    </button>

    <button type="button" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-arrow-right"></i>
      <a href="page4.php"> Suivant </a>
    </button>
  </div>
    </div>
  </div>
</section>
<?php
include_once './inc_footer.php';
?>