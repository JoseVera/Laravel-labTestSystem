<!--
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
-->
<style type="text/css">
	.content {
        text-align: center;
    }
	.title {
        font-size: 84px;
    }
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 24px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
       
    }
	.links {
		 margin-bottom: 30px;
	}
    .m-b-md {
        margin-bottom: 30px;
    }

    .panel {
	    margin-bottom: 20px;
	    background-color: #fff;
	    border: 1px solid transparent;
	    border-radius: 4px;
	    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
	    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
	}

	.panel-primary {
	    border-color: #337ab7;
	}

	.panel-primary > .panel-heading {
	    color: #fff;
	    background-color: #337ab7;
	    border-color: #337ab7;
	}

	.form-control {
	    display: block;
	    width: 100%;
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
	    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}

	label {
	    display: inline-block;
	    max-width: 100%;
	    margin-bottom: 5px;
	    font-weight: bold;
	}

	.table {
	    width: 100%;
	    max-width: 100%;
	    margin-bottom: 20px;
	}

	.table-responsive {
	    min-height: .01%;
	    overflow-x: auto;
	}

	.table-bordered {
	    border: 1px solid #ddd;
	}

	.table > tbody > tr > td.active {
	    background-color: #f5f5f5;
	}

	td, th {
	    display: table-cell;
	    vertical-align: inherit;
	}

	tr {
	    display: table-row;
	    vertical-align: inherit;
	    border-color: inherit;
	}

</style>

<div class="content col-lg-10">
    <div class="title m-b-md">
        CROSSOVER
    </div>

    <div class="links">
        <a href="#">Pathology Lab Reporting System</a>
        
    </div>


	<div class="panel panel-primary">
        <div class="panel-heading">Report</div>
        <div class="panel-body" style="margin: 10px;">
                <div class="form-group">
                    <label>Report Name</label>
                    <p class="form-control">{{ $name }}</p>
                </div>
                <div class="form-group">
                    <label>Patient Name</label>
                    <p class="form-control">{{ $patient_name }}</p>
                </div>
                <div class="form-group">
                    <label>Report Date</label>
                     <p class="form-control">{{ $date }}</p>
                    
                </div>

                <label>Lastest Test</label>
                @foreach ($tests as $test)
                 <div class="table-responsive table-bordered" style="margin-bottom: 20px;">
                    <table class="table"  >
                        <tr>
                            <td class="active">
                                Test Analisys:
                            </td>
                            <td >
                                {{ $test->name }}
                            </td>
                            <td class="active">
                                Date:
                            </td>
                            <td >
                                {{ $test->create_date }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="active">
                                Results
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" >
                                {{ $test->result }}
                            </td>
                        </tr>    
                    </table >
                </div>
                @endforeach
        </div>
    </div>

</div>