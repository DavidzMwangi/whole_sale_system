@extends('layouts.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{asset('template/css/pages/tables.css')}}" rel="stylesheet" type="text/css">
    {{--modal--}}
    <link href="{{asset('template/vendors/modal/css/component.css')}}" rel="stylesheet" />

@endsection

@section('content')

    <section class="content">

        <!-- row-->
        <!-- row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-warning filterable">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                            <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Scroller
                        </h3>
                    </div>
                    <div class="panel-body">

                        <h2>Purchases</h2>
                        <table class="table table-striped table-hover" id="sample_5">
                            <thead>
                            <tr>
                                <th>Purchase Code</th>
                                <th>Product Name</th>
                                <th class="hidden-xs">Buyer Name</th>
                                <th class="hidden-xs">Purchased Product Amount</th>
                                <th class="hidden-xs">Discount</th>
                                <th class="hidden-xs">Single Product Price</th>
                                <th class="hidden-xs">Total Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchases as $purchase)
                            <tr>

                                <td>{{$purchase->purchase_code}}</td>
                                <td>{{$purchase->supply->product_name}}</td>
                                <td>{{$purchase->buyer->buyer_name}}</td>
                                <td>{{$purchase->purchased_amount}}</td>
                                <td>{{$purchase->discount_amount}}</td>
                                <td>{{$purchase->single_product_selling_price}}</td>
                                <td>{{$purchase->purchase_total_cost}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <hr>
                        <br>
                        <form method="post" action="{{url('save_new_payment')}}">

                            {{csrf_field()}}
                            @if(count($errors->all())>0)
                                <div class="col-md-12 alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                </div>
                                @endif

                        <div class="form-group col-md-6">
                            <label for="purchase_code">Purchase Code</label>
                          <input type="text" id="purchase_code" class="form-control" name="purchase_code" value="{{$purchases->first()->purchase_code}}" readonly>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="total_full_cost">Total Purchases Cost</label>
                            <input type="text" class="form-control" id="total_full_cost" name="total_full_cost" value="{{$full_cost}}" readonly>

                        </div>


                        <div class="form-group col-md-6">
                            <label for="payment_type">Payment Type</label>
                            <select id="payment_type" name="payment_type" class="form-control">
                                <option value="cash">Cash</option>
                                <option value="mpesa">Mpesa</option>
                                <option value="visa">Visa</option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="amount_paid">Amount Paid</label>
                            <input type="text" class="form-control" id="amount_paid" name="amount_paid" required>

                        </div>
                        <div class="form-group col-md-6">
                            <Label for="remaining_balance">Remaining Balance to Pay</Label>
                            <input type="text" class="form-control" id="remaining_balance" value="{{$full_cost}}" readonly>
                        </div>
                            <div class="form-group col-md-6">

                                <button type="submit" class="btn btn-primary" id="savePaymentButton">Save The Payment</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Third Basic Table Ends Here-->
        <!--delete modal starts here-->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">
                            Delete this entry
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <span class="glyphicon glyphicon-warning-sign"></span>
                            Are you sure you want to delete this Record?
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning">
                            <span class="glyphicon glyphicon-ok-sign"></span>
                            Yes
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>
                            No
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal ends here -->
    </section>


    <!--section ends-->




@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#sample_5').DataTable( {
                "scrollY":        "200px",
                "scrollX":          true,
                "scrollCollapse": true,
                "paging":         false
            } );
        } );

       var total_purchase_cot= $('#total_full_cost').val();

        $('#amount_paid').on( 'keyup', function () {
            var inputtedAmount=this.value;

            $('#remaining_balance').val(total_purchase_cot-inputtedAmount);
            $('#savePaymentButton').prop('disabled', true);

            if ($('#remaining_balance').val()<=0){
                $('#savePaymentButton').prop('disabled',false);
            }

        } );

     </script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables/dataTables.bootstrap.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('template/js/pages/table-advanced.js')}}"></script>--}}

    {{--modal--}}
    <script src="{{asset('template/vendors/modal/js/classie.js')}}"></script>
    <script src="{{asset('template/vendors/modal/js/modalEffects.js')}}"></script>
@endsection