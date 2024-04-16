<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{url('SCDesign/css/w3.css')}}">
<!------ Include the above in your HEAD tag ---------->
<style>
.card-counter {
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
}

.card-counter:hover {
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
}

.card-counter.primary {
    background-color: #007bff;
    color: #FFF;
    cursor: pointer;
}

.card-counter.primary:hover {
    display: block;
    background-color: #005596;
}

.card-counter.danger {
    background-color: #ef5350;
    color: #FFF;
    cursor: pointer;
}

.card-counter.danger:hover {
    display: block;
    background-color: #9c0000;
}

.card-counter.success {
    background-color: #66bb6a;
    color: #FFF;
    cursor: pointer;
}

.card-counter.success:hover {
    display: block;
    background-color: #067306;
}

.card-counter.info {
    background-color: #26c6da;
    color: #FFF;
    cursor: pointer;
}

.card-counter.info:hover {
    display: block;
    background-color: #345470;
}

.card-counter.warning {
    background-color: #bbbf56;
    color: #FFF;
    cursor: pointer;
}

.card-counter.warning:hover {
    display: block;
    background-color: #a0a603;
}

.card-counter.warning2 {
    background-color: #991271;
    color: #FFF;
    cursor: pointer;
}

.card-counter.warning2:hover {
    display: block;
    background-color: #5e0142;
}

.card-counter i {
    font-size: 5em;
    opacity: 0.2;
}

.card-counter .count-numbers {
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
}

.card-counter .count-name {
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 20px;
}

.center-screen {
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 100vh;
    padding-left: 35px;
}
</style>

<body>

    <div class="w3-sidebar w3-bar-block w3-black w3-xxsmall" style="width:35px;">

        <a class="w3-bar-item w3-button"><i class="fa fa-user-circle" title="{{ Auth::user()->username }}"></i></a>
        <a href="#" class="w3-bar-item w3-button" onclick='window.open("/change-password", "_blank")'><i class="fa fa-lock"
           title="Reset Password"></i></a>
           
        <a href="{{ url('/logout') }}" class="w3-bar-item w3-button" style="position: absolute;bottom: 0;"><i
                class="fa fa-sign-out" title="Sign-Out"></i></a>

    </div>
    <i class="fa fa-user" aria-hidden="true" style="padding-left: 50px;">Admin : {{ auth()->user()->username }}</i>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="{{url('SCDesign/css/style.css')}}">

    <div class="center-screen">
    <!--
        <div class="row">
            <div class="col-md-4">
                <div class="card-counter primary" onclick='window.open("/SalesCenter", "_blank")'>
                    <i class="fa fa-phone-square"></i>
                    <span class="count-name">Sales Center System</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter warning2" onclick='window.open("/Cashier/RiderDispatch", "_blank")'>
                    <i class="fa fa-motorcycle"></i>
                    <span class="count-name">Dispatch System</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter success" onclick='window.open("/Discount/discount", "_blank")'>
                    <i class="fa fa-percent"></i>
                    <span class="count-name">Discount Module System</span>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="card-counter warning" onclick='window.open("/Steward_Billing", "_blank")'>
                    <i class="fa fa-users"></i>
                    <span class="count-name">Steward System</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-counter info" onclick='window.open("/Cashier/Cashiering", "_blank")'>
                    <i class="fa fa-money"></i>
                    <span class="count-name">Cashier System</span>
                </div>
            </div>
        </div>

    -->

    @if( (auth()->user()->admin =='0') && (auth()->user()->username !='Kasun') )
        <div class="row">
            <div class="col-md-6">
                <div class="card-counter danger" onclick='window.open("/UserDetails", "_blank")'>
                    <i class="fa fa-users"></i>
                    <span class="count-name">User Update</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-counter info" onclick='window.open("/MenuDetails", "_blank")'>
                    <i class="fa fa-cutlery"></i>
                    <span class="count-name">Menu Update</span>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
                <div class="card-counter info" onclick='window.open("/PriceUpdate", "_blank")'>
                    <i class="fa fa-cutlery"></i>
                    <span class="count-name">Price Update</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter primary" onclick='window.open("/MasterFiles/PaymentLink", "_blank")'>
                    <i class="fa fa-home"></i>
                    <span class="count-name">Payment Link Activation</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter warning" onclick='window.open("/Discount/discount", "_blank")'>
                    <i class="fa fa-percent"></i>
                    <span class="count-name">Discount Module</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-counter success" onclick='window.open("/MasterFiles/Organization", "_blank")'>
                    <i class="fa fa-building"></i>
                    <span class="count-name">Company Creation</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter primary" onclick='window.open("/MasterFiles/Outlet", "_blank")'>
                    <i class="fa fa-home"></i>
                    <span class="count-name">Outlet Creation</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter warning" onclick='window.open("/MasterFiles/Charges", "_blank")'>
                    <i class="fa fa-money"></i>
                    <span class="count-name">Charges Creation</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-counter primary" onclick='window.open("/MasterFiles/PaymentType", "_blank")'>
                    <i class="fa fa-credit-card"></i>
                    <span class="count-name">Payment Types Creation</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter warning" onclick='window.open("/MasterFiles/RoomTable", "_blank")'>
                    <i class="fa fa-joomla"></i>
                    <span class="count-name">Room/Table Creation</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-counter success" onclick='window.open("/MasterFiles/TAX", "_blank")'>
                    <i class="fa fa-money"></i>
                    <span class="count-name">Tax Creation</span>
                </div>
            </div>
        </div>
<!--
        <div class="row">

            <div class="col-md-12">
                <div class="card-counter danger" onclick='window.open("", "_blank")'>
                    <i class="fa fa-cogs"></i>
                    <span class="count-name">Admin Panel</span>
                </div>
            </div>
        </div>
-->

        @elseif( (auth()->user()->admin =='0') && (auth()->user()->username =='Kasun') )
        <div class="row">
            <div class="col-md-12">
                <div class="card-counter info" onclick='window.open("/MenuDetails", "_blank")'>
                    <i class="fa fa-money"></i>
                    <span class="count-name">Menu Update</span>
                </div>
            </div>
        </div>
        @endif

    </div>
</body>