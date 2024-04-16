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

    <style>

    </style>
    <script>
    </script>
</head>

<body oncontextmenu="return false;">
    <div class="wrapper">
        <form method="post" action="/Cashier/cashFloatDataStore">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5"><p></p>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Customer Insert</legend>
                            <div class="x" style="overflow-y:auto; width: 100%;border:1px solid gray ;">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width:15%">Customer Name</th>
                                            <th style="width:60%">Customet Contact</th>
                                            <th style="width:25%">Customer Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="cusName" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm" /> </td>
                                            <td> <input type="text" name="cusContact" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm" /></td>
                                            <td><input type="text" name="cusAddress" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p></p>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9">
                                    
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" id="btnSettleBill" class="btn btn-warning btn-xm">Save</button>
                                </div>
                            </div>
                        </div>

                    </fieldset><p></p>
                </div>

                <div class="col-md-7"><p></p>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Customer Data</legend>
                            <div class="x" style="overflow-y:auto; width: 100%;border:1px solid gray ;">
                                <table id="skimmingDataTable">
                                    <thead>
                                        <tr>
                                            <th style="width:11%">Cus ID</th>
                                            <th style="width:25%">Cus Name</th>
                                            <th style="width:15%">Cus Contact</th>
                                            <th style="width:25%">Cus Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getCashAmountinCF as $gCAiCF)
                                        <tr>
                                            <td> {{ $gCAiCF->ID }} </td>
                                            <td> {{ $gCAiCF->Name }} </td>
                                            <td> {{ $gCAiCF->Contact }} </td>
                                            <td> {{ $gCAiCF->Address }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </fieldset><p></p>
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

    

</body>

</html>