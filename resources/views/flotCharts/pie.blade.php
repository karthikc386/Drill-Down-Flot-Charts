<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{env("APP_NAME", "")}}</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('/images/logo1.png') }}"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Pie Chart
        </h1>
      </section>

      <section class="content-header">
        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs" id="chart-tabs">
                <li class="active">          
                  <a href="#bar-chart-tab" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i> Pie Chart
                  </a>
                </li>

              </ul>
              <div class="tab-content"> 
                <div class="tab-pane active" id="bar-chart-tab">

                  @if($group_data_chart1 == '[]')
                  <div class="info-box  bg-blue ">
                    <span class="info-box-icon">
                      <i class="fa fa-info-circle"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text" style="margin-top: 2em;">There is no data to Display.</span>
                    </div>
                  </div>
                  @else
                  <p id="pie_chart_bck_btn" style="display:none"  class="pull-right"><a href="#"  class="btn btn-block btn-default btn-flat"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back Chart -1</a></p>
                  <div class="clearfix"></div>
                  <div id="pie-chart" style="width:650px;height:500px;margin:0 auto"></div>
                  @endif         
                </div>
              </div>
              <!-- /.tab-content -->
            </div>
          </div>
        </div>
      </section></div>
      <!-- /.content-wrapper -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('plugins/flot/jquery.flot.resize.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('plugins/flot/jquery.flot.pie.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('plugins/flot/jquery.flot.categories.js') }}"></script>

<script type="text/javascript">

  var dataset1 = '<?php echo $group_data_chart1; ?>';
  var dataset2 = JSON.parse(dataset1);


  var dataset3 = '<?php echo $group_data_chart2; ?>';
  var dataset4 = JSON.parse(dataset3);

</script>

<script src="{{ asset('js/custom-pie-chart.js') }}" type="text/javascript"></script> 

@include('flash-message')

</body>
</html>
