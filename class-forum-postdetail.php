<?php
include "mysqlfunc.php";
$postid=$_GET['postid'];
$post=get_posts_by_id($conn,$postid);
$posterid=$post['usrid'];
$posts=postcount_by_poster($conn,$posterid);
$foundtime=$post['foundtime'];
$replys=get_replys_by_postid($conn,$postid);

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- below is the main frame -->
    <script src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="dist/cssfonts.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="dist/js/anime.min.js"></script>
    <script src="dist/js/scrollreveal.min.js"></script>

    <!-- Load local Bootstrap. -->


    <title>课程讨论</title>

    <script src="dist/js/jquery.min.js"></script>
    <!-- csstransforms3d-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load -->
    <script src="dist/js/modernizr.custom.25376.js"></script>
    <script src="dist/js/jquery.secretnav.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/css/jquery.secretnav.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="dist/css/demo.css"/> -->
    <!-- Below is the Forum options. -->
    <link href="dist/css/forum.css" rel="stylesheet" type="text/css">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "url": "https://expressionengine.com/",
            "alternateName": "eecms"
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180"
          href="https://expressionengine.com/assets/images/favicon/apple-touch-icon.png?v=YAmLW3PeY0">
    <link rel="icon" type="image/png" sizes="32x32"
          href="https://expressionengine.com/assets/images/favicon/favicon-32x32.png?v=YAmLW3PeY0">
    <link rel="icon" type="image/png" sizes="16x16"
          href="https://expressionengine.com/assets/images/favicon/favicon-16x16.png?v=YAmLW3PeY0">
    <link rel="manifest" href="https://expressionengine.com/assets/images/favicon/site.webmanifest?v=YAmLW3PeY0">
    <link rel="shortcut icon" href="https://expressionengine.com/assets/images/favicon/favicon.ico?v=YAmLW3PeY0">
    <meta name="msapplication-TileColor" content="#2a0c4a">
    <meta name="msapplication-config"
          content="https://expressionengine.com/assets/images/favicon/browserconfig.xml?v=YAmLW3PeY0">
    <meta name="theme-color" content="#ffffff">
    <!-- Safari Pinned Tab -->
    <link rel="mask-icon" href="https://expressionengine.com/assets/images/safari-pinned-tab.svg?v=YAm1W3PeY0"
          color="#2a0c4a">
    <link rel="stylesheet" type="text/css" media="screen" href="dist/js/mainForum.min.css">
    <script src="dist/js/jqv4zpfForum.js"></script>
    <style type="text/css">.tk-usual {
            font-family: "usual", sans-serif;
        }</style>
    <script>try {
            Typekit.load({async: true});
        } catch (e) {
        }</script>


</head>
<body class="is-boxed has-animations">


<div class="body-wrap " id="content">
    <header class="site-header">
        <div class="container">
            <div class="site-header-inner">
                <div class="header0">
                    <h1 class="m-0">
                        <a href="#" class="open">
                            <img class="header-logo-image" src="dist/images/logo.svg" alt="Logo">
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="hero">
        <div class="container">
            <div class="hero-inner">
                <div class="sticky-footer__content">
                    <div class="section padding-bottom-none">
                        <div class="container">
                            <h1 class="heading--primary"><?php echo $post['topic'];?></h1>
                            <p class="text--left"><span class="list-item__tag"><?php echo $post['tag'];?></span></p>
                        </div>
                    </div>

                    <div class="section padding-top-medium">
                        <div class="container">

                            <div class="forum-post forum-post--main">
                                <div class="forum-post__author">
                                    <img class="forum-post__avatar"
                                         src="./img/forumid1.png"
                                         alt="Jing Moreno&#39;s avatar">
                                    <div class="forum-post__author-name"><?php echo $post['usrname'];?></div>
                                    <div class="forum-post__author-meta"><b><?php echo $posts;?></b> posts</div>
                                    <div class="forum-post__author-badges">


                                    </div>
                                </div>

                                <div class="forum-post__content">
                                    <span class="forum-post__date"><span class=""
                                                                         data-tippy="<?php echo $post['foundtime'];?>"
                                                                         tabindex="0">3 weeks ago</span></span>


                                    <div class="forum-post__body typo-body">
                                        <p><?php echo $post['description'];?></p>

                                    </div>


                                    <div class="forum-post__footer">
                                        <div class="forum-post__reactions">
                                        </div>
                                        <a href="class-forum-reply.php?postid=<?php echo $postid;?>"
                                           class="button button--primary--reply">回复</a>
                                    </div>
                                </div>
                            </div>


<?php
foreach ($replys as $item) {
    $usrid=(int)$item['usrid'];
    $posts1=postcount_by_poster($conn,$usrid);
    print <<<REPLY
    <div class="forum-post forum-post--reply ">
                                <div class="forum-post__author">
                                    <img class="forum-post__avatar" src="./img/forumid%20(1).png"
                                         alt="Robin Sowell&#39;s avatar">
                                    <div class="forum-post__author-name">{$item['usrname']}</div>
                                    <div class="forum-post__author-meta"><b>{$posts1}</b> posts</div>
                                    
                                </div>
                                <div class="forum-post__content">
                                    <span class="forum-post__date"><span class=""
                                                                         data-tippy="{$item['sendtime']}"
                                                                         tabindex="0">2 weeks ago</span></span>
                                    <div class="forum-post__body typo-body">
                                        <p>{$item['content']}</p>
                                    </div>
                                    <div class="forum-post__author-badges">
                                        <div class="user-badge user-badge--admin" data-tippy="Moderator" tabindex="0">
                                            <span><i class="far fa-fire-alt fa-fw"></i></span></div>
                                        <div class="user-badge user-badge--dev" data-tippy="ExpressionEngine Team"
                                             tabindex="0"><span><i class="far fa-wrench fa-fw"></i></span></div>
                                    </div>
                                </div>
                            </div>
REPLY;
                            }

                      ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
