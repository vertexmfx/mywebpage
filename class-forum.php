<?php
header("content-type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
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
		<link rel="stylesheet" type="text/css" href="dist/css/jquery.secretnav.css" />
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
		<meta name="msapplication-TileColor" content="#2a0c4a">
		<meta name="msapplication-config"
			  content="https://expressionengine.com/assets/images/favicon/browserconfig.xml?v=YAmLW3PeY0">
		<meta name="theme-color" content="#ffffff">
		<!-- Safari Pinned Tab -->
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

	<div class="body-wrap " id="content" >
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
					<section class="hero-resource">

						<div class="container">
							<div class="hero-inner">
								<div class="hero-copy">
									<h1 class="hero-title mt-0">试验设计-课程讨论</h1>
									<p class="hero-paragraph">在这里交流观点，产生新思想</p>
								</div>

								<div class="hero-figure anime-element">
									<svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
										<rect width="528" height="396" style="fill:transparent;" />
									</svg>
									<div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
									<div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
								</div><br/>
                                <a href="class-forum-writepost.php"
                                   class="button button--primary--post">发帖</a>

							</div>
								<div class="section ">
									<div class="container">
										<div class="filter-bar">
											<select name="" id="" class="filter-bar__item" onchange="window.location.href=this.value">
												<option value="https://expressionengine.com/forums">All Categories</option>
												<option value="https://expressionengine.com/forums/topics/134/news-and-general">News and
													General
												</option>
												<option value="https://expressionengine.com/forums/topics/135/how-do-i">How Do I?</option>
												<option value="https://expressionengine.com/forums/topics/136/feature-requests">Feature
													Requests
												</option>
												<option value="https://expressionengine.com/forums/topics/137/development-and-programming">
													Development and Programming
												</option>
												<option value="https://expressionengine.com/forums/topics/128/developer-preview">Developer
													Preview
												</option>
											</select>
										</div>

										<?php
include "mysqlfunc.php";
$posts=get_posts($conn);
foreach ($posts as $item){
    $postid=$item['postid'];
    $replys=replycount_by_postid($conn,$postid);
    $foundtime=substr($item['foundtime'],0,10);
    print <<<POST
<a href="class-forum-postdetail.php?postid={$item['postid']}" target="_blank">
											<div class="list-item">
												<img class="list-item__avatar"
													 src="./img/forumid1.png"
													 alt="Jing Moreno&#39;s avatar">
												<div class="list-item__info">
													<h4 class="list-item__title">{$item['topic']}</h4>
													<p class="list-item__subtitle">{$item['description']}</p>
													<p class="list-item__meta"><span class="list-item__tag">{$item['tag']}</span> &nbsp; 创建时间:$foundtime
														创建者：{$item['usrname']} &nbsp; · &nbsp; {$item['views']} 浏览 &nbsp; · &nbsp; {$replys} 回复</p>
												</div>
											</div>
										</a>
POST;

}
?>


										<div class="pagination">


											<a href="https://expressionengine.com/forums"
											   class="pagination__page pagination__page--selected">1</a>

											<a href="https://expressionengine.com/forums/P30" class="pagination__page ">2</a>

											<a href="https://expressionengine.com/forums/P60" class="pagination__page ">3</a>


											<a href="https://expressionengine.com/forums/P8940" class="pagination__page">Last</a>


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
									<path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#0270D7"/>
								</svg>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="screen-reader-text">Twitter</span>
								<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
									<path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#0270D7"/>
								</svg>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="screen-reader-text">Google</span>
								<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
									<path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#0270D7"/>
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
			$(function() {
				$('#content').SecretNav({
					navSelector: '#nav',
					openSelector: '.open',
					position: 'left'
				});
			});
		</script>


	</body>
</html>
