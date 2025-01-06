@extends('layouts.app')


@section('content')


<div class="container p-0">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h1 mb-0 fw-bolder">DASHBOARD</h1>
    </div>
    
    <div class="row justify-content-between">
        <div class="col-md-3">
            <div class="mb-5">
                <h4>OVERDUE INVOICES & BILLS</h4>
                <div class="card mb-3 rounded-4 border">
                    <div class="card-body">
                        <div class="card-title">Overdue Invoices</div>
                        <ul>
                            <li><a href=""><span class="fw-bolder text-dark">Customer 1</span></a>, 1.000.000</li>
                            <li><a href=""><span class="fw-bolder text-dark">Vendor 1</span></a>, 3.000.000</li>
                            <li><a href=""><span class="fw-bolder text-dark">Vendor 2</span></a>, 2.500.000</li>
                        </ul>
                    </div>
                </div>
                
                <div class="card mb-3 rounded-4 border">
                    <div class="card-body">
                        <div class="card-title">Overdue Bills</div>
                        <ul>
                            <li><a href=""><span class="fw-bolder text-dark">Customer 1</span></a>, 1.000.000</li>
                            <li><a href=""><span class="fw-bolder text-dark">Vendor 1</span></a>, 3.000.000</li>
                            <li><a href=""><span class="fw-bolder text-dark">Vendor 2</span></a>, 2.500.000</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="mb-5">
                <h4>THINGS YOU CAN DO</h4>
                <a href="{{ route('customer.create') }}" class="btn text-primary d-block fw-bolder px-0 text-start">Add a customer</a>
                <a href="{{ route('vendor.create') }}" class="btn text-primary d-block fw-bolder px-0 text-start">Add a vendor</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="mb-3">
                <h4>CASH FLOW</h4>
                <p>Cash coming in and going out of your business.</p>
                <div id="chart-cashflow"></div>
            </div>
            
            
            <div class="mb-3">
                <h4>PROFIT AND LOSS</h4>
                <p>Income and expenses only (includes unpaid invoices and bills).</p>
                <div id="chart-profit-loss"></div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('footer')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
      chart: {
        type: 'line'
      },
      series: [{
        name: 'sales',
        data: [30,40,35,50,49,60,70,91,125]
      }],
      xaxis: {
        categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
      }
    }
    
    var chart = new ApexCharts(document.querySelector("#chart-cashflow"), options);
    
    chart.render();
    
    
     var chartProfitLossOptions = {
          series: [{
          name: 'Net Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };
    
    var chartProfitLoss = new ApexCharts(document.querySelector("#chart-profit-loss"), chartProfitLossOptions);
    
    chartProfitLoss.render();
</script>
@endsection