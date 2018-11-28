
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
  <body>

<!-- Navbar -->
<div class="header-nav">
  <a href="#about">About</a>
  <a href="#download">Download</a>
  <a href="#game">Game</a>
  <a href="#contact">Contact</a>
</div>

<!-- Header + start of main-wrapper -->
<div class="main-wrapper">
  <div class="wrapper">
  <h1 id="about"> Welcome to DepffThrone </h1>
  <?php
     if (isset($_GET['error'])) {
       //empty filed error message
       if ($_GET['error'] == "emptyfields") {
         echo '<p class="error"> Fill in all fields! </p>';
       }
       //invalid email error message
       else if ($_GET['error'] == "invalidmail"){
         echo '<p class="error">Invalid e-mail!</p>';
       }
       //reCAPTCHA error message
       else if ($_GET['error'] == "reCAPTCHAfail"){
         echo '<p class="error">You have not validated the reCAPTCHA. Please try again!</p>';
       }
     }
     // create a success message if message was sent
       else if (isset($_GET["mailsent"])) {
         if ($_GET["mailsent"] == "successful") {
           echo '<script language="javascript">';
           echo 'alert("message successfully sent")';
           echo '</script>';
       }
     }
   ?>
  </div>

<!-- Blurred image -->
  <div class="wrapper">
  <!--  "https://warriors.fandom.com/ru/wiki/%D0%A4%D0%B0%D0%B9%D0%BB:697d27e61a951bcce39eb4ced2ec9f3a.jpg" alt="image of the Lich King from Warcraft 3 The Frozen Throne" title="Link to Source"-->
    <section class="showcase" alt="Image of the Lich King from Warcraft 3 The Frozen Throne">
      <div class="content">
        <img src="assets/logo2.png" class="logo" alt="DeppfThrone Logo">
          <div class="title">
            <h2> Welcome To DepffThrone </h2>
          </div>
      </div>
    </section>
  </div>

<!-- Services grid -->
  <section class="services">
    <div class="grid-container grid-3">
      <div>
        <i class="fas fa-desktop fa-3x"></i>
        <h3>About</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod.</p>
      </div>
      <div>
        <i class="fas fa-chalkboard-teacher fa-3x"></i>
        <h3>Guides</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod.</p>
      </div>
      <div>
        <i class="fas fa-flag-checkered fa-3x"></i>
        <h3>TypeRacer</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod.</p>
      </div>
    </div>
  </section>
</div>

<!-- new main to fix gridding issue -->
<div class="main-wrapper-2">
<div class="wrapper">
  <!-- Keyboard image with download -->
  <div class="keyboard-text">
    <h2 id="download"> Hotkeys! </h2>
    <p> These are the hotkeys that you will most likely be using when playing Warcraft 3, The Frozen Thone. Use the typeracer game below to test you typing speed, so you can be as fast as possible when you use the hotkeys</p>
  </div>
  <div class="keyboard-image">
    <a href="assets/keyboard.jpg" download> <button type="button" name="button"> Download! </button> </a>
    <img src="assets/keyboard.jpg" alt="Image of a keyboard">
  </div>
</div>

<!-- Type Racer Game -->
<div class="wrapper">
  <div class="typeracer">
    <!-- Instructions -->
    <div class="instructions">
      <h5>Instructions</h5>
      <p id="game">Type each word in the given amount of seconds to score. To play again, just type the current word. Your score will reset. Please ensure that you type in lowercase letters when playing the game.</p>
    </div>

    <!-- Word & Input -->
    <div class="input">
      <p>Type The Given Word Within <span id="seconds"> </span> Seconds:</p>
      <h2 id="current-word"></h2>
      <input type="text" placeholder="Start typing..." id="word-input">
      <h4 id="message"></h4>

      <!-- Time & Score Columns -->
      <h3>Time Left:
        <span id="time">0</span>
      </h3>
      <h3>Score:
        <span id="score">0</span>
      </h3>
    </div>
  </div>
</div>

<!-- float clear -->
<div class="clr">
</div>

<!-- contact form -->
<div class="wrapper">
  <h2 class="contact-h2">Contact Us </h2>
  <p id="contact"></p>
  <form class="contact-form" action="contactform.php" method="post">
    <?php
    // Check if the user already tried submitting data.
    // If they have, return that data.

    // checking username.
    if (!empty($_GET["name"])) {
      echo '<input type="text" name="name" placeholder="Full Name" value="'.$_GET["name"].'">';
    }
    else {
      echo '<input type="text" name="name" placeholder="Full Name">';
    }

    // checking e-mail.
    if (!empty($_GET["mail"])) {
      echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
    }
    else {
      echo '<input type="text" name="mail" placeholder="E-mail">';
    }
    ?>

    <input type="text" name="subject" placeholder="Subject">
    <textarea name="message" rows="8" cols="80" placeholder="Message"></textarea>
    <button type="submit" name="submit"> Send Mail </button>
    <div class="g-recaptcha" data-sitekey="6Lf-YHUUAAAAADJOgQFyUZCrXGqKKxuVGrwg3uMT" data-theme="dark" style="transform:scale(1);-webkit-transform:scale(1);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
      <div class="clr"> </div>
  </form>
</div>

<!-- End of main-wrapper -->
</div>

<div class="footer-wrapper">
  <footer>
    <ul>
      <li><span>Helpful links </span> </li>
      <li> <a href="#">Find the game</a>  </li>
      <li> <a href="#"> About me</a></li>
      <li> <a href="#"> Play the typeracer game </a></li>
      <span class="copyright"> <li> Copyright &copy; 2018 Alex Wood  </li></span>
    </ul>

    <div class="footer-sm">
      <a href="#">
        <img src="assets/youtube.png" alt="Youtube Icon">
       </a>
      <a href="#">
        <img src="assets/twitter.png" alt="Twitter Icon">
      </a>
      <a href="#">
        <img src="assets/linkedin.png" alt="Linked-In Icon">
      </a>
    </div>
  </footer>
</div>

<script src="main.js"></script>

</body>
</html>
