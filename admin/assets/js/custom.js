$(document).ready(function() {

  var geocoder;
  var map;

  var url = window.location.href;
  var url = url.split('/');
  var url = url[url.length - 1];

  // ======================= Login =============================
  if (url.split('?').includes('login.php')) {
    $('#loginForm').on('submit', function(e) {
      e.preventDefault();
      $('#log-err').remove();
      let formData = new FormData(loginForm);
      if ($('#A_Email').val() != '' && $('#A_Passwd').val() != '') {
        $.ajax({
          url: 'ajax/login-check.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == 1) {
              document.location = 'index.php';
            } else {
              $('.contact100-form-checkbox').before(
                "<label class='label bg-red m-b-10' id='log-err'>Username or password is incorrect </label>"
              );
            }
          },
        });
      }
    });
  }

  // ================================ Category View =================================//
  if (url.split('?').includes('category-list.php')) {
    showData();

    function showData() {
      $.post('ajax/ajax-category-list.php', function(data) {
        $('#category-list').html(data);
      });
    }

    // ============================== Category Add  ==========================  //

    $('#catename').on('focus', function() {
      $('#catename-error').text('');
    });

    $('#add').click(function(e) {
      e.preventDefault();

      $('#catename-error').text('');

      if ($('.form-control').val() != '') {
        let formData = new FormData(form_validation);
        $('#catename-error').text('');

        $.ajax({
          url: 'ajax/ajax-add-category.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == 'success') {
              swal('Inserted!', 'Category Inserted Successfully', 'success');
              showData();
              $('#form_validation').trigger('reset');
            } else if (data == 1) {
              swal('Error!', 'Image Size is too big', 'error');
            } else if (data == 2) {
              swal('Error!', 'Image is not selected', 'error');
            } else if (data == 3) {
              swal('Error!', 'Please Select Proper Image', 'error');
            } else if (data == 4) {
              swal('Error!', 'Category Already Exists', 'error');
            } else {
              swal('Error!', 'Category Not Inserted', 'error');
            }
          },
        });
      } else {
        $('.form-line').after(
          '<label id="catename-error" class="error" for="catename">This field is required.</label>'
        );
      }
    });

    // ============================== Category Delete  ==========================  //

    ('use strict');
    $(function() {
      $(document).on('click', '#btnCateDelete', function(e) {
        e.preventDefault();
        var type = $(this).data('type');
        var cateId = $(this).data('id');
        if (type === 'confirm') {
          showCancelMessage(cateId);
        }
      });
    });

    function showCancelMessage(cate_id) {
      swal({
          title: 'Are you sure?',
          text: 'You will not be able to recover this Category detail!',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          closeOnConfirm: false,
          closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: 'ajax/ajax-delete-category.php',
              type: 'POST',
              data: {
                cate_id: cate_id
              },
              success: function(data) {
                if (data == 1) {
                  swal('Deleted!', 'Category Deleted Successfully', 'success');
                  showData();
                } else if (data == 2) {
                  swal(
                    'Cancelled',
                    'Error Occured in deleting Category',
                    'error'
                  );
                } else {
                  alert(data);
                }
              }
            });
          } else {
            swal('Cancelled', 'Category is Not Deleted', 'error');
          }
        });
    }

    // ================================ Category Update =========================== //
    // $(document).on('click', '#btnCateUpdate', function (e) {
    //   e.preventDefault();
    //   $('#catename-error').text('');
    //   document.getElementById('update').disabled = false;
    //   $(this).data('id').remove();
    //   var cateId = $(this).data('id');
    //
    //   $.ajax({
    //     type: 'POST',
    //     url: 'ajax/ajax-get-category-details.php',
    //     data: {
    //       cate_id: cateId,
    //     },
    //     dataType: 'json',
    //     success: function (data) {
    //       $('#catename').attr('value', data.cname);
    //       $('#image_name').attr('value', data.iname);
    //       $('label').addClass('active');
    //       $('#form').addClass('focused');
    //       $('#form_validation').trigger('reset');
    //       $('#catename-error').text('');
    //     },
    //   });
    //   $('#update').on('click', function (e) {
    //     e.preventDefault();
    //     $('#cate_id').val(cateId);
    //     var formdata = new FormData(form_validation);
    //
    //     if ($('.form-control').val() != '') {
    //       $('#form_validation').trigger('reset');
    //       $.ajax({
    //         type: 'POST',
    //         url: 'ajax/ajax-update-category.php',
    //         data: formdata,
    //         contentType: false,
    //         processData: false,
    //         success: function (data) {
    //           console.log(data);
    //           if (data == 1) {
    //             alert('Image Size is too Big');
    //           } else if (data == 2) {
    //             alert('Image is not Selected');
    //           } else if (data == 3) {
    //             alert('Please Select proper Image');
    //           } else {
    //             showData();
    //           }
    //         },
    //       });
    //     } else {
    //       $('.form-line').after(
    //         '<label id="catename-error" class="error" for="catename">This field is required.</label>'
    //       );
    //     }
    //   });
    // });
  }


  //   ================================ Sub Category List ================================//
  if (url.split('?').includes('subcategory.php')) {
    showData();

    function showData() {
      $.post('ajax/ajax-sub-category-list.php', function(data) {
        $('#sub-category-list').html(data);
      });
    }


    $(document).on('click', '#btnSubCateDelete', function(e) {
      e.preventDefault();
      var type = $(this).data('type');
      var sub_c_id = $(this).data('id');
      if (type === 'confirm') {
        showCancelMessage(sub_c_id);
      }
    });

    function showCancelMessage(sub_c_id) {
      swal({
          title: 'Are you sure?',
          text: 'You will not be able to recover this Sub Category detail!',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          closeOnConfirm: false,
          closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: 'ajax/ajax-delete-sub-category.php',
              type: 'POST',
              data: {
                sub_c_id: sub_c_id
              },
              success: function(data) {
                if (data == 1) {
                  swal('Deleted!', 'Category Deleted Successfully', 'success');
                  showData();
                } else if (data == 2) {
                  swal(
                    'Cancelled',
                    'Error Occured in deleting Category',
                    'error'
                  );
                } else {
                  alert(data);
                }
              }
            });
          } else {
            swal('Cancelled', 'Category is Not Deleted', 'error');
          }
        });
    }

    //================================ Add Sub Catefory =============================//
    $('#add').click(function(e) {
      e.preventDefault();

      $('#catename-error').text('');

      if ($('.form-control').val() != '') {
        let formData = new FormData(form_validation);
        $('#catename-error').text('');

        $.ajax({
          url: 'ajax/ajax-add-sub-category.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == 'success') {
              swal('Inserted!', 'Sub Category Inserted Successfully', 'success');
              showData();
              $('#form_validation').trigger('reset');
            } else if (data == 1) {
              swal('Error!', 'Sub Category Already Exists', 'error');
            } else if (data == 2) {
              wal('Error!', 'Sub Category Not Inserted', 'error');
            } else {
              alert(data);
              swal('Error!', 'Sub Category Not Inserted', 'error');
            }
          },
        });
      } else {
        $('.form-line').after(
          '<label id="catename-error" class="error" for="catename">This field is required.</label>'
        );
      }
    });
  }

  //   ================================ Suggest For ================================//
  if (url.split('?').includes('suggestfor.php')) {
    showData();

    function showData() {
      $.post('ajax/ajax-suggestfor-list.php', function(data) {
        $('#suggest-for').html(data);
      });
    }

    $(document).on('change', '#minage', function(e) {
      var input = document.getElementById("maxage");
      input.setAttribute("min", this.value);
      var max = parseInt(this.value);
      max++;
      input.setAttribute("value", max);
    });

    $(document).on('click', '#btnSuggDelete', function(e) {
      e.preventDefault();
      var type = $(this).data('type');
      var sugg_id = $(this).data('id');
      if (type === 'confirm') {
        showCancelMessage(sugg_id);
      }
    });

    function showCancelMessage(sugg_id) {
      swal({
          title: 'Are you sure?',
          text: 'You will not be able to recover this Suggest For detail!',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          closeOnConfirm: false,
          closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: 'ajax/ajax-delete-suggestion.php',
              type: 'POST',
              data: {
                sugg_id: sugg_id
              },
              success: function(data) {
                if (data == 1) {
                  swal('Deleted!', 'Suggestion Deleted Successfully', 'success');
                  showData();
                } else if (data == 2) {
                  swal(
                    'Cancelled',
                    'Error Occured in deleting Suggest For',
                    'error'
                  );
                } else {
                  alert(data);
                }
              }
            });
          } else {
            swal('Cancelled', 'Suggest For is Not Deleted', 'error');
          }
        });
    }

    //================================ Add Suggest For =============================//
    $('#add').click(function(e) {
      e.preventDefault();

      $('#sugg-error').text('');
      $('#minage-error').text('');
      $('#maxage-error').text('');

      if ($('.form-control').val() != '' && $('#minage').val() < $('#maxage').val() && $('#minage').val() > 0 && $('#maxage').val() > 0) {
        let formData = new FormData(form_validation);
        $('#sugg-error').text('');

        $.ajax({
          url: 'ajax/ajax-add-suggestion.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == 'success') {
              swal('Inserted!', 'Suggest For Inserted Successfully', 'success');
              showData();
              $('#form_validation').trigger('reset');
            } else if (data == 1) {
              swal('Error!', 'Suggest For Already Exists', 'error');
            } else if (data == 2) {
              wal('Error!', 'Suggest For Not Inserted', 'error');
            } else {
              alert(data);
              swal('Error!', 'Suggest For Not Inserted', 'error');
            }
          },
        });
      } else {
        if ($('.form-control').val() == '') {
          $('#formSuggestfor').after(
            '<label id="sugg-error" class="error" for="sugg">This field is required.</label>'
          );
        }
        if ($('#minage').val() <= 0 || $('#minage').val() >= $('#maxage').val()) {

          $('#formMinage').after(
            '<label id="minage-error" class="error" for="minageError">Please Enter Proper value.</label>'
          );
        }
        if ($('#maxage').val() <= 0 || $('#minage').val() >= $('#maxage').val()) {
          $('#formMaxAge').after(
            '<label id="maxage-error" class="error" for="maxageerror">Please Enter Proper value.</label>'
          );
        }
      }
    });
  }


  //   ================================ Vendor List ================================//
  if (url.split('?').includes('vendors.php')) {
    showData();

    function showData() {
      $.post('ajax/ajax-vendor-list.php', function(data) {
        $('#vendor-list').html(data);
      });
    }
    $(document).on('change', '#Vendor_Status', function(e) {
      vendorStatus(this);
    });
  }

  // ======================================= Vendor Details ======================== //
  if (url.split('?').includes('vendor-details.php')) {
    var latitude = parseFloat($('#latitude').val());
    var longitude = parseFloat($('#longitude').val());

    initMap(latitude, longitude);
    // google.maps.event.addDomListener(window, 'load', initialize);

    if ($('#latitude').val() && $('#longitude').val()) {
      initializegetAddr(latitude, longitude);
    } else {
      let apiKey = '6f9a11c5d595ff4f0cbbebfaa90fb55ddcb93bba26c53696d2bc564a';

      json(`https://api.ipdata.co?api-key=${apiKey}`).then((data) => {
        $('#lat').val(data.latitude);
        $('#long').val(data.longitude);
        initializegetAddr(data.latitude, data.longitude);
      });
    }

    function initMap(lati, long) {
      // The location of Uluru
      const uluru = {
        lat: lati,
        lng: long
      };
      // The map, centered at Uluru
      const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: uluru,
      });

      // The marker, positioned at Uluru
      const marker = new google.maps.Marker({
        position: uluru,
        map: map,
      });
    }
  }

  // ======================================= User List ============================ //
  if (url.split('?').includes('users.php')) {
    usershowData();

    $(document).on('change', '#user_status', function(e) {
      userStatus(this);
    });
  }

  // ======================================= Product List ============================ //

  if (url.split('?').includes('product-list.php')) {
    ajaxProductList($('#shop_id').val());

    $(document).on('change', '#prod_Status', function(e) {
      productStatus(this, $('#shop_id').val());
    });
  }

  // $(document).on('change', '#prod_status', function (e) {
  //   productStatus(this);
  // });

  //===================================== Producct-detail =====================================//

  if (url.split('?').includes('product-details.php')) {
    ajaxProductReview($('#prod_id').val());
  }

  // ======================================= Oreder View ====================================== //

  if (url.split('?').includes('order-list.php')) {
    ajaxOrderList($('#shop_id').val());
  }

  // ======================================= Index ====================================== //

  if (url.split('?').includes('index.php')) {
    var arr = [0];
    var arr2 = [0];
    showOnlineSellerCount();
    showOnlineUserCount();
    showNewVendors();

    function showNewVendors() {
      $.post('ajax/ajax-new-vendor.php', function(data) {
        $('#newVendors').html(data);
      });
    }

    function showOnlineSellerCount() {
      $.post('ajax/ajax-get-online-seller-count.php', function(data) {
        $('#onlineVendor').html(data);
      });
    }

    function showOnlineUserCount() {
      $.post('ajax/ajax-get-online-user-count.php', function(data) {
        $('#onlineUser').html(data);
      });
    }

    onlineVendor(arr, 0);
    onlineUser(arr2, 0);
    setInterval(function() {
      showOnlineUserCount();
      var val2 = $('#onlineUser').text();
      onlineUser(arr2, val2);
    }, 1000);
    setInterval(function() {
      showOnlineSellerCount();
      var val = $('#onlineVendor').text();
      onlineVendor(arr, val);
    }, 1000);
  }

  //===================================== Downloads =====================================//

  if (url.split('?').includes('downloads.php')) {
    $('#scripts').html('');
    $(document).on('change', '#get_report', function(e) {
      var val = $(this).val();
      switch (val) {
        case '0':
          getUserReport(1);
          break;
        case '1':
          getUserReport(0);
          break;
        case '2':
          getVendorReport(1);
          break;
        case '3':
          getVendorReport(0);
          break;
        case '4':
          getVendorReport(3);
          break;
        default:
      }
    });
  }
  //   ===================================== Function ============================ //

  function getVendorReport(status) {
    $('#scripts').html('');
    $.ajax({
      url: 'ajax/ajax-vendor-report.php',
      type: 'POST',
      data: {
        status: status
      },
      success: function(data) {
        $('#exportTable').html(data);
        if (temp == 0) {
          $('#scripts').html(
            " <script src='./assets/js/app.min.js'> </script> <script src='./assets/js/table.min.js'></script><script src='./assets/js/admin.js'></script><script src='./assets/js/bundles/export-tables/dataTables.buttons.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.flash.min.js'></script><script src='./assets/js/bundles/export-tables/jszip.min.js'></script><script src='./assets/js/bundles/export-tables/pdfmake.min.js'></script><script src='./assets/js/bundles/export-tables/vfs_fonts.js'></script><script src='./assets/js/bundles/export-tables/buttons.html5.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.print.min.js'></script><script src='./assets/js/pages/tables/jquery-datatable.js'></script><script src='./assets/js/custom.js'></script>"
          );
        }
        temp++;
      },
    });
  }

  function getVendorLastMonthReport(status) {
    $('#scripts').html('');
    $.ajax({
      url: 'ajax/ajax-vendor-lastmonth-report.php',
      type: 'POST',
      data: {
        status: status
      },
      success: function(data) {
        $('#exportTable').html(data);
        if (temp == 0) {
          $('#scripts').html(
            " <script src='./assets/js/app.min.js'> </script> <script src='./assets/js/table.min.js'></script><script src='./assets/js/admin.js'></script><script src='./assets/js/bundles/export-tables/dataTables.buttons.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.flash.min.js'></script><script src='./assets/js/bundles/export-tables/jszip.min.js'></script><script src='./assets/js/bundles/export-tables/pdfmake.min.js'></script><script src='./assets/js/bundles/export-tables/vfs_fonts.js'></script><script src='./assets/js/bundles/export-tables/buttons.html5.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.print.min.js'></script><script src='./assets/js/pages/tables/jquery-datatable.js'></script><script src='./assets/js/custom.js'></script>"
          );
        }
        temp++;
      },
    });
  }

  var temp = 0;

  function getUserReport(status) {
    $('#scripts').html('');
    $.ajax({
      url: 'ajax/ajax-user-report.php',
      type: 'POST',
      data: {
        status: status
      },
      success: function(data) {
        $('#exportTable').html(data);
        if (temp == 0) {
          $('#scripts').html(
            " <script src='./assets/js/app.min.js'> </script> <script src='./assets/js/table.min.js'></script><script src='./assets/js/admin.js'></script><script src='./assets/js/bundles/export-tables/dataTables.buttons.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.flash.min.js'></script><script src='./assets/js/bundles/export-tables/jszip.min.js'></script><script src='./assets/js/bundles/export-tables/pdfmake.min.js'></script><script src='./assets/js/bundles/export-tables/vfs_fonts.js'></script><script src='./assets/js/bundles/export-tables/buttons.html5.min.js'></script><script src='./assets/js/bundles/export-tables/buttons.print.min.js'></script><script src='./assets/js/pages/tables/jquery-datatable.js'></script><script src='./assets/js/custom.js'></script>"
          );
        }
        temp++;
      },
    });
  }

  function onlineUser(arr, val) {
    if (arr.length < 50) {
      arr.push(parseInt(val));
      if (arr.length == 51)
        arr.shift();
    } else {
      arr.shift();
    }
    $('#liveChartUser').sparkline(arr, {
      type: 'line',
      width: '60px',
      height: '45px',
      lineColor: 'blue',
      lineWidth: 1,
      fillColor: 'rgba(0,0,0,0)',
      spotColor: '#F39517',
      maxSpotColor: '',
      minSpotColor: '',
      spotRadius: 1.5,
      highlightSpotColor: '#F44586',
      tooltipSuffix: ' Users Active Now'
    });
  }

  function onlineVendor(arr, val) {
    if (arr.length < 50) {
      arr.push(parseInt(val));
      if (arr.length == 51)
        arr.shift();
    } else {
      arr.shift();
    }
    $('#liveChartVendor').sparkline(arr, {
      type: 'line',
      width: '60px',
      height: '45px',
      lineColor: 'blue',
      lineWidth: 1,
      fillColor: 'rgba(0,0,0,0)',
      spotColor: '#F39517',
      maxSpotColor: '',
      minSpotColor: '',
      spotRadius: 1.5,
      highlightSpotColor: '#F44586',
      tooltipSuffix: ' Vendors Active Now'
    });
  }

  function vendorStatus(id) {
    var status = $(id).val();
    var status = status.split('/');

    if (
      status[0] == 'Disable' ||
      status[0] == 'Active' ||
      status[0] == 'Reject' ||
      status[0] == 'Confirmation'
    ) {
      var vendor_id = status[1];
      var v_status = status[0];
      swal({
          title: 'Are you sure?',
          text: `${v_status} a vendor `,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes!',
          cancelButtonText: 'No, cancel!',
          closeOnConfirm: false,
          closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: 'ajax/ajax-vendor-status.php',
              type: 'POST',
              data: {
                vendorid: vendor_id,
                stat: v_status
              },
              success: function(data) {
                if (data == '1') {
                  swal('vendor', `Vendor is ${v_status}`, 'success');
                  showData();
                }
              },
            });
          } else {
            swal('Cancelled', `Vendor is not ${v_status}`, 'warning');
            showData();
          }
        }
      );
    }
  }

  function userStatus(id) {
    var status = $(id).val();
    var status = status.split('/');

    if (status[0] == 'Disable' || status[0] == 'Enable') {
      var user_id = status[1];
      var u_status = status[0];
      swal({
          title: 'Are you sure?',
          text: `${u_status} a user `,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes!',
          cancelButtonText: 'No, cancel!',
          closeOnConfirm: false,
          closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: 'ajax/ajax-user-status.php',
              type: 'POST',
              data: {
                userid: user_id,
                stat: u_status
              },
              success: function(data) {
                if (data == '1') {
                  swal('user', `User is ${u_status}`, 'success');
                  usershowData();
                }
              },
            });
          } else {
            swal('Cancelled', `User is not ${u_status}`, 'warning');
            usershowData();
          }
        }
      );
    }
  }

  function productStatus(id, s_id) {
    var status = $(id).val();
    var status = status.split('/');

    if (status[0] == 'Disable' || status[0] == 'Enable') {
      var product_id = status[1];
      var p_status = status[0];
      swal({
          title: 'Are you sure?',
          text: `${p_status} a Product `,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes!',
          cancelButtonText: 'No, cancel!',
          closeOnConfirm: false,
          closeOnCancel: false,
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: 'ajax/ajax-product-status.php',
              type: 'POST',
              data: {
                prodid: product_id,
                stat: p_status
              },
              success: function(data) {
                if (data == '1') {
                  swal('Product', `Product is ${p_status}`, 'success');
                  ajaxProductList(s_id);
                }
              },
            });
          } else {
            swal('Cancelled', `Product is not ${p_status}`, 'warning');
            ajaxProductList(s_id);
          }
        }
      );
    }
  }

  function ajaxProductReview(prod_id) {
    $.ajax({
      url: 'ajax/ajax-product-reviews.php',
      type: 'POST',
      data: {
        prod_id: prod_id
      },
      success: function(data) {
        $('#reviews').html(data);
      },
    });
  }

  function ajaxProductList(shop_id) {
    $.ajax({
      url: 'ajax/ajax-product-list.php',
      type: 'POST',
      data: {
        shopid: shop_id
      },
      success: function(data) {
        if (data == '2') {
          document.location = '404.php';
        } else {
          $('#product-list').html(data);
        }
      },
    });
  }

  function ajaxOrderList(shop_id) {
    $.ajax({
      url: 'ajax/ajax-order-view.php',
      type: 'POST',
      data: {
        shopid: shop_id
      },
      success: function(data) {
        if (data == '2') {
          document.location = '404.php';
        } else {
          $('#order-view').html(data);
        }
      },
    });
  }

  function usershowData() {
    $.post('ajax/ajax-user-list.php', function(data) {
      $('#user-list').html(data);
    });
  }
});