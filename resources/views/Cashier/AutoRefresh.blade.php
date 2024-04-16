<form method="post" action="/Cashier/getDetailsOfBills">
    @foreach($closedTableBillsAutoRefresh as $closedTBsAuto)
        <tr>
            <td style="font-size:20px;"><a href="#" class="closeTableBill" id="{{ $closedTBsAuto->OrderNo }}"><b> {{ $closedTBsAuto->OrderNo }} </b></a></td>
            <td style="text-align:center;"> {{ $closedTBsAuto->TableNo }} </td>
            <td> {{ $closedTBsAuto->Steward }} </td>
            <td> {{ number_format($closedTBsAuto->Subtotal,2) }} </td>
            <td><button style="font-size: 10px; width:60px;text-align:center;padding:4px;" type="button" id="btnprint" class="btn btn-primary btn-xs">Bill SMS</button></td>
            <td><button style="font-size: 10px; width:40px;text-align:center;padding:4px;" type="button" id="btnemail" class="btn btn-primary btn-xs" disabled>Print</button></td>
            <td>
                <select class="billReverseReasion custom-select" name="billReverseReasion" id="billReverseReasion" style="width:100%">
                    <option value="0"> Select </option>
                    <option value="1"> Add Extra Item/s </option>
                    <option value="2"> Staff Error </option>
                </select>
            </td>
            <td><button style="font-size: 10px; width:50px;text-align:center;padding:4px;" type="button" id="{{ $closedTBsAuto->OrderNo }}" class="btnOrderReseve btn btn-danger btn-xs">Reverse</button></td>
        </tr>
    @endforeach
</form>