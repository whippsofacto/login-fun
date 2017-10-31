
      <?php
      $page_title = "dogFish";
      require("includes/header.php");
      ?>

      <?php  // display the form ?>
      <div class="text-center">
        <img class='logo img-fluid' src='./imgs/mobile.png' alt="graphic of a smarphone held horizontally against a white background"/>
      </div>
      <h1 class='center whitespace'><a href="index.php"> Welcome to Dogfish </a></h1>
      <h3 class="whitespace"> Login </h3>
          <form action="login.php" method="post">
            <div class="form-group">
              <label for="email">Email Address: </label>
              <input class="form-control form-control-lg" id="email" type="text" name="email" size="20" maxlength="60"/>
            </div>
            <div class="form-group">
             <label for="password"> Password: </label>
             <input class="form-control form-control-lg" id="password" type="password" name="pass" size="20" maxlength="20" />
            </div>
            <div class="form-group">
              <input class=" btn-primary btn btn-outline-dark" type="submit" name="submit" value="Login"/>
            </div>
          </form>

          <?php
          // print any error messages IF they exist
          if(isset($errors) && !empty($errors)){
            echo "<h2>Woops!</h2>";
              foreach ($errors as $msg){
                echo " <p>
                  $msg\n
                    </p> ";
                  }
            echo "Please. Try again. :]";
          }
         ?>


      <?php require("includes/footer.php");?>
