function addToCart(product_id, user_id) {
  fetch_all_cart_data()
  $.ajax({
    url: base_url + '/cart/get',
    type: 'GET',
    data: { product_id: product_id, user_id: user_id },
    success: function (result) {
      console.log(result)
      if (result) {
        // If the product is already in the cart, increment the quantity
        var cart_id = result.id
        var new_quantity = parseInt(result.quantity) + 1

        console.log(new_quantity)

        updateCart(cart_id, new_quantity)
      } else {
        // If the product is not in the cart, add it to the cart
        addNewToCart(product_id, user_id)
      }
    },
  })
}

function addNewToCart(product_id, user_id) {
  $.ajax({
    url: base_url + '/cart',
    type: 'POST',
    data: { product_id: product_id, user_id: user_id },
    success: function (result) {
      console.log('Product added to cart successfully!')
    },
  })
}

function updateCart(cart_id, quantity) {
  $.ajax({
    url: base_url + '/cart/' + cart_id,
    type: 'POST',
    data: { quantity: quantity },
    success: function (result) {
      console.log('Product quantity updated in cart successfully!')
    },
  })
}

$(document).ready(function () {
  fetch_all_cart_data()
})

function fetch_all_cart_data() {
  $.getJSON(base_url + '/cartget_all', function (data) {
    var $cartProductList = $('#cart-product')
    $cartProductList.empty()
    let total_quantity = 0

    $.each(data, function (index, item) {
      total_quantity += parseInt(item.quantity)

      var formatted_price = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
      }).format(item.product_price)

      var $cartItem = $(
        `       
          <li class="list-group-item">   
              <div class="d-flex justify-content-between align-items-center">
              <div>
              ${item.product_name} <br>
              ${formatted_price}
              </div>
              <div class="d-flex align-items-center">
              <div class="m-2">
                  x ${item.quantity}
              </div>
              <button type="button" class="btn btn-danger delete-cart" data-cart-id="${item.id}"><i class="fe fe-trash fe-16"></i></button>
              </div>
              </div>
          </li> 
          `,
      )

      $cartItem.find('.delete-cart').click(function () {
        var cartId = $(this).data('cart-id')

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete Product',
        }).then((result) => {
          if (result.value) {
            // Code to delete item from cart goes here
            $.post(base_url + '/cart/delete', { id: cartId }, function () {
              fetch_all_cart_data()
            })
          }
        })
      })

      $cartProductList.append($cartItem)
    })

    $('#cart-quantity').text(total_quantity)
  })
}
