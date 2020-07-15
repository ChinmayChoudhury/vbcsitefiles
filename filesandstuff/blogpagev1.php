<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        
        <!-- these are new links for BS v4 and FA, changes created in 2020 -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
        <link rel="stylesheet" href="css_2020/style.css">
        <link rel="stylesheet" type="text/css" href="css_2020/blogs.css">
        <!-- new links end -->

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Visual Bloggers' Club - VBCVIT | We are Visual Bloggers' Club of VIT University and our motto is to provide a platform for students to give wings to their ideas through Visual Blogging. ">
        <meta name="author" content="Visual Bloggers' Club - VBCVIT | Website by Devendra Parhate">
        <meta name="generator" content="Visual Bloggers' Club - VBCVIT">

        <?php
        $title = "Visual Bloggers' Club";
        $type = "article";
        $description = "Visual Bloggers' Club";
        $keyword = "Blog, Visual Bloggers' Club, VBC, VIT University,  TECHNOLOGY, HUMOR, TV SERIES, TRAVEL, SPORTS, IMAGE GALLERY, EDUCATION, FOOD, FASHION, MOTIVATIONAL, RELATIONSHIP, ENTERTAINMENT, PHILOSOPHY";
        $image = "/assets/img/2.png";
        if (isset($_REQUEST['p_id'])) {
            include_once './login/db.php';
            include_once './login/cleansql.php';
            $the_post_id = clean($_REQUEST['p_id']);
            $query = "SELECT `post_title`,`post_author`,`post_img`, `post_tags` FROM posts WHERE post_id=$the_post_id LIMIT 1";
            $select_post_query = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_post_query);
            $post_title = html_entity_decode($row['post_title']);
            $post_tags = html_entity_decode($row['post_tags']);
            $post_author = $row['post_author'];
            if (empty($row['post_img'])) {
                $post_img = "https://vbcvit.com/assets/img/blogcover.jpg";
            } else {
                $post_img = $row['post_img'];
                if ($post_img != "h") {
                    $post_img = "https://vbcvit.com" . $post_img;
                }
            }

            $title = "$post_title - Blog | Visual Bloggers' Club";
            $type = "article";
            $description = $post_author;
            $image = $post_img;
            $keyword = "Blog, $post_title , $post_author, $post_tags";
        } else if (isset($_REQUEST['user'])) {
            include_once './login/db.php';
            include_once './login/cleansql.php';

            $id = clean($_REQUEST['user']);
            $query = "SELECT *  FROM  user WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $userImg = $row['img'];
                if (empty($userImg)) {
                    $userImg = 'upload/img/user.png';
                }
                $usern = $row['usern'];
                $name = $row['fname'] . " " . $row['lname'];
                $hobbies = $row['hobbies'];
                $about = $row['about'];

                $institute = $row['institute'];
                $dob = $row['dob'];

                $title = $name;
                if ($name == " " || empty($name)) {
                    $title = $usern;
                }
                $title .= " - Profile | Visual Bloggers' Club, VIT";
                $type = "profile";
                $about = $name;
                $image = $userImg;
                $keyword = "Blog, Profile, Writer, Author, $usern, $name, $about";
            }
        } else if (isset($_REQUEST['category'])) {
            include_once './login/db.php';
            include_once './login/cleansql.php';
            $cat_title = "";
            $catId = clean($_REQUEST['category']);
            $query = "SELECT `cat_title`  FROM categories WHERE `cat_id`='$catId' LIMIT 1";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $cat_title = $row['cat_title'];
            }
            $title = "$cat_title - Category | Visual Bloggers' Club, VIT";
            $type = "Post Category";
            $description = "$cat_title | Visual Bloggers' Club";
            $keyword = "Blog, Profile, Writer, Author, $cat_title";
        }
        ?>
        <title> <?php echo $title; ?> </title>
        <meta property="og:type"               content="<?php echo $type; ?>" />
        <meta property="og:title"              content="<?php echo $title ?>" >
        <meta property="og:description"        content="by <?php echo $description ?> " >
        <meta property="og:image"              content="<?php echo $image ?>" >
        <meta name="keyword"                   content="<?php echo $keyword ?> ">

        <link rel="icon" type="image/png" href="assets/img/vlog.png">

        <!-- Bootstrap Core CSS old, deactivated on 2020 -->
        <!-- <link href="css/bp.min.css" rel="stylesheet"> -->

        <!-- Custom CSS old, deactivated on 2020 -->
        <!-- <link href="css/bloghome.css" rel="stylesheet"> -->

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



        <!-- OLD LINKS, old, deactivated on 2020 -->
        
