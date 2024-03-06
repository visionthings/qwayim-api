
// home circle chart ==================================
const viewChart = document.getElementById('viewChart');

// console.log(`this month views : ${thisMonthVistor}`);
// console.log(`last month views: ${lastMonthVistor}`);
// console.log(`month comments: ${thisMonthComments}`);
new Chart(viewChart, {
    type: 'doughnut',
    data: {
        labels: ['الشهر السابق', 'الشهر الحالى'],
        datasets: [{
            label: 'المشاهدات',
            data: [11, 11],
            backgroundColor: [
                '#BB0202',
                '#7EB38B'
            ],
            hoverOffset: 4,
            cutout: '80%',
            borderAlign: 'inner',
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false // إخفاء مفتاح الألوان
            }
        },
        layout: {
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        }
    }
});


// line chart ======================================
const commentChart = document.getElementById('commentChart');

const gradient = commentChart.getContext('2d').createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, '#7EB38B'); // بداية التدرج بلون الخط
gradient.addColorStop(1, 'rgba(255,255,255,0.1)'); // النهاية مع الشفافية

new Chart(commentChart, {
    type: 'line',
    data: {
        labels: ['الأسبوع الأول', 'الأسبوع الثاني', 'الأسبوع الثالث', 'الأسبوع الرابع'],
        datasets: [{
            label: 'تعليق',
            data: [1,2,3,4],
            borderColor: '#7EB38B',
            pointBackgroundColor: '#7EB38B',
            backgroundColor: gradient,
            fill: true,
            tension: 0.4,
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        family: 'Tajawal',

                    }
                }
            },
            y: {
                position: 'right' 
                , ticks: {
                    font: {
                        family: 'Tajawal',

                    }
                },
                grid:{
                    display:false
                }
            },

        }
    }
});

// subscripetions circle chart=================================
    const subscribeChart = document.getElementById('subscribeChart');


    new Chart(subscribeChart, {
        type: 'doughnut',
        data: {
            labels: ['الشهر السابق', 'الشهر الحالى'],
            datasets: [{
                label: 'مشترك',
                data: [0, 1],
                backgroundColor: [
                    '#BB0202',
                    '#7EB38B'
                ],
                hoverOffset: 4,
                cutout: '80%',
                borderAlign: 'inner',
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false // إخفاء مفتاح الألوان
                }
            },
            layout: {
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            }
            
        }
    });

// bar in subscripations =========================
const supportsZeroDegreeRotation = window.matchMedia('(max-width: 767px)').matches;
const data = {
    labels: ['ديسمبر', 'نوفمبر', 'أكتوبر', 'سبتمبر', 'أغسطس', 'يوليو', 'يونيو', 'مايو', 'أبريل', 'مارس', 'فبراير', 'يناير'],
    datasets: [
      {
        label: 'العمود الأحمر',
        data: [5, 15, 8, 12, 20, 10, 13, 9, 18, 6, 8, 15],
        backgroundColor: '#BB0202',
        borderWidth: 1,
        borderRadius: 10,
      },
      {
        label: 'العمود الأخضر',
        data: [10, 20, 15, 25, 30, 18, 22, 17, 28, 12, 16, 24],
        backgroundColor: '#7EB38B',
        borderWidth: 1,
        borderRadius: 10,
      }
    ]
  };

const options = {
    indexAxis: 'x',
    plugins: {
      rtl: {
        rtl: true
      },
      legend: {
        display: false
      },
      
    },
    scales: {
      x: {
        position: 'bottom',
        stacked: false,
        ticks: {
          font: {
            family: 'Tajawal',
            style: 'normal',
            weight: 'bold',
            color: 'black',
            size: 9
          },
          maxRotation: supportsZeroDegreeRotation ? 45 : 0,
          minRotation: supportsZeroDegreeRotation ? 45 : 0,
          autoSkip: false
        },
        grid: {
          display: false
        }
      },
      y: {
        position: 'right',
        stacked: false,
        ticks: {
            font: {
                family: 'Tajawal',
                style: 'normal',
                weight: 'bold',
                color: 'black' 
              }
        },
        grid: {
          display: false
        }
      }
    },
    layout: {
      padding: {
        bottom: 20
      }
    },
    // barPercentage: 1,
    // categoryPercentage: 0.7,
    borderRadius: 10,
    // offset: true,
    align: 'center'
  };
  
  const ctx = document.getElementById('supChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });


