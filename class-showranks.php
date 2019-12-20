<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="echarts/dist/echarts.min.js"></script>
    <?php
    include "mysqlfunc.php";
    $ranklist=get_rank_info($conn);
    ?>
    <title>echarts</title>
    <link rel="stylesheet" href="dist/css/reg.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid" style="position: relative;overflow: visible;height: 100%">
    <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8 frame">
            <div class="header">
                <h1>查看学员评分</h1>
            </div>
            <div id="graph" style="width: 600px;height:<?php echo count($ranklist);?>00px;"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('graph'));
    // 指定图表的配置项和数据
    var option = {
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: ['形象气质', '讲解清晰','语言表达','自信大方']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis:  {
            type: 'value'
        },
        yAxis: {
            type: 'category',
            data: [<?php foreach ($ranklist as $item){echo "'{$item['rankedname']}',";}?>]
        },
        series: [
            {
                name: '形象气质',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [<?php foreach ($ranklist as $item){echo "{$item['r1']},";}?>]
            },
            {
                name: '讲解清晰',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [<?php foreach ($ranklist as $item){echo "{$item['r2']},";}?>]
            },
            {
                name: '语言表达',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [<?php foreach ($ranklist as $item){echo "{$item['r3']},";}?>]
            },
            {
                name: '自信大方',
                type: 'bar',
                stack: '总量',
                label: {
                    normal: {
                        show: true,
                        position: 'insideRight'
                    }
                },
                data: [<?php foreach ($ranklist as $item){echo "{$item['r4']},";}?>]
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
</body>
</html>