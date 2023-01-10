  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Search Product</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12">
         <div class="card card-solid">
           <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                 <div class="input-group">
                   <input type="search" id="searchbar" class="form-control form-control"  placeholder="Search product">
                   <div class="input-group-append">
                     <button type="submit" id="searchbtn" class="btn btn-default">
                       <i class="fa fa-search"></i>
                     </button>
                   </div>
                 </div>
                </div>
               <div class="col-md-6">
                 <select class="" data-live-search="true" multiple id="category_filter" title="Select Category">
                  </select>
                  <select class="selectpicker"  id="sort_filter" title="Sort By">
                     <option>Highest Price</option>
                     <option>Lowest Price</option>
                     <option>Highest Rating</option>
                     <option>Lowest Rating</option>
                     <option>Most Favorited</option>
                     <option>Least Favorited</option>
                  </select>
               </div>
            </div>     
           </div>
         </div>
      </div>
        </div>
        <div class="row" id="search_result">
        </div>
      </div>
    </section>
  </div>



<!-- Latest BS-Select compiled and minified CSS/JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function() {

        var url_string = window.location.href;
        var url = new URL(url_string);
        var keyword = url.searchParams.get("keyword");
        $("#searchbar").val(keyword);
        // $('#select_filter').selectpicker();
        get_data_table();
        get_all_category();
        $('#sort_filter').selectpicker();

        $("#searchbtn").click(function() {
            get_data_table();
            enable_tooltip();
        });
        $("#searchbar").keypress(function(event) {
            if (event.keyCode == 13) {
                get_data_table();
                enable_tooltip();
            }
        });

    });

    function enable_tooltip() {
        $('[data-toggle="tooltip"]').tooltip();
    }


    function closeAlertBox(status) {
        window.setTimeout(function() {
            if (status == 0) {
                $("#alert_success").fadeOut(300);
            }if (status == 2) {
                $("#alert_error_compare").fadeOut(300);
            }else {
                $("#alert_error").fadeOut(300);
            }
        }, 3000);
    }

    function get_data_table() {
        var keyword = $("#searchbar").val();
        var pre_filter = $("#category_filter").val();
        var orderby = $("#sort_filter").val();

        if (pre_filter != null) {
            var filter = pre_filter.join();
        } else {
            filter = null;
        }
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>GetData/get_search_data",
            dataType: 'json',
            data: {
                keyword: keyword,
                filter: filter,
                orderby: orderby
            },
            success: function(response) {
                console.log(response);
                if (response['response']=='') {
                    $('#search_result').html('&nbsp;&nbsp;&nbsp;&nbsp;Product tidak tersedia silahkan gunakan keyword lain');
                }else{
                    $('#search_result').html(response['response']);    
                }
                
            },
            error: function(response) {
                console.log(response);
            },
            complete: function() {
                enable_tooltip();
            }
        });
    }

    function get_all_category() {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>GetData/get_category",
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                $('#category_filter').html(response);
            },
            error: function(response) {
                console.log(response);
            },
            complete: function() {
                $('#category_filter').selectpicker({
                    size: 10
                });
            }
        });
    }

    function open_product(text) {
        set_session_sign(text);
        console.log(text);
        openUrl("<?php echo base_url(); ?>App/detail?id="+text);

    }

    function openUrl(url) {
        window.open(url, '_blank');
    }

    function set_session_sign(link) {
        return jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "GetData/set_session_detail",
            dataType: 'text',
            data: {
                link: link
            },
            success: function() {
                // console.log(response);
            },
            error: function() {
                console.log('session error');
            },
            complete: function() {
                return 'done';
            }
        });
    }

    function unset_session() {
        return jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "GetData/unset_session_detail",
            success: function() {},
            error: function() {
                console.log('session error');
            },
            complete: function() {
                return 'done';
            }
        });
    }
</script>