<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>

        <?php if(isset($_SESSION['auth_user'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['auth_user']['user_name']; ?> 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li>
          <form action="allcode.php" method="POST">
            <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
          </form>

              </li>
            </ul>
          </li>
          <?php else : ?>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">  
        <li class="nav-item">
          <a class="nav-link" href="index.php"></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li> -->
        <?php endif; ?>
        
      
    </div>
  </div>
</nav>