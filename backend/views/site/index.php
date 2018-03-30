<?php

use yii\helpers\Html;

use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserBackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '后台首页';
$this->params['breadcrumbs'][] = $this->title;
?>


    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      
     
      
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">

          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    11111<sup style="font-size:20px">人</sup>
                </h3>
                <p>
                    用户总人数
                </p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
                <i class="ion ion-person"></i>
            </div>

            <!-- <div class="progress xxs">
              <div class="progress-bar progress-bar-aqua" style="width: 70%"></div>
              <div class="progress-fill" style="width: 70%"></div>
            </div> -->

            <div style='border:1px solid #00ACD7'></div>

            <div class="row">
              <div class="col-lg-4 col-xs-6">
                    <h6></h6>
                    <h6></h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6></h6>
                    <h6></h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6></h6>
                    <h6></h6>
              </div><br/><br/><br/>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    1111<sup style="font-size:20px">条</sup>
                </h3>
                <p>
                    已发布职位
                </p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
                <i class="ion ion-image"></i>
            </div>

            <!-- <div class="progress xxs">
              <div class="progress-bar progress-bar-aqua" style="width: 70%"></div>
              <div class="progress-fill" style="width: 70%"></div>
            </div> -->

            <div style='border:1px solid #009551'></div>

            <div class="row">
              <div class="col-lg-4 col-xs-6">
                    <h6></h6>
                    <h6></h6>
              </div>
              <!-- <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>活跃用户</h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>爱车认证人数</h6>
              </div> --><br/><br/><br/>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-yellow">
              <div class="inner">
                  <h3>
                    111<sup style="font-size:20px">条</sup>
                  </h3>
                  <p>
                      企业总数
                  </p>
              </div>
              <div class="icon">
                  <i class="ion ion-chatboxes"></i>
              </div>

              <div style='border:1px solid #DA8C10'></div>

              <div class="row">
              <div class="col-lg-4 col-xs-6">
                    <h6></h6>
                    <h6></h6>
              </div>
              <!-- <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>活跃用户</h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>爱车认证人数</h6>
              </div> --><br/><br/><br/>
            </div>

              <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
              </a>
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-blue">
              <div class="inner">
                  <h3>
                      5961<sup style="font-size:20px">条</sup>
                  </h3>
                  <p>
                      点赞数量
                  </p>
              </div>
              <div class="icon">
                  <!-- <i class="fa fa-thumbs-o-up"></i> -->
                  <i class="fa fa-heart"></i>
              </div>

              <div style='border:1px solid #00629C'></div>

              <div class="row">
              <div class="col-lg-4 col-xs-6">
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;111</h6>
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;取消点赞</h6>
              </div>
              <!-- <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>活跃用户</h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>爱车认证人数</h6>
              </div> --><br/><br/><br/>
            </div>

              <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
              </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
                <h3>
                  111<sup style="font-size:20px">辆</sup>
                </h3>
                <p>
                    车辆总数
                </p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
                <i class="fa fa-car"></i>
            </div>

            <!-- <div class="progress xxs">
              <div class="progress-bar progress-bar-aqua" style="width: 70%"></div>
              <div class="progress-fill" style="width: 70%"></div>
            </div> -->

            <div style='border:1px solid #B81752'></div>

            <div class="row">
              <div class="col-lg-4 col-xs-6">
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;11</h6>
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;品牌数量</h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>最新系列</h6>
              </div>
              <!-- <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>用户非卖车辆</h6>
              </div> -->
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
                <h3>
                  111<sup style="font-size:20px">条</sup>
                </h3>
                <p>
                    订单数量
                </p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
                <i class="fa fa-shopping-cart"></i>
            </div>

            <!-- <div class="progress xxs">
              <div class="progress-bar progress-bar-aqua" style="width: 70%"></div>
              <div class="progress-fill" style="width: 70%"></div>
            </div> -->

            <div style='border:1px solid #C64333'></div>

            <div class="row">
              <div class="col-lg-4 col-xs-6">
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;111</h6>
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;在售车辆</h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>已完成支付</h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6>11</h6>
                    <h6>用户非卖车辆</h6>
              </div>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
                <h3>
                    5722<sup style="font-size:20px">条</sup>
                </h3>
                <p>
                    分享数量
                </p>
            </div>
            <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
                <i class="ion ion-share"></i>
            </div>

            <!-- <div class="progress xxs">
              <div class="progress-bar progress-bar-aqua" style="width: 70%"></div>
              <div class="progress-fill" style="width: 70%"></div>
            </div> -->

            <div style='border:1px solid #565397'></div>

            <div class="row">
              <div class="col-lg-4 col-xs-6">
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;111</h6>
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;分享至微信</h6>
              </div>
              <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>分享至微博</h6>
              </div>
              <!-- <div class="col-lg-4 col-xs-6">
                    <h6>111</h6>
                    <h6>用户非卖车辆</h6>
              </div> -->
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-teal">
            <div class="inner">
                <h3>
                   111<sup style="font-size:20px">条</sup>
                </h3>
                <p>
                    文章
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-document"></i>
            </div>

            <div style='border:1px solid #33B7B7'></div>

            <div class="row">
            <div class="col-lg-4 col-xs-6">
                  <h6>&nbsp;&nbsp;&nbsp;&nbsp;111</h6>
                  <h6>&nbsp;&nbsp;&nbsp;&nbsp;热评</h6>
            </div>
            <!-- <div class="col-lg-4 col-xs-6">
                  <h6>111</h6>
                  <h6>活跃用户</h6>
            </div>
            <div class="col-lg-4 col-xs-6">
                  <h6>111</h6>
                  <h6>爱车认证人数</h6>
            </div> --><br/><br/><br/>
          </div>

            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!--<div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">系统消息</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>标题</th>
                    <th>Status</th>
                    <th>Popularity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>

          </div>
        </div>
      </div>-->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">用户增长图表</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart"> 
                <!--<canvas id="barChart" style="height:230px"></canvas> -->
              <?= ChartJs::widget([
    'type' => 'line',
    'options' => [
                           
                            'height' => 280,
                            'width' => 1000
                        ],
    'data' => [
        'labels' => ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
        'datasets' => [
            [
                'label' => "今年",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [1,2,3]
            ],
            [
                'label' => "去年",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [1,2,3]
            ]
        ]
    ]
]);
?>
                <script type="text/javascript">
                    // $('#user-w0').css({'width':'100%'});
                    // document.getElementById('user-w0').style.width="100%";
                </script>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

     
    
    <!-- /.content -->

</section>