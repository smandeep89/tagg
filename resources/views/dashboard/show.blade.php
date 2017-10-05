@extends('app')
@section('content')

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Layouts &raquo; Hero Sidebar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'/>

    <!-- Demo Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"
            type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.3.2/holder.min.js" type="text/javascript"></script>
    <script>
        Holder.add_theme("white", {background: "#fff", foreground: "#a7a7a7", size: 10});
    </script>

    <!-- keen-analysis@1.2.2 -->
    <script src="https://d26b395fwzu5fz.cloudfront.net/keen-analysis-1.2.2.js" type="text/javascript"></script>

    <!-- keen-dataviz@1.1.3 -->
    <link href="https://d26b395fwzu5fz.cloudfront.net/keen-dataviz-1.1.3.css" rel="stylesheet"/>
    <script src="https://d26b395fwzu5fz.cloudfront.net/keen-dataviz-1.1.3.js" type="text/javascript"></script>

    <!-- Dashboard -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/keen-dashboards.css"/>
</head>
<body class="keen-dashboard" style="padding-top: 80px;">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="navbar-brand" href="./">Layouts &raquo; Hero Sidebar</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="https://keen.io">Home</a></li>
                <li><a href="https://keen.io/team">Team</a></li>
                <li><a href="https://github.com/keenlabs/dashboards/tree/gh-pages/layouts/hero-sidebar">Source</a></li>
                <li><a href="https://groups.google.com/forum/#!forum/keen-io-devs">Community</a></li>
                <li><a href="http://stackoverflow.com/questions/tagged/keen-io?sort=newest&pageSize=15">Technical
                        Support</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="chart-wrapper">
                <div class="chart-title">
                    Cell Title
                </div>
                <div class="chart-stage">
                    <img data-src="holder.js/100%x650/white">
                </div>
                <div class="chart-notes">
                    Notes about this chart
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            Cell Title
                        </div>
                        <div class="chart-stage">
                            <img data-src="holder.js/100%x240/white">
                        </div>
                        <div class="chart-notes">
                            Notes about this chart
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            Cell Title
                        </div>
                        <div class="chart-stage">
                            <img data-src="holder.js/100%x120/white">
                        </div>
                        <div class="chart-notes">
                            Notes about this chart
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            Cell Title
                        </div>
                        <div class="chart-stage">
                            <img data-src="holder.js/100%x120/white">
                        </div>
                        <div class="chart-notes">
                            Notes about this chart
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            Cell Title
                        </div>
                        <div class="chart-stage">
                            <img data-src="holder.js/100%x120/white">
                        </div>
                        <div class="chart-notes">
                            Notes about this chart
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            Cell Title
                        </div>
                        <div class="chart-stage">
                            <img data-src="holder.js/100%x120/white">
                        </div>
                        <div class="chart-notes">
                            Notes about this chart
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            Cell Title
                        </div>
                        <div class="chart-stage">
                            <img data-src="holder.js/100%x120/white">
                        </div>
                        <div class="chart-notes">
                            Notes about this chart
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="chart-wrapper">
                        <div class="chart-title">
                            Cell Title
                        </div>
                        <div class="chart-stage">
                            <img data-src="holder.js/100%x120/white">
                        </div>
                        <div class="chart-notes">
                            Notes about this chart
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <p class="small text-muted">Built with &#9829; by <a href="https://keen.io">Keen IO</a></p>
</div>

<!-- Project Analytics -->
<script type="text/javascript" src="../../assets/js/keen-analytics.js"></script>
</body>
</html>
@stop