document.addEventListener('DOMContentLoaded', function () {
    // Result Chart
    var ctx = document.getElementById('resultChart').getContext('2d');
    var resultChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            datasets: [
                {
                    label: '2019',
                    data: [12, 19, 3, 5, 2, 3, 7, 8, 9],
                    backgroundColor: '#36A2EB'
                },
                {
                    label: '2020',
                    data: [2, 3, 20, 5, 1, 4, 6, 7, 10],
                    backgroundColor: '#FFCE56'
                }
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            }
        }
    });

    // Performance Chart
    var ctx2 = document.getElementById('performanceChart').getContext('2d');
    var performanceChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            datasets: [{
                label: 'Performance',
                data: [15, 20, 25, 30, 35, 40, 45, 50, 55],
                borderColor: '#36A2EB',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                pointBackgroundColor: '#36A2EB',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#36A2EB'
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Performance'
                    }
                }]
            }
        }
    });

    // Calendar Chart
    var ctx3 = document.getElementById('calendarChart').getContext('2d');
    var calendarChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Events',
                data: [5, 10, 15, 20],
                borderColor: '#FF6384',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
                pointBackgroundColor: '#FF6384',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#FF6384'
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Week'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Events'
                    }
                }]
            }
        }
    });

    // Progress Chart
    var ctx4 = document.getElementById('progressChart').getContext('2d');
    var progressChart = new Chart(ctx4, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'In Progress', 'Pending'],
            datasets: [{
                data: [45, 35, 20],
                backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384'],
                hoverBackgroundColor: ['#36A2EB', '#FFCE56', '#FF6384']
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            }
        }
    });
});