<?php
use Carbon\Carbon;

$currentTime = Carbon::now()->subHours(5)->format('Y-m-d');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Bootstrap css -->

    <link rel="stylesheet" href="{{url('SCDesign/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('SCDesign/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('SCDesign/css/w3.css')}}">
    <style>

    </style>
    <script>
    </script>
</head>

<body oncontextmenu="return false;">
<div class="w3-sidebar w3-bar-block w3-black w3-xxsmall" style="width:35px;">
   
   <a href="{{ url('/logout') }}" class="w3-bar-item w3-button" style="position: absolute;bottom: 0;"><i class="fa fa-sign-out"
           title="Sign-Out"></i></a>

</div>
    <div class="wrapper">
        <form method="post" action="/Cashier/getDetailsOfBills">
            @csrf
            <div class="container-fluid">
            <div class="row">
                    <div class="col-md-7">
                        <p></p>
                            <button type="button" style="width:70%;" onClick="window.location.reload();" class="pageRefreshButton btn-outline-success" name="pageRefreshButton" id="pageRefreshButton"> Page Refresh </button>
                        <p></p>
                    </div>
                           
                    <div class="col-md-3">
                        <p></p>
                            {{ $UserName }} | {{ $UserRole }}
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Meditation</legend>
                                <div class="x" style="overflow-y:auto; width: 100%;border:1px solid gray ;">
                                    <table id="firstTable">
                                       <thead>
                                            <tr>
                                                <th style="width: 5%;">ID</th>
                                                <th style="width: 35%;">Name</th>
                                                <th style="width: 35%;">Description</th>
                                                <th style="width: 10%;">Qty</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody id="billGetByAutoRefresh">
                                            @foreach($closedTableBills2 as $closedTBs2)
                                            <tr>
                                                <td style="font-size:20px;"><b> {{ $closedTBs2->ID }} </b></td>
                                                <td style="text-align:center;"> {{ $closedTBs2->Name }} </td>
                                                <td> {{ $closedTBs2->Description }} </td>
                                                <td> {{ $closedTBs2->Quantity }} </td>
												@if($UserRole != 'CSH')
													<td><button style="font-size: 10px; width:60px;text-align:center;padding:4px;" type="button" id="{{ $closedTBs2->ID }}" name="btnSms" class="btnSms btn btn-primary btn-xs">Delete</button></td>
												@endif
                                                <td><button style="font-size: 10px; width:40px;text-align:center;padding:4px;" type="button" id="{{ $closedTBs2->ID }}" name="btnPrint" class="btnPrint btn btn-primary btn-xs">Update</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </fieldset>
                    </div>

                    </div>
					
					<div class="row">
                    <div class="col-md-10">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Customer</legend>
                                <div class="x" style="overflow-y:auto; width: 100%;border:1px solid gray ;">
                                    <table id="firstTable">
                                       <thead>
                                            <tr>
                                                <th style="width: 5%;">ID</th>
                                                <th style="width: 25%;">Name</th>
                                                <th style="width: 10%;">Contact</th>
                                                <th style="width: 50%;">Address</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody id="billGetByAutoRefresh">
                                            @foreach($closedTableBills as $closedTBs)
                                            <tr>
                                                <td style="font-size:20px;"><a href="#" class="closeTableBill"><b> {{ $closedTBs->ID }} </b></td>
                                                <td style="text-align:center;"> {{ $closedTBs->Name }} </td>
                                                <td> {{ $closedTBs->Contact }} </td>
                                                <td> {{ $closedTBs->Address }} </td>
												@if($UserRole != 'CSH')
													<td><button style="font-size: 10px; width:60px;text-align:center;padding:4px;" type="button" id="{{ $closedTBs->OrderNo }}" name="btnSms2" class="btnSms btn btn-primary btn-xs">Delete</button></td>
												@endif
                                                <td><button style="font-size: 10px; width:40px;text-align:center;padding:4px;" type="button" id="{{ $closedTBs->OrderNo }}" name="btnPrint2" class="btnPrint btn btn-primary btn-xs">Update</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </fieldset>
                    </div>
            
				@if($UserRole == 'OWN')
                <!-- Third Section -->
                <div class="col-md-2" style="background-color:#EAE9E8;">
                    <div class="column">
                        <fieldset class="scheduler-border" style="background-color:#B7B8B7;">
                            <legend class="scheduler-border">Other System Main Menu</legend>

                            <fieldset class="scheduler-border">
                                <div class="display: flex;">
                                    <div class="input-group-prepend" style="padding-top: 10px;">
                                        <div class="form-group input-group">
                                            <span class="border-lable-flt">
                                                <div class="form-group input-group">
                                                    <a href="/Cashier/CashFloat" target="_blank"><button type="button" id="btnRider" class="btn btn-primary btn-xs">Customer Create &nbsp;&nbsp;&nbsp;</button></a>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="scheduler-border">
                                <div class="display: flex;">
                                    <div class="input-group-prepend" style="padding-top: 10px;">
                                        <div class="form-group input-group">
                                            <span class="border-lable-flt">
                                                <div class="form-group input-group">
                                                    <a href="/Cashier/Skimming" target="_blank"><button type="button" id="btnSkimming" class="btn btn-warning btn-xs">Medication Create &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                        </fieldset>
                    </div>
                </div>
				
				@endif
            

                </div>
            </div>
        </div>
        </div>

        </form>

      
    </div>


    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="/js/shortcut.js"> </script> -->
    <!-- Library for shortcut key  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap.min.js"></script>

    <!-- This is for First Stage Print Out -->
    <script>
        $(document).on('click','.btnPrint', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            if(confirm('Are you sure you want to Update this Medication? '+id)){
                $.ajax({
                    url:"{{ route('cashierModuleController.firstStagePrintOut') }}",
                    method:'POST',
                    data:{id:id, _token:_token},
                    success:function(data){
                        location.reload();
                    }
                })
            }else{
                return false;
            }
        });
    </script>
	
	<!-- This is for First Stage Print Out -->
    <script>
        $(document).on('click','.btnPrint2', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            if(confirm('Are you sure you want to Update this Customer? '+id)){
                $.ajax({
                    url:"{{ route('cashierModuleController.firstStagePrintOutTwo') }}",
                    method:'POST',
                    data:{id:id, _token:_token},
                    success:function(data){
                        location.reload();
                    }
                })
            }else{
                return false;
            }
        });
    </script>


     <!-- Send SMS To the cx as bill in the first stage -->
     <script>
        $(document).on('click','.btnSms', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            if(confirm('Are you sure you want to reomve this Medication '+id)){
                $.ajax({
                    url:"{{ route('cashierModuleController.sendSmsBillInFirstStage') }}", 
                    method:'POST',
                    data:{id:id, _token:_token},
                    success:function(data){
                        location.reload();
                    }
                })
            }else{
                return false;
            }
        });
    </script>
	
	<!-- Send SMS To the cx as bill in the first stage -->
     <script>
        $(document).on('click','.btnSms2', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            if(confirm('Are you sure you want to reomve this Customer '+id)){
                $.ajax({
                    url:"{{ route('cashierModuleController.sendSmsBillInFirstStageTwo') }}", 
                    method:'POST',
                    data:{id:id, _token:_token},
                    success:function(data){
                        location.reload();
                    }
                })
            }else{
                return false;
            }
        });
    </script>

</body>

</html>
