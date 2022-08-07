<?php
session_start();

?>
<!DOCTYPE html>
<html>
<?php $title = "Welcome To BDS"; ?>
<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>

    <div class="container cont">

        <?php require 'message.php'; ?>

        <div class="container cont">

            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark text-light">Welcome To Blood Distribution System</div>
                        <div class="card-body">
                            <dd>
                                Welcome to BDS. Here you can have direct connection with blood banks and request blood when needed.
                                Start using <a href="register.php" class="brand"> Blood Distribution System </a> now.
                            </dd>

                            <dt style="color: red;">
                                *Please make sure to show proper hospital document while collecting blood from blood banks.*
                            </dt>
                            <dt style="color: red;">
                                *Blood banks are requested to check the documents properly and strictly while providing blood.*
                            </dt>
                            <br>
                            <br>
                            <dt>INTERESTING THINGS TO KNOW ABOUT BLOOD:</dt>
                            1. Do you know that "O-" blood type is known as universal donor. This means that person having this blood type
                            can donate blood to anyone. Although O is known as the universal blood donor, negative blood types cannot be donated to a positive blood group
                            member. Because the O– group lacks both blood group and Rh factor antigens, it is a universal donor.<br>
                            2. Do you know that "AB+" blood type is know as universal acceptor. Because it has no antibodies to A, B, or Rh, AB+ blood is a universal acceptor and may receive red blood cells from any
                            kind of blood donor. This means person having this blood type can accept blood from any blood groups.<br> <br>
                            <dt>Here is a table for blood types compatibility:</dt> <br>

                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 mb-5 ml-auto mr-auto">
                                <table class="table table-striped table-responsive">

                                    <tr>
                                        <th>Blood Type</th>
                                        <th>Can Receive From</th>
                                        <th>Can Donate To</th>
                                    </tr>
                                    <tr>
                                        <td>A+</td>
                                        <td>A+, A-, O+ and O-</td>
                                        <td>A+ and AB+</td>
                                    </tr>
                                    <tr>
                                        <td>B+</td>
                                        <td>B+, B-, O+ and O-</td>
                                        <td>B+ and AB+</td>
                                    </tr>
                                    <tr>
                                        <td>AB+</td>
                                        <td>All blood types</td>
                                        <td>AB+ onlys</td>
                                    </tr>
                                    <tr>
                                        <td>O+</td>
                                        <td>O+ and O-</td>
                                        <td>O+, A+, B+ and AB+</td>
                                    </tr>
                                    <tr>
                                        <td>A-</td>
                                        <td>A- and O-</td>
                                        <td>A+, A-, AB+ and AB-</td>
                                    </tr>
                                    <tr>
                                        <td>B-</td>
                                        <td>B- and O-</td>
                                        <td>B+, B-, AB+ and AB-</td>
                                    </tr>
                                    <tr>
                                        <td>AB-</td>
                                        <td>AB-, A-, B- and O-</td>
                                        <td>AB+ and AB-</td>
                                    </tr>
                                    <tr>
                                        <td>O-</td>
                                        <td>O- only</td>
                                        <td>All blood types</td>
                                    </tr>

                                    <br>
                                </table>
                            </div>

                            <em>
                                <dt>Disclaimer:</dt>
                                <dd>Above mentioned information is not to be practiced without consulting with doctors or medical personals. <br>
                                    All the mentioned things are for information purpose only. Nothing mentioned above is encouraged to practice.</dd>
                            </em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>

</body>

</html>