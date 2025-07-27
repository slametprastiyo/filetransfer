<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetAlert2 with Plotly.js</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
    <button onclick="showChartInSweetAlert()">Show Chart</button>

    <script>
        function showChartInSweetAlert() {
            Swal.fire({
                title: 'Interactive Chart',
                html: '<div id="plotly-chart" style="width: 100%; height: 400px;"></div>', // Container for the chart
                width: 700, // Adjust width as needed
                showConfirmButton: true, // Or false if you just want to display
                didOpen: () => {
                    // This callback is executed after the modal is in the DOM
                    const chartDiv = document.getElementById('plotly-chart');

                    // Define your Plotly.js data and layout
                    const data = [{
                        x: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                        y: [20, 14, 23, 25, 22],
                        type: 'bar',
                        name: 'Sales'
                    },
                    {
                        x: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                        y: [10, 18, 15, 20, 17],
                        type: 'line',
                        name: 'Expenses'
                    }];

                    const layout = {
                        title: 'Monthly Performance',
                        xaxis: {
                            title: 'Month'
                        },
                        yaxis: {
                            title: 'Amount'
                        }
                    };

                    // Render the chart into the div
                    Plotly.newPlot(chartDiv, data, layout);

                    // Optional: Add event listeners to the chart if needed
                    chartDiv.on('plotly_click', (data) => {
                        if (data.points && data.points.length > 0) {
                            const point = data.points[0];
                            console.log('Clicked on:', point.x, point.y);
                            Swal.fire('Clicked!', `You clicked on ${point.x}: ${point.y}`, 'info');
                        }
                    });
                },
                willClose: () => {
                    // Optional: Clean up Plotly chart if necessary to prevent memory leaks
                    const chartDiv = document.getElementById('plotly-chart');
                    if (chartDiv && chartDiv.data) { // Check if Plotly chart exists
                         Plotly.purge(chartDiv);
                    }
                }
            });
        }
    </script>
</body>
</html>