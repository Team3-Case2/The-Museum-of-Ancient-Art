<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Filters | Ancient Future</title>
<meta name="description" content="The Museum of Ancient Art in Aarhus, Denmark is museum dedicated to the ancient art and cultural history of the mediterranean countries, in particular Ancient Greece, Etruscan civilization and Ancient Rome.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/au_segl-inv.svg">
<meta property="og:type" content="website" />
<meta property="og:url" content="http://mackonis.dk" />
<link href="css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link rel="icon" type="image/png" href="img/favicon.png" />
</head>
<body>
	<div class="wrapper">
<div class="container-fluid wrapper_filters"> 
 
 <!-- Header --> 
<div class="container-fluid"> 
      <div class="row">
          <div class="col-xs-12"> 
             <header class="bgimage">
                 <h1>Antikmuseet Aarhus</h1>
             </header>
          </div>
    </div>

  <!-- End of Header --> 

  <!-- Navigation --> 
  
    <div class="row">
      <div class="col-xs-12"> 
          <ul>
             <li><a class="btn btn-default btn-lg btn-block" href="audio.html">Audio</a></li>
             <li><a href="index.html"><img class="nav_logo center-block" src="img/logo.png" alt="logo"></a></li>
             <li><a class="btn btn-default btn-lg btn-block active" href="filters.php">Filters</a></li>
          </ul>
      </div>
    </div>
</div>
  

<div class="container">
      <div class="row">
            <div class="col-xs-12">  
      <?php

      if ( isset( $_POST["sendPhoto"] ) ) {
        processForm();
      } else {
        displayForm();
      }

      function processForm() {
        if ( isset( $_FILES["photo"] ) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK ) {
          if ( $_FILES["photo"]["type"] != "image/jpeg"  ) {
            echo "<p>JPEG photos only, thanks!</p>";
          } elseif ( !move_uploaded_file( $_FILES["photo"]["tmp_name"], "photos/" . basename( $_FILES["photo"]["name"] ) ) ) {
            echo "<p>Sorry, there was a problem uploading that photo.</p>" . $_FILES["photo"]["error"] ;
          } else {
            displayThanks();
          }
        } else {
          switch( $_FILES["photo"]["error"] ) {
            case UPLOAD_ERR_INI_SIZE:
              $message = "The photo is larger than the server allows.";
              break;
            case UPLOAD_ERR_FORM_SIZE:
              $message = "The photo is larger than the script allows.";
              break;
            case UPLOAD_ERR_NO_FILE:
              $message = "No file was uploaded. Make sure you choose a file to upload.";
              break;
            default:
              $message = "Please contact your server administrator for help.";
          }
          echo "<p>Sorry, there was a problem uploading that photo. $message</p>";
        }
      }

      function displayForm() {
      ?>
          <h1>Uploading a Photo</h1>

          <p>Please enter your name and choose a photo to upload, then click Send Photo.</p>

          <form action="filters.php" method="post" enctype="multipart/form-data">
            <div style="width: 30em;">
              <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
			
              <label for="visitorName">Your name</label>
              <br>
              <input type="text" name="visitorName" id="visitorName" value="" />
				<br>
              <label for="photo">Your photo</label>
              <input type="file" name="photo" id="photo" value="" />
			
              <div style="clear: both;">
                <input type="submit" name="sendPhoto" value="Send Photo" id="send"/>
              </div>

            </div>
          </form>
      <?php
      }
      function displayThanks() {
        $uploads_dir = "photos/";
        $watermarked_dir = "watermarked/";
      $name = $_FILES["photo"]["name"];
        $myImage = imagecreatefromjpeg( $uploads_dir.$name );
      $myCopyright = imagecreatefrompng( "img/logo.png" );

      $destWidth = imagesx( $myImage );
      $destHeight = imagesy( $myImage );
      $srcWidth = imagesx( $myCopyright );
      $srcHeight = imagesy( $myCopyright );

      $destX = ($destWidth - $destWidth);
      $destY = ($destHeight - $destHeight);

      imagecopymerge( $myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth, $srcHeight, 50 );

      imagejpeg( $myImage,$watermarked_dir.$name );
      imagedestroy( $myImage );
      imagedestroy( $myCopyright );

      ?>
          <h1>Thank You</h1>
          <p>Thanks for uploading your photo<?php if ( $_POST["visitorName"] ) echo ", " . $_POST["visitorName"] ?>!</p>
          <p>Here's your photo:</p>
          <p><img class="img-responsive" src="<?php echo $watermarked_dir.$name ?>" alt="Photo" /></p>
      <?php
      }
      ?>
        </div>
      </div>
</div>

    <div class="row">
      <h1 id="photo-gallery">Photo Gallery</h1>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/1.jpg"> <img class="img-responsive center-block" src="img/1.jpg" alt="1" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
         <a href="img/2.jpg"> <img class="img-responsive center-block" src="img/2.jpg" alt="2" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/3.jpg"> <img class="img-responsive center-block" src="img/3.jpg" alt="3" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/4.jpg"> <img class="img-responsive center-block" src="img/4.jpg" alt="4" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/5.jpg"> <img class="img-responsive center-block" src="img/5.jpg" alt="5" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/6.jpg"> <img class="img-responsive center-block" src="img/6.jpg" alt="6" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/7.jpg"> <img class="img-responsive center-block" src="img/7.jpg" alt="7" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
         <a href="img/8.jpg"> <img class="img-responsive center-block" src="img/8.jpg" alt="8" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/9.jpg"> <img class="img-responsive center-block" src="img/9.jpg" alt="9" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/10.jpg"> <img class="img-responsive center-block" src="img/10.jpg" alt="10" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/11.jpg"> <img class="img-responsive center-block" src="img/11.jpg" alt="11" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/12.jpg"> <img class="img-responsive center-block" src="img/12.jpg" alt="12" width="70%"></a>
      </div>
       <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/13.jpg"> <img class="img-responsive center-block" src="img/13.jpg" alt="13" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
         <a href="img/14.jpg"> <img class="img-responsive center-block" src="img/14.jpg" alt="14" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/15.jpg"> <img class="img-responsive center-block" src="img/15.jpg" alt="15" width="70%"></a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="img/16.jpg"> <img class="img-responsive center-block" src="img/16.jpg" alt="16" width="70%"></a>
      </div>



    </div> <!-- End of Row-->

</div> <!-- End of Container-->

    <div class="row">
      <div class="col-xs-12">
        <div id="particles-js">
              <address>
              <strong>Address:</strong> <a target="_blank" href="https://www.google.lt/maps/place/Victor+Albecks+Vej+3,+8000+Aarhus+C/@56.1700719,10.1971269,17z/data=!3m1!4b1!4m5!3m4!1s0x464c3fc6dc1ed8bd:0x9341ede49c365d02!8m2!3d56.1700719!4d10.1993156"><i>Victor Albecks Vej 3, 8000 Aarhus, Denmark</i></a><br/>
              <strong>Phone:</strong> <a href="tel:87 16 11 06"><i>87 16 11 06</i></a><br/>
              <strong>Email:</strong> <a href="mailto:cas@au.dk"><i>cas@au.dk</i></a>
              <h5>© Team 3. The Museum of Ancient Art in Aarhus, 2017. All rights reserved.</h5>
              </address>
        </div>
      </div>
    </div>

</div><!-- /.wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>