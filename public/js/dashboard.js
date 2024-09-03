$(document).ready(function(){

     var janJunLabel = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];
     var julDecLabel = ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

     /**(((((((((((((((((((((((((((((((((((((( REVENUE CHART START )))))))))))))))))))))))))))))))))))))) */

     var dailyData = [400, 20, 60, 40, 60, 425, 40, 25, 200, 60, 100, 60, 40, 200, 60, 40, 60, 400, 40, 250, 40, 20, 60, 420];
     var dailyLabel = ['12am', '1am', '2am', '3am', '4am', '5am', '6am', '7am', '8am', '9am', '10am', '11am', '12pm', '1pm', '2pm', '3pm', '4pm', '5pm', '6pm', '7pm', '8pm', '9pm', '10pm', '11pm'];

     var weeklyData = [100, 300, 600, 40, 700, 400, 200];
     var weeklyLabel = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

     var monthlyData = [40, 20, 60, 40, 60, 40, 40, 25, 20, 60, 100, 60, 40, 20, 60, 40, 60, 40, 40, 25, 40, 20, 60, 40, 60, 40, 40, 25, 20, 60, 100];
     var monthlyLabel = ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th', '13th', '14th', '15th', '16th', '17th', '18th', 
                         '19th', '20th', '21st', '22nd', '23rd', '24th', '25th', '26th', '27th', '28th', '29th', '30th', '31th'];

     var yearlyData = [400, 200, 600, 410, 660, 450, 400, 600, 410, 660, 450, 800];
     var yearlyLabel = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


     

     //Calling the Revenue chart when the page is loaded
     revenueChart(yearlyData, yearlyLabel, 'revenueChart');

     //Calling the Revenue chart when a button is clicked
     $('.adm-alt-link').on('click', function(){
          $(this).parents('ul').find('li').removeClass('active');
          $(this).addClass('active');

          var duration = $(this).data('duration');


          $('canvas#revenueChart').remove();

          var canvas = `<canvas id="revenueChart" class="revenueChart" width="550" height="258"
          style="display: block; box-sizing: border-box; height: 129px; width: 100%;"></canvas>`;

          $('#rv-chart-ctn').append(canvas);

          if(duration == 'yearly'){
               revenueChart(yearlyData, yearlyLabel, 'revenueChart');
          }else if(duration == 'monthly'){
               revenueChart(monthlyData, monthlyLabel, 'revenueChart');
          }else if(duration == 'weekly'){
               revenueChart(weeklyData, weeklyLabel, 'revenueChart');
          }else if(duration == 'daily'){
               revenueChart(dailyData, dailyLabel, 'revenueChart');
          }
          


     });

     function revenueChart(data, label, duration) {

          const revenueChart = document.getElementById(duration).getContext('2d');

          revenueChart.height = 'auto';

          new Chart(revenueChart, {
               type: 'line',
               data: {
                    defaultFontFamily: 'Poppins',
                    labels: label,
                    datasets: [
                         {
                              label: "Revenue",
                              data: data,
                              borderColor: '#D80450',
                              borderWidth: "2",
                              backgroundColor: '#fff',
                              tension: 0.5,
                              pointRadius: 0,
                              fill: false,
                         }
                    ]
               },
               options: {
                    plugins: {
                         legend: false,
                    },
                    scales:  {
                         y: {
                              grid: {
                                   borderDash: [5, 5],
                                   zeroLineBorderDash: [5, 5],
                                   zeroLineColor: '#fff',
                                   zeroLineWidth: 0
                              },
                              beginAtZero: true
                         },
                         x: {
                              grid: {
                                   zeroLineColor: 'transparent',
                                   zeroLineWidth: 0,
                                   display: false,
                              }
                         }
                    },
                    // animations: {
                    //      tension: {
                    //           duration: 3000,
                    //           easing: 'linear',
                    //           from: 1,
                    //           to: 0,
                    //           loop: true
                    //      }
                    // }
               }
          });
     }

     /**(((((((((((((((((((((((((((((((((((((( REVENUE CHART END )))))))))))))))))))))))))))))))))))))) */


     /**(((((((((((((((((((((((((((((((((((((( CUSTOMER CHART START )))))))))))))))))))))))))))))))))))))) */

     var customerJanJun2023 = [100, 200, 300, 400, 500, 600];
     var customerJulDec2023 = [100, 500, 800, 800, 500, 100];

     barChart(customerJanJun2023, janJunLabel, 'customerChart', 'Customer');

     $('#customer-select').on('change', function(){
          var duration = $(this).val();

          $('canvas#customerChart').remove();

          var canvas = ` <canvas id="customerChart" class="revenueChart" width="550" height="400"
          style="display: block; box-sizing: border-box; height: 129px; width: 100%;"></canvas>`;

          $('#cm-chart-ctn').append(canvas);

          if(duration == 'jan23'){
                 barChart(customerJanJun2023, janJunLabel, 'customerChart', 'Customer');
          }else if(duration == 'jul23'){
               barChart(customerJulDec2023, julDecLabel, 'customerChart', 'Customer');
          }
     });

   /**(((((((((((((((((((((((((((((((((((((( CUSTOMERS CHART END )))))))))))))))))))))))))))))))))))))) */

   /**(((((((((((((((((((((((((((((((((((((( LISTINGS CHART START )))))))))))))))))))))))))))))))))))))) */

   var listingJanJun2023 = [100, 1000, 300, 100, 100, 400];
   var listingJulDec2023 = [100, 600, 500, 200, 700, 100];

   barChart(listingJanJun2023, janJunLabel, 'listingChart', 'Listing');

   $('#listing-select').on('change', function(){
        var duration = $(this).val();

        $('canvas#listingChart').remove();

        var canvas = ` <canvas id="listingChart" class="revenueChart" width="550" height="400"
        style="display: block; box-sizing: border-box; height: 129px; width: 100%;"></canvas>`;

        $('#lt-chart-ctn').append(canvas);

        if(duration == 'jan23'){
               barChart(listingJanJun2023, janJunLabel, 'listingChart', 'Listing');
        }else if(duration == 'jul23'){
             barChart(listingJulDec2023, julDecLabel, 'listingChart', 'Listing');
        }
   });
     
     

   /**(((((((((((((((((((((((((((((((((((((( LISTINGS CHART END )))))))))))))))))))))))))))))))))))))) */

     
     function barChart(data, label, idName, labelName) {

          const customerChart = document.getElementById(idName).getContext('2d');
          //generate gradient
          const gradient = customerChart.createLinearGradient(0, 0, 0, 255);
          gradient.addColorStop(0, "rgba(216,4,80, 0.3)");
          gradient.addColorStop(1, "rgba(216,4,80, 1)");

          customerChart.height = 'auto';

          new Chart(customerChart, {
               type: 'bar',
               data: {
                    defaultFontFamily: 'Poppins',
                    labels: label,
                    datasets: [
                         {
                              label: labelName,
                              data: data,
                              borderColor: '#D80450',
                              borderWidth: "0",
                              borderRadius: 7,
                              barThickness: 20,
                              // backgroundColor: '#ef3487',
                              hoverBackgroundColor: '#ef3487',
                              backgroundColor: gradient,
                              tension: 0.5,
                              fill: false,
                         }
                    ]
               },
               options: {
                    plugins: {
                         legend: false,
                    },
                    scales:  {
                         y: {
                              grid: {
                                   borderDash: [5, 5],
                                   zeroLineBorderDash: [5, 5],
                                   zeroLineColor: '#fff',
                                   zeroLineWidth: 0
                              },
                              beginAtZero: true
                         },
                         x: {
                              grid: {
                                   zeroLineColor: 'transparent',
                                   zeroLineWidth: 0,
                                   display: false,
                              },
                              barPercentage: 0.2
                         },
                    },
               }
          });
     }











});