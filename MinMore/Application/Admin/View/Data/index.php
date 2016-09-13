<?php if (!defined('MINMORE_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<style>
.canvas-wrapper {
  width:800px;height:420px;
}
</style>
<div class="wrap">
  <div class="canvas-wrapper">
    <canvas id="service-summary-data"></canvas>
  </div>
  <div class="canvas-wrapper">
    <canvas id="service-data"></canvas>
  </div>
  <div class="canvas-wrapper">
    <canvas id="response-speed-data"></canvas>
  </div>
</div>
<script src="{$config_siteurl}statics/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{$config_siteurl}statics/vendor/underscore/underscore-min.js"></script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script>
$(function(){
  var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
  };
  var randomColor = function() {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
  };
  var serviceSummaryData = {
    labels: ['局长信箱', '代表委员会', '网上举报', '群众投诉', '网上咨询', '建言献策', '网上信访'],
    datasets: [{
      backgroundColor: _.times(7, randomColor),
      data: [20,30,40,10,2,10,30]
    }]
  };
  var serviceSummaryDataChart = new Chart($("#service-summary-data"), {
    type: 'polarArea',
    data: serviceSummaryData,
    options: {
      legend: {
        display: true
      },
      title: {
        display: true,
        text: '业务数据汇总'
      }
    }
  });
  var serviceData = {
    labels: ['1月', '2月', '3月', '4月', '5月'],
    datasets: [
      {
        label: '局长信箱',
        fill: false,
        data: [10,30,44,70,90],
        backgroundColor: randomColor(),
      },
      {
        label: '代表委员会',
        fill: false,
        data: [0,11,13,25,90],
        backgroundColor: randomColor(),
      }
    ]
  };
  _.map(serviceData.datasets, function(n){
    n.borderColor = n.backgroundColor;
  });
  var serviceDataChart = new Chart($("#service-data"), {
    type: 'line',
    data: serviceData,
    options: {
      title: {
        display: true,
        text: '业务数据趋势'
      }
    }
  });
  var responseSpeedData = {
    labels: ['局长信箱', '代表委员会', '网上举报', '群众投诉', '网上咨询', '建言献策', '网上信访'],
    datasets: [
      {
        label: '三天内',
        backgroundColor: randomColor(),
        data: [10,30,20,5,4,40,3]
      },
      {
        label: '七天内',
        backgroundColor: randomColor(),
        data: [5,10,3,1,14,20,2]
      },
      {
        label: '七天后',
        backgroundColor: randomColor(),
        data: [15,20,13,0,4,5,4]
      }
    ]
  };
  var responseSpeedChart = new Chart($("#response-speed-data"), {
    type: 'bar',
    data: responseSpeedData,
    options: {
      title: {
        display: true,
        text: '管理员响应时间'
      }
    }
  });
});
</script>
</body>
</html>
