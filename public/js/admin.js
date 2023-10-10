
const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
});




//Customer Ranking
var barChartOpt = {
    series: [{
        data: [15, 12, 11, 7, 5]
    }],
    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false
        },
    },
    colors: [
        "#246dec",
        "#cc3c43",
        "#367952",
        "#f5b74f",
        "#4f35a1"
    ],
    plotOptions: {
        bar: {
            distributed: true,
            borderRadius: 4,
            horizontal: false,
            columnWidth: '40%',
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false
    },
    xaxis: {
        categories: ["Seth Obenita", "Rogina Rolloque", "Mary Joy Reambonanza", "John Doe", "Jean Ros"],
        title: {
            text: "Customer Name"
        }
    },
    yaxis: {
        title: {
            text: "Total Purchased Products"
        }
    }
};

var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
barChart.render();
var barChart = new ApexCharts(document.querySelector("#chart"), barChartOpt);
barChart.render();

const dropBtn = document.querySelector('.dropdown-btn'),
    dropdown = document.querySelectorAll('.drop-item');

dropBtn.addEventListener('click', () => {
    dropdown.forEach(drop => {
        if (drop.classList.contains('show-item')) {
            drop.classList.remove('show-item');
        } else {
            drop.classList.add('show-item');
        }
    });
});

