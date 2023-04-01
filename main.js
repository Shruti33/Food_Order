function add_to_cart(item_description, price) {
    $.ajax({
        type: "POST",
        url: "add_to_cart.php",
        data: {
            item_description: item_description,
            price: price
        },
        success: function(response) {
            alert(response);
            update_cart_count();
        }
    });
}

function update_cart_count() {
    $.ajax({
        type: "GET",
        url: "get_cart_items.php",
        success: function(response) {
            $('#cart_count').text(response);
        }
    });
}
  
function deleteCartItem(item_description) {
    if (confirm('Are you sure you want to remove this item from your cart?')) {
      // Make an AJAX request to delete the item from the cart
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // Reload the page to update the cart
            location.reload();
          } else {
            // Display an error message
            alert('An error occurred while deleting the item from your cart. Please try again later.');
          }
        }
      };
      xhr.open('POST', 'delete_cart_item.php');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send('item_description=' + encodeURIComponent(item_description));
    }
}

const crypto = require("crypto");
const hash = crypto.createHash('sha1');

hash.update(password);
const digest = hash.digest('hex');
console.log(digest); 


function updateCount(item_description, action) {
    // Send an XHR request to update_cart_item.php with the item_description and action parameters
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_cart_item.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Update the count in the table with the new value
        var countElement = document.getElementById(item_description + '-count');
        if (countElement) {
          countElement.textContent = xhr.responseText;
        }
        // Reload the page to update the cart
        location.reload();
      } else {
        alert('An error occurred while updating the item count. Please try again later.');
      }
    };
    xhr.send('item_description=' + encodeURIComponent(item_description) + '&action=' + encodeURIComponent(action));
 }
  
  


  


