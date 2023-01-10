  <div class="content-wrapper">


    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">E-Commerce Tracker Summary</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <!-- Main row -->
<!--         <div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Selamat datang di aplikasi E-Commerce Tracker
                  </h3>
                </div>
                <div class="card-body">
                  <p>Aplikasi ini adalah sebuah aplikasi yang tujuannya untuk membantu mencari dan memantau data penjualan produk pada sebuah e-commerce. bisa mengambil data historis penjualan dari e-commerce dan kemudian menamipilkan datanya dalam bentuk sebuah web aplication. Aplikasi ini memiliki sebuah program yang fungsinya untuk mengambil data penjualan e-commerce yang terlihat di web e-commerce. Program ini akan berjalan otomatis setiap hari untuk mengambil data sehingga terbentuk suatu data historis penjualan tiap produk yang ada pada e-commerce tersebut. Kemudian data tersebut akan divisualisasikan kepada user dalam bentuk grafik. User nantinya bisa mencari produk dan aplikasi bisa menampilkan data detil dari produk tersebut.</p>
                </div>
              </div>
            </div>
        </div> -->
        <div class="row">
          <div class="col-md-2">
            <div class="info-box" id="summary_data">
              <!-- <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span> -->
              <div class="info-box-content">
                 <span class="info-box-number">Jumlah Produk : 1,410</span>
                 <span class="info-box-number">Jumlah Kategori : 1,410</span>
                 <span class="info-box-number">Jumlah Data : 1,410</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">

        <div class="card card-solid">
            <div class="card-body">
                 <div class="input-group">
                   <input type="search" id="searchbar" class="form-control form-control"  placeholder="Search product">
                   <div class="input-group-append">
                     <button type="submit" id="searchbtn" class="btn btn-default">
                       <i class="fa fa-search"></i>
                     </button>
                   </div>
                 </div>
             </div>
         </div>
            </div>
        </div>
        <div class="row">
          <!-- Left col -->
          <div class="col-lg-6">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Top 10 Kategori Dengan Penjualan Terbanyak
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div id="container"></div>
              </div><!-- /.card-body -->
            </div>
          </div>
          <!-- /.Left col -->
          <!-- Left col -->
          <div class="col-lg-6">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Top 10 Produk Terfavorit 
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div id="container2"></div>
              </div><!-- /.card-body -->
            </div>
          </div>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    // get_data_chart();
    get_top_category('container');
    get_top_product('container2')
    get_data_summary();
    $("#searchbtn").click(function() {
        search();
    });
    $("#searchbar").keypress(function(event) {
        if (event.keyCode == 13) {
            search();
        }
    });
});
function search() {
    var keyword = $("#searchbar").val();
    openUrl("<?php echo base_url(); ?>App/search?keyword="+keyword)
}
function openUrl(url) {
    window.open(url, '_blank');
}
function create_table(container,x,series,textbawah,textinfo){
    Highcharts.chart(container, {
      chart: {
            type: 'bar',
            scrollablePlotArea: {
                minHeight: 500
            },
            marginRight: 50
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },

        xAxis: {
            categories: x,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: textbawah,
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: false,
        credits: {
            enabled: false
        },
        colors: ['#C22026'],
        series: [{
            name: textinfo,
            data: series
        }]
    });
}
function get_data_summary() {

    jQuery.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>GetData/get_data_summary",
       dataType: 'json',
       success: function(response) {
           console.log(response);
           $('#summary_data').html(response);
       },
       error: function(response){
           console.log(response);
       },
       complete: function(){
       }
    });
    
}
function get_top_category(container) {

    jQuery.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>GetData/get_top_category",
       dataType: 'json',
       success: function(response) {
           console.log(response);
           create_table(container,response['category_name'],response['category_val'],'Jumlah Terjual','Terjual')
       },
       error: function(response){
           console.log(response);
       },
       complete: function(){
       }
    });
    
}
function get_top_product(container) {

    jQuery.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>GetData/get_top_product",
       dataType: 'json',
       success: function(response) {
           console.log(response);
           create_table(container,response['product_name'],response['product_reviewer'],'Jumlah Difavoritkan','Difavoritkan')
       },
       error: function(response){
           console.log(response);
       },
       complete: function(){
       }
    });
    
}


</script>