
  // Get references to the button and cart elements;
  const addToCartBtn = document.getElementById('add-to-cart-btn');
  const cart = document.getElementById('cart');

  // Function to add an item to the cart;
  function addToCart(itemName, price) {
    // Create a new cart item element
    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.innerHTML = `
      <span class="item-name">${itemName}</span>
      <span class="item-price">$${price}</span>
    `;

    // Add the cart item to the cart
    cart.appendChild(cartItem);
  }

  // Add click event listener to the "Add to Cart" button
  addToCartBtn.addEventListener('click', () => {
    const itemName = 'Your Item'; // Replace 'Your Item' with the actual item name
    const itemPrice = 9.99; // Replace 9.99 with the actual item price

    // Call the addToCart function to add the item to the cart
    addToCart(itemName, itemPrice);
  });