<!--        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:600" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,500' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:600,400,300'    rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
-->
        <!-- jQuery -->
        <!-- <script src="js/jquery.js"></script> -->
    </head>

    <body>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=173496979681010";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!--Overlay Force login-->	
        <?php if (!isset($_SESSION['LAST_ACTIVITY']) && !isset($_REQUEST['about']) && !isset($_REQUEST['p_id']) && 0) { ?>

            <div id="popup" class="panel" style="position: fixed">
                <h1 style="text-align:center"><i class="fa fa fa-sign-in"> </i> Sign In</h1>
                <form action="login/signin.php" method="post" >
                    <br>
                    <div class="form-group">
                        <label for="title"><i class="fa fa-envelope"></i>&nbsp;Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="title"><i class="fa fa-key"></i>  &nbsp;Password</label>
                        <input type="password" class="form-control" name="passwd">
                    </div>
                    <div class="form-group"> 
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </div>
                </form>
                <div> <a href="login/forgotPassword.php"> Forgot password </a> </div>
                <hr>
                <h2 ><a href="login/"><i class="fa  fa-link"></i><a href="login/">Register</a></h2>
            </div>

        <?php } ?>

        <!--googleoff: index-->
        <!-- Navigation -->
         <?php// include_once './navigation.php'; ?> 
        <?php include_once './navbar2020.php'; ?>
        <!--googleon: index-->

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->

                <div class="col-md-9" style="padding: 0px; margin:-15px;">

                    <?php
                    include_once './login/db.php';
                    include_once './login/cleansql.php';
                    if (!isset($_REQUEST['p_id']) && !isset($_REQUEST['user']) && !isset($_REQUEST['about'])) {
                        ?>
                        <div class="col-md-12">
                            <?php
                            $query1 = "SELECT COUNT(*) FROM posts WHERE ";
                            if (isset($_REQUEST['category'])) {
                                $post_category_id = clean($_REQUEST['category']);
                                $query1 .= " post_category_id = $post_category_id AND ";
                            }
                            if (isset($_REQUEST['originals'])) {
                                $post_category_id = clean($_REQUEST['originals']);
                                $query1 .= " type=-1 AND ";
                            }
                            $query1 .= "NOT post_status = 0 AND NOT post_status='-'";
                            $result1 = mysqli_query($connection, $query1);
                            $row = mysqli_fetch_array($result1);
                            $countPost = $row[0];


                            $page = 1;
                            if (isset($_GET['page']))
                                $page = clean($_GET['page']);
                            $from = ($page - 1) * 15;
                            $query1 = "SELECT post_id FROM posts WHERE ";
                            if (isset($_REQUEST['category'])) {
                                $post_category_id = clean($_REQUEST['category']);
                                $query1 .= " post_category_id=$post_category_id AND ";
                            }
                            if (isset($_REQUEST['originals'])) {
                                $query1 .= " type=-1 AND ";
                            }

                            $query1 .= " NOT post_status='0' AND NOT post_status='-' ORDER BY post_date DESC, post_status DESC, post_group DESC LIMIT $from, 15";


                            $query = "SELECT * FROM posts AS T1,($query1) AS T2 WHERE T1.post_id = T2.post_id";

                            $select_all_posts_query = mysqli_query($connection, $query);
                            if (mysqli_num_rows($select_all_posts_query) == 0) {
                                ?>
                                <div class="panel panel-heading text-center"><h3>No post was posted here</h3></div>
                                <?php
                            }
                            if ($select_all_posts_query) {
                                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

                                    $post_id = $row['post_id'];
                                    $post_author_id = $row['post_author_id'];
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = date("M d, y", strtotime($row['post_date']));

                                    $post_content = html_entity_decode($row['post_incerpt']);

                                    $post_img = $row['post_img'];

                                    if (empty($post_content) && empty($post_img)) {
                                        $post_content = html_entity_decode($row['post_content']);
                                        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post_content, $image);

                                        $post_img = "";
                                        if (isset($image['src']))
                                            $post_img = $image['src'];

                                        $post_content = substr(strip_tags($post_content, '<br/><br>'), 0, 200);
                                        $post_content = preg_replace('/\W\w+\s*(\W*)$/', '...', $post_content);


                                        $query = "UPDATE posts SET post_img='{$post_img}', post_incerpt='{$post_content}' WHERE post_id={$post_id} ";
                                        mysqli_query($connection, $query);
                                    }

                                    $post_group = $row['post_group'];
                                    ?>

                                    <div class="col-md-4" style="padding: 5px">
                                        <div class="blogCard incerpt col-md-12"style="padding:0px 0px 0px 0px;">

                                            <div class="col-md-12"  style="padding:0px 0px 0px 0px;  height:400px; text-overflow:ellipsis; overflow:hidden;">
                                                <div class="col-md-12" style="background-color: rgb(253, 253, 253);; padding:7px 5px 10px 5px; margin-top: 0px; ">
                                                    <h1 class="blog-heading text-center" >
                                                        <a href="blogpage.php?p_id=<?php echo $post_id ?> "><?php echo $post_title; ?></a>
                                                    </h1>

                                                    <p style="text-align: center; color:#aaa; font-weight:500; font-family: 'Open Sans'">  
                                                        <span style="color: rgba(119, 119, 119, 0.3);" class="glyphicon glyphicon-user "></span>
                                                        <a style="color: #999;" href="blogpage.php?user=<?php echo $post_author_id; ?>" > <?php echo $post_author ?>&nbsp;&nbsp;</a>   
                                                        <?php /*                                                         * if ($post_group != '') { ?>
                                                          <span class="glyphicon glyphicon-certificate"></span> <?php echo $post_group . " &nbsp;&nbsp; "; ?>
                                                          <?php }  * */
                                                        ?>
                                                        <?php echo $post_date . "  " ?>  &nbsp;&nbsp;
                                                        <br>
                                                    </p>
                                                </div>
                                                <?php if (!empty($post_img)) { ?>
                                                    <div  class="col-md-12"  style=" background: url('<?php echo $post_img ?>') no-repeat center;  background-size:cover; height:250px; background-position: center top;" > 

                                                    </div>
                                                <?php } else { ?>	
                                                    <div style=" padding: 10px; text-overflow:ellipsis; overflow:hidden;">
                                                        <div ><?php echo $post_content ?></div>
                                                    </div> 
                                                <?php } ?>	
                                            </div>
                                            <?php if (empty($post_img)) { ?>
                                                <div class="col-md-12 fadeout" style="position: absolute; bottom: 60px;    height: 4em;"></div> 
                                            <?php } ?>
                                            <div class="col-md-12"  style="padding:10px; background-color: rgb(251, 251, 251);">

                                                <a  href="blogpage.php?p_id=<?php echo $post_id; ?>" >
                                                    <img class="img-circle img-thumbnail cBtn" src="upload/img/read.png" width="40px"> 
                                                    <strong style="color:#666; font-family: 'Open Sans'" >Read </strong> 
                                                </a>
            <!--                                        &nbsp;&nbsp;<span style="color: rgba(119, 119, 119, 0.3);" class="glyphicon glyphicon-comment "></span> 
                                                <span class="fb-comments-count" data-href="www.vbcvit.com/blogpage.php?p_id=<?php echo $post_id; ?>">0</span>-->
                                                <span style="padding-top: 8px; -webkit-filter: grayscale(50%); filter: grayscale(50%)"  class=" pull-right fb-like" data-href="https://www.vbcvit.com/blogpage.php?p_id=<?php echo $post_id; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></span>

                                            </div>

                                        </div>

                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>
                        <div class="col-lg-12 text-center" >
                            <ul class="pagination ">
                                <?php
                                $numPages = ceil(($countPost) / 15);
                                $current = 1;
                                if (isset($_GET['page']))
                                    $current = clean($_GET['page']);

                                $minpg = $current - 5;
                                $maxpg = $current + 5;
                                if ($minpg < 1) {
                                    $maxpg += abs($minpg);
                                    $minpg = 1;
                                }
                                if ($maxpg > $numPages)
                                    $maxpg = $numPages;

                                for ($num = $minpg; $num <= $maxpg; $num++) {
                                    $print = $num;
                                    if ($num == $minpg && $minpg != 1)
                                        $print = "&laquo;";
                                    else if ($num == $maxpg && $maxpg != $numPages)
                                        $print = "&raquo;";

                                    $get = "";
                                    if (isset($_REQUEST['category']))
                                        $get .= "&category=$post_category_id";
                                    if (isset($_REQUEST['originals']))
                                        $get .= "&originals=1";

                                    $addclass = "";
                                    if ($current == $num)
                                        $addclass = "active";
                                    echo "<li class='$addclass'><a href='blogpage.php?page={$num}{$get}'>$print</a></li>";
                                }
                                ?>
                            </ul> </div>
                        <?php
                    } else if (isset($_REQUEST['p_id'])) {
                        include_once 'post.php';
                    } else if (isset($_REQUEST['user'])) {
                        include_once 'userprofile.php';
                     } //else if (isset($_REQUEST['about'])) {
                    //     // include_once 'aboutusnew.php';
                    //     include_once 'aboutus_2020.php';
                    // }
                    ?>


                </div>

                <!-- Blog Sidebar Widgets Column -->
                <!--googleoff: index-->
                <!--linked to div at line 456 <div class="col-md-3 sidebar hidden-xs hidden-sm" > -->
                    <?php //if (isset($post_sidebar) && !empty($post_sidebar)) { ?>
                        <!-- <div class="blogCard " >
                            <?php// echo html_entity_decode($post_sidebar); ?>
                        </div> -->
                    <?php //} ?>
                    <!-- Blog Search Well -->
                    <!--                    <div class="panel" >
                    
                        <script>
                        (function() {
                          var cx = '011847552146555743854:mfk0z9lkijm';
                          var gcse = document.createElement('script');
                          gcse.type = 'text/javascript';
                          gcse.async = true;
                          gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                          var s = document.getElementsByTagName('script')[0];
                          s.parentNode.insertBefore(gcse, s);
                        })();
                      </script>
                      <gcse:search></gcse:search>

                    </div>-->

                    <?php
                        //include_once 'adds.php';
                    ?>


                    <!-- Blog Categories Well, deactivated 2020 -->
                    <!--       <div style="height:500px; " class="fb-page" data-href="https://www.facebook.com/vbcvit" data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vbcvit" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vbcvit">Visual Bloggers Club Vit</a></blockquote>&nbsp;</div>
 -->
                   
                    <?php
