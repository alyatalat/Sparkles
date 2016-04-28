
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/header.html");
        ?>
    </div>
</div>

<!-- main -->
<div class="container-fluid">
    <div class="row feedback-header-image">
        <h2 class="category-title"> Feedback Form </h2>
    </div>
</div>

<div id="wrapper" class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="col-md-3 col-sm-4">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="#">Today's Deals</a>
                </li>
                <li>
                    <a href="#">Sort Products</a>
                </li>
                <li>
                    <a href="#">My Gift Cards</a>
                </li>
                <li>
                    <a href="#">My WishList</a>
                </li>
                <li>
                    <a href="../../Sale.php">Sale</a>
                </li>
                <li>
                    <a href="feedback.php">Feedback</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper" class="col-md-9 col-sm-8 col-xs-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="nav">
                        <ul class="breadcrumb">
                            <li><a href="../../HomeIndex.php">Home</a></li>
                            <li class="active"><a href="feedback.php">Feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- display a list of products -->
            <div class="container-fluid">
                <div class="row">
                    <div class="row">
                        <?php
                        if(isset($_GET['error'])){
                            echo
                            "
                    <div class='row' style='
                                        color:crimson;
                                        font-weight: 500;'>
                    <hr/>
                    <p style='padding-left: 1rem;'>Please Fix The Following Errors:</p>
                    <p style='padding-left: 4rem;'>{$_GET['error']}</p>
                    <hr/>
                    </div>

                    ";
                        }
                        ?>
                    </div>
                    <form class="form-horizontal" action="../Controller/add_feedback.php" method="post">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"
                                       value="<?php
                                       if(isset($_GET['name'])){
                                           echo "{$_GET['name']}";
                                       }
                                       ?>"
                                />
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                   value="<?php
                                   if(isset($_GET['email'])){
                                       echo "{$_GET['email']}";
                                   }
                                   ?>"
                            />
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                                   value="<?php
                                   if(isset($_GET['subject'])){
                                       echo "{$_GET['subject']}";
                                   }
                                   ?>"
                            />
                        </div>
                        <div class="form-group">
                            <label for="department">Subject</label>
                            <input type="text" class="form-control" id="department" name="department" placeholder="Department"
                                   value="<?php
                                   if(isset($_GET['department'])){
                                       echo "{$_GET['department']}";
                                   }
                                   ?>"
                            />
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" class="form-control" rows="5" name="message" placeholder="Type your message here"
                                      value="<?php
                                      if(isset($_GET['name'])){
                                          echo "{$_GET['name']}";
                                      }
                                      ?>"
                            >
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <?php
        require_once("../Layout/footer.html");
        ?>
    </div>
</div>







