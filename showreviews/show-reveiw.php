<?php
include"../mysqlfunc.php";
$vl=select_rand_reviews($conn,$_COOKIE['usrname']);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>show-reveiw</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/show-reveiw/styles.css" type="text/css" rel="stylesheet"/>
    <script src="resources/scripts/jquery-3.2.1.min.js"></script>
    <script src="resources/scripts/axure/axQuery.js"></script>
    <script src="resources/scripts/axure/globals.js"></script>
    <script src="resources/scripts/axutils.js"></script>
    <script src="resources/scripts/axure/annotation.js"></script>
    <script src="resources/scripts/axure/axQuery.std.js"></script>
    <script src="resources/scripts/axure/doc.js"></script>
    <script src="resources/scripts/messagecenter.js"></script>
    <script src="resources/scripts/axure/events.js"></script>
    <script src="resources/scripts/axure/recording.js"></script>
    <script src="resources/scripts/axure/action.js"></script>
    <script src="resources/scripts/axure/expr.js"></script>
    <script src="resources/scripts/axure/geometry.js"></script>
    <script src="resources/scripts/axure/flyout.js"></script>
    <script src="resources/scripts/axure/model.js"></script>
    <script src="resources/scripts/axure/repeater.js"></script>
    <script src="resources/scripts/axure/sto.js"></script>
    <script src="resources/scripts/axure/utils.temp.js"></script>
    <script src="resources/scripts/axure/variables.js"></script>
    <script src="resources/scripts/axure/drag.js"></script>
    <script src="resources/scripts/axure/move.js"></script>
    <script src="resources/scripts/axure/visibility.js"></script>
    <script src="resources/scripts/axure/style.js"></script>
    <script src="resources/scripts/axure/adaptive.js"></script>
    <script src="resources/scripts/axure/tree.js"></script>
    <script src="resources/scripts/axure/init.temp.js"></script>
    <script src="resources/scripts/axure/legacy.js"></script>
    <script src="resources/scripts/axure/viewer.js"></script>
    <script src="resources/scripts/axure/math.js"></script>
    <script src="resources/scripts/axure/jquery.nicescroll.min.js"></script>
    <script src="data/document.js"></script>
    <script src="files/show-reveiw/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body style="background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);">
    <div id="base" class="">

      <!-- 辅助 (动态面板) -->
      <div id="u0" class="ax_default" data-label="辅助">
        <div id="u0_state0" class="panel_state" data-label="State1" style="">
          <div id="u0_state0_content" class="panel_state_content">
              <?php
              print <<<REVIEWS

            <!-- state1-rec1 (矩形) -->
            <div id="u1" class="ax_default _三级标题 ax_default_hidden" data-label="state1-rec1" style="display:none; visibility: hidden">
              <div id="u1_div" class=""></div>
              <div id="u1_text" class="text ">
                <p><span>{$vl[0]['rankername']}对{$vl[0]['rankedname']}的评价：</span></p><p><span><br></span></p><p><span>{$vl[0]['r10']}</span></p>
              </div>
            </div>

            <!-- state1-rec2 (矩形) -->
            <div id="u2" class="ax_default _三级标题 ax_default_hidden" data-label="state1-rec2" style="display:none; visibility: hidden">
              <div id="u2_div" class=""></div>
              <div id="u2_text" class="text ">
                <p><span>{$vl[1]['rankername']}对{$vl[1]['rankedname']}的评价：</span></p><p><span><br></span></p><p><span>{$vl[1]['r10']}</span></p>
              </div>
            </div>

            <!-- Unnamed (矩形) -->
            <div id="u3" class="ax_default _三级标题 ax_default_hidden" style="display:none; visibility: hidden">
              <div id="u3_div" class=""></div>
              <div id="u3_text" class="text ">
                <p><span>{$vl[2]['rankername']}对{$vl[2]['rankedname']}的评价：</span></p><p><span><br></span></p><p><span>{$vl[2]['r10']}</span></p>
              </div>
            </div>
          </div>
        </div>
        <div id="u0_state1" class="panel_state" data-label="State2" style="visibility: hidden;">
          <div id="u0_state1_content" class="panel_state_content">

            <!-- state2-rec1 (矩形) -->
            <div id="u4" class="ax_default _三级标题 ax_default_hidden" data-label="state2-rec1" style="display:none; visibility: hidden">
              <div id="u4_div" class=""></div>
              <div id="u4_text" class="text ">
                <p><span>{$vl[3]['rankername']}对{$vl[3]['rankedname']}的评价：</span></p><p><span><br></span></p><p><span>{$vl[3]['r10']}</span></p>
              </div>
            </div>

            <!-- state2-rec2 (矩形) -->
            <div id="u5" class="ax_default _三级标题 ax_default_hidden" data-label="state2-rec2" style="display:none; visibility: hidden">
              <div id="u5_div" class=""></div>
              <div id="u5_text" class="text ">
                <p><span>{$vl[4]['rankername']}对{$vl[4]['rankedname']}的评价：</span></p><p><span><br></span></p><p><span>{$vl[4]['r10']}</span></p>
              </div>
            </div>

            <!-- state2-rec3 (矩形) -->
            <div id="u6" class="ax_default _三级标题 ax_default_hidden" data-label="state2-rec3" style="display:none; visibility: hidden">
              <div id="u6_div" class=""></div>
              <div id="u6_text" class="text ">
                <p><span>{$vl[5]['rankername']}对{$vl[5]['rankedname']}的评价：</span></p><p><span><br></span></p><p><span>{$vl[5]['r10']}</span></p>
              </div>
            </div>
          </div>
        </div>
        <div id="u0_state2" class="panel_state" data-label="State3" style="visibility: hidden;">
          <div id="u0_state2_content" class="panel_state_content">

            <!-- Unnamed (矩形) -->
            <div id="u7" class="ax_default _三级标题 ax_default_hidden" style="display:none; visibility: hidden">
              <div id="u7_div" class=""></div>
              <div id="u7_text" class="text ">
                <p style="text-align:center;"><span>{$vl[6]['rankername']}对{$vl[6]['rankedname']}的评价：</span></p><p style="text-align:left;"><span><br></span></p><p style="text-align:center;"><span>{$vl[6]['r10']}</span></p>
              </div>
            </div>

            <!-- Unnamed (矩形) -->
            <div id="u8" class="ax_default _三级标题 ax_default_hidden" style="display:none; visibility: hidden">
              <div id="u8_div" class=""></div>
              <div id="u8_text" class="text ">
                <p style="text-align:center;"><span>{$vl[7]['rankername']}对{$vl[7]['rankedname']}的评价：</span></p><p style="text-align:left;"><span><br></span></p><p style="text-align:center;"><span>{$vl[7]['r10']}</span></p>
              </div>
            </div>

            <!-- Unnamed (矩形) -->
            <div id="u9" class="ax_default _三级标题 ax_default_hidden" style="display:none; visibility: hidden">
              <div id="u9_div" class=""></div>
              <div id="u9_text" class="text ">
                <p style="text-align:center;"><span>{$vl[8]['rankername']}对{$vl[8]['rankedname']}的评价：</span></p><p style="text-align:left;"><span><br></span></p><p style="text-align:center;"><span>{$vl[8]['r10']}</span></p>
              </div>
            </div>
          </div>
        </div>
        <div id="u0_state3" class="panel_state" data-label="State4" style="visibility: hidden;">
          <div id="u0_state3_content" class="panel_state_content">

REVIEWS;

              ?>
            <!-- Unnamed (矩形) -->
            <div id="u10" class="ax_default new1">
              <img id="u10_img" class="img " src="images/show-reveiw/u10.svg"/>
              <div id="u10_text" class="text ">
                <a href="../index.php"><p><span>返回主页</span></p></a>
                  <br>
                  <a href="show-reveiw.php"><p><span>再看一遍</span></p></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (动态面板) -->
      <div id="u11" class="ax_default">
        <div id="u11_state0" class="panel_state" data-label="State1" style="">
          <div id="u11_state0_content" class="panel_state_content">

            <!-- Unnamed (矩形) -->
            <div id="u12" class="ax_default _一级标题 ax_default_hidden" style="display:none; visibility: hidden">
              <div id="u12_div" class=""></div>
              <div id="u12_text" class="text ">
                <p><span>感谢评价！</span></p>
              </div>
            </div>

            <!-- Unnamed (矩形) -->
            <div id="u13" class="ax_default _一级标题 ax_default_hidden" style="display:none; visibility: hidden">
              <div id="u13_div" class=""></div>
              <div id="u13_text" class="text ">
                <p><span>看看其他同学的评价吧</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </body>
</html>
