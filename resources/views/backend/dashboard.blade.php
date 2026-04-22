
@extends('backend.layouts.app')   {{-- jodi layouts folder na banai tahole @extends('backend.app') --}}

@section('title', 'Dashboard - Myfolio')

@section('content')




      <!-- contact part -->
   <div class="dashHeading mx-auto mt-3">
    <h3>Contact Messages</h3>
</div>

{{-- Desktop Table --}}
<div class="d-none d-md-block">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <tbody>
        @foreach($contacts as $index => $item)
        <tr class="{{ $index >= 6 ? 'd-none extra-row' : '' }}">
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->message }}</td>
            <td>
                @if($item->status == 'pending')
                    <span class="text-danger">Pending</span>
                @else
                    <span class="text-success">Done</span>
                @endif
            </td>
            <td>
                <a href="/contact-done/{{ $item->id }}" class="btn btn-sm btn-success">Done</a>
                <a href="/contact-delete/{{ $item->id }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

{{-- Mobile Cards --}}
<div class="d-md-none">
   @foreach($contacts as $index => $item)
<div class="card mb-3 {{ $index >= 6 ? 'd-none extra-row' : '' }}">
        <div class="card-body">
            <h6 class="card-title fw-bold">{{ $item->name }}</h6>
            <p class="card-text mb-1">
                <small class="text-muted">Email:</small> {{ $item->email }}
            </p>
            <p class="card-text mb-1">
                <small class="text-muted">Message:</small> {{ $item->message }}
            </p>
            <p class="card-text mb-2">
                <small class="text-muted">Status:</small>
                @if($item->status == 'pending')
                    <span class="text-danger">Pending</span>
                @else
                    <span class="text-success">Done</span>
                @endif
            </p>
            <a href="/contact-done/{{ $item->id }}" class="btn btn-sm btn-success">Done</a>
            <a href="/contact-delete/{{ $item->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
        </div>
    </div>
    @endforeach
</div>
{{-- ✅ BUTTON ekhane dite hobe (sobar niche) --}}
@if(count($contacts) > 6)
<div class="text-center mt-3">
    <button id="toggleBtn" class="btn btn-primary">View More</button>
</div>
@endif
<script>
    let expanded = false;

    document.getElementById("toggleBtn").addEventListener("click", function () {
        let extraRows = document.querySelectorAll(".extra-row");

        extraRows.forEach(row => {
            row.classList.toggle("d-none");
        });

        expanded = !expanded;
        this.innerText = expanded ? "View Less" : "View More";
    });
</script>
      <!-- contact ends here -->

      <!-- visitor part -->
     <div class="card p-3 mx-4 shadow-lg mt-3">
    <h5 class="text-center">👀 Monthly Visitors</h5>

    <div id="chart" style="width:100%;"></div>
     </div>
      <!-- visitor part ends -->
            

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    var options = {
        chart: {
            type: 'area',
            height: 350,
            toolbar: { show: false }
        },
        series: [{
            name: 'Visitors',
            data: {!! json_encode(array_values($monthlyVisitors)) !!}
        }],
        xaxis: {
            categories: {!! json_encode(array_keys($monthlyVisitors)) !!}
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            type: 'gradient',
            gradient: {
                opacityFrom: 0.7,
                opacityTo: 0.1
            }
        },

        // ✅ RESPONSIVE PART
        responsive: [
            {
                breakpoint: 768,
                options: {
                    chart: {
                        height: 250
                    }
                }
            },
            {
                breakpoint: 480,
                options: {
                    chart: {
                        height: 200
                    }
                }
            }
        ]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

});
</script>
</script>

@endsection