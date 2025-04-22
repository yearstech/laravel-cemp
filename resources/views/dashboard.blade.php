@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="mb-3">
            <div class="row gy-2">
                <div class="col-lg-5 h-100">
                    <div class="card card-body">
                        <div class="form-control-datepicker datepicker-inline"></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card card-body">
                        <div id="chart-container" style="width: 100%; height: 315px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($tiles as $tile)
                <x-utils.dashboard-tile :url="$tile['url']" :title="$tile['title']" :icon="$tile['icon']" :color="$tile['color']"
                    :value="$tile['value']" />
            @endforeach
        </div>
    </div>
    @push('js_after')
        <script>
            $(document).ready(() => {
                // Display date picker
                new Datepicker(document.querySelector('.form-control-datepicker'), {
                    buttonClass: 'btn',
                });

                // Example usage
                const xData = @json($xData);
                const yData = @json($yData);

                createBarChart(xData, yData, 'chart-container');
            });
        </script>
    @endpush
@endsection
