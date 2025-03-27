document.addEventListener('DOMContentLoaded', function () {
    calculateTotalSales(); // Calculate and set the default total sales value on page load
});

function filterByDate() {
    const filterDate = document.getElementById('date-filter').value;
    const rows = document.querySelectorAll("#order-table tbody tr");
    let totalSales = 0;

    rows.forEach(row => {
        const createdDate = row.querySelector(".created-date").textContent.trim();

        if (filterDate === createdDate || filterDate === "") {
            row.style.display = ""; // Show row
            const totalValue = parseFloat(row.cells[3].textContent.replace(/[₱,]/g, ''));
            totalSales += totalValue;
        } else {
            row.style.display = "none"; // Hide row
        }
    });

    // Update Total Sales
    document.querySelector('#total-sales p span').textContent =
        totalSales.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function filterByOrderId() {
    const filterOrderId = document.getElementById('order-id').value.toLowerCase();
    const table = document.getElementById('order-table');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    let totalSales = 0;

    for (let i = 0; i < rows.length; i++) {
        const orderIdCell = rows[i].getElementsByTagName('td')[0]; // Order Number column
        const totalValueCell = rows[i].getElementsByTagName('td')[3]; // Total Amount column
        if (orderIdCell && totalValueCell) {
            const orderId = orderIdCell.textContent.trim().toLowerCase();
            const totalValue = parseFloat(totalValueCell.textContent.replace(/[₱,]/g, '')); // Parse number from ₱ format

            if (orderId.includes(filterOrderId) || filterOrderId === "") {
                rows[i].style.display = ""; // Show row
                totalSales += totalValue; // Add to total sales
            } else {
                rows[i].style.display = "none"; // Hide row
            }
        }
    }

    // Update the Total Sales span inside the <p>
    const totalSalesElement = document.querySelector('#total-sales p span');
    totalSalesElement.textContent = `${totalSales.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
}

function calculateTotalSales() {
    const table = document.getElementById('order-table');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    let totalSales = 0;

    for (let i = 0; i < rows.length; i++) {
        const totalValueCell = rows[i].getElementsByTagName('td')[3]; // Total Amount column
        if (totalValueCell) {
            const totalValue = parseFloat(totalValueCell.textContent.replace(/[₱,]/g, '')); // Parse number from ₱ format
            totalSales += totalValue; // Add to total sales
        }
    }

    // Update the Total Sales span inside the <p>
    const totalSalesElement = document.querySelector('#total-sales p span');
    totalSalesElement.textContent = `${totalSales.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
}
