<?php
header("content-type:text/html;charset=utf-8");
if (empty($_COOKIE['usrid'])) {
header("Location:login.php");
}
include "mysqlfunc.php";
loginfo();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NUDTDoE</title>
    <link href="dist/css/cssfonts.css" rel="stylesheet">
    <script src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="dist/js/anime.min.js"></script>
    <script src="dist/js/scrollreveal.min.js"></script>
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
</head>
<body class="is-boxed has-animations">
<div class="body-wrap">
    <header class="site-header">
        <div class="container">
            <div class="site-header-inner">
                <div class="brand header-brand">
                    <h1 class="m-0">
                        <a href="#">
                            <img class="header-logo-image" src="dist/images/logo.svg" alt="Logo">
                        </a>
                    </h1>
                </div>
                <div class="brand header-brand">
                    <?php
                    if (!empty($_COOKIE['usrid'])) {
                        echo "<a href='usrinfo.php' class='btn btn-default' role='button'>{$_COOKIE['usrname']}</a>
                                    <a class='btn btn-link logout'>退出</a>";
                    } else {
                        print <<<TEXT
<a href="login.php" class="btn btn-primary" role="button">登录</a>
                    <a href="reg.php" class="btn btn-link" role="button">注册</a> </div>
TEXT;
                    }
                    ?>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.logout').click(function () {
                            $.post('functions/logout.php',{},function(response){
                                window.location.href='login.php';
                                alert('已退出登录');
                            })
                        })
                    })
                </script>

            </div>
    </header>

    <main>
        <section class="hero">
            <div class="container" >
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">试验设计课程</h1>
                        <p class="hero-paragraph">试验设计是一门以试验的设计与数据的分析处理为主要研究内容的学科。</p>
                        <div class="hero-cta"><a class="button button-primary" href="class-info.html">课程简介</a><a
                                    class="button" href="#">课程安排</a></div>
                    </div>
                    <div class="hero-figure anime-element">
                        <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                            <rect width="528" height="396" style="fill:transparent;"/>
                        </svg>
                        <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                        <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                        <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                        <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                        <div class="hero-figure-box hero-figure-box-05"></div>
                        <div class="hero-figure-box hero-figure-box-06"></div>
                        <div class="hero-figure-box hero-figure-box-07"></div>
                        <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                        <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                        <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                    </div>
                </div>
            </div>
        </section>


        <section class="features section">
            <div class="container">
                <div class="features-inner section-inner has-bottom-divider">
                    <div class="features-wrap">
                        <!-- 课程资源 -->
                        <a href="class-resource.php?category=kejian">
                            <div class="feature text-center is-revealing ">
                            <div class="feature-inner main1 indexbox">
                                <div class="feature-icon"><br/>
                                    <img src="dist/images/feature-icon-01.svg" alt="Feature 01">
                                </div>
                                <a href="class-resource.php?category=kejian"
                                   target="_blank"><h4 class="feature-title mt-24">课程资源</h4></a>
                                <p class="text-sm mb-0" style="color: whitesmoke;font-style:italic;">讲课课件、考试试题等资源</p>
                            </div>
                            </div>
                        </a>
                        <!-- 通知公告 -->
                        <a href="class-rank.php">
                        <div class="feature text-center is-revealing ">
                            <div class="feature-inner main2 indexbox">
                                <div class="feature-icon"><br/>
                                    <img src="dist/images/feature-icon-02.svg" alt="Feature 02">
                                </div>
                                <a href="test.html"><h4 class="feature-title mt-24">学员评价</h4></a>
                                <p class="text-sm mb-0" style="color: whitesmoke;font-style:italic;">对授课、出题、网页组的成员进行评价</p>
                            </div>
                        </div>
                        </a>
                        <!-- 学科论坛 -->
                        <a href="class-forum.php">
                        <div class="feature text-center is-revealing ">
                            <div class="feature-inner main3 indexbox">
                                <div class="feature-icon">
                                    <img src="dist/images/feature-icon-03.svg" alt="Feature 03">
                                </div>
                                <a href="class-forum.php">
                                    <h4 class="feature-title mt-24">学科讨论</h4>
                                </a>
                                <p class="text-sm mb-0" style="color: whitesmoke;font-style:italic;">发表意见和观点</p>
                            </div>
                        </div>
                        </a>
                        <!-- 课程资源 -->
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="myCarousel" class="carousel slide" style="width: 1070px;margin: auto">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner">
                    <div class="item active" style="">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="padding-left:50px;margin-right: auto;">
                                <b>易泰合</b>
                            </div>
                            <div class="panel-body" style="padding-left:50px;margin-right: auto;">
                                请学员上交作业
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="padding-left:50px;margin-right: auto;">
                                <b>&nbsp;&nbsp;易泰合</b>
                            </div>
                            <div class="panel-body" style="padding-left:50px;margin-right: auto;">
                                请学员上交作业
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="padding-left:50px;margin-right: auto;">
                                <b>易泰合</b>
                            </div>
                            <div class="panel-body" style="padding-left:50px;margin-right: auto;">
                                请学员上交作业
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 轮播（Carousel）导航 -->
                <a class="carousel-control-custom left" href="#myCarousel"
                   data-slide="next"><span class="glyphicon glyphicon-chevron-left"></a>
                <a class="carousel-control-custom right" href="#myCarousel"
                   data-slide="prev"> <span class="glyphicon glyphicon-chevron-right"></span></a>

            </div>
        </section>
        <section class="cta section">
            <div class="container">
                <div class="cta-inner section-inner">
                    <h3 class="section-title mt-0">有任何意见和建议？</h3>
                    <div class="cta-cta">
                        <a class="button button-primary button-wide-mobile" href="#">反馈意见</a>
                    </div>
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
</body>
</html>
