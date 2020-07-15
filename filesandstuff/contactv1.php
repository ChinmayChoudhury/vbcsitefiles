<?php require_once('./mail_2020/sendmail.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css_2020/style.css">
    <title>Visual Bloggers' Club</title>
</head>

<body>

<!-- includes the navbar and header(jumbotron) -->

    <?php 
        include_once 'navbar2020.php';
    ?>


    <div class="container">
        <div class="row row-content">
        <div class="col-12">
            <h3>Get in touch with us</h3>
            <br>
        </div>
        <div class="col-12 col-md-9">
            <form method="post">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telnum" class="col-12 col-md-2 col-form-label">Phone Number</label>
                    <div class="col-md-10">
                        <input type="tel" class="form-control" id="telnum" name="telnum" placeholder="Phone Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emailid" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                            <label class="form-check-label" for="approve">
                                <strong>May we contact you?</strong>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <select class="form-control" id="contactway" name="contactway">
                            <option value="phone">Phone</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="feedback" class="col-md-2 col-form-label">Your Message</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="feedback" name="feedback" rows="12">
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                       <!--  <button type="submit" class="btn btn-secondary">
                            Send
                        </button> -->
                        <input type="submit" name="submit" value="Submit" class="btn btn-secondary">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

   
    <?php include_once 'footer.php'; ?>

       <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#contactway').attr({"disabled":"False"});
                $("#approve").change(function(){
                    if(this.checked){
                        $('#contactway').prop("disabled", false);
                        // alert('checked');
                    }
                    else{
                        $("#contactway").prop("disabled", true);   
                    }
                });
                
            });
        </script>
    </body>
</html>