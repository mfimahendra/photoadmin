@extends('layouts.app')

@section('content-header')
    <div class="container-fluid">
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">                
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection


@section('scripts')        
    <script>        

        
    </script>
@endsection