//                        $query = "SELECT `cat_title`, `cat_id` FROM categories";
//                        $select_categories_sidebar = mysqli_query($connection, $query);
                    ?>
                    <!-- Side panel, to be removed, above this is the facebook window -->
                    <!--  <div class="col-md-12">
                        
                            <h3 style="text-align: center;"> Categories</h3> 

                            <ul class="category list-unstyled">

                                <li><i class="catIcon fa fa-2x fa-laptop" aria-hidden="true"></i><a href='blogpage.php?category=3'>Technology</a></li>
                                <li><i class="catIcon fa fa-2x fa-smile-o" aria-hidden="true"></i><a href='blogpage.php?category=4'>Humor</a></li>
                                <li><i class="catIcon fa fa-2x fa-play-circle-o" aria-hidden="true"></i><a href='blogpage.php?category=5'>TV series</a></li>
                                <li><i class="catIcon fa fa-2x fa-car" aria-hidden="true"></i><a href='blogpage.php?category=6'>Travel</a></li>
                                <li><i class="catIcon fa fa-2x fa-futbol-o" aria-hidden="true"></i><a href='blogpage.php?category=7'>Sports</a></li>
                                <li><i class="catIcon fa fa-2x fa-image" aria-hidden="true"></i><a href='blogpage.php?category=8'>Image Gallery</a></li>
                                <li><i class="catIcon fa fa-2x fa-graduation-cap" aria-hidden="true"></i><a href='blogpage.php?category=9'>Education</a></li>
                                <li><i class="catIcon fa fa-2x fa-cutlery" aria-hidden="true"></i><a href='blogpage.php?category=10'>Food</a></li>
                                <li><span class="glyphicon  glyphicon-sunglasses catIcon" aria-hidden="true" style="font-size: 28px" ></span><a href='blogpage.php?category=12'>Fashion</a></li>
                                <li><i class="catIcon fa fa-2x fa-angellist" aria-hidden="true"></i><a href='blogpage.php?category=13'>Motivational</a></li>
                                <li><i class="catIcon fa fa-2x fa-users" aria-hidden="true"></i><a href='blogpage.php?category=14'>Relationship</a></li>    
                                <li><i class="catIcon fa fa-2x fa-video-camera" aria-hidden="true"></i><a href='blogpage.php?category=15'>Entertainment</a></li>    
                                <li><i class="catIcon fa fa-2x fa-book" aria-hidden="true"></i><a href='blogpage.php?category=16'>Philosophy</a></li>    
                                <?php
                                /**
                                  while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                  $cat_title = $row['cat_title'];
                                  $cat_id = $row['cat_id'];
                                  echo "<li><a href='blogpage.php?category=$cat_id'>{$cat_title}</a></li>";
                                  }* */
                                ?>

                            </ul> <br><br> 
                            
                    </div>
 -->


                    <!-- Side Widget Well -->
                    <!-- <div class="panel-default" style="padding-left: 10px">

                        <div class="panel-heading " >
                            <h3>Our Motto</h3>
                        </div>
                        <div class="panel-body" style="font-weight: 100">
                            We are Visual Bloggers' Club of VIT University and our motto is to provide a platform for students to give wings to their ideas through Visual Blogging.
                            <br><br>
                        </div>
                    </div> -->
                <!-- </div> -->
                            
            </div>
            

        </div>
<?php// if (isset($_REQUEST['p_id'])) include './mostViewed.php'; ?>
        <!-- /.container -->
        <!--googleoff: index-->
        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-12 visible-sm visible-xs row">
                    <div style="height:400px; " class="col-lg-12 fb-page" data-href="https://www.facebook.com/vbcvit" data-tabs="timeline" data-width="300" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vbcvit" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vbcvit">Visual Bloggers Club Vit</a></blockquote>&nbsp;</div>
                </div>
            </div>    
        </div> -->

        <!-- Footer -->
<?php //include_once './footer_old.php'; ?>
<?php include_once './footer.php'  ?>




        <!-- Bootstrap Core JavaScript, deactivated 2020 -->
        <!-- <script src="js/bootstrap.min.js"></script> -->
        <script>

            // jQuery.fn.center = function () {
            //     this.css("position", "fixed");
            //     this.css("top", ($(window).height() - this.height()) / 2 + $(window).scrollTop() + "px");
            //     this.css("left", ($(window).width() - this.width()) / 2 + $(window).scrollLeft() + "px");

            //     return this;
            // };


            $("<div>", {id: "overlay"}).insertBefore("#popup");
            $("#popup").show().center();

//            $("button").on("click", function () {
//                $.removeCookie('popup');
//            });


            $(".incerpt").mouseover(function () {
                $(".blogCard").delay(20000);
                $(this).addClass("cardElivate").delay(20000);
            });
            $(".incerpt").mouseleave(function () {
                $(this).removeClass("cardElivate").delay(20000);
            });

            $("#mailtoIcon").click(function (e) {
                e.preventDefault();
                var email = document.querySelector("#mailto");
                var range = document.createRange();
                range.selectNode(email);
                window.getSelection().addRange(range);

                try {
                    var successful = document.execCommand("copy");
                    if (successful) {
                        if (!$(".alert").length) {
                            var alert = $('<div style="position: fixed; bottom: 0; left: 50%; transform: translateX(-50%);" class="alert alert-dismissible alert-info"></div>');
                            var btn = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
                            var text = $('<span>Copied!</span>');
                            alert.append(btn).append(text);
                            $("body").append(alert);
                        }
                    }
                } catch (err) {
                    console.log(err);
                }
            });
            $(".incerpt").height($("#parent").height());
            $(window).load(function () {
                $("img").each(function () {
                    var image = $(this);
                    if (image.context.naturalWidth == 0 || image.readyState == 'uninitialized') {
                        $(image).unbind("error").hide();
                    }
                });
            });

        </script>


    </body>
</html>