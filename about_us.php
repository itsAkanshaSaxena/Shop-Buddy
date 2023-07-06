<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="Footer.css" />
    <script
      src="https://kit.fontawesome.com/1bf9f84d4d.js"
      crossorigin="anonymous"
    ></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap");

      .oneimg {
        width: 100%;
      }
      body {
        font-family: Arial, Helvetica, sans-serif;
        /* line-height: 1.5; */
        margin: 0;
        padding: 0;
      }

      html {
        box-sizing: border-box;
      }

      *,
      *:before,
      *:after {
        box-sizing: inherit;
      }

      .column {
        float: left;
        width: 25%;
        margin-bottom: 16px;
        padding: 0 8px;
      }

      .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: 25px;
      }

      .about {
        padding: 10px;
        text-align: center;
      }

      .about-section {
        margin-left: 10px;
        margin-right: 10px;
        padding: 70px;
        text-align: center;
        background-color: white;
        color: white;
      }

      .row {
        /* border:2px solid red; */
        margin-left: 15px;
        margin-right: 15px;
      }
      .container {
        padding: 0 16px;
        line-height: 1.5rem;
        font-family: 'Times New Roman', Times, serif;
      }

      .container::after,
      .row::after {
        content: "";
        clear: both;
        display: table;
      }

      .title {
        color: grey;
      }

      .button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        margin-bottom: 0.5rem;
      }

      .button:hover {
        background-color: #555;
      }
      .member-details {
        margin-bottom: 0.5rem;
        margin-top: 0.5rem;
      }

      @media screen and (max-width: 890px) {
        .column {
          width: 100%;
          display: block;
        }
      }
    </style>
  </head>

  <body>
    <div class="about">
      <!-- <h1>Who We Are</h1> -->
      <img src="images/aa.jpg" class="oneimg" />
    </div>

    <div class="about-section">
      <h1 style="color: black;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;margin-bottom: 0.5rem;font-style: italic;">Who We Are</h1>
      <p
        style="
          color: black;
          font-size: 20px;
          font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
          font-style: italic;
        "
      >
        With the trendiest, freshest, and most unique styles from across India
        and the world, SHOP BUDDY invites you to express your personal style
        fearlessly, and with a confidence and optimism that cannot be easily
        shaken.
        
        We bring you the trendiest and most exclusive brands from around the world to your wardrobe. Forget scouring the net for what’s hot globally, we’ve got you covered.
      </p>
    </div>

    <h2 style="text-align: center;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Meet Our Team</h2>

    <div class="row">
      <div class="column">
        <div class="card">
          <img
            src="images/pp.jpg "
            style="width: 100%; height: 410px"
          />
          <div class="container">
            <h2 class="member-details">Pragya Singh</h2>
            <p class="title">Web Developer</p>
            <p>I am a third year computer science student pursuing B.C.A from Banasthali Vidyapith.</p>
            <p class="member-details">pragya@gmail.com</p>
            <p><a href="contact.php"><button class="button">Contact</button></a></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img
            src="images/a11.jpg"
            style="width: 100%; height: 410px"
          />
          <div class="container">
            <h2 class="member-details">Akansha Saxena</h2>
            <p class="title">Web Developer</p>
            <p>I am a third year computer science student pursuing B.C.A from Banasthali Vidyapith.</p>
            <p class="member-details">akansha@gmail.com</p>
            <p><a href="contact.php"><button class="button">Contact</button></a></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img
            src="images/s11.jpg"
            style="width: 100%; height: 410px"
          />
          <div class="container">
            <h2 class="member-details">Shreya Singh</h2>
            <p class="title">Web Developer</p>
            <p>I am a third year computer science student pursuing B.C.A from Banasthali Vidyapith.</p>
            <p class="member-details">shreya@gmail.com</p>
            <p><a href="contact.php"><button class="button">Contact</button></a></p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img
            src="images/r11.jpg"
            style="width: 100%; height: 410px"
          />
          <div class="container">
            <h2 class="member-details">Riya Bhardwaj</h2>
            <p class="title">Web Developer</p>
            <p>I am a third year computer science student pursuing B.C.A from Banasthali Vidyapith.</p>
            <p class="member-details">riya@gmail.com</p>
            <p><a href="contact.php"><button class="button">Contact</button></a></p>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
<?php require('footer.inc.php')?>       