@extends('layouts.dashboard.master',['title' => 'Dashboard'])
@section('style')
<style type="text/css">
    canvas{
        width:100px !important;
    }
</style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" style="width:98%" id="kt_content">
       <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 13-->
                <div class="card card-xl-stretch mb-xl-10" style="background-color: #F7D9E3">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="/dashboard" class="text-dark text-hover-primary fw-bolder fs-3">Projects</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <div class="mixed-widget-13-chart" style="height: 100px; min-height: 100px;"><div id="apexchartsbnejzmma" class="apexcharts-canvas apexchartsbnejzmma apexcharts-theme-light" style="width: 191px; height: 100px;"><svg id="SvgjsSvg1134" width="191" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1136" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1135"><clipPath id="gridRectMaskbnejzmma"><rect id="SvgjsRect1139" width="198" height="103" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskbnejzmma"></clipPath><clipPath id="nonForecastMaskbnejzmma"></clipPath><clipPath id="gridRectMarkerMaskbnejzmma"><rect id="SvgjsRect1140" width="195" height="104" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1145" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1146" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.2"></stop><stop id="SvgjsStop1147" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="1.2"></stop><stop id="SvgjsStop1148" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="1.2"></stop><stop id="SvgjsStop1149" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1.2"></stop></linearGradient></defs><g id="SvgjsG1152" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1153" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1161" class="apexcharts-grid"><g id="SvgjsG1162" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1164" x1="0" y1="0" x2="191" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1165" x1="0" y1="10" x2="191" y2="10" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1166" x1="0" y1="20" x2="191" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1167" x1="0" y1="30" x2="191" y2="30" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1168" x1="0" y1="40" x2="191" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1169" x1="0" y1="50" x2="191" y2="50" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1170" x1="0" y1="60" x2="191" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1171" x1="0" y1="70" x2="191" y2="70" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1172" x1="0" y1="80" x2="191" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1173" x1="0" y1="90" x2="191" y2="90" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1174" x1="0" y1="100" x2="191" y2="100" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1163" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1176" x1="0" y1="100" x2="191" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1175" x1="0" y1="1" x2="0" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1141" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1142" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1150" d="M 0 100L 0 75C 13.370000000000001 75 24.830000000000002 58.33333333333333 38.2 58.33333333333333C 51.57000000000001 58.33333333333333 63.03 75 76.4 75C 89.77 75 101.23 33.33333333333333 114.6 33.33333333333333C 127.97 33.33333333333333 139.43 66.66666666666666 152.8 66.66666666666666C 166.17000000000002 66.66666666666666 177.63 16.666666666666657 191 16.666666666666657C 191 16.666666666666657 191 16.666666666666657 191 100M 191 16.666666666666657z" fill="url(#SvgjsLinearGradient1145)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbnejzmma)" pathTo="M 0 100L 0 75C 13.370000000000001 75 24.830000000000002 58.33333333333333 38.2 58.33333333333333C 51.57000000000001 58.33333333333333 63.03 75 76.4 75C 89.77 75 101.23 33.33333333333333 114.6 33.33333333333333C 127.97 33.33333333333333 139.43 66.66666666666666 152.8 66.66666666666666C 166.17000000000002 66.66666666666666 177.63 16.666666666666657 191 16.666666666666657C 191 16.666666666666657 191 16.666666666666657 191 100M 191 16.666666666666657z" pathFrom="M -1 100L -1 100L 38.2 100L 76.4 100L 114.6 100L 152.8 100L 191 100"></path><path id="SvgjsPath1151" d="M 0 75C 13.370000000000001 75 24.830000000000002 58.33333333333333 38.2 58.33333333333333C 51.57000000000001 58.33333333333333 63.03 75 76.4 75C 89.77 75 101.23 33.33333333333333 114.6 33.33333333333333C 127.97 33.33333333333333 139.43 66.66666666666666 152.8 66.66666666666666C 166.17000000000002 66.66666666666666 177.63 16.666666666666657 191 16.666666666666657" fill="none" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskbnejzmma)" pathTo="M 0 75C 13.370000000000001 75 24.830000000000002 58.33333333333333 38.2 58.33333333333333C 51.57000000000001 58.33333333333333 63.03 75 76.4 75C 89.77 75 101.23 33.33333333333333 114.6 33.33333333333333C 127.97 33.33333333333333 139.43 66.66666666666666 152.8 66.66666666666666C 166.17000000000002 66.66666666666666 177.63 16.666666666666657 191 16.666666666666657" pathFrom="M -1 100L -1 100L 38.2 100L 76.4 100L 114.6 100L 152.8 100L 191 100"></path><g id="SvgjsG1143" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1182" r="0" cx="114.6" cy="33.33333333333333" class="apexcharts-marker wuo3fm03z no-pointer-events" stroke="#e4e6ef" fill="#3f4254" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1144" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1177" x1="0" y1="0" x2="191" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1178" x1="0" y1="0" x2="191" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1179" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1180" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1181" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1160" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1137" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 50px;"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: -20px; top: 36.3333px;"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">May</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Net Profit: </span><span class="apexcharts-tooltip-text-y-value">$40 thousands</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light" style="left: 90.4437px; top: 102px;"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px; min-width: 27.3143px;">May</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            
                            <span class="text-dark fw-bolder fs-3x me-2 lh-0">{{$projects}}</span>
                           
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 13-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            @if(\Auth::user()->hasRole([['admin']]))
            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-xl-10" style="background-color: #CBF0F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="/dashboard" class="text-dark text-hover-primary fw-bolder fs-3">Companies</a>
                           
                            <div class="mixed-widget-14-chart" style="height: 100px; min-height: 115px;"><div id="apexchartsopbjsof1" class="apexcharts-canvas apexchartsopbjsof1 apexcharts-theme-light" style="width: 191px; height: 100px;"><svg id="SvgjsSvg1183" width="191" height="100" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1185" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 41)"><defs id="SvgjsDefs1184"><clipPath id="gridRectMaskopbjsof1"><rect id="SvgjsRect1189" width="195" height="38" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskopbjsof1"></clipPath><clipPath id="nonForecastMaskopbjsof1"></clipPath><clipPath id="gridRectMarkerMaskopbjsof1"><rect id="SvgjsRect1190" width="195" height="42" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1225" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1226" class="apexcharts-xaxis-texts-g" transform="translate(0, 4)"></g></g><g id="SvgjsG1243" class="apexcharts-grid"><g id="SvgjsG1244" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1246" x1="0" y1="0" x2="191" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1247" x1="0" y1="9.5" x2="191" y2="9.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1248" x1="0" y1="19" x2="191" y2="19" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1249" x1="0" y1="28.5" x2="191" y2="28.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1250" x1="0" y1="38" x2="191" y2="38" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1245" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1252" x1="0" y1="38" x2="191" y2="38" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1251" x1="0" y1="1" x2="0" y2="38" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1191" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1192" class="apexcharts-series" rel="1" seriesName="Inflation" data:realIndex="0"><path id="SvgjsPath1196" d="M 5.093333333333333 38L 5.093333333333333 35.75Q 5.093333333333333 33.25 7.593333333333333 33.25L 5.139999999999999 33.25Q 7.639999999999999 33.25 7.639999999999999 35.75L 7.639999999999999 35.75L 7.639999999999999 38L 7.639999999999999 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 5.093333333333333 38L 5.093333333333333 35.75Q 5.093333333333333 33.25 7.593333333333333 33.25L 5.139999999999999 33.25Q 7.639999999999999 33.25 7.639999999999999 35.75L 7.639999999999999 35.75L 7.639999999999999 38L 7.639999999999999 38z" pathFrom="M 5.093333333333333 38L 5.093333333333333 38L 7.639999999999999 38L 7.639999999999999 38L 7.639999999999999 38L 7.639999999999999 38L 7.639999999999999 38L 5.093333333333333 38" cy="33.25" cx="17.826666666666664" j="0" val="1" barHeight="4.75" barWidth="2.5466666666666664"></path><path id="SvgjsPath1198" d="M 17.826666666666664 38L 17.826666666666664 30.525Q 17.826666666666664 28.025 20.326666666666664 28.025L 17.87333333333333 28.025Q 20.37333333333333 28.025 20.37333333333333 30.525L 20.37333333333333 30.525L 20.37333333333333 38L 20.37333333333333 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 17.826666666666664 38L 17.826666666666664 30.525Q 17.826666666666664 28.025 20.326666666666664 28.025L 17.87333333333333 28.025Q 20.37333333333333 28.025 20.37333333333333 30.525L 20.37333333333333 30.525L 20.37333333333333 38L 20.37333333333333 38z" pathFrom="M 17.826666666666664 38L 17.826666666666664 38L 20.37333333333333 38L 20.37333333333333 38L 20.37333333333333 38L 20.37333333333333 38L 20.37333333333333 38L 17.826666666666664 38" cy="28.025" cx="30.559999999999995" j="1" val="2.1" barHeight="9.975000000000001" barWidth="2.5466666666666664"></path><path id="SvgjsPath1200" d="M 30.559999999999995 38L 30.559999999999995 35.75Q 30.559999999999995 33.25 33.059999999999995 33.25L 30.606666666666662 33.25Q 33.10666666666666 33.25 33.10666666666666 35.75L 33.10666666666666 35.75L 33.10666666666666 38L 33.10666666666666 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 30.559999999999995 38L 30.559999999999995 35.75Q 30.559999999999995 33.25 33.059999999999995 33.25L 30.606666666666662 33.25Q 33.10666666666666 33.25 33.10666666666666 35.75L 33.10666666666666 35.75L 33.10666666666666 38L 33.10666666666666 38z" pathFrom="M 30.559999999999995 38L 30.559999999999995 38L 33.10666666666666 38L 33.10666666666666 38L 33.10666666666666 38L 33.10666666666666 38L 33.10666666666666 38L 30.559999999999995 38" cy="33.25" cx="43.29333333333333" j="2" val="1" barHeight="4.75" barWidth="2.5466666666666664"></path><path id="SvgjsPath1202" d="M 43.29333333333333 38L 43.29333333333333 30.525Q 43.29333333333333 28.025 45.79333333333333 28.025L 43.339999999999996 28.025Q 45.839999999999996 28.025 45.839999999999996 30.525L 45.839999999999996 30.525L 45.839999999999996 38L 45.839999999999996 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 43.29333333333333 38L 43.29333333333333 30.525Q 43.29333333333333 28.025 45.79333333333333 28.025L 43.339999999999996 28.025Q 45.839999999999996 28.025 45.839999999999996 30.525L 45.839999999999996 30.525L 45.839999999999996 38L 45.839999999999996 38z" pathFrom="M 43.29333333333333 38L 43.29333333333333 38L 45.839999999999996 38L 45.839999999999996 38L 45.839999999999996 38L 45.839999999999996 38L 45.839999999999996 38L 43.29333333333333 38" cy="28.025" cx="56.026666666666664" j="3" val="2.1" barHeight="9.975000000000001" barWidth="2.5466666666666664"></path><path id="SvgjsPath1204" d="M 56.026666666666664 38L 56.026666666666664 21.025000000000002Q 56.026666666666664 18.525000000000002 58.526666666666664 18.525000000000002L 56.07333333333333 18.525000000000002Q 58.57333333333333 18.525000000000002 58.57333333333333 21.025000000000002L 58.57333333333333 21.025000000000002L 58.57333333333333 38L 58.57333333333333 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 56.026666666666664 38L 56.026666666666664 21.025000000000002Q 56.026666666666664 18.525000000000002 58.526666666666664 18.525000000000002L 56.07333333333333 18.525000000000002Q 58.57333333333333 18.525000000000002 58.57333333333333 21.025000000000002L 58.57333333333333 21.025000000000002L 58.57333333333333 38L 58.57333333333333 38z" pathFrom="M 56.026666666666664 38L 56.026666666666664 38L 58.57333333333333 38L 58.57333333333333 38L 58.57333333333333 38L 58.57333333333333 38L 58.57333333333333 38L 56.026666666666664 38" cy="18.525000000000002" cx="68.75999999999999" j="4" val="4.1" barHeight="19.474999999999998" barWidth="2.5466666666666664"></path><path id="SvgjsPath1206" d="M 68.75999999999999 38L 68.75999999999999 11.524999999999999Q 68.75999999999999 9.024999999999999 71.25999999999999 9.024999999999999L 68.80666666666666 9.024999999999999Q 71.30666666666666 9.024999999999999 71.30666666666666 11.524999999999999L 71.30666666666666 11.524999999999999L 71.30666666666666 38L 71.30666666666666 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 68.75999999999999 38L 68.75999999999999 11.524999999999999Q 68.75999999999999 9.024999999999999 71.25999999999999 9.024999999999999L 68.80666666666666 9.024999999999999Q 71.30666666666666 9.024999999999999 71.30666666666666 11.524999999999999L 71.30666666666666 11.524999999999999L 71.30666666666666 38L 71.30666666666666 38z" pathFrom="M 68.75999999999999 38L 68.75999999999999 38L 71.30666666666666 38L 71.30666666666666 38L 71.30666666666666 38L 71.30666666666666 38L 71.30666666666666 38L 68.75999999999999 38" cy="9.024999999999999" cx="81.49333333333333" j="5" val="6.1" barHeight="28.975" barWidth="2.5466666666666664"></path><path id="SvgjsPath1208" d="M 81.49333333333333 38L 81.49333333333333 21.025000000000002Q 81.49333333333333 18.525000000000002 83.99333333333333 18.525000000000002L 81.53999999999999 18.525000000000002Q 84.03999999999999 18.525000000000002 84.03999999999999 21.025000000000002L 84.03999999999999 21.025000000000002L 84.03999999999999 38L 84.03999999999999 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 81.49333333333333 38L 81.49333333333333 21.025000000000002Q 81.49333333333333 18.525000000000002 83.99333333333333 18.525000000000002L 81.53999999999999 18.525000000000002Q 84.03999999999999 18.525000000000002 84.03999999999999 21.025000000000002L 84.03999999999999 21.025000000000002L 84.03999999999999 38L 84.03999999999999 38z" pathFrom="M 81.49333333333333 38L 81.49333333333333 38L 84.03999999999999 38L 84.03999999999999 38L 84.03999999999999 38L 84.03999999999999 38L 84.03999999999999 38L 81.49333333333333 38" cy="18.525000000000002" cx="94.22666666666666" j="6" val="4.1" barHeight="19.474999999999998" barWidth="2.5466666666666664"></path><path id="SvgjsPath1210" d="M 94.22666666666666 38L 94.22666666666666 21.025000000000002Q 94.22666666666666 18.525000000000002 96.72666666666666 18.525000000000002L 94.27333333333333 18.525000000000002Q 96.77333333333333 18.525000000000002 96.77333333333333 21.025000000000002L 96.77333333333333 21.025000000000002L 96.77333333333333 38L 96.77333333333333 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 94.22666666666666 38L 94.22666666666666 21.025000000000002Q 94.22666666666666 18.525000000000002 96.72666666666666 18.525000000000002L 94.27333333333333 18.525000000000002Q 96.77333333333333 18.525000000000002 96.77333333333333 21.025000000000002L 96.77333333333333 21.025000000000002L 96.77333333333333 38L 96.77333333333333 38z" pathFrom="M 94.22666666666666 38L 94.22666666666666 38L 96.77333333333333 38L 96.77333333333333 38L 96.77333333333333 38L 96.77333333333333 38L 96.77333333333333 38L 94.22666666666666 38" cy="18.525000000000002" cx="106.96" j="7" val="4.1" barHeight="19.474999999999998" barWidth="2.5466666666666664"></path><path id="SvgjsPath1212" d="M 106.96 38L 106.96 30.525Q 106.96 28.025 109.46 28.025L 107.00666666666666 28.025Q 109.50666666666666 28.025 109.50666666666666 30.525L 109.50666666666666 30.525L 109.50666666666666 38L 109.50666666666666 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 106.96 38L 106.96 30.525Q 106.96 28.025 109.46 28.025L 107.00666666666666 28.025Q 109.50666666666666 28.025 109.50666666666666 30.525L 109.50666666666666 30.525L 109.50666666666666 38L 109.50666666666666 38z" pathFrom="M 106.96 38L 106.96 38L 109.50666666666666 38L 109.50666666666666 38L 109.50666666666666 38L 109.50666666666666 38L 109.50666666666666 38L 106.96 38" cy="28.025" cx="119.69333333333333" j="8" val="2.1" barHeight="9.975000000000001" barWidth="2.5466666666666664"></path><path id="SvgjsPath1214" d="M 119.69333333333333 38L 119.69333333333333 21.025000000000002Q 119.69333333333333 18.525000000000002 122.19333333333333 18.525000000000002L 119.74 18.525000000000002Q 122.24 18.525000000000002 122.24 21.025000000000002L 122.24 21.025000000000002L 122.24 38L 122.24 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 119.69333333333333 38L 119.69333333333333 21.025000000000002Q 119.69333333333333 18.525000000000002 122.19333333333333 18.525000000000002L 119.74 18.525000000000002Q 122.24 18.525000000000002 122.24 21.025000000000002L 122.24 21.025000000000002L 122.24 38L 122.24 38z" pathFrom="M 119.69333333333333 38L 119.69333333333333 38L 122.24 38L 122.24 38L 122.24 38L 122.24 38L 122.24 38L 119.69333333333333 38" cy="18.525000000000002" cx="132.42666666666665" j="9" val="4.1" barHeight="19.474999999999998" barWidth="2.5466666666666664"></path><path id="SvgjsPath1216" d="M 132.42666666666665 38L 132.42666666666665 30.525Q 132.42666666666665 28.025 134.92666666666665 28.025L 132.4733333333333 28.025Q 134.9733333333333 28.025 134.9733333333333 30.525L 134.9733333333333 30.525L 134.9733333333333 38L 134.9733333333333 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 132.42666666666665 38L 132.42666666666665 30.525Q 132.42666666666665 28.025 134.92666666666665 28.025L 132.4733333333333 28.025Q 134.9733333333333 28.025 134.9733333333333 30.525L 134.9733333333333 30.525L 134.9733333333333 38L 134.9733333333333 38z" pathFrom="M 132.42666666666665 38L 132.42666666666665 38L 134.9733333333333 38L 134.9733333333333 38L 134.9733333333333 38L 134.9733333333333 38L 134.9733333333333 38L 132.42666666666665 38" cy="28.025" cx="145.15999999999997" j="10" val="2.1" barHeight="9.975000000000001" barWidth="2.5466666666666664"></path><path id="SvgjsPath1218" d="M 145.15999999999997 38L 145.15999999999997 25.775Q 145.15999999999997 23.275 147.65999999999997 23.275L 145.20666666666662 23.275Q 147.70666666666662 23.275 147.70666666666662 25.775L 147.70666666666662 25.775L 147.70666666666662 38L 147.70666666666662 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 145.15999999999997 38L 145.15999999999997 25.775Q 145.15999999999997 23.275 147.65999999999997 23.275L 145.20666666666662 23.275Q 147.70666666666662 23.275 147.70666666666662 25.775L 147.70666666666662 25.775L 147.70666666666662 38L 147.70666666666662 38z" pathFrom="M 145.15999999999997 38L 145.15999999999997 38L 147.70666666666662 38L 147.70666666666662 38L 147.70666666666662 38L 147.70666666666662 38L 147.70666666666662 38L 145.15999999999997 38" cy="23.275" cx="157.8933333333333" j="11" val="3.1" barHeight="14.725000000000001" barWidth="2.5466666666666664"></path><path id="SvgjsPath1220" d="M 157.8933333333333 38L 157.8933333333333 35.75Q 157.8933333333333 33.25 160.3933333333333 33.25L 157.93999999999994 33.25Q 160.43999999999994 33.25 160.43999999999994 35.75L 160.43999999999994 35.75L 160.43999999999994 38L 160.43999999999994 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 157.8933333333333 38L 157.8933333333333 35.75Q 157.8933333333333 33.25 160.3933333333333 33.25L 157.93999999999994 33.25Q 160.43999999999994 33.25 160.43999999999994 35.75L 160.43999999999994 35.75L 160.43999999999994 38L 160.43999999999994 38z" pathFrom="M 157.8933333333333 38L 157.8933333333333 38L 160.43999999999994 38L 160.43999999999994 38L 160.43999999999994 38L 160.43999999999994 38L 160.43999999999994 38L 157.8933333333333 38" cy="33.25" cx="170.6266666666666" j="12" val="1" barHeight="4.75" barWidth="2.5466666666666664"></path><path id="SvgjsPath1222" d="M 170.6266666666666 38L 170.6266666666666 35.75Q 170.6266666666666 33.25 173.1266666666666 33.25L 170.67333333333326 33.25Q 173.17333333333326 33.25 173.17333333333326 35.75L 173.17333333333326 35.75L 173.17333333333326 38L 173.17333333333326 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 170.6266666666666 38L 170.6266666666666 35.75Q 170.6266666666666 33.25 173.1266666666666 33.25L 170.67333333333326 33.25Q 173.17333333333326 33.25 173.17333333333326 35.75L 173.17333333333326 35.75L 173.17333333333326 38L 173.17333333333326 38z" pathFrom="M 170.6266666666666 38L 170.6266666666666 38L 173.17333333333326 38L 173.17333333333326 38L 173.17333333333326 38L 173.17333333333326 38L 173.17333333333326 38L 170.6266666666666 38" cy="33.25" cx="183.35999999999993" j="13" val="1" barHeight="4.75" barWidth="2.5466666666666664"></path><path id="SvgjsPath1224" d="M 183.35999999999993 38L 183.35999999999993 30.525Q 183.35999999999993 28.025 185.85999999999993 28.025L 183.40666666666658 28.025Q 185.90666666666658 28.025 185.90666666666658 30.525L 185.90666666666658 30.525L 185.90666666666658 38L 185.90666666666658 38z" fill="rgba(255,255,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskopbjsof1)" pathTo="M 183.35999999999993 38L 183.35999999999993 30.525Q 183.35999999999993 28.025 185.85999999999993 28.025L 183.40666666666658 28.025Q 185.90666666666658 28.025 185.90666666666658 30.525L 185.90666666666658 30.525L 185.90666666666658 38L 185.90666666666658 38z" pathFrom="M 183.35999999999993 38L 183.35999999999993 38L 185.90666666666658 38L 185.90666666666658 38L 185.90666666666658 38L 185.90666666666658 38L 185.90666666666658 38L 183.35999999999993 38" cy="28.025" cx="196.09333333333325" j="14" val="2.1" barHeight="9.975000000000001" barWidth="2.5466666666666664"></path><g id="SvgjsG1194" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1195" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1197" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1199" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1201" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1203" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1205" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1207" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1209" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1211" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1213" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1215" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1217" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1219" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1221" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1223" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1193" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1253" x1="0" y1="0" x2="191" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1254" x1="0" y1="0" x2="191" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1255" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1256" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1257" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1242" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1186" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 50px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 255, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            <!--begin::Number-->
                            <span class="text-dark fw-bolder fs-3x me-2 lh-0">{{$company}}</span>
                            
                        </div>
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            @endif

            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-10" style="background-color: #CBD4F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column mb-7">
                            <!--begin::Title-->
                            <a href="/dashboard" class="text-dark text-hover-primary fw-bolder fs-3">Design Brief</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-9 me-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="currentColor"></path>
                                                    <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$pendingtemp}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">Pending</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-9 ms-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs046.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="currentColor"></path>
                                                    <path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$approvedtemp}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">Approved</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs022.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="currentColor"></path>
                                                    <path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$rejectedtemp}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">Rejected</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center ms-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs045.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M2 11.7127L10 14.1127L22 11.7127L14 9.31274L2 11.7127Z" fill="currentColor"></path>
                                                    <path opacity="0.3" d="M20.9 7.91274L2 11.7127V6.81275C2 6.11275 2.50001 5.61274 3.10001 5.51274L20.6 2.01274C21.3 1.91274 22 2.41273 22 3.11273V6.61273C22 7.21273 21.5 7.81274 20.9 7.91274ZM22 16.6127V11.7127L3.10001 15.5127C2.50001 15.6127 2 16.2127 2 16.8127V20.3127C2 21.0127 2.69999 21.6128 3.39999 21.4128L20.9 17.9128C21.5 17.8128 22 17.2127 22 16.6127Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$temporaryworks}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">Total</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>

            <!-- red green amber -->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-10" style="background-color: #CBD4F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column mb-7">
                            <!--begin::Title-->
                            <a href="/dashboard" class="text-dark text-hover-primary fw-bolder fs-3">Design Brief Dates</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-9 me-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="currentColor"></path>
                                                    <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$greendesingcount}}</div>
                                        <div class="fs-7 text-green-600 fw-bold" style="color:green">Green</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-9 ms-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs046.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="currentColor"></path>
                                                    <path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$amberdesingcount}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold" style="color:orange !important">Amber</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs022.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="currentColor"></path>
                                                    <path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$reddesingcount}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold" style="color:red !important">Red</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <div class="d-flex align-items-center ms-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-white bg-opacity-50">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs045.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M2 11.7127L10 14.1127L22 11.7127L14 9.31274L2 11.7127Z" fill="currentColor"></path>
                                                    <path opacity="0.3" d="M20.9 7.91274L2 11.7127V6.81275C2 6.11275 2.50001 5.61274 3.10001 5.51274L20.6 2.01274C21.3 1.91274 22 2.41273 22 3.11273V6.61273C22 7.21273 21.5 7.81274 20.9 7.91274ZM22 16.6127V11.7127L3.10001 15.5127C2.50001 15.6127 2 16.2127 2 16.8127V20.3127C2 21.0127 2.69999 21.6128 3.39999 21.4128L20.9 17.9128C21.5 17.8128 22 17.2127 22 16.6127Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$temporaryworks}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">Total</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>


            <div class="col-xl-12">
                <div>
                  <canvas id="myChart" width="1000" height="400"></canvas>
                </div>
            </div>
            <hr>
            <div class="col-xl-12">
                 <canvas id="projectshare" width="1000" height="400"></canvas>
            </div>
            <hr>
            <div class="col-xl-12">
                 <div id="projectchart"></div>
            </div>
            <hr>
             @if(\Auth::user()->hasRole([['admin', 'company']]))
            <div class="col-xl-12">
                <div>
                  <canvas id="typechart" width="1000" height="400"></canvas>
                </div>
            </div>
            <hr>
            <div class="col-xl-12">
                 <div id="permitchart"></div>
            </div>
            @endif
                               
        </div>
    </div>
    @php
    $data=[];
    $stu=[];
    $projectlabels=[];
    $projecttotalbreifs=[];
    $redbriefs=[];
    $greenbreifs=[];
    $amberbreifs=[];
    $i=0;
    $typelabel=[];
    $typedata=[];
    $typecolor=[];

    $permitlable=[];
    $openpemit=[];
    $current =  \Carbon\Carbon::now();
    $expirepermit=0;
    @endphp
    @foreach($projectshares as $value)
    @php
    $data[]=$value->project->name;
    $stu[]=$value->total_temp;
    @endphp
    @endforeach

    @foreach($projecttotalbrief as $projectlabel)
        @php 
         $projectlabels[]=$projectlabel->project->name;
         $projecttotalbreifs[]=$projectlabel->totalbreif;
         $redbriefs[]=$projectredbrief[$i]->redbreif ?? '';
         $amberbreifs[]=$projectamberbrief[$i]->amberbreif ?? '';
         $greenbreifs[]=$projectgreenbrief[$i]->greenbreif ?? '';
         $i++;
        @endphp
    @endforeach


    @foreach($typestemporarywork as $type)
       @php 

          $typelabel[]=$type->design_requirement_text;
          $typedata[]=$type->total;
          $typecolor[]='#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
       @endphp

    @endforeach

    @foreach($companyopenpermit as $x => $permit)
    @php

     if(isset($companyexpirepermit[$x]->total))
     {
        if($permit->company == $companyexpirepermit[$x]->company)
        {
            $expirepermit++;
        }
     }
     $permitlable[]=$permit->company;
     $openpemit[]= $permit->total;
     @endphp
    @endforeach

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  const labels = [
    'Approved',
    'Pending',
    'Rejected',
  ];
  var pending='{{$pendingtemp}}';
  var approved='{{$approvedtemp}}';
  var rejected='{{$rejectedtemp}}';
  const data = {
    labels: labels,
    datasets: [{
      label: 'Design Brief',
      backgroundColor: ["green","orange","red"],
      borderColor: 'rgb(255, 99, 132)',
      data: [approved,pending,rejected],
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {
       scales: {
            yAxes: [{
                display: true,
                ticks: {
                    min: 0, // minimum value
                    stepSize: 5
                }
            }]
           }
    },

  };

   const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<script type="text/javascript">
    
    Highcharts.chart('projectchart', {
    chart: {
        type: 'column',
    },
    title: {
        text: 'Designs completed on time as per the request'
    },
    xAxis: {
        categories:<?php echo json_encode($projectlabels);?>
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Counts'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        layout: 'horizontal',
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        color:'#6a5acd',
        name: 'Design Brief',
        data: <?php echo json_encode($projecttotalbreifs);?>
    }, {
        color:'#ff0000',
        name: 'Designs received later than requested',
        data: <?php echo json_encode($redbriefs);?>
    }, {
        color:'#3cb371',
        name: 'Designs received on time',
        data: <?php echo json_encode($greenbreifs);?>
    },
    {
        color:'#ffa500',
        name:'Designs received on time (within 7 days)',
        data:<?php echo json_encode($amberbreifs);?>
    }]
});
</script>

<script type="text/javascript">
 const labelss = <?php echo json_encode($data);?>;
  const data1 = {
    labels: labelss,
    datasets: [{
      label: 'Share Design Brief',
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      data:<?php echo json_encode($stu);?>,
    }]
  };

  const config1 = {
    type: 'bar',
    data: data1,
    options: {
       scales: {
            yAxes: [{
                display: true,
                ticks: {
                    min: 0, // minimum value
                    stepSize: 1
                }
            }]
           }
    }
  };

   const myChart1 = new Chart(
    document.getElementById('projectshare'),
    config1
  );
</script>

<script>
  const typelabels =<?php echo json_encode($typelabel);?>;
  const typedata = {
    labels: typelabels,
    datasets: [{
      label: 'Types of temporary works ',
      backgroundColor:<?php echo json_encode($typecolor);?>,
      borderColor: 'rgb(255, 99, 132)',
      data: <?php echo json_encode($typedata);?>,
    }]
  };

  const typeconfig = {
    type: 'pie',
    data: typedata,
    options: {
       scales: {
            yAxes: [{
                display: true,
                ticks: {
                    min: 0, // minimum value
                    stepSize: 5
                }
            }]
           }
    },

  };

   const typechart = new Chart(
    document.getElementById('typechart'),
    typeconfig
  );
</script>

<!-- permit chart -->
<script type="text/javascript">
    
    Highcharts.chart('permitchart', {
    chart: {
        type: 'column',
    },
    title: {
        text: 'Companies Compliance'
    },
    xAxis: {
        categories:<?php echo json_encode($permitlable);?>
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Counts'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        layout: 'horizontal',
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        color:'#50C878',
        name: 'Open Permit',
        data: <?php echo json_encode($openpemit);?>
    },{
        color:'#C70039',
        name:'Expire Permit',
        data:[<?php echo $expirepermit;?>]
    }]
});
</script>
@endsection
