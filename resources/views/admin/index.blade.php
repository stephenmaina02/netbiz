@extends('admin.layouts.main')

@section('title','Dashboard')
@section('page_title','Dashboard')

@section('content')
<div class="row">
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">2020</div>
                    <div class="weight-600 font-14">Contact</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart2"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">400</div>
                    <div class="weight-600 font-14">Deals</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart3"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">350</div>
                    <div class="weight-600 font-14">Campaign</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart4"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">$6060</div>
                    <div class="weight-600 font-14">Worth</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
