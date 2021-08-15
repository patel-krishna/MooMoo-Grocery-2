<header class="container-fluid">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="../index.php">
        <img src="../images/moomoologo.png" alt="MooMooGrocery Logo" />
      </a>

      <!-- Button toggler to set navbar items into toggle for mobile pages -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
          <!-- Dropdown menu for aisles -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Aisles</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../aisles/produce.php">Produce</a>
              <a class="dropdown-item" href="../aisles/bakery.php">Bakery</a>
              <a class="dropdown-item" href="../aisles/meat.php">Meat and Poultry</a>
              <a class="dropdown-item" href="../aisles/dairy.php">Dairy and Eggs</a>
              <a class="dropdown-item" href="../aisles/beverages.php">Beverages</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Login.php">Sign In</a>
          </li>
          <!-- Different color for register link -->
          <li class="nav-item">
            <a class="nav-link text-primary" href="../SignUp.php">Register</a>
          </li>
          <!-- Icon for shopping cart -->
          <li class="nav-item">
            <a class="nav-link" href="../cart.php">
              <span class="material-icons md-24">shopping_cart
              </span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>