<?php include 'header.php';
include 'connect.php';

if (!isset($_SESSION['login'])) {
  # code...
  
?>
  <script>
    alert("Non connecté. Veuillez d'abord vous connecter.");
    window.location.assign("login.php");
  </script>
  <?php
} else {
  $email = $_COOKIE['email'];
  $user_sql = "select email,name from user where email = '$email'";

  $user_res = $conn->query($user_sql);

  if ($user_res->num_rows > 0) {
    # code...
    $user_row = $user_res->fetch_assoc();
  } else {
  ?>
    <script>
      alert("Non connecté. Veuillez d'abord vous connecter.");
      window.location.assign("log.php?out");
    </script>
<?php
  }
}

?>
<!-- <div id="dash-pop" class="dash-pop" data-toggle="modal" data-target="#myModal">Please buy subcription to access these videos<h6 onclick="dashPopHide()">X</h6></div>   -->
<div class="dashboard">
  <center>
    <h2>Bienvenue <?php echo $user_row['name']; ?>! Sélectionnez votre cours. </h2>
    <script>
      dashPopHide();
    </script>
    <a href="chapter.php?b=1">
      <div style="background: url(images/micro.jpg);color: #333;" class="dash-opt">Administration des Systèmes d’exploitation</div>
    </a>
    <a href="chapter.php?b=2">
      <div style="background: url(images/macro.jpg);color: #f0f8ff;" class="dash-opt">PHP</div>
    </a>
    <a href="chapter.php?b=3">
      <div style="background: url(images/micro.jpg);color: #333;" class="dash-opt">Langage C</div>
    </a>
    <a href="chapter.php?b=4">
      <div style="background: url(images/macro.jpg);color: #f0f8ff;" class="dash-opt">Java </div>
    </a>
  </center>
</div>
<?php include 'footer.php' ?>