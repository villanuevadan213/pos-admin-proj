function calculateTotalValue() {
    const quantity = document.getElementById('quantity').value;
    const unitPrice = document.getElementById('unit_price').value;
    const totalValue = document.getElementById('total_value');

    if (quantity && unitPrice) {
        totalValue.value = (quantity * unitPrice).toFixed(2);
    } else {
        totalValue.value = '';
    }
}