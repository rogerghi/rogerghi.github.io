<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid"></div>
  </div>
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
              <div class="card card-solid">
                <div class="card-header" style="background: #C22026; color: white;">
                  <h3 class="card-title"> Product 1</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <img id="product_image_1" src="#" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-md-9">
                      <h3 class="my-3" style="cursor: pointer;" onclick="openURL('product_name_1')" id="product_name_1"></h3>
                      <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-4">Product Price</dt>
                          <dd class="col-sm-8" id="product_price_1"></dd>
                          <dt class="col-sm-4">Product Stock</dt>
                          <dd class="col-sm-8" id="product_stock_1"></dd>
                          <dt class="col-sm-4">Product Reviewed</dt>
                          <dd class="col-sm-8" id="product_review_1"></dd>
                          <dt class="col-sm-4">Category</dt>
                          <dd class="col-sm-8" id="product_category_1"></dd>
                          <dt class="col-sm-4">Seller Name</dt>
                          <dd class="col-sm-8" style="cursor:pointer;" id="seller_name_1" onclick="openURL('seller_name_1')"></dd>
                          <dt class="col-sm-4">Seller Location</dt>
                          <dd class="col-sm-8" id="seller_location_1"></dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-solid">
                <div class="card-header" style="background: #20c2bc; color: white;">
                  <h3 class="card-title"> Product 2</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <img id="product_image_2" src="#" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-md-9">
                      <h3 class="my-3" style="cursor: pointer;" onclick="openURL('product_name_2')" id="product_name_2"></h3>
                      <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-4">Product Price</dt>
                          <dd class="col-sm-8" id="product_price_2"></dd>
                          <dt class="col-sm-4">Product Stock</dt>
                          <dd class="col-sm-8" id="product_stock_2"></dd>
                          <dt class="col-sm-4">Product Reviewed</dt>
                          <dd class="col-sm-8" id="product_review_2"></dd>
                          <dt class="col-sm-4">Category</dt>
                          <dd class="col-sm-8" id="product_category_2"></dd>
                          <dt class="col-sm-4">Seller Name</dt>
                          <dd class="col-sm-8" style="cursor:pointer;" id="seller_name_2" onclick="openURL('seller_name_2')"></dd>
                          <dt class="col-sm-4">Seller Location</dt>
                          <dd class="col-sm-8" id="seller_location_2"></dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Product Price</h3>
            </div>
            <div class="card-body">
              <div id="container_price"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Product Stock</h3>
            </div>
            <div class="card-body">
              <div id="container_stock"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Product Sold </h3>
            </div>
            <div class="card-body">
              <div id="container_sold"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Product Discount </h3>
            </div>
            <div class="card-body">
              <div id="container_discount"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Product Rating </h3>
            </div>
            <div class="card-body">
              <div id="container_rating"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Product Reviewer </h3>
            </div>
            <div class="card-body">
              <div id="container_review"></div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
   // get_data_chart();
   get_compare_detail();

});
var product_link = [];
var seller_link = [];
var date;
function get_compare_detail(){
    // console.log(keyword);
    jQuery.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>GetData/get_compare_detail",
       dataType: 'json',
       success: function(response) {
           console.log(response['detail_1']);
           var p1 = response['detail_1'];
           var p2 = response['detail_2'];
           document.getElementById("product_image_1").src = p1['product_img'];
           document.getElementById("product_image_2").src = p2['product_img'];
           
           $('#product_name_1').html(p1['product_name']+'&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i>');
           $('#product_price_1').html(p1['product_price']);
           $('#product_stock_1').html(p1['product_stock']);
           $('#product_review_1').html(p1['product_reviewer']);
           $('#product_category_1').html(p1['category']);
           $('#seller_name_1').html(p1['seller_name']+'&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i>');
           $('#seller_location_1').html(p1['seller_location']);

           $('#product_name_2').html(p2['product_name']+'&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i>');
           $('#product_price_2').html(p2['product_price']);
           $('#product_stock_2').html(p2['product_stock']);
           $('#product_review_2').html(p2['product_reviewer']);
           $('#product_category_2').html(p2['category']);
           $('#seller_name_2').html(p2['seller_name']+'&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i>');
           $('#seller_location_2').html(p2['seller_location']);



           product_link[0] = p1['product_link'];
           seller_link[0] = p1['seller_link'];
           product_link[1] = p2['product_link'];
           seller_link[1] = p2['seller_link'];

           let Array1 = p1['date'];
           let Array2 = p2['date'];
           let difference = $(Array2).not(Array1).get();
           console.log(difference);
           date  = p1['date'];
           create_data_chart_price('container_price',p1['product_name'].slice(0,15),p1['hprice_history'],p2['product_name'].slice(0,15),p2['lprice_history']);
           create_data_chart('container_stock',p1['product_name'].slice(0,15),p1['stock_history'],p2['product_name'].slice(0,15),p2['stock_history']);
           create_data_chart('container_sold',p1['product_name'].slice(0,15),p1['sold_history'],p2['product_name'].slice(0,15),p2['sold_history']);
           create_data_chart('container_discount',p1['product_name'].slice(0,15),p1['discount_history'],p2['product_name'].slice(0,15),p2['discount_history']);
           create_data_chart('container_rating',p1['product_name'].slice(0,15),p1['rating_history'],p2['product_name'].slice(0,15),p2['rating_history']);
           create_data_chart('container_review',p1['product_name'].slice(0,15),p1['review_history'],p2['product_name'].slice(0,15),p2['review_history']);
       },
       error: function(response){
           console.log(response);
       },
       complete: function(){
          // unset_session();
       }
    });
 }
 function openURL(name) {
  if (name == 'product_name_1') {
        window.open(product_link[0], '_blank');
  }if (name == 'seller_name_1') {
        window.open(seller_link[0], '_blank');
  }
  if (name == 'product_name_2') {
        window.open(product_link[1], '_blank');
  }if (name == 'seller_name_2') {
        window.open(seller_link[1], '_blank');
  }
 }
 function create_data_chart_price(container,name,data,name2,data2){
    Highcharts.chart(container, {
        chart: {
            height: 300,
            type: 'line'
        },
        credits: { enabled: false },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        yAxis: {
            title: {
                text: 'Price'
            }
        },

        xAxis: {
            categories: date,
        crosshair: true
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        colors: ['#C22026','#20c2bc'],

        series: [{
            name: name,
            data: data
        },{
            name: name2,
            data: data2
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
 }
 function create_data_chart(container,name1,data1,name2,data2){
    Highcharts.chart(container, {
        chart: {
            height: 300,
            type: 'line'
        },
        credits: { enabled: false },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        yAxis: {
            title: {
                text: name
            }
        },

        xAxis: {
            categories: date,
        crosshair: true
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        colors: ['#C22026','#20C2BC'],

        series: [{
            name: name1,
            data: data1
        },{
            name: name2,
            data: data2
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
 }
 function unset_session() {
    return jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>" + "GetData/unset_session_detail",
      success: function() {
      },
      error: function() {
        console.log('session error');
      },
      complete: function() {
        return 'done';
      }
    });
  }
</script>