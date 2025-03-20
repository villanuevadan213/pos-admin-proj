let cart = {};
let cartTotal = 0;

function addToCart(id, name, price, maxQuantity) {
    const quantityInput = document.getElementById(`quantity-${id}`);
    const quantity = parseInt(quantityInput.value);

    if (!quantity || quantity <= 0 || quantity > maxQuantity) {
        alert('Please enter a valid quantity!');
        return;
    }

    if (cart[id]) {
        // Update quantity if item is already in the cart
        cartTotal -= cart[id].price * cart[id].quantity;
        cart[id].quantity += quantity;
    } else {
        // Add new item to the cart
        cart[id] = { name, price, quantity };
    }

    // Update total
    cartTotal += price * quantity;

    // Render the cart
    renderCart();

    // Reset quantity input
    quantityInput.value = 0;
}

function renderCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    const cartDataInput = document.getElementById('cart-data');

    // Clear current cart view
    cartItemsContainer.innerHTML = '';

    if (Object.keys(cart).length === 0) {
        cartItemsContainer.innerHTML = '<p class="text-sm text-gray-500 italic">Your cart is empty.</p>';
        cartTotalElement.textContent = '0.00';
        cartDataInput.value = '';
        return;
    }

    // Display cart items
    Object.entries(cart).forEach(([id, item]) => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'flex justify-between items-center';
        itemDiv.innerHTML = `
            <span>${item.name} (x${item.quantity})</span>
            <span>₱${(item.price * item.quantity).toFixed(2)}</span>
        `;
        cartItemsContainer.appendChild(itemDiv);
    });

    // Update cart total
    cartTotalElement.textContent = cartTotal.toFixed(2);

    // Update hidden input for form submission
    cartDataInput.value = JSON.stringify(cart);
}

function clearCart() {
    // Reset the cart and total to their default states
    cart = {};
    cartTotal = 0;

    // Update the UI to reflect an empty cart
    document.getElementById('cart-items').innerHTML = '<p class="text-sm text-gray-500 italic">Your cart is empty.</p>';
    document.getElementById('cart-total').innerText = '0.00';
    document.getElementById('cart-data').value = '';
}