<?php
session_start();
if (isset($_SESSION['hid'])) {
  header("location:bloodrequest.php");
} elseif (isset($_SESSION['rid'])) {
  header("location:sentrequest.php");
} else {
?>
  <!DOCTYPE html>
  <html>
  <?php $title = "Register"; ?>
  <?php require 'head.php'; ?>

  <body>
    <?php include 'header.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card rounded">
            <ul class="nav nav-tabs justify-content-center bg-light" style="padding: 20px">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#banks">Blood Bank</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#receivers">Receivers</a>
              </li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane container active" id="banks">

                <form action="file/hospitalReg.php" method="post" enctype="multipart/form-data">
                  <input type="text" name="hname" placeholder="Blood Bank Name" class="form-control mb-3" required>
                  <input type=" text" name="hcity" placeholder="Address" class="form-control mb-3" required>
                  <input type="tel" name="hphone" placeholder="Phone Number" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Phone Number must start from 0,6,7,8 or 9 and must have 10 to 12 digit">
                  <input type="email" name="hemail" placeholder="Email" class="form-control mb-3" required>
                  <input type="password" name="hpassword" placeholder="Password" class="form-control mb-3" required minlength="6">
                  <fieldset>
                    <legend style="font-size: medium ;">Blood Bank Verification Photo</legend>
                    <input type="file" name="file" value="" required>
                  </fieldset>
                  <input type="submit" name="hregister" value="Register" class="btn btn-primary btn-block mt-3 mb-4">
                </form>

              </div>


              <div class="tab-pane container fade" id="receivers">

                <form action="file/receiverReg.php" method="post" enctype="multipart/form-data">
                  <input type="text" name="rname" placeholder="Full Name" class="form-control mb-3" required>
                  <select name="rbg" class="form-control mb-3" required>
                    <option disabled="" selected="">Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                  <input type="text" name="rcity" placeholder="Address" class="form-control mb-3" required>
                  <input type="tel" name="rphone" placeholder="Phone Number" class="form-control mb-3" required pattern="[0,6-9]{1}[0-9]{9,11}" title="Phone Number must start from 0,6,7,8 or 9 and must have 10 to 12 digit">
                  <input type="email" name="remail" placeholder="Email" class="form-control mb-3" required>
                  <input type="password" name="rpassword" placeholder="Password" class="form-control mb-3" required minlength="6">
                  <input type="submit" name="rregister" value="Register" class="btn btn-primary btn-block mb-4">
                </form>

              </div>
            </div>
            <a href="login.php" class="text-center mb-4" title="Click here">Already have account?</a>
          </div>
        </div>
      </div>
    </div>
    <?php require 'footer.php' ?>
  </body>

  </html>
<?php } ?>