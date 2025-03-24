document.addEventListener('DOMContentLoaded', function () {
    calculateTotalSales(); // Calculate and set the default total sales value on page load
});

function filterByDate() {
    const filterDate = document.getElementById('date-filter').value;
    const table = document.getElementById('order-table');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    let totalSales = 0;

    for (let i = 0; i < rows.length; i++) {
        const createdAtCell = rows[i].getElementsByClassName('created-date')[0];
        const totalValueCell = rows[i].getElementsByTagName('td')[3]; // Total Amount column
        if (createdAtCell && totalValueCell) {
            const createdDate = createdAtCell.textContent.trim();
            const totalValue = parseFloat(totalValueCell.textContent.replace(/[₱,]/g, '')); // Parse number from ₱ format

            if (filterDate === createdDate || filterDate === "") {
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
