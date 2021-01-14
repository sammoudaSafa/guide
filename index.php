<?php
include_once'./inc_functions.php';
include_once'./dbconfig/dbconfig.php';
include_once './inc_header.php';
$req= get_users();
$query = $req->fetchAll();
// var_dump($query);
?>

<main>
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
    <table class="cols">
    <?php
    foreach ($query as $user){
    ?>
    <tr>
				<td class="col col1">Bonjour <?php echo $user->prenom ;?></td>
      </tr>
    <?php } ?>
			<tr>
				<td class="col col1"><?php echo page_content ()?></td>
      </tr>
		</table>
    <button type="button" class="btn btn-sm btn-outline-secondary">
      <i class="fas fa-arrow-right"></i>
      <a href="page2.php"> Suivant </a>
    </button>
  </div>
    </div>
  </div>
</section>
<?php
include_once './inc_footer.php';
?>