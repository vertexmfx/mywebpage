<?php
header("content-type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="dist/css/cssfonts.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="dist/js/anime.min.js"></script>
    <script src="dist/js/scrollreveal.min.js"></script>

    <!-- Load local Bootstrap. -->


    <title>课程资源</title>

    <script src="dist/js/jquery.min.js"></script>
    <!-- csstransforms3d-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load -->
    <script src="dist/js/modernizr.custom.25376.js"></script>
    <script src="dist/js/jquery.secretnav.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/css/jquery.secretnav.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="dist/css/demo.css"/> -->
</head>
<body class="is-boxed has-animations">

<div class="body-wrap " id="content">
    <header class="site-header">
        <div class="container">
            <div class="site-header-inner">
                <div class="header">
                    <h1 class="m-0">
                        <a href="#" class="open">
                            <img class="header-logo-image" src="dist/images/logo.svg" alt="Logo">
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="hero-resource">
            <div class="container">
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">试验设计-课程资源</h1>
                        <p class="hero-paragraph">收集到的课内外试验设计资源</p>
                    </div>

                    <div class="hero-figure anime-element">
                        <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                            <rect width="528" height="396" style="fill:transparent;"/>
                        </svg>
                        <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                        <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                    </div>
                    <br/>

                </div>
                <div>
                <ul class="nav nav-tabs nav-justified" style="z-index: 1000;background: #9fcdff;border-top-left-radius: 10px;border-top-right-radius:10px;margin-bottom: 15px">
                    <li role="presentation" <?php if($_GET['category']=='kejian'){echo 'class="active"';}?>><a href="class-resource.php?category=kejian">讲课课件</a></li>
                    <li role="presentation" <?php if($_GET['category']=='shiti'){echo 'class="active"';}?>><a href="class-resource.php?category=shiti">考试试题</a></li>
                    <li role="presentation" <?php if($_GET['category']=='other'){echo 'class="active"';}?>><a href="class-resource.php?category=other">其他资源</a></li>
                </ul>
                </div>
                <div class="list-group">
                    <style type="text/css">
                        .fangda {
                            transition: all 0.3s;
                        }

                        .fangda:hover {
                            transform: scale(1.05);
                        }
                    </style>
                    <?php
                    if (empty($_GET['category'])) {
                        $category = 'kejian';
                    } else {
                        $category = $_GET['category'];
                    }
                    $filepath = __DIR__ . "\class-resources\\" . $category;
                    $filelist = scandir($filepath);
                    foreach ($filelist as $key => $filename) {
                        if ($key == 0 or $key == 1) {
                            continue;
                        } else {
                            $basename=pathinfo($filename,PATHINFO_FILENAME);
                            $extention=pathinfo($filename,PATHINFO_EXTENSION);
                            if ($extention == 'pdf') {
                                print <<<PDF
<a href="pdfviewer/web/viewer.html?file=../../class-resources/$category/$filename" target="_blank" class="list-group-item list-group-item-action fangda" onmouseover="this.className='list-group-item list-group-item-action active fangda'" onmouseleave="this.className='list-group-item list-group-item-action fangda'">
$basename
</a>
PDF;
                            } else {
                                print <<<NOPDF
<a href="class-resources/$category/$filename" target="_blank" class="list-group-item list-group-item-action fangda" onmouseover="this.className='list-group-item list-group-item-action active fangda'" onmouseleave="this.className='list-group-item list-group-item-action fangda'">
									$basename</a>
NOPDF;

                            }

                        }
                    }
                    ?>
                </div>

            </div>
        </section>


    </main>
    <footer class="site-footer">
        <div class="container">
            <div class="site-footer-inner">
                <div class="brand footer-brand">
                    <a href="#">
                        <img class="header-logo-image" src="dist/images/logo.svg" alt="Logo">
                    </a>
                </div>
                <ul class="footer-links list-reset">
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">About us</a>
                    </li>
                    <li>
                        <a href="#">FAQ's</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                </ul>
                <ul class="footer-social-links list-reset">
                    <li>
                        <a href="#">
                            <span class="screen-reader-text">Facebook</span>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                                      fill="#0270D7"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="screen-reader-text">Twitter</span>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z"
                                      fill="#0270D7"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="screen-reader-text">Google</span>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z"
                                      fill="#0270D7"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="footer-copyright">&copy; 2019 Solid, cruip all rights reserved / More Templates</div>
            </div>
        </div>
    </footer>
</div>
<script src="dist/js/main.min.js"></script>


<nav id="nav">
    <a href="index.php">课程主页</a>
    <a href="#">我的主页</a>
    <a href="class-info.html">课程介绍</a>
    <a href="class-resource.php">教学资源</a>
    <a href="#">课程论坛</a>
    <a href="#">意见反馈</a>
</nav>


<script>
    $(function () {
        $('#content').SecretNav({
            navSelector: '#nav',
            openSelector: '.open',
            position: 'left'
        });
    });
</script>


</body>
</html>
