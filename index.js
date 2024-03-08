function addData(chart, label, newData) {
    chart.data.labels = label;
    chart.data.datasets[0].data = newData;
  chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

window.onload = function load_country_options()
{

      const ctx1 = document.getElementById('populationChart');

      populationChart = new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            label: 'Population',
            data: [],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });


      const ctx2 = document.getElementById('largestCitiesChart');

      largestCitiesChart = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            label: 'Population',
            data: [],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });


      const ctx3 = document.getElementById('languageChart');

      languageChart = new Chart(ctx3, {
        type: "pie",
        data: {
          labels: [],
          datasets: [{
            backgroundColor: [
              "rgba(200,50,0,1.0)",
              "rgba(50,200,0,0.9)",
              "rgba(0,0,200,0.8)",
              "rgba(200,0,200,0.7)",
              "rgba(200,200,0,0.6)",
            ],
            data: []
          }]
        },
        options: {
          title: {
            display: true,
            text: "Most Spoken Languages"
          }
        }
      });


  fetch('countries.php',
  {
      method: 'GET',
      header:{'Content-Type': 'application/json'}
  })
  .then(response => response.json())
  .then(data => 
  {
    console.log(data);
    const ctx = document.getElementById('populationChart');
    data.forEach(element => {
      select = document.getElementById('countries');
      var opt = document.createElement('option');
      opt.value = element.country;
      opt.innerHTML = element.country;
      select.appendChild(opt);
    })
  })
  .catch((error) => {
    console.error('errore: ', error);
  });


}


function largest_cities()
{

    var e = document.getElementById("countries");
    var value = e.value;
    var text = e.options[e.selectedIndex].text;
    fetch('largest_cities.php?' + new URLSearchParams({country: text}),
    {
        method: 'GET',
        header:{'Content-Type': 'application/json'}
    }
    )
    .then(response => response.json())
    .then(data => 
    {
      const xArray = [];
      const yArray = [];
      data.forEach(element => {
              xArray.push(element.city);
              yArray.push(element.population);
      });

      addData(largestCitiesChart,xArray,yArray);
      

    })
    .catch((error) => {
        console.error('errore: ', error);
    });
}



function population()
{
    fetch('population.php',
        {
            method: 'GET',
            header:{'Content-Type': 'application/json'}
        }
    )
    .then(response => response.json())
    .then(data => 
    {
      const xArray = [];
      const yArray = [];
      data.forEach(element => {
              xArray.push(element.country);
              yArray.push(element.population);
      });

      
      addData(populationChart,xArray,yArray);


    })
    .catch((error) => {
        console.error('errore: ', error);
    });
}



function language()
{
    fetch('language.php',
        {
            method: 'GET',
            header:{'Content-Type': 'application/json'}
        }
    )
    .then(response => response.json())
    .then(data => 
    {
      const xArray = [];
      const yArray = [];
      data.forEach(element => {
              xArray.push(element.language);
              yArray.push(element.number_of_countries);
      });

      addData(languageChart,xArray,yArray);
      


    })
    .catch((error) => {
        console.error('errore: ', error);
    });
}