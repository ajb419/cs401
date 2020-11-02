<?php
  $pagename = "Home";
  require_once "header.php";
?>

<body>
  <div id="business_message">
    <h2>Let me tell you what I'm all about...</h2>
  </div>
  <div class="message">
    <p>I have spent nearly 15 years working in home remodeling. I specialize in interior remodeling as well as home maintenance. Think kitchens and bathrooms as well as handyman services.</p>
    <p>I am not a large scale business. I have a few hand picked guys that give me a hand keeping up with the work load. Other than that it's just me and my truck operating out of the garage of my home. This business model allows me to provide an unparalleled
      quality control and craftsmanship at better than market prices. Also, unlike larger contractors who search for bigger jobs, I thrive on small to mid-size projects. If you are in need of tile work, cabinet installs, bathroom/kitchen upgrades,
     drywall, painting or many other home remodeling services, consider giving me a call or sending me an email!</p>
  </div>

  <?php
    require_once "contactInfo.php";
  ?>

  <!-- Thumbnail images -->
  <div id="row">
    <div class="column">
      <img src="pics/bathroomRemodel.JPG" alt="full bathroom remodel">
    </div>
    <div class="column">
      <img src="pics/glassTileAfter.JPG" alt="glass tile backsplash and vent hood install ">
    </div>
    <div class="column">
      <img src="pics/stoneFireplace.jpg" alt="floor to cieling stone on fireplace">
    </div>
    <div class="column">
      <img src="pics/subwayCloseUp.JPG" alt="tile backsplash">
    </div>
    <div class="column">
      <img src="pics/garageClosetAfter.JPG" alt="garage closet build">
    </div>
    <div class="column">
      <img src="pics/tileFloor.JPG" alt="tile floor">
    </div>
  </div>

  <div id="personal_message">
    <h3>Let's get personal...</h3>
  </div>
  <div class="message">
    <p>Nobody enjoys Joe Smo contractor coming to their home, setting up shop, and acting like he owns the place. Let me tell you a little about myself. I am a husband, father, home remodeling contractor, and computer science major. My wife, Felicia, son, Troy, and I
    sold our house in the Philadelphia suburbs 4 years ago and moved into a 5th wheel trailer in search of mountains. After spending an incredible year on the road we decided to settle in Boise. Having already successfully operated a similiar business in the Philadelphia
    area for 4 years I decided to set up Seasonal Improvements here in Boise. I also enrolled in the computer science program at BSU and am currently in my senior year. Although it seemed like life couldn't get any cooler, we welcomed my daughter Brookelynn to the world in
    March of 2019, making her our only natural born Idahoan! Well, that's the bulk of my story. I hope you feel like you know me well enough to have me come to your home for your next project!</p>
  </div>
</body>

<?php
  require_once "footer.php";
?>
