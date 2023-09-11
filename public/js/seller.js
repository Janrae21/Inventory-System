const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// BAR CHART
var barChartOptions = {
	series: [{
	  data: [54, 48, 45, 41, 37]
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
	  categories: ["Piso Wifi", "E-Loading Machine", "Piso Wifi", "Cellphone", "E-Loading Parts"],
	  title:{
		text:"Product Name"
	  }
	},
	yaxis: {
	  title: {
		text: "Total Sales"
	  }
	}
  };


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
	  title:{
		text:"Customer Name"
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


// const selectElement = document.getElementById('select');
// selectElement.addEventListener('change', function() {
//   const optionElement = document.querySelector('option[value="1"]');
//   if (optionElement) {
//     optionElement.style.color = rgba(110, 255, 105, 0.911);
//   }
// });


const dropBtn = document.querySelector('.dropdown-btn'),
dropdown = document.querySelectorAll('.drop-item');

dropBtn.addEventListener('click', () => {
	dropdown.forEach(drop => {
		if(drop.classList.contains('show-item')) {
			drop.classList.remove('show-item');
		} else {
			drop.classList.add('show-item');
		}
	});
});
