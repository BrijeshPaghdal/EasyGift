$(document).ready(function() {
  var url = window.location.href;
  var url = url.split('/');
  var url = url[url.length - 1];

  var geocoder;
  var map;

  //=================Location========================//

  function json(url) {
    return fetch(url).then((res) => res.json());
  }

  let apiKey = '6f9a11c5d595ff4f0cbbebfaa90fb55ddcb93bba26c53696d2bc564a';

  if ("geolocation" in navigator) {
    // alert("yes");

    navigator.geolocation.getCurrentPosition(function(position) {
      var lat = position.coords.latitude;
      var long = position.coords.longitude;
      // alert("yes2");

      json(`https://api.ipdata.co?api-key=${apiKey}`).then((data) => {
        var city = data.city;
        // console.log(lat + " " + long + " " + city);
        $.ajax({
          url: 'ajax/ajax-get-city.php',
          type: 'POST',
          data: {
            city: city,
            lat: lat,
            long: long
          },
          success: function(data) {},
        });
      });

    });
    /* geolocation is available */
  } else {
    json(`https://api.ipdata.co?api-key=${apiKey}`).then((data) => {
      var city = data.city;
      var lat = data.latitude;
      var long = data.longitude;
      // console.log(city);
      $.ajax({
        url: 'ajax/ajax-get-city.php',
        type: 'POST',
        data: {
          city: city,
          lat: lat,
          long: long
        },
        success: function(data) {},
      });
    });
  }

  //=================Notification========================//
  if (document.getElementById("isNotification")) {
    setInterval(function() {
      $.ajax({
        url: 'ajax/ajax-notification.php',
        type: 'POST',
        data: {},
        success: function(data) {
          $('#notification').html(data);
        },
      });
    }, 5000);

    $(document).on('click', '#ord_not_comp', function(e) {
      alert('Order is not Complete');
    });

    $(document).on('click', '#ord_comp', function(e) {
      var o_c_id = $(this).val();
      $.ajax({
        url: 'ajax/ajax-order-complete.php',
        type: 'POST',
        data: {
          o_c_id: o_c_id,
          status: 1,
        },
        success: function(data) {
          alert(data);
        },
      });
    });
  }



  //===================Login==============================//
  if (url.split('?').includes('login.php')) {
    $('#register-form').on('submit', function(e) {
      e.preventDefault();
      $('small').remove();

      $.post(
        'ajax/ajax-register.php',
        $('#register-form').serialize(),
        function(data) {
          const tempArray = data;
          for (var value of tempArray) {
            switch (value) {
              case '0':
                $('small').remove('#form-err-0');
                $('#register-name-2').after(
                  "<small class='text-danger' id='form-err-0'> Name Field Is Reqired* </small>"
                );
                break;
              case '1':
                $('small').remove('#form-err-1');
                $('#register-email-2').after(
                  "<small class='text-danger' id='form-err-1'> Email Field Is Reqired* </small>"
                );
                break;
              case '2':
                $('small').remove('#form-err-2');
                $('#register-number-2').after(
                  "<small class='text-danger' id='form-err-2'> Number Field Is Reqired* </small>"
                );
                break;
              case '3':
                $('small').remove('#form-err-3');
                $('#register-password-2').after(
                  "<small class='text-danger' id='form-err-3'> Password Field Is Reqired* </small>"
                );
                break;
              case '4':
                $('small').remove('#form-err-4');
                $('#register-confirm-password-2').after(
                  "<small class='text-danger' id='form-err-4'> Confirm Password Field Is Reqired* </small>"
                );
                break;
              case '5':
                $('small').remove('#form-err-5');
                $('#register-name-2').after(
                  "<small class='text-danger' id='form-err-5'> Name Field In Atleast 5 to 15 Character Reqired* </small>"
                );
                break;
              case '6':
                $('small').remove('#form-err-6');
                $('#register-email-2').after(
                  "<small class='text-danger' id='form-err-6'> Email Not Pattern* </small>"
                );
                break;
              case '7':
                $('small').remove('#form-err-7');
                $('#register-number-2').after(
                  "<small class='text-danger' id='form-err-7'> Number 10 Digit Required* </small>"
                );
                break;
              case '8':
                $('small').remove('#form-err-8');
                $('#register-password-2').after(
                  "<small class='text-danger' id='form-err-8'> Password must contain at least 1 Capital letter , 1 Small And 1 Special Character </small>"
                );
                break;
              case '9':
                $('small').remove('#form-err-9');
                $('#register-confirm-password-2').after(
                  "<small class='text-danger' id='form-err-9'> Password Don't Is Match* </small>"
                );
                break;
              case 's':
                $('small').remove('#form-err-10');
                $('#register-confirm-password-2').after(
                  "<small class='text-danger' id='form-err-10'> Email or Phone number already Exists* </small>"
                );
                break;
            }
          }
          if (tempArray == 'success') {
            window.location = 'login.php';
          }
        }
      );
    });

    $('#sign-in').on('submit', function(e) {
      e.preventDefault();
      $('small').remove();

      $.post('ajax/ajax-login.php', $('#sign-in').serialize(), function(data) {
        const tempArray = data;
        if (tempArray == 'success') {
          window.location = 'index.php';
        }

        for (var value of tempArray) {
          switch (value) {
            case '0':
              $('small').remove('#form-err-0');
              $('#singin-email-2').after(
                "<small class='text-danger' id='form-err-0'> Email Field Is Reqired* </small>"
              );
              break;
            case '1':
              $('small').remove('#form-err-1');
              $('#singin-password-2').after(
                "<small class='text-danger' id='form-err-1'> Password Field Is Reqired* </small>"
              );
              break;
            case '2':
              $('small').remove('#form-err-0');
              $('#singin-email-2').after(
                "<small class='text-danger' id='form-err-0'> Email Is Not Valid* </small>"
              );
              break;
            case '3':
              $('small').remove('#form-err-2');
              $('#singin-password-2').after(
                "<small class='text-danger' id='form-err-2'> Email or Password not match* </small>"
              );
              break;
          }
        }
      });
    });
  }

  // ======================= Vendor Registration =============================
  if (url.split('?').includes('vendor-registration.php')) {
    $(document).ready(function() {
      $('#registration_vendor').on('submit', function(e) {
        e.preventDefault();
        $('small').remove();
        let formData = new FormData(registration_vendor);
        $.ajax({
          url: 'ajax/vendor-registration-data.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.includes('[')) {
              const tempArray = data;
              for (var value of tempArray) {
                switch (value) {
                  case 'a':
                    $('small').remove('#form-err-0');
                    $('#register-fname-2').after(
                      "<small class='text-danger' id='form-err-0'> Name Field Is Reqired* </small>"
                    );
                    break;
                  case 'b':
                    $('small').remove('#form-err-0');
                    $('#register-lname-2').after(
                      "<small class='text-danger' id='form-err-0'> Name Field Is Reqired* </small>"
                    );
                    break;
                  case 'c':
                    $('small').remove('#form-err-1');
                    $('#register-email-2').after(
                      "<small class='text-danger' id='form-err-1'> Email Field Is Reqired* </small>"
                    );
                    break;
                  case 'd':
                    $('small').remove('#form-err-2');
                    $('#register-number-2').after(
                      "<small class='text-danger' id='form-err-2'> Number Field Is Reqired* </small>"
                    );
                    break;
                  case 'e':
                    $('small').remove('#form-err-3');
                    $('#register-password-2').after(
                      "<small class='text-danger' id='form-err-3'> Password Field Is Reqired* </small>"
                    );
                    break;
                  case 'f':
                    $('small').remove('#form-err-4');
                    $('#register-confirm-password-2').after(
                      "<small class='text-danger' id='form-err-4'> Confirm Password Field Is Reqired* </small>"
                    );
                    break;
                  case '1':
                    $('small').remove('#form-err-0');
                    $('#register-fname-2').after(
                      "<small class='text-danger' id='form-err-0'> Name Field In Atleast 3 to 15 Character Reqired* </small>"
                    );
                    break;
                  case '2':
                    $('small').remove('#form-err-0');
                    $('#register-lname-2').after(
                      "<small class='text-danger' id='form-err-0'> Name Field In Atleast 3 to 15 Character Reqired* </small>"
                    );
                    break;

                  case '3':
                    $('small').remove('#form-err-6');
                    $('#register-shop-name').after(
                      "<small class='text-danger' id='form-err-6'> Email Not Pattern* </small>"
                    );
                    break;
                  case '4':
                    $('small').remove('#form-err-7');
                    $('#register-number-2').after(
                      "<small class='text-danger' id='form-err-7'> Number 10 Digit Required* </small>"
                    );
                    break;
                  case '5':
                    $('small').remove('#form-err-8');
                    $('#register-password-2').after(
                      "<small class='text-danger' id='form-err-8'> Password must contain at least 1 Capital letter , 1 Small And 1 Special Character </small>"
                    );
                    break;
                  case '6':
                    $('small').remove('#form-err-9');
                    $('#register-confirm-password-2').after(
                      "<small class='text-danger' id='form-err-9'> Password Don't Is Match* </small>"
                    );
                    break;
                  case '7':
                    $('small').remove('#form-err-10');
                    $('#register-vendor-pancard-no').after(
                      "<small class='text-danger' id='form-err-10'> Pancard Number Invalid* </small>"
                    );
                    break;
                }
              }
            } else if (data == 'success') {
              alert('Your Account is Successfully Registered...');
              document.location = 'vendor/login.php';
            } else {
              alert(data);
            }
          },
        });
      });
    });
  }



  // ========================================= Product ==================================== //

  if (url.split('?').includes('product.php')) {
    var latitude = parseFloat($('#latitude').val());
    var longitude = parseFloat($('#longitude').val());
    var user_latitude = parseFloat($('#user_latitude').val());
    var user_longitude = parseFloat($('#user_longitude').val());

    initMap(latitude, longitude, user_latitude, user_longitude);

    var rating = 1.6;

    $(".counter").text(rating);

    $("#rateYo1").on("rateyo.init", function() {
      console.log("rateyo.init");
    });

    $("#rateYo1").rateYo({
        rating: rating,
        numStars: 5,
        precision: 2,
        starWidth: "64px",
        spacing: "5px",
        rtl: true,
        multiColor: {
          startColor: "#000000",
          endColor: "#ffffff"
        },
        onInit: function() {

          console.log("On Init");
        },
        onSet: function() {

          console.log("On Set");
        }
      }).on("rateyo.set", function() {
        console.log("rateyo.set");
      })
      .on("rateyo.change", function() {
        console.log("rateyo.change");
      });

    $(".rateyo").rateYo();

    $(".rateyo-readonly-widg").rateYo({
      rating: 0,
      fullStar: true,
    });

    $("#addRating").click(function(e) {
      /* get rating */
      var $rateYo = $(".rateyo-readonly-widg").rateYo();
      var rating = $rateYo.rateYo("rating");
      var review = $("#review_desc").val();
      var ord_id = $("#ord_id").val();

      if (rating == 0) {
        alert("Please enter rating greater than zero");
      } else if (review == "") {
        alert("Review should not be empty");
      } else {
        $.ajax({
          url: 'ajax/ajax-add-review.php',
          type: 'POST',
          data: {
            ord_id: ord_id,
            rating: rating,
            review: review
          },
          success: function(data) {
            if (data == 'success') {
              alert(data);
              location.reload(true);
            } else {
              alert(data);
            }
          },
        });
      }

    });

    function initMap(lati, long, ulat, ulong) {
      // The location of Uluru
      const uluru = {
        lat: lati,
        lng: long
      };

      const uluru2 = {
        lat: ulat,
        lng: ulong
      }

      // The map, centered at Uluru
      const map = new google.maps.Map(document.getElementById('map1'), {
        zoom: 13,
        center: uluru,
      });

      // The marker, positioned at Uluru
      const marker = new google.maps.Marker({
        position: uluru,
        animation: google.maps.Animation.DROP,
        map: map,
      });
      // The marker, positioned at Uluru2 user location
      const marker2 = new google.maps.Marker({
        position: uluru2,
        animation: google.maps.Animation.DROP,
        map: map,
        icon: {
          url: "./assets/images/google-location-icon-Location_marker_pin_map_gps.png",
          scaledSize: new google.maps.Size(50, 50)
        },
      });

    }


    $(document).on('click', '.btn-cart', function() {
      var product_id = $(this).attr('id');
      var product_quantity = $('#qty').val();
      var action = 'add';
      if (product_quantity > 0) {
        $.ajax({
          url: 'ajax/action.php',
          method: 'POST',
          data: {
            product_id: product_id,
            product_quantity: product_quantity,
            action: action,
          },
          success: function(data) {},
        });
      }
    });
  }

  // ========================================= Cart ==================================== //
  if (url === 'cart.php') {
    $(document).ready(function() {
      showCartData();

      $(document).on('change', '#qty', function() {
        var product_quantity = $(this).val();
        var product_id = $(this).data('id');
        var action = 'update';
        var qty = parseInt(product_quantity);
        $.ajax({
          url: 'ajax/action.php',
          method: 'POST',
          data: {
            product_id: product_id,
            product_quantity: qty,
            action: action,
          },
          success: function(data) {
            showCartData();
          },
        });
      });

      $(document).on('click', '.btn-remove', function() {
        var product_id = $(this).attr('id');
        var action = 'remove';
        if (confirm('Are you sure you want to remove this product?')) {
          $.ajax({
            url: 'ajax/action.php',
            method: 'POST',
            data: {
              product_id: product_id,
              action: action,
            },
            success: function(data) {
              showCartData();
            },
          });
        } else {
          return false;
        }
      });
    });
  }

  // ========================================= ChckeOut ==================================== //
  if (url === 'checkout.php') {
    $(document).ready(function() {
      function checkOut() {
        $.ajax({
          url: 'ajax/ajax-checkout.php',
          type: 'POST',
          success: function(data) {
            $('#checkout-details').html(data);
          },
        });
      }
      checkOut();
    });
  }

  if (url.split('?').includes('myaccount.php') || url.split('?').includes('')) {
    function showOrderData() {
      $.ajax({
        url: 'ajax/ajax-order-data.php',
        type: 'POST',
        success: function(data) {
          $('#order-details').html(data);
        },
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

    showOrderData();

    $(document).on("submit", "#acc_setting", function(e) {

      e.preventDefault();

      var formData = new FormData(this);

      var currPasswd = $("#curr_passwd").val();
      var password = $("#new_passwd").val();
      var confirmPassword = $("#cnf_passwd").val();
      var temp = 0;
      var chk = checkConfirmPassswd(password, confirmPassword);

      if (currPasswd != "") {
        if (chk == 1) {
          alert("Please Enter New Password");
        } else if (chk == 2) {
          alert("Please Enter Confirm Password");
        } else if (chk == 3) {
          alert("Confirm Password not match");
        } else if (chk == 4) {
          temp = 1;
        } else {
          temp = 0;
        }
      } else {
        temp = 1;
      }

      if (temp == 1) {
        $.ajax({
          url: 'ajax/ajax-account-setting.php',
          method: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == 0) {
              alert("No data has been changed");
            } else if (data == 1) {
              alert("Data is updated");
              location.reload(true);
            } else if (data == 2) {
              alert("Password and Data updated Successfully");
              location.reload(true);
            } else if (data == 3) {
              alert("Please enter correct Password");
            } else {
              alert(data);
            }
          },
        });
      }

    });
  }
  // 
  // if (url.split('?').includes('reset-password.php') || url.split('?').includes('')) {
  //   $(document).on('submit', '.btn-cart', function() {
  // }
  // ======================= Index =============================
  if (url.split('?').includes('index.php') || url.split('?').includes('')) {


    $(document).on('click', '.btn-cart', function() {
      var product_id = $(this).attr('id');
      var product_quantity = $('#qty').val();
      var action = 'add';
      if (product_quantity > 0) {
        $.ajax({
          url: 'ajax/action.php',
          method: 'POST',
          data: {
            product_id: product_id,
            product_quantity: product_quantity,
            action: action,
          },
          success: function(data) {},
        });
        showCartData();
      }
    });

  }

  // ======================= Wishlist =============================
  if (url.split('?').includes('wishlist.php')) {

    showwishlist();

    function showwishlist() {
      $.ajax({
        url: 'ajax/ajax-show-wishlist.php',
        method: 'POST',
        data: {},
        success: function(data) {
          $('#show_wishlist').html(data);
        },
      });
    }

    $(document).on('click', '.btn-block', function() {
      var product_id = $(this).attr('id');
      var product_quantity = 1;
      var action = 'add';
      if (product_quantity > 0) {
        $.ajax({
          url: 'ajax/action.php',
          method: 'POST',
          data: {
            product_id: product_id,
            product_quantity: product_quantity,
            action: action,
          },
          success: function(data) {
            $.ajax({
              url: 'ajax/ajax-wishlist.php',
              method: 'POST',
              data: {
                prod_id: product_id,
              },
              success: function(data) {
                window.location = "cart.php";
              },
            });
          },
        });
      }
    });

    $(document).on('click', '.btn-remove', function() {
      var product_id = $(this).attr('id');
      var action = 'remove';
      if (confirm('Are you sure you want to remove this product?')) {
        $.ajax({
          url: 'ajax/ajax-wishlist.php',
          method: 'POST',
          data: {
            prod_id: product_id,
          },
          success: function(data) {
            showwishlist();
          },
        });
      } else {
        return false;
      }
    });

  }

  // ======================= Filter Product =============================
  if (url.split('?').includes('filter-product.php')) {
    filter_data(
      $('#minimum_price').val(),
      $('#maximum_price').val(),
      $('#category').val(),
      $('#subcategory').val()
    );

    $(document).on('click', '.btn-expandable', function(e) {
      var product_id = $(this).attr('value');
      $.ajax({
        url: 'ajax/ajax-wishlist.php',
        method: 'POST',
        data: {
          prod_id: product_id
        },
        success: function(data) {
          if (data == 1) {
            $('.btn-expandable').each(function(i, obj) {
              if ($(this).attr('value') == product_id) {
                $(this).removeClass('icon-heart').addClass('icon-heart-o');
                $(this).html("<span>add to wishlist</span>");
                //$(this).text("<span>add to wishlist</span>");

              }
            });
          } else if (data == 2) {
            $('.btn-expandable').each(function(i, obj) {
              if ($(this).attr('value') == product_id) {
                $(this).removeClass('icon-heart-o').addClass('icon-heart');
                $(this).html("<span>remove from wishlist</span>");
              }
            });
          }
        },
      });

    });

    $(document).on('click', '.btn-cart', function(e) {
      e.preventDefault();
      var product_id = $(this).attr('id');
      var product_quantity = 1;
      var action = 'add';
      if (product_quantity > 0) {
        $.ajax({
          url: 'ajax/action.php',
          method: 'POST',
          data: {
            product_id: product_id,
            product_quantity: product_quantity,
            action: action,
          },
          success: function(data) {},
        });
      }
    });

    function filter_data(minPrice, maxPrice, urlCate, urlSubCate) {
      //store data in variable
      var category = urlCate;
      var subcategory = urlSubCate;
      var minimum_price = minPrice;
      var maximum_price = maxPrice;
      var cate_id = get_filter('cate');
      var sugg_id = get_filter('sugg');
      $.ajax({
        url: 'ajax/ajax-filter-product.php',
        method: 'POST',
        data: {
          category: category,
          subcategory: subcategory,
          minimum_price: minimum_price,
          maximum_price: maximum_price,
          cate_id: cate_id,
          sugg_id: sugg_id,
        },
        success: function(data) {
          $('#filter_data').html(data);
        },
      });
    }

    $('.cate').click(function() {
      filter_data();
    });

    $('.sugg').click(function() {
      filter_data();
    });

    $('.sidebar-filter-clear').click(function() {
      filter_data();
    });
  }
});

function showCartData() {
  $.ajax({
    url: 'ajax/ajax-cart-data.php',
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      $('#cart-details').html(data.cart_details);
      $('.total_price').text(data.total_price);
    },
  });
}

function get_filter(class_name) {
  var filter = [];
  $('.' + class_name + ':checked').each(function() {
    filter.push(parseInt($(this).val()));
  });
  return filter;
}