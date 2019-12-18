<?php
header("content-type:text/html;charset=utf-8");
if(empty($_COOKIE['usrid'])){
    header("Location:login.php");
}else{
    include "mysqlfunc.php";
    $namelist=get_usrinfo_by_group($conn,'jiangke');
    if(!empty($_POST['submit'])){
        $rankerid=$_COOKIE['usrid'];
        $rankername=$_COOKIE['usrname'];
        $ranked=explode(",",$_POST['ranked']);
        $rankedid=$ranked[0];
        $rankedname=$ranked[1];
        $r1=$_POST['r1'];
        $r2=$_POST['r2'];
        $r3=$_POST['r3'];
        $r4=$_POST['r4'];
        $r5=$_POST['content'];
        $rankinfo =array('rankerid'=>$rankerid,'rankername'=>$rankername,'rankedid'=>$rankedid,'rankedname'=>$rankedname,
            'r1'=>$r1,'r2'=>$r2,'r3'=>$r3,'r4'=>$r4,'r5'=>$r5,'r6'=>'','r7'=>'',
            'r8'=>'','r9'=>'');
        $result=rank($conn,$rankinfo);
        if($result==1){
            echo "<script> alert(\"评价成功\");</script>";
            header("Location:index.php");
        }else{
            echo "<script> alert(\"操作失败\");</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en"
      class="wf-usual-n4-active wf-usual-i4-active wf-usual-i7-active wf-usual-n7-active wf-active gr__expressionengine_com">
<head style="">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css" data-tippy-stylesheet="">.tippy-iOS {
            cursor: pointer !important;
            -webkit-tap-highlight-color: transparent
        }

        .tippy-popper {
            transition-timing-function: cubic-bezier(.165, .84, .44, 1);
            max-width: calc(100% - 8px);
            pointer-events: none;
            outline: 0
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop {
            border-radius: 40% 40% 0 0
        }

        .tippy-popper[x-placement^=top] .tippy-roundarrow {
            bottom: -7px;
            bottom: -6.5px;
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0;
            margin: 0 3px
        }

        .tippy-popper[x-placement^=top] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .tippy-popper[x-placement^=top] .tippy-arrow {
            border-top: 8px solid #333;
            border-right: 8px solid transparent;
            border-left: 8px solid transparent;
            bottom: -7px;
            margin: 0 3px;
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop {
            -webkit-transform-origin: 0 25%;
            transform-origin: 0 25%
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(1) translate(-50%, -55%);
            transform: scale(1) translate(-50%, -55%)
        }

        .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(.2) translate(-50%, -45%);
            transform: scale(.2) translate(-50%, -45%);
            opacity: 0
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=visible] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px)
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective] {
            -webkit-transform-origin: bottom;
            transform-origin: bottom
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=visible] {
            -webkit-transform: perspective(700px) translateY(-10px) rotateX(0);
            transform: perspective(700px) translateY(-10px) rotateX(0)
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: perspective(700px) translateY(0) rotateX(60deg);
            transform: perspective(700px) translateY(0) rotateX(60deg)
        }

        .tippy-popper[x-placement^=top] [data-animation=fade][data-state=visible] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=visible] {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .tippy-popper[x-placement^=top] [data-animation=scale] {
            -webkit-transform-origin: bottom;
            transform-origin: bottom
        }

        .tippy-popper[x-placement^=top] [data-animation=scale][data-state=visible] {
            -webkit-transform: translateY(-10px) scale(1);
            transform: translateY(-10px) scale(1)
        }

        .tippy-popper[x-placement^=top] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(-10px) scale(.5);
            transform: translateY(-10px) scale(.5)
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop {
            border-radius: 0 0 30% 30%
        }

        .tippy-popper[x-placement^=bottom] .tippy-roundarrow {
            top: -7px;
            -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
            margin: 0 3px
        }

        .tippy-popper[x-placement^=bottom] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        .tippy-popper[x-placement^=bottom] .tippy-arrow {
            border-bottom: 8px solid #333;
            border-right: 8px solid transparent;
            border-left: 8px solid transparent;
            top: -7px;
            margin: 0 3px;
            -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop {
            -webkit-transform-origin: 0 -50%;
            transform-origin: 0 -50%
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(1) translate(-50%, -45%);
            transform: scale(1) translate(-50%, -45%)
        }

        .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(.2) translate(-50%);
            transform: scale(.2) translate(-50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=visible] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective] {
            -webkit-transform-origin: top;
            transform-origin: top
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=visible] {
            -webkit-transform: perspective(700px) translateY(10px) rotateX(0);
            transform: perspective(700px) translateY(10px) rotateX(0)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: perspective(700px) translateY(0) rotateX(-60deg);
            transform: perspective(700px) translateY(0) rotateX(-60deg)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=visible] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=visible] {
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=scale] {
            -webkit-transform-origin: top;
            transform-origin: top
        }

        .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=visible] {
            -webkit-transform: translateY(10px) scale(1);
            transform: translateY(10px) scale(1)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateY(10px) scale(.5);
            transform: translateY(10px) scale(.5)
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop {
            border-radius: 50% 0 0 50%
        }

        .tippy-popper[x-placement^=left] .tippy-roundarrow {
            right: -12px;
            -webkit-transform-origin: 33.33333333% 50%;
            transform-origin: 33.33333333% 50%;
            margin: 3px 0
        }

        .tippy-popper[x-placement^=left] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }

        .tippy-popper[x-placement^=left] .tippy-arrow {
            border-left: 8px solid #333;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            right: -7px;
            margin: 3px 0;
            -webkit-transform-origin: 0 50%;
            transform-origin: 0 50%
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop {
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(1) translate(-50%, -50%);
            transform: scale(1) translate(-50%, -50%)
        }

        .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(.2) translate(-75%, -50%);
            transform: scale(.2) translate(-75%, -50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=visible] {
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(-20px);
            transform: translateX(-20px)
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective] {
            -webkit-transform-origin: right;
            transform-origin: right
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=visible] {
            -webkit-transform: perspective(700px) translateX(-10px) rotateY(0);
            transform: perspective(700px) translateX(-10px) rotateY(0)
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: perspective(700px) translateX(0) rotateY(-60deg);
            transform: perspective(700px) translateX(0) rotateY(-60deg)
        }

        .tippy-popper[x-placement^=left] [data-animation=fade][data-state=visible] {
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=visible] {
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .tippy-popper[x-placement^=left] [data-animation=scale] {
            -webkit-transform-origin: right;
            transform-origin: right
        }

        .tippy-popper[x-placement^=left] [data-animation=scale][data-state=visible] {
            -webkit-transform: translateX(-10px) scale(1);
            transform: translateX(-10px) scale(1)
        }

        .tippy-popper[x-placement^=left] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(-10px) scale(.5);
            transform: translateX(-10px) scale(.5)
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop {
            border-radius: 0 50% 50% 0
        }

        .tippy-popper[x-placement^=right] .tippy-roundarrow {
            left: -12px;
            -webkit-transform-origin: 66.66666666% 50%;
            transform-origin: 66.66666666% 50%;
            margin: 3px 0
        }

        .tippy-popper[x-placement^=right] .tippy-roundarrow svg {
            position: absolute;
            left: 0;
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg)
        }

        .tippy-popper[x-placement^=right] .tippy-arrow {
            border-right: 8px solid #333;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            left: -7px;
            margin: 3px 0;
            -webkit-transform-origin: 100% 50%;
            transform-origin: 100% 50%
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop {
            -webkit-transform-origin: -50% 0;
            transform-origin: -50% 0
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=visible] {
            -webkit-transform: scale(1) translate(-50%, -50%);
            transform: scale(1) translate(-50%, -50%)
        }

        .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=hidden] {
            -webkit-transform: scale(.2) translate(-25%, -50%);
            transform: scale(.2) translate(-25%, -50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=visible] {
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(20px);
            transform: translateX(20px)
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective] {
            -webkit-transform-origin: left;
            transform-origin: left
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=visible] {
            -webkit-transform: perspective(700px) translateX(10px) rotateY(0);
            transform: perspective(700px) translateX(10px) rotateY(0)
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=hidden] {
            opacity: 0;
            -webkit-transform: perspective(700px) translateX(0) rotateY(60deg);
            transform: perspective(700px) translateX(0) rotateY(60deg)
        }

        .tippy-popper[x-placement^=right] [data-animation=fade][data-state=visible] {
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=fade][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=visible] {
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .tippy-popper[x-placement^=right] [data-animation=scale] {
            -webkit-transform-origin: left;
            transform-origin: left
        }

        .tippy-popper[x-placement^=right] [data-animation=scale][data-state=visible] {
            -webkit-transform: translateX(10px) scale(1);
            transform: translateX(10px) scale(1)
        }

        .tippy-popper[x-placement^=right] [data-animation=scale][data-state=hidden] {
            opacity: 0;
            -webkit-transform: translateX(10px) scale(.5);
            transform: translateX(10px) scale(.5)
        }

        .tippy-tooltip {
            position: relative;
            color: #fff;
            border-radius: .25rem;
            font-size: .875rem;
            padding: .3125rem .5625rem;
            line-height: 1.4;
            text-align: center;
            background-color: #333
        }

        .tippy-tooltip[data-size=small] {
            padding: .1875rem .375rem;
            font-size: .75rem
        }

        .tippy-tooltip[data-size=large] {
            padding: .375rem .75rem;
            font-size: 1rem
        }

        .tippy-tooltip[data-animatefill] {
            overflow: hidden;
            background-color: transparent
        }

        .tippy-tooltip[data-interactive], .tippy-tooltip[data-interactive] path {
            pointer-events: auto
        }

        .tippy-tooltip[data-inertia][data-state=visible] {
            transition-timing-function: cubic-bezier(.54, 1.5, .38, 1.11)
        }

        .tippy-tooltip[data-inertia][data-state=hidden] {
            transition-timing-function: ease
        }

        .tippy-arrow, .tippy-roundarrow {
            position: absolute;
            width: 0;
            height: 0
        }

        .tippy-roundarrow {
            width: 18px;
            height: 7px;
            fill: #333;
            pointer-events: none
        }

        .tippy-backdrop {
            position: absolute;
            background-color: #333;
            border-radius: 50%;
            width: calc(110% + 2rem);
            left: 50%;
            top: 50%;
            z-index: -1;
            transition: all cubic-bezier(.46, .1, .52, .98);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .tippy-backdrop:after {
            content: "";
            float: left;
            padding-top: 100%
        }

        .tippy-backdrop + .tippy-content {
            transition-property: opacity;
            will-change: opacity
        }

        .tippy-backdrop + .tippy-content[data-state=visible] {
            opacity: 1
        }

        .tippy-backdrop + .tippy-content[data-state=hidden] {
            opacity: 0
        }</style>
    <link rel="preconnect" href="https://www.google-analytics.com/">
    <link rel="preconnect" href="https://use.typekit.net/" crossorigin="">
    <link type="text/css" href="dist/css/bootstrap.min.css" rel="stylesheet">
    <title>学员评价</title>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "url": "https://expressionengine.com/",
            "alternateName": "eecms"
        }
    </script>


    <link href="https://expressionengine.com/robots.txt" title="robots" type="text/plain" rel="help">
    <link rel="manifest" href="https://expressionengine.com/assets/images/favicon/site.webmanifest?v=YAmLW3PeY0">
    <meta name="msapplication-TileColor" content="#2a0c4a">
    <meta name="msapplication-config"
          content="https://expressionengine.com/assets/images/favicon/browserconfig.xml?v=YAmLW3PeY0">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" media="screen"
          href="./dist/css/main.min.css">

    <script src="./dist/js/jqv4zpfForum.js"></script>
    <style type="text/css">.tk-usual {
            font-family: "usual", sans-serif;
        }</style>
    <style type="text/css">@font-face {
            font-family: tk-usual-n4;
            src: url(https://use.typekit.net/af/4e8f1c/00000000000000000001771b/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("woff2"), url(https://use.typekit.net/af/4e8f1c/00000000000000000001771b/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("woff"), url(https://use.typekit.net/af/4e8f1c/00000000000000000001771b/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("opentype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: tk-usual-i4;
            src: url(https://use.typekit.net/af/a20d40/000000000000000000017720/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3) format("woff2"), url(https://use.typekit.net/af/a20d40/000000000000000000017720/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3) format("woff"), url(https://use.typekit.net/af/a20d40/000000000000000000017720/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3) format("opentype");
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: tk-usual-i7;
            src: url(https://use.typekit.net/af/84cfc3/000000000000000000017723/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3) format("woff2"), url(https://use.typekit.net/af/84cfc3/000000000000000000017723/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3) format("woff"), url(https://use.typekit.net/af/84cfc3/000000000000000000017723/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3) format("opentype");
            font-weight: 700;
            font-style: italic;
        }

        @font-face {
            font-family: tk-usual-n7;
            src: url(https://use.typekit.net/af/625a3c/000000000000000000017724/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("woff2"), url(https://use.typekit.net/af/625a3c/000000000000000000017724/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("woff"), url(https://use.typekit.net/af/625a3c/000000000000000000017724/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("opentype");
            font-weight: 700;
            font-style: normal;
        }</style>
    <script>try {
            Typekit.load({async: true});
        } catch (e) {
        }</script>

    <style type="text/css">@font-face {
            font-family: usual;
            src: url(https://use.typekit.net/af/4e8f1c/00000000000000000001771b/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("woff2"), url(https://use.typekit.net/af/4e8f1c/00000000000000000001771b/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("woff"), url(https://use.typekit.net/af/4e8f1c/00000000000000000001771b/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("opentype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: usual;
            src: url(https://use.typekit.net/af/a20d40/000000000000000000017720/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3) format("woff2"), url(https://use.typekit.net/af/a20d40/000000000000000000017720/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3) format("woff"), url(https://use.typekit.net/af/a20d40/000000000000000000017720/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3) format("opentype");
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: usual;
            src: url(https://use.typekit.net/af/84cfc3/000000000000000000017723/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3) format("woff2"), url(https://use.typekit.net/af/84cfc3/000000000000000000017723/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3) format("woff"), url(https://use.typekit.net/af/84cfc3/000000000000000000017723/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3) format("opentype");
            font-weight: 700;
            font-style: italic;
        }

        @font-face {
            font-family: usual;
            src: url(https://use.typekit.net/af/625a3c/000000000000000000017724/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("woff2"), url(https://use.typekit.net/af/625a3c/000000000000000000017724/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("woff"), url(https://use.typekit.net/af/625a3c/000000000000000000017724/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("opentype");
            font-weight: 700;
            font-style: normal;
        }</style>
</head>

<body class="cookie-bar-shown" data-gr-c-s-loaded="true">
<div class="login-window" style="background-image: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%);overflow: auto">
    <div class="container container--medium-width" style="overflow: hidden;margin-bottom: 50px">
        <div style="margin-bottom: 30px">
            <h1 class="" style="color: #282afd;margin-bottom: 30px;width: 30%;display: inline" >学员评价</h1>
        </div>
        <form method="post" action="class-rank.php">
            <div class="container">
                <div class="filter-bar">
                    <select name="ranked" id="" class="filter-bar__item">
                        <?php
                        foreach ($namelist as $item){
                            echo "<option value=\"{$item['usrid']},{$item['usrname']}\">{$item['usrname']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="list-group">
                    <div class="list-group-item-heading"><h3>评价打分</h3></div>
                    <div class="list-group-item custom" >
                        <h4 >形象气质：</h4>
                        <div style="margin-left:50px;display: inline;text-align: justify-all;width: 300px">
                        <b>A&nbsp;</b><input type="radio" name="r1" value="A">&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>B&nbsp;</b><input type="radio" name="r1" value="B">&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>C&nbsp;</b><input type="radio" name="r1" value="C">&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>D&nbsp;</b><input type="radio" name="r1" value="D">
                        </div>
                    </div>
                    <div class="list-group-item custom" >
                        <h4 >讲解清晰：</h4>
                        <div class="onelist">
                            <b>A&nbsp;</b><input type="radio" name="r2" value="A">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>B&nbsp;</b><input type="radio" name="r2" value="B">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>C&nbsp;</b><input type="radio" name="r2" value="C">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>D&nbsp;</b><input type="radio" name="r2" value="D">
                        </div>
                    </div>
                    <div class="list-group-item custom" >
                        <h4 >语言表达：</h4>
                        <div class="onelist">
                            <b>A&nbsp;</b><input type="radio" name="r3" value="A">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>B&nbsp;</b><input type="radio" name="r3" value="B">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>C&nbsp;</b><input type="radio" name="r3" value="C">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>D&nbsp;</b><input type="radio" name="r3" value="D">
                        </div>
                    </div>
                    <div class="list-group-item custom" >
                        <h4 >自信大方：</h4>
                        <div class="onelist">
                            <b>A&nbsp;</b><input type="radio" name="r4" value="A">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>B&nbsp;</b><input type="radio" name="r4" value="B">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>C&nbsp;</b><input type="radio" name="r4" value="C">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>D&nbsp;</b><input type="radio" name="r4" value="D">
                        </div>
                    </div>
                </div>
            <div style="width: 500px;border-radius: 15px">
                <textarea rows="5" name="content" placeholder="请输入评价内容" style="border-radius: 10px;color:black;"></textarea>
            </div>
            <div style="color: blue">
                <input type="submit" name="submit" value="发布" style="margin-top: 15px;color: firebrick">
            </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>