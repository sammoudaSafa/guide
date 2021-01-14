<?php
function page_content( ) {
  echo ('Bienvenue dans le guide');

}
function count_users($users){
  $taille = count($users);
  return $taille;
}

function get_users(){
  {
    try {
        $pdo = connect();
        $req = $pdo->query('SELECT * FROM users');
        return $req;
    } catch (PDOException $e) {
        echo "message" . $e->getMessage();
        exit();
    }
} 
}
function get_user_by_id($iduser){
  $pdo = connect();
  try {
      $req = $pdo->prepare('SELECT * FROM users WHERE id=:iduser');
      $req->execute([":id" => $iduser]);
      return $req->fetch();
  } catch (PDOException $e) {
      echo "message" . $e->getMessage();
      exit();
  }
}

function verify_format(){
  $format= ['pdf'];
}

function add_renseignement(){
  
      try {
          $pdo = connect();  
          $req = $pdo->prepare("INSERT INTO users SET tel=? WHERE id:=1");
          $req->execute([$_POST['tel']]);
          header('Location: page4.php');
      } catch (PDOException $e) {
          echo "message" . $e->getMessage();
          exit();
      }
  }
?>