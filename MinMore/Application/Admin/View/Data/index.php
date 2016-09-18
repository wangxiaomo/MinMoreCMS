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
    labels: {$sumaryLabel},
    datasets: [{
      backgroundColor: _.times(7, randomColor),
      data: {$sumaryData}
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
    labels: {$trendMonth},
    datasets: [
	<volist name="trendData" id="vo">
      {
        label: {$key},
        fill: false,
        data: {$vo},
        backgroundColor: randomColor(),
      }<if condition="$i neq count($trendData)">,</if>
	</volist>
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
    labels: {$responseLabel},
    datasets: [
	<volist name="responseData" id="vo">
      {
        label: {$key},
        backgroundColor: randomColor(),
        data: {$vo},
        backgroundColor: randomColor(),
      }<if condition="$i neq count($responseData)">,</if>
	</volist>
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
