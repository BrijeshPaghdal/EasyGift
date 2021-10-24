$(document).ready(function() {

  var geocoder;
  var map;

  var url = window.location.href;
  var url = url.split('/');
  var url = url[url.length - 1];

  //===================================== LOGIN =====================================//

  if (url.split('?').includes('login.php')) {
    $("#loginForm").on("submit", function(e) {

      e.preventDefault();
      $('#log-err').remove();
      let formData = new FormData(loginForm);
      if ($('#S_Email').val() != '' && $('#S_Passwd').val() != '') {
        $.ajax({
          url: "ajax/ajax-seller-login.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == 0) {
              $('.contact100-form-checkbox').before(
                "<label class='label bg-red m-b-10' id='log-err'>This Account is Blocked</label>"
              );
            } else if (data == 1) {
              document.location = "index.php";
            } else if (data == 2) {
              $('.contact100-form-checkbox').before(
                "<label class='label bg-amber m-b-10' id='log-err'>Please Wait Until Confirmation</label>"
              );
            } else if (data == 3) {
              $('.contact100-form-checkbox').before(
                "<label class='label bg-red m-b-10' id='log-err'>Your registration is request is rejected</label>"
              );
            } else if (data == 4) {
              $('.contact100-form-checkbox').before(
                "<label class='label bg-red m-b-10' id='log-err'>Username or password is incorrect</label>"
              );
            } else {
              alert("An Error Occured... Something went wrong");
            }
          }
        });
      }

    });
  }

  //===================================== PRODUCT LIST =====================================//

  if (url.split('?').includes('product-list.php')) {
    showData();

    function showData() {
      $.ajax({
        url: "ajax/ajax-product-list.php",
        type: "POST",
        success: function(data) {
          $("#product-list").html(data);
        }
      });
    }

    ('use strict');
    $(function() {
      $(document).on('click', '#btnProdDelete', function(e) {
        e.preventDefault();
        var type = $(this).data('type');
        var productId = $(this).data('id');
        if (type === 'confirm') {
          showCancelMessage(productId);
        }
      });
    });

    function showCancelMessage(productId) {
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this product detail!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
      }, function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: './ajax/ajax-delete-product.php',
            type: 'POST',
            data: {
              prod_id: productId
            },
            success: function(data) {
              if (data == 1) {
                swal("Deleted!", "Your product has been deleted.", "success");
                showData();
              } else if (data == 2) {
                swal("Cancelled", "Error Occured in deleting product", "error");
              }
            }
          });
        } else {
          swal("Cancelled", "Product is Not Deleted", "warning");
        }
      });
    }


  }

  //===================================== Edit PRODUCT =====================================//

  if (url.split('?').includes('edit-product.php')) {
    $(document).on("change", "#Cate_Name", function(e) {
      val = this.value;
      getSubCate(val);
    });
    if ($("#Sub_C_Name").val() == null) {
      getSubCate($("#Cate_Name").val());
    }

    function getSubCate(val1) {
      $.ajax({
        url: "ajax/ajax-select-sub-cate.php",
        type: "POST",
        data: {
          cate_name: val1
        },
        success: function(data) {
          $("#Sub_C_Name").html(data);
        }
      });
    }

    $("#formEdit").on("submit", function(e) {

      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({

        url: "./ajax/ajax-edit-product.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == 1) {
            swal({
              title: "Updated!",
              text: "Your product updated succesfully.",
              type: "success",
              showCancelButton: false,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "ok",
              closeOnConfirm: false,
              closeOnCancel: false
            }, function(isConfirm) {
              if (isConfirm) {
                document.location.href = "http://localhost/phpproj/EasyGift/vendor/product-list.php";
              }
            });
          } else if (data == 2) {
            swal("Cancelled", "Image upload failed", "warning");
          } else if (data == 3) {
            swal("Cancelled", "Image upload failed", "warning");
          } else {
            swal("Cancelled", "Product Update Failed!!", "warning");
          }
        }
      });

    });
  }

  //===================================== ADD PRODUCT =====================================//

  if (url.split('?').includes('add-product.php')) {
    getSubCate($("#Cate_Name").val());

    $("#Cate_Name").on("change", function(e) {
      val = this.value;
      getSubCate(val);
    });

    $("#formAddProduct").on("submit", function(e) {

      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({

        url: "ajax/ajax-insert-product.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == 0) {
            swal("Cancelled", "An Error Occured", "warning");
          } else if (data == 1) {
            swal("Cancelled", "Image Size is too Big", "warning");
          } else if (data == 2) {
            swal("Cancelled", "Please Select Product Image", "warning");
          } else if (data == 3) {
            swal("Cancelled", "Please Select proper Image", "warning");
          } else if (data == 4) {
            swal("Cancelled", "Please Select for whom Product is suggest for", "warning");
          } else if (data == 5) {
            swal("Inserted", "Product Inserted successfully", "success");
            $("#formAddProduct").trigger("reset");
          } else {
            alert(data);
          }

        }
      });

    });

    function getSubCate(val) {
      $.ajax({
        url: "ajax/ajax-select-sub-cate.php",
        type: "POST",
        data: {
          cate_name: val
        },
        success: function(data) {
          $("#Sub_C_Name").html(data);
        }
      });
    }
  }

  //===================================== ORDER =====================================//

  if (url.split('?').includes('order.php')) {
    showData();

    function showData() {
      $.ajax({
        url: "ajax/ajax-order-view.php",
        type: "POST",
        success: function(data) {
          $("#order-view").html(data);
        }
      });
    }

    $(document).on("change", "#Order_Status", function(e) {
      orderStatus(this);
    });
  }

  //===================================== PROFILE =====================================//
  if (url.split('?').includes('profile.php')) {

    var latitude = parseFloat($("#latitude").val());
    var longitude = parseFloat($("#longitude").val());

    initMap(latitude, longitude);
    // google.maps.event.addDomListener(window, 'load', initialize);


    if ($("#latitude").val() && $("#longitude").val()) {

      initializegetAddr(latitude, longitude);
    } else {

      //=================Location========================//

      let apiKey = '6f9a11c5d595ff4f0cbbebfaa90fb55ddcb93bba26c53696d2bc564a';

      if ("geolocation" in navigator) {
        var gps = navigator.geolocation.getCurrentPosition(function(position) {
          var lat = position.coords.latitude;
          var long = position.coords.longitude;


          $("#lat").val(lat);
          $("#long").val(long);
          initializegetAddr(lat, long);
        });
        /* geolocation is available */
      } else {
        json(`https://api.ipdata.co?api-key=${apiKey}`).then(data => {

          $("#lat").val(data.latitude);
          $("#long").val(data.longitude);
          initializegetAddr(data.latitude, data.longitude);

        });
      }


    }


    //--------------------------DropDown-----------------------------------//

    $("#bank_country").on("change", function(e) {
      val = this.value;
      getBankStates(val);
    });

    $("#bank_state").on("change", function(e) {
      val = this.value;
      getBankCities(val);
    });

    $("#bank_city").on("change", function(e) {
      val = this.value;
      getBank(val);
    });

    $("#Country").on("change", function(e) {
      val = this.value;
      getStates(val);
    });

    $("#State").on("change", function(e) {
      val = this.value;
      getCities(val);
    });

    $("#bank_name").on("change", function(e) {
      bank_name = this.value;
      bank_state = $("#bank_state").val();
      bank_city = $("#bank_city").val();
      getBranch(bank_name, bank_state, bank_city);
    });

    $("#bank_branch").on("change", function(e) {
      bank_branch = this.value;
      bank_name = $("#bank_name").val();
      getIFSC(bank_branch, bank_name);
      getBankAddress(bank_branch, bank_name);
    });
    $("#Settings").on("click", function(e) {
      $("#Over_View").hide();
      document.getElementById("About_Setting").classList.remove('col-lg-7');
      document.getElementById("About_Setting").classList.toggle('col-lg-12');
    });
    $("#About").on("click", function(e) {
      document.getElementById("About_Setting").classList.remove('col-lg-12');
      document.getElementById("About_Setting").classList.add('col-lg-7');
      $("#Over_View").show();
    });

    //--------------------------Account Setting -----------------------------------//

    $(document).on("submit", "#Account_Setting", function(e) {

      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({

        url: "ajax/ajax-seller-account-setting.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == 0) {
            swal("Cancelled", "An Error Occured", "warning");
          } else if (data == 1) {
            swal("Cancelled", "Image Size is too Big", "warning");
          } else if (data == 2) {
            swal("Cancelled", "Please Select proper Image", "warning");
          } else if (data == 3) {
            swal({
              title: "Updated",
              text: "Account Settings Updated",
              type: "success",
              confirmButtonText: "Ok",
            }, function(isConfirm) {
              if (isConfirm) {
                document.location = "profile.php";
              }
            });
          } else {
            alert(data);
          }
        }
      });

    });
    //--------------------------Shop Setting -----------------------------------//

    $(document).on("submit", "#Shop_Setting", function(e) {

      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({

        url: "ajax/ajax-seller-shop-setting.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == 0) {
            swal("Cancelled", "An Error Occured", "warning");
          } else if (data == 1) {

            swal({
              title: "Updated",
              text: "Shop Details Are Updated",
              type: "success",
              confirmButtonText: "Ok",
            }, function(isConfirm) {
              if (isConfirm) {
                document.location = "profile.php";
              }
            });
          } else {
            alert(data);
          }
        }
      });

    });

    //--------------------------CHANGE BANK SETTINGS -----------------------------------//

    $(document).on("submit", "#Bank_Setting", function(e) {

      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({

        url: "ajax/ajax-seller-bank-details-setting.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == 0) {
            alert(data);
            swal("Cancelled", "An Error Occured", "warning");
          } else if (data == 1) {

            swal({
              title: "Updated",
              text: "BANK Details Are Updated",
              type: "success",
              confirmButtonText: "Ok",
            }, function(isConfirm) {
              if (isConfirm) {
                document.location = "profile.php";
              }
            });
          } else {
            alert(data);
          }
        }
      });

    });
    //--------------------------Change Current Password -----------------------------------//

    $(document).on("submit", "#changeCurrPassword", function(e) {

      e.preventDefault();
      $('#passwd-error').remove();

      if ($("#passwd").val() == '') {
        $('#passwd').after(
          "<label class='error' id='passwd-error'>This field is required</label>"
        );
      }

      password = $("#newpasswd").val();
      confirmPassword = $("#confpasswd").val();

      var chk = checkConfirmPassswd(password, confirmPassword);
      if (chk == 1) {
        $('#newpasswd').after(
          "<label class='error' id='passwd-error'>This field is required</label>"
        );
      } else if (chk == 2) {
        $('#confpasswd').after(
          "<label class='error' id='passwd-error'>This field is required</label>"
        );
      } else if (chk == 3) {
        $('#confpasswd').after(
          "<label class='error' id='passwd-error'>Confirm Password not match</label>"
        );
      } else if (chk == 4) {
        let formdata = new FormData(this);
        $.ajax({
          url: "ajax/ajax-changecurr-password.php",
          type: "POST",
          data: formdata,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == 1) {
              swal("Success", "Password Change Successfully", "success");
              $("#changeCurrPassword").trigger("reset");
            } else if (data == 2) {
              swal("Error", "Current password is wrong", "error");
              $("#changeCurrPassword").trigger("reset");
            } else if (data == 3) {
              swal("Error", "An Error Occured", "error");
              $("#changeCurrPassword").trigger("reset");
            } else {
              alert(data);
            }
          }
        });
      }
    });


    $(document).on("focus", "#passwd", function(e) {
      $('#passwd-error').remove();
    });

    $(document).on("focus", "#newpasswd", function(e) {
      $('#passwd-error').remove();
    });

    $(document).on("focus", "#confpasswd", function(e) {
      $('#passwd-error').remove();
    });

  }

  //===================================== Producct-detail =====================================//

  if (url.split('?').includes('product-detail.php')) {
    ajaxProductReview($("#prod_id").val());
  }

  //===================================== INDEX =====================================//

  if (url.split('?').includes('index.php')) {
    var dbDate = [];
    var Orders;

    getChartData();
    getBigPieChartData();
    getQuickProductView();
    getQuickOrderView();
    ajaxQuickProductReview();

    $(document).on("change", "#Order_Status_2", function(e) {
      orderStatus(this);
    });
  }

  //===================================== Downloads =====================================//

  if (url.split('?').includes('downloads.php')) {
    $("#scripts").html("");
    $(document).on("change", "#get_report", function(e) {
      var val = $(this).val();
      switch (val) {
        case "0":
          getProductReport(0);
          break;
        case "1":
          getProductReport(1);
          break;
        case "2":
          getOrderReport(1);
          break;
        case "3":
          getOrderReport(2);
          break;
        case "4":
          getOrderReport(0);
          break;
        default:
      }
    });

  }

  //===================================Draw Chart===================================//


  function drawChart(Orders, dbDate) {
    var draw = Chart.controllers.line.prototype.draw;
    Chart.controllers.lineShadow = Chart.controllers.line.extend({
      draw: function() {
        draw.apply(this, arguments);
        var ctx = this.chart.chart.ctx;
        var _stroke = ctx.stroke;
        ctx.stroke = function() {
          ctx.save();
          ctx.shadowColor = "#00000075";
          ctx.shadowBlur = 10;
          ctx.shadowOffsetX = 8;
          ctx.shadowOffsetY = 8;
          _stroke.apply(this, arguments);
          ctx.restore();
        };
      },
    });

    try {
      //Sales chart
      var ctx = document.getElementById("line-chart");
      if (ctx) {
        ctx.height = 150;
        var myChart = new Chart(ctx, {
          type: "lineShadow",
          data: {
            labels: dbDate,
            type: "line",
            defaultFontFamily: "Poppins",
            datasets: [{
              label: "Orders",
              data: Orders,
              backgroundColor: "transparent",
              borderColor: "blue",
              borderWidth: 2,
              pointStyle: "circle",
              pointRadius: 3,
              pointBorderColor: "transparent",
              pointBackgroundColor: "blue",
            }, ],
          },
          options: {
            responsive: true,
            tooltips: {
              mode: "index",
              titleFontSize: 12,
              titleFontColor: "#000",
              bodyFontColor: "#000",
              backgroundColor: "#fff",
              titleFontFamily: "Poppins",
              bodyFontFamily: "Poppins",
              cornerRadius: 3,
              intersect: false,
            },
            legend: {
              display: false,
              labels: {
                usePointStyle: false,
                fontFamily: "Poppins",
              },
            },
            scales: {
              xAxes: [{
                display: true,
                gridLines: {
                  display: false,
                  drawBorder: false,
                },
                scaleLabel: {
                  display: true,
                  labelString: "Date",
                },
                ticks: {
                  fontFamily: "Poppins",
                  fontColor: "#9aa0ac", // Font Color
                },
              }, ],
              yAxes: [{
                display: true,
                gridLines: {
                  display: false,
                  drawBorder: false,
                },
                scaleLabel: {
                  display: true,
                  labelString: "Orders",
                  fontFamily: "Poppins",
                },
                ticks: {
                  fontFamily: "Poppins",
                  fontColor: "#9aa0ac", // Font Color
                },
              }, ],
            },
            title: {
              display: false,
              text: "Last 7 days Orders",
            },
          },
        });
      }
    } catch (error) {
      console.log(error);
    }
  }

  function drawPieChart(product, productName, high, chart) {

    try {
      //pie chart
      var ctx = chart;
      if (ctx) {
        ctx.height = high;
        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            datasets: [{
              data: product,
              backgroundColor: ["#FF0000", "#A1FF0A", "#FFD300", "#BE0AFF", "#DEFF0A", "#FF8700", "#0AEFFF", "#147DF5", "#580AFF", "#0AFF99"],
              hoverBackgroundColor: ["#FF0000", "#A1FF0A", "#FFD300", "#BE0AFF", "#DEFF0A", "#FF8700", "#0AEFFF", "#147DF5", "#580AFF", "#0AFF99"],
            }, ],
            labels: productName,
          },
          options: {
            legend: {
              position: "top",
              labels: {
                fontFamily: "Poppins",
                fontColor: "#9aa0ac",
              },
            },
            legend: {
              display: false,
              labels: {
                usePointStyle: false,
                fontFamily: "Poppins",
              },
            },
            responsive: true,
          },
        });
      }
    } catch (error) {
      console.log(error);
    }
  }

  //--------------------------functions -----------------------------------//

  function json(url) {
    return fetch(url).then(res => res.json());
  }
  var temp = 0;

  function getProductReport(status) {
    $("#scripts").html("");

    $.ajax({
      url: "ajax/ajax-product-report.php",
      type: "POST",
      data: {
        status: status
      },
      success: function(data) {
        $('#exportTable').html(data);
        if (temp == 0) {
          $("#scripts").html(" <script src='./assets/js/app.min.js'> </script> <script src='./assets/js/table.min.js'></script><script src='./assets/js/admin.js'></script><script src='./assets/js/bundles/export-tables/dataTables.buttons.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.flash.min.js'></script><script src='./assets/js/bundles/export-tables/jszip.min.js'></script><script src='./assets/js/bundles/export-tables/pdfmake.min.js'></script><script src='./assets/js/bundles/export-tables/vfs_fonts.js'></script><script src='./assets/js/bundles/export-tables/buttons.html5.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.print.min.js'></script><script src='./assets/js/pages/tables/jquery-datatable.js'></script><script src='./assets/js/custom.js'></script>");
        }
        temp++;
      }
    });
  }

  function getOrderReport(status) {
    $("#scripts").html("");
    $.ajax({
      url: "ajax/ajax-order-report.php",
      type: "POST",
      data: {
        status: status
      },
      success: function(data) {
        $('#exportTable').html(data);
        if (temp == 0) {
          $("#scripts").html(" <script src='./assets/js/app.min.js'> </script> <script src='./assets/js/table.min.js'></script><script src='./assets/js/admin.js'></script><script src='./assets/js/bundles/export-tables/dataTables.buttons.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.flash.min.js'></script><script src='./assets/js/bundles/export-tables/jszip.min.js'></script><script src='./assets/js/bundles/export-tables/pdfmake.min.js'></script><script src='./assets/js/bundles/export-tables/vfs_fonts.js'></script><script src='./assets/js/bundles/export-tables/buttons.html5.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.print.min.js'></script><script src='./assets/js/pages/tables/jquery-datatable.js'></script><script src='./assets/js/custom.js'></script>");
        }
        temp++;
      }
    });
  }


  function orderStatus(id) {

    var currId = id;
    var currId = currId.id;
    var status = $(id).val();
    var status = status.split("/");

    if (status[0] == "Reject") {
      var id = status[1];
      swal({
        title: "Are you sure?",
        text: "You want to Reject this Order",
        type: "warning",
        confirmButtonText: "Yes!",
        cancelButtonText: "No, cancel!",
        showCancelButton: true,
        closeOnConfirm: true,
      }, function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: "./ajax/ajax-order-reject.php",
            type: "POST",
            data: {
              id: id
            },
            success: function(data) {
              if (data != 1) {
                alert(data);
              }
              if (currId == 'Order_Status_2') {
                getQuickOrderView();
              } else {
                showData();
              }

            }
          });
        } else {
          if (currId == 'Order_Status_2') {
            getQuickOrderView();
          } else {
            showData();
          }
        }
      });
    } else if (status[0] == "Complete") {
      var id = status[1];
      swal({
        title: "Are You Sure??",
        text: "The Order is Complete???",
        type: "info",
        confirmButtonText: "Yes!",
        cancelButtonText: "No, cancel!",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
      }, function(isConfirm) {
        if (isConfirm) {
          var myInterval = setInterval(function() {

            $.ajax({
              url: "./ajax/ajax-order-status.php",
              type: "POST",
              data: {
                id: id
              },
              success: function(data) {
                if (data == 1) {
                  if (currId == 'Order_Status_2') {
                    getQuickOrderView();
                    swal("Order", "Order is Complete", "success");
                    myStopFunction();
                  } else {
                    showData();
                    swal("Order", "Order is Complete", "success");
                    myStopFunction();
                  }
                }
              }
            });
          }, 1000);
        } else {
          if (currId == 'Order_Status_2') {
            getQuickOrderView();
          } else {
            showData();
          }
        }

        function myStopFunction() {
          clearInterval(myInterval);
        }

      });
    }
  }

  function ajaxProductReview(prod_id) {
    $.ajax({
      url: "ajax/ajax-product-reviews.php",
      type: "POST",
      data: {
        prod_id: prod_id
      },
      success: function(data) {
        $('#reviews').html(data);
      }
    });
  }

  function ajaxQuickProductReview() {
    $.ajax({
      url: "ajax/ajax-quick-product-review.php",
      type: "POST",
      success: function(data) {
        $('#quick-view-review').html(data);
      }
    });
  }

  function getQuickOrderView() {
    $.ajax({
      url: "ajax/ajax-quick-order-view.php",
      type: "POST",
      success: function(data) {
        $('#quick-order-view').html(data);
      }
    });
  }

  function getQuickProductView() {
    $.ajax({
      url: "ajax/ajax-quick-product-view.php",
      type: "POST",
      success: function(data) {
        $('#quick-product-view').html(data);
      }
    });
  }

  function getChartData() {
    var newDate = new Date();
    newDate.setDate(newDate.getDate() - 6);
    for (var i = 1; i <= 7; i++) {
      var dd = String(newDate.getDate()).padStart(2, '0');
      var mm = String(newDate.getMonth() + 1).padStart(2, '0');
      var date = dd + '/' + mm;
      dbDate.push(date);
      newDate.setDate(newDate.getDate() + 1);
    }

    $.ajax({
      url: "ajax/ajax-order-date.php",
      type: "POST",
      success: function(data) {

        var OrderCount = data;
        Orders = OrderCount.split(',');
        Orders = Orders.reverse();
        drawChart(Orders, dbDate);
      }
    });
  }


  function getBigPieChartData() {
    $.ajax({
      url: "ajax/ajax-get-sold-product.php",
      type: "POST",
      success: function(data) {

        var prodName = data;
        productName = prodName.split(',');
        var prodCount = document.getElementById('pie-chart-big').innerHTML;
        var productCount = prodCount.split(',');
        var chart = document.getElementById('pie-chart-big');

        drawPieChart(productCount, productName, 150, chart);
      }
    });
  }

  function initializegetAddr(lati, longi) {

    var map2;
    var marker2;
    var myLatlng = new google.maps.LatLng(lati, longi);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();

    var mapOptions = {
      zoom: 15,
      center: myLatlng,
    };

    map2 = new google.maps.Map(
      document.getElementById("myMap"),
      mapOptions);

    marker2 = new google.maps.Marker({
      map: map2,
      position: myLatlng,
      draggable: true
    });

    geocoder.geocode({
      'latLng': myLatlng
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#lati,#long').show();
          //$('#address').val(results[0].formatted_address);
          $('#lat').val(marker2.getPosition().lat());
          $('#long').val(marker2.getPosition().lng());
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map2, marker2);
        }
      }
    });

    google.maps.event.addListener(marker2, 'dragend', function() {

      geocoder.geocode({
        'latLng': marker2.getPosition()
      }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            // $('#address').val(results[0].formatted_address);
            $('#lat').val(marker2.getPosition().lat());
            $('#long').val(marker2.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map2, marker2);
          }
        }
      });
    });
  }

  function initMap(lati, long) {
    // The location of Uluru
    const uluru = {
      lat: lati,
      lng: long
    };
    // The map, centered at Uluru
    const map = new google.maps.Map(
      document.getElementById("map"), {
        zoom: 15,
        center: uluru,
      }
    );

    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }

  function checkConfirmPassswd(password1, password2) {
    if (password1 == '') {
      return 1;
    }
    // If confirm password not entered
    else if (password2 == '') {
      return 2;
    }
    // If Not same return False.
    else if (password1 !== password2) {
      return 3;
    }
    // If same return True.
    else {
      return 4;
    }
  }

  function getStates(val) {
    $.ajax({
      url: "ajax/ajax-select-states.php",
      type: "POST",
      data: {
        Country: val
      },
      success: function(data) {
        $("#State").html(data);
      }
    });
  }


  function getCities(val) {
    $.ajax({
      url: "ajax/ajax-select-cities.php",
      type: "POST",
      data: {
        State: val
      },
      success: function(data) {
        $("#City").html(data);
      }
    });
  }

  function getBankStates(val) {
    $.ajax({
      url: "ajax/ajax-select-bank-states.php",
      type: "POST",
      data: {
        Country: val
      },
      success: function(data) {
        $("#bank_state").html(data);
      }
    });
  }

  function getBankCities(val) {
    $.ajax({
      url: "ajax/ajax-select-bank-cities.php",
      type: "POST",
      data: {
        State: val
      },
      success: function(data) {
        $("#bank_city").html(data);
      }
    });
  }

  function getBank(val) {
    $.ajax({
      url: "ajax/ajax-select-bank.php",
      type: "POST",
      data: {
        City: val
      },
      success: function(data) {
        $("#bank_name").html(data);
      }
    });
  }

  function getBranch(bank_name, bank_state, bank_city) {
    $.ajax({
      url: "ajax/ajax-select-branch.php",
      type: "POST",
      data: {
        B_NAME: bank_name,
        State: bank_state,
        City: bank_city
      },
      success: function(data) {
        $("#bank_branch").html(data);
      }
    });
  }

  function getIFSC(bank_branch, bank_name) {
    $.ajax({
      url: "ajax/ajax-select-ifsc.php",
      type: "POST",
      data: {
        Branch: bank_branch,
        B_Name: bank_name
      },
      success: function(data) {

        $("#ifsc").html(data);
      }
    });
  }

  function getBankAddress(bank_branch, bank_name) {
    $.ajax({
      url: "ajax/ajax-select-bank-address.php",
      type: "POST",
      data: {
        Branch: bank_branch,
        B_Name: bank_name
      },
      success: function(data) {

        $("#bAddr").html(data);
      }
    });
  }
});