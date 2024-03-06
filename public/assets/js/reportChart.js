const reportChart = document.getElementById('reportChart').getContext('2d');



const chart = new Chart(reportChart, {
  type: 'line',
  data: {
    labels: ['الأسبوع الرابع', 'الأسبوع الثالث', 'الأسبوع الثاني', 'الأسبوع الأول'],
    datasets: [{
      label: 'تعليق',
      data: [10, 20, 15, 25],
      borderColor: '#7EB38B',
      borderWidth: 2,
      fill: false,
      pointRadius: 1 
    }, {
      label: 'تقييم',
      data: [15, 25, 20, 30],
      borderColor: '#0B807F',
      borderWidth: 2,
      fill: false,
      pointRadius: 1
    }, {
      label: 'سؤال',
      data: [20, 15, 30, 10],
      borderColor: '#2F4858',
      borderWidth: 2,
      fill: false,
      pointRadius: 1
    }, {
      label: 'مقترح',
      data: [25, 30, 10, 20],
      borderColor: '#98AEBA',
      borderWidth: 2,
      fill: false,
      pointRadius: 1
    }]
  },
  options: {
    scales: {
      x: {
        grid: {
          display: false
        },
        ticks: {
          font: {
            family: 'Tajawal',
            style: 'normal',
            size: 10
          },
          reverse: true
        }
      },
      y: {
        display: true,
        position: 'right',
        grid: {
          display: false
        },
        ticks: {
          font: {
            family: 'Tajawal',
            style: 'normal',
            size: 10
          },
        }
      }
    },
    plugins: {
      legend: {
        display: false
      },
      filler: {
        propagate: false
      }
    },
    elements: {
      line: {
        tension: 0.5 
      }
    }
  }
});
