

var data1 = Object.values(data33);
    var dataYAxis = Object.values(labels);
    console.log(dataYAxis);
    const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: dataYAxis,
      datasets: [{
        label: '# Jumlah ',
        data: data1,
        borderColor: 'rgba(136,108,192, 1)',
        borderWidth: "0",
        backgroundColor: 'rgba(136,108,192, 0.7)'
      }]
    },
    options: {
        legend: false, 
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                // Change here
                barPercentage: 1
            }]
        }
    }
  });




	

 

