let cart = {};
let cartTotal = 0;
let discountType = 'percentage';
let discountValue = 0;

function addToCart(id, name, price, maxQuantity) {
    const quantityInput = document.getElementById(`quantity-${id}`);
    const quantity = parseInt(quantityInput.value);

    if (!quantity || quantity <= 0 || quantity > maxQuantity) {
        alert('Please enter a valid quantity!');
        return;
    }

    // Check if the item is already in the cart
    if (cart[id]) {
        // Prevent adding more if quantity matches maxQuantity
        if (cart[id].quantity >= maxQuantity) {
            alert(`Cannot add more of "${name}". Maximum available quantity is already in the cart.`);
            return;
        }

        // Adjust the new quantity if it exceeds maxQuantity
        const newQuantity = cart[id].quantity + quantity;
        if (newQuantity > maxQuantity) {
            alert(`You can only add ${maxQuantity - cart[id].quantity} more of "${name}".`);
            return;
        }

        // Update cart quantity and total
        cartTotal -= cart[id].price * cart[id].quantity;
        cart[id].quantity = newQuantity;
    } else {
        // Add a new item to the cart
        if (quantity > maxQuantity) {
            alert(`You can only add up to ${maxQuantity} of "${name}".`);
            return;
        }
        cart[id] = { name, price, quantity };
    }

    // Update the cart total
    cartTotal += cart[id].price * cart[id].quantity;

    // Render the cart
    renderCart();

    // Recalculate and update the discount
    applyDiscount();

    // Reset the quantity input field
    quantityInput.value = 1;
}

function renderCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    const cartDataInput = document.getElementById('cart-data');

    // Clear current cart view
    cartItemsContainer.innerHTML = '';

    // Create table element
    const table = document.createElement('table');
    table.className = 'w-full border-collapse border border-gray-200';

    // Create table header
    const thead = document.createElement('thead');
    thead.innerHTML = `
        <tr class="bg-gray-100 border-b border-gray-300">
            <th class="w-1/12 border border-gray-300 px-4 py-2 text-left">ID</th>
            <th class="w-6/12 border border-gray-300 px-4 py-2 text-left">Name</th>
            <th class="w-1/12 border border-gray-300 px-4 py-2 text-right">Qty</th>
            <th class="w-2/12 border border-gray-300 px-4 py-2 text-right">Price</th>
            <th class="w-2/12 border border-gray-300 px-4 py-2 text-center">Actions</th>
        </tr>
    `;
    table.appendChild(thead);

    // Create table body
    const tbody = document.createElement('tbody');

    if (Object.keys(cart).length === 0) {
        const emptyRow = document.createElement('tr');
        emptyRow.innerHTML = `
            <td class="border border-gray-300 px-4 py-2 text-center font-bold" colspan="5">Your cart is empty.</td>
        `;
        tbody.appendChild(emptyRow);
    } else {
        Object.entries(cart).forEach(([id, item]) => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-100 cursor-pointer'; // Styling for hover and clickable effect

            row.innerHTML = `
                <td class="w-1/12 border border-gray-300 px-4 py-2">${id}</td>
                <td class="w-6/12 border border-gray-300 px-4 py-2">${item.name}</td>
                <td class="w-1/12 border border-gray-300 px-4 py-2 text-right">${item.quantity}</td>
                <td class="w-2/12 border border-gray-300 px-4 py-2 text-right">₱${(item.price * item.quantity).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td class="w-2/12 border border-gray-300 px-4 py-2 text-center">
                    <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="deleteFromCart('${id}')">Delete</button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }

    // Append the table body to the table
    table.appendChild(tbody);

    // Append the table to the container
    cartItemsContainer.appendChild(table);

    // Update cart total
    cartTotalElement.textContent = cartTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Update hidden input for form submission
    cartDataInput.value = JSON.stringify(cart);
}

function deleteFromCart(id) {
    // Check if the item exists in the cart
    if (cart[id]) {
        // Subtract the item's total from the cart total
        cartTotal -= cart[id].price * cart[id].quantity;

        // Remove the item from the cart object
        delete cart[id];
    }

    // Re-render the cart
    renderCart();

    // Recalculate and update the discount
    applyDiscount();
}

function clearCart() {
    // Reset the cart and total to their default states
    cart = {};
    cartTotal = 0;
    discountType = 'percentage'; // Reset discount type
    discountValue = 0;     // Reset discount value

    // Get the cart items container and UI elements
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    const discountTotalElement = document.getElementById('discount-total');
    const discountTypeInput = document.getElementById('discount-type');
    const discountValueInput = document.getElementById('discount-value');
    const cartDataInput = document.getElementById('cart-data');

    // Clear the current cart view
    cartItemsContainer.innerHTML = '';

    // Create the table element
    const table = document.createElement('table');
    table.className = 'w-full border-collapse border border-gray-200';

    // Create table header
    const thead = document.createElement('thead');
    thead.innerHTML = `
        <tr class="bg-gray-100 border-b border-gray-300">
            <th class="w-1/12 border border-gray-300 px-4 py-2 text-left">ID</th>
            <th class="w-6/12 border border-gray-300 px-4 py-2 text-left">Name</th>
            <th class="w-1/12 border border-gray-300 px-4 py-2 text-right">Qty</th>
            <th class="w-2/12 border border-gray-300 px-4 py-2 text-right">Price</th>
            <th class="w-2/12 border border-gray-300 px-4 py-2 text-center">Actions</th>
        </tr>
    `;
    table.appendChild(thead);

    // Create table body with an empty row
    const tbody = document.createElement('tbody');
    const emptyRow = document.createElement('tr');
    emptyRow.innerHTML = `
        <td class="border border-gray-300 px-4 py-2 text-center font-bold" colspan="5">Your cart is empty.</td>
    `;
    tbody.appendChild(emptyRow);
    table.appendChild(tbody);

    // Append the table to the container
    cartItemsContainer.appendChild(table);

    // Reset cart total and discount total in the UI
    cartTotalElement.textContent = '0.00';
    discountTotalElement.textContent = '0.00';

    // Reset discount inputs
    discountTypeInput.value = 'percentage';
    discountValueInput.value = '0';

    // Reset hidden input value for form submission
    cartDataInput.value = '0';
}

function applyDiscount() {
    const cartTotalElement = document.getElementById('cart-total');
    const discountTotalElement = document.getElementById('discount-total');

    // Calculate the new cart total based on the current items
    let total = Object.values(cart).reduce((sum, item) => sum + item.price * item.quantity, 0);

    // Initialize discount amount
    let discountAmount = 0;

    // Apply the appropriate discount
    if (discountType === 'percentage') {
        discountAmount = total * (discountValue / 100);
        total -= discountAmount; // Apply discount to total
    } else if (discountType === 'fixed') {
        discountAmount = discountValue;
        total -= discountAmount; // Apply discount to total
    } else if (discountType === 'volume') {
        // Example logic for volume-based discounts
        const totalQuantity = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
        if (totalQuantity >= discountValue) {
            discountAmount = 100; // Example: ₱100 discount for large purchases
            total -= discountAmount; // Apply discount to total
        }
    }

    // Prevent total from going below zero
    total = Math.max(total, 0);

    // Update the discount total element
    discountTotalElement.textContent = discountAmount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Update the cart total element
    cartTotalElement.textContent = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function updateDiscount(type, value) {
    discountType = type;
    discountValue = parseFloat(value) || 0; // Default to 0 if value is invalid
    applyDiscount();
}
