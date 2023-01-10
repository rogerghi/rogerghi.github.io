<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid"></div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <img id="product_image" src="#" class="product-image" alt="Product Image">
            </div>
            <div class="col-md-6">
              <h3 class="my-3" style="cursor: pointer;" onclick="openURL('product_name')" id="product_name"></h3>
              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">Product Price</dt>
                  <dd class="col-sm-8" id="product_price"></dd>
                  <dt class="col-sm-4">Product Stock</dt>
                  <dd class="col-sm-8" id="product_stock"></dd>
                  <dt class="col-sm-4">Product Reviewed</dt>
                  <dd class="col-sm-8" id="product_review"></dd>
                  <dt class="col-sm-4">Category</dt>
                  <dd class="col-sm-8" id="product_category"></dd>
                  <dt class="col-sm-4">Seller Name</dt>
                  <dd class="col-sm-8" style="cursor:pointer;" id="seller_name" onclick="openURL('seller_name')"></dd>
                  <dt class="col-sm-4">Seller Location</dt>
                  <dd class="col-sm-8" id="seller_location"></dd>
                </dl>
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
   get_data_detail();

});
var product_link;
var seller_link;
var date;
function get_data_detail(){
    var url_string = window.location.href;
    var url = new URL(url_string);
    var keyword = url.searchParams.get("id");
    // console.log(keyword);
    jQuery.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>GetData/get_product_detail",
       dataType: 'json',
       data: {keyword:keyword},
       success: function(response) {
           console.log(response);
           document.getElementById("product_image").src = response['product_img'];
           $('#product_name').html(response['product_name']+'&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i>');
           $('#product_price').html(response['product_price']);
           $('#product_stock').html(response['product_stock']);
           $('#product_review').html(response['product_reviewer']);
           $('#product_category').html(response['category']);
           $('#seller_name').html(response['seller_name']+'&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i>');
           $('#seller_location').html(response['seller_location']);
           product_link = response['product_link'];
           seller_link = response['seller_link'];
           date  = response['date'];
           create_data_chart_price('container_price','Highest Price',response['hprice_history'],'Lowest Price',response['lprice_history']);
           create_data_chart('container_stock','Product Stock',response['stock_history']);
           create_data_chart('container_sold','Product Sold',response['sold_history']);
           create_data_chart('container_discount','Product Discount',response['discount_history']);
           create_data_chart('container_rating','Product Rating',response['rating_history']);
           create_data_chart('container_review','Product Review',response['review_history']);
       },
       error: function(response){
           console.log(response);
       },
       complete: function(){
          // get_data_chart();
          // unset_session();
       }
    });
 }
 function openURL(name) {
  if (name == 'product_name') {
        window.open(product_link, '_blank');
  }if (name == 'seller_name') {
        window.open(seller_link, '_blank');
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
 function create_data_chart(container,name,data){
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

        colors: ['#C22026'],

        series: [{
            name: name,
            data: data
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