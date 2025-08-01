@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{ trans('lang.order_plural') }}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ trans('lang.dashboard') }}</a></li>
                <li class="breadcrumb-item">{{ trans('lang.order_edit') }}</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-body pb-5 p-0">
            <div class="text-right print-btn pb-3">
                <a href="{{ route('vendors.orderprint', $id) }}">
                    <button type="button" class="fa fa-print"></button>
                </a>
            </div>
            <div class="order_detail" id="order_detail">
                <div class="order_detail-top">
                    <div class="row">
                        <div class="order_edit-genrl col-lg-7 col-md-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h3>{{ trans('lang.general_details') }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="order_detail-top-box">
                                        <div class="form-group row widt-100 gendetail-col">
                                            <label class="col-12 control-label"><strong>{{ trans('lang.date_created') }}
                                                    : </strong><span id="createdAt"></span></label>
                                        </div>
                                        <div class="form-group row widt-100 gendetail-col payment_method">
                                            <label class="col-12 control-label"><strong>{{ trans('lang.payment_methods') }}
                                                    : </strong><span id="payment_method"></span></label>
                                        </div>
                                        <div class="form-group row widt-100 gendetail-col">
                                            <label class="col-12 control-label"><strong>{{ trans('lang.order_type') }}
                                                    :</strong>
                                                <span id="order_type"></span></label>
                                        </div>
                                        <div class="form-group row widt-100 gendetail-col schedule_date">
                                        </div>
                                        <div class="form-group row widt-100 gendetail-col prepare_time">
                                        </div>
                                        <div class="form-group row width-100 ">
                                            <label class="col-3 control-label">{{ trans('lang.status') }}:</label>
                                            <div class="col-7">
                                                <select id="order_status" class="form-control">
                                                    <option value="Order Placed" id="order_placed">
                                                        {{ trans('lang.order_placed') }}
                                                    </option>
                                                    <option value="Order Accepted" id="order_accepted">
                                                        {{ trans('lang.order_accepted') }}
                                                    </option>
                                                    <option value="Order Rejected" id="order_rejected">
                                                        {{ trans('lang.order_rejected') }}
                                                    </option>
                                                    <option value="Driver Pending" id="driver_pending">
                                                        {{ trans('lang.driver_pending') }}
                                                    </option>
                                                    <option value="Driver Rejected" id="driver_rejected">
                                                        {{ trans('lang.driver_rejected') }}
                                                    </option>
                                                    <option value="Order Shipped" id="order_shipped">
                                                        {{ trans('lang.order_shipped') }}
                                                    </option>
                                                    <option value="In Transit" id="in_transit">
                                                        {{ trans('lang.in_transit') }}
                                                    </option>
                                                    <option value="Order Completed" id="order_completed">
                                                        {{ trans('lang.order_completed') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row width-100">
                                            <label class="col-3 control-label"></label>
                                            <div class="col-7 text-right">
                                                <button type="button" class="btn btn-primary save_order_btn"><i
                                                        class="fa fa-save"></i> {{ trans('lang.update') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-items-list mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <table cellpadding="0" cellspacing="0"
                                            class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('lang.item') }}</th>
                                                    <th>{{ trans('lang.price') }}</th>
                                                    <th>{{ trans('lang.qty') }}</th>
                                                    <th>{{ trans('lang.extra') }}</th>
                                                    <th>{{ trans('lang.total') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="order_products">
                                            </tbody>
                                        </table>
                                        <div class="order-data-row order-totals-items">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive bk-summary-table">
                                                        <table class="order-totals">
                                                            <tbody id="order_products_total">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order_addre-edit col-lg-5 col-md-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h3>{{ trans('lang.billing_details') }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="address order_detail-top-box">
                                        <p>
                                            <strong>{{ trans('lang.name') }}: </strong><span id="billing_name"></span>
                                        </p>
                                        <p>
                                            <strong>{{ trans('lang.address') }}: </strong><br>
                                            <span id="billing_name"></span>
                                            <span id="billing_line1"></span><br>
                                            <span id="billing_line2"></span><br>
                                            <span id="billing_country"></span>
                                        </p>
                                        <p><strong>{{ trans('lang.email_address') }}:</strong>
                                            <span id="billing_email"></span>
                                        </p>
                                        <p><strong>{{ trans('lang.phone') }}:</strong>
                                            <span id="billing_phone"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_addre-edit driver_details_hide">
                                <div class="card mt-4">
                                    <div class="card-header bg-white">
                                        <h3>{{ trans('lang.driver_detail') }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="address order_detail-top-box">
                                            <p>
                                                <strong>{{ trans('lang.name') }}: </strong><span
                                                    id="driver_firstName"></span> <span id="driver_lastName"></span><br>
                                            </p>
                                            <p><strong>{{ trans('lang.email_address') }}:</strong>
                                                <span id="driver_email"></span>
                                            </p>
                                            <p><strong>{{ trans('lang.phone') }}:</strong>
                                                <span id="driver_phone"></span>
                                            </p>
                                            <p><strong>{{ trans('lang.car_name') }}:</strong>
                                                <span id="driver_carName"></span>
                                            </p>
                                            <p><strong>{{ trans('lang.car_number') }}:</strong>
                                                <span id="driver_carNumber"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resturant-detail mt-4">
                                <div class="card">
                                    <div class="card-header bg-white box-header">
                                        <h4 class="card-header-title">{{ trans('lang.restaurant') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="#" class="row redirecttopage align-items-center" id="resturant-view">
                                            <div class="col-md-3">
                                                <img src="" class="resturant-img rounded-circle" alt="vendor"
                                                    width="70px" height="70px">
                                            </div>
                                            <div class="col-md-9">
                                                <h4 class="vendor-title"></h4>
                                            </div>
                                        </a>
                                        <h5 class="contact-info">{{ trans('lang.contact_info') }}:</h5>
                                        <p><strong>{{ trans('lang.phone') }}:</strong>
                                            <span id="vendor_phone"></span>
                                        </p>
                                        <p><strong>{{ trans('lang.address') }}:</strong>
                                            <span id="vendor_address"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_detail-review mt-4">
                                <div class="rental-review">
                                    <div class="card">
                                        <div class="card-header bg-white box-header">
                                            <h3>{{ trans('lang.customer_reviews') }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="review-inner">
                                                <div id="customers_rating_and_review">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-12 text-center btm-btn">
                <button type="button" class="btn btn-primary save_order_btn"><i class="fa fa-save"></i>
                    {{ trans('lang.save') }}</button>
                <a href="{!! route('orders') !!}" class="btn btn-default"><i
                        class="fa fa-undo"></i>{{ trans('lang.cancel') }}
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="addPreparationTimeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered location_modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title locationModalTitle">{{ trans('lang.add_preparation_time') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="">
                    <div class="form-row">
                        <div class="form-group row">
                            <div class="form-group row width-100">
                                <label class="col-12 control-label">{{ trans('lang.time') }}</label>
                                <div class="col-12">
                                    <input type="text" name="prepare_time" class="form-control time-picker"
                                        id="prepare_time">
                                    <div id="add_prepare_time_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add-prepare-time-btn">{{ trans('submit') }}</a>
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">{{ trans('close') }}</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>
<script>
    var id_rendom="<?php echo uniqid(); ?>";
    var adminCommission=0;
    var id="<?php echo $id; ?>";
    var fcmToken='';
    var fcmTokenVendor='';
    var old_order_status='';
    var payment_shared=false;
    var vendorname='';
    var customername='';
    var vendorId='';
    var driverId='';
    var deliveryChargeVal=0;
    var deliveryCharge=0;
    var tip_amount_val=0;
    var tip_amount=0;
    var total_price_val=0;
    var adminCommission_val=0;
    var database=firebase.firestore();
    var ref=database.collection('restaurant_orders').where("id","==",id);
    var append_procucts_list='';
    var append_procucts_total='';
    var total_price=0;
    var currentCurrency='';
    var currencyAtRight=false;
    var refCurrency=database.collection('currencies').where('isActive','==',true);
    var isApplyCommission=false;
    var orderPreviousStatus='';
    var orderPaymentMethod='';
    var orderCustomerId='';
    var orderPaytableAmount=0;
    var orderTakeAwayOption=false;
    var manfcmTokenVendor='';
    var reviewAttributes={};
    var page_size=5;
    var manname='';
    var decimal_degits=0;
    var vendorAuthor='';
    var orderAcceptedSubject='';
    var orderAcceptedMsg='';
    var orderRejectedSubject='';
    var orderRejectedMsg='';
    var driverAcceptedMsg='';
    var dineInAcceptedSubject='';
    var dineInAcceptedMsg='';
    var dineInRejectedSubject='';
    var dineInRejectedMsg='';
    var takeAwayOrderSubject='';
    var takeAwayOrderMsg='';
    var orderCompletedSubject='';
    var orderCompletedMsg='';
    var basePrice=0;
    var total_tax_amount=0;
    var subscriptionTotalOrders=-1;
    var subscriptionModel=false;

    database.collection('settings').doc("restaurant").get().then(async function(snapshots) {
        var subscriptionSetting=snapshots.data();
        if(subscriptionSetting.subscription_model==true) {
            subscriptionModel=true;
        }
    });
    database.collection('dynamic_notification').get().then(async function(snapshot) {
        if(snapshot.docs.length>0) {
            snapshot.docs.map(async (listval) => {
                val=listval.data();
                if(val.type=="restaurant_rejected") {
                    orderRejectedSubject=val.subject;
                    orderRejectedMsg=val.message;
                } else if(val.type=="driver_completed") {
                    orderCompletedSubject=val.subject;
                    orderCompletedMsg=val.message;
                } else if(val.type=="restaurant_accepted") {
                    orderAcceptedSubject=val.subject;
                    orderAcceptedMsg=val.message;
                } else if(val.type=="takeaway_completed") {
                    takeAwayOrderSubject=val.subject;
                    takeAwayOrderMsg=val.message;
                }
            });
        }
    });
    refCurrency.get().then(async function(snapshots) {
        var currencyData=snapshots.docs[0].data();
        currentCurrency=currencyData.symbol;
        currencyAtRight=currencyData.symbolAtRight;
        if(currencyData.decimal_degits) {
            decimal_degits=currencyData.decimal_degits;
        }
    });
    var geoFirestore=new GeoFirestore(database);
    var place_image='';
    var ref_place=database.collection('settings').doc("placeHolderImage");
    ref_place.get().then(async function(snapshots) {
        var placeHolderImage=snapshots.data();
        place_image=placeHolderImage.image;
    });

    $(document).ready(function() {
        $('.time-picker').timepicker({
            timeFormat: "HH:mm",
            showMeridian: false,
            format24: true
        });
        $('.time-picker').timepicker().on('changeTime.timepicker',function(e) {
            var hours=e.time.hours,
                min=e.time.minutes;
            if(hours<10) {
                $(e.currentTarget).val('0'+hours+':'+min);
            }
        });
        var alovelaceDocumentRef=database.collection('restaurant_orders').doc();
        if(alovelaceDocumentRef.id) {
            id_rendom=alovelaceDocumentRef.id;
        }
        $(document.body).on('click','.redirecttopage',function() {
            var url=$(this).attr('data-url');
            window.location.href=url;
        });
        jQuery("#data-table_processing").show();
        ref.get().then(async function(snapshots) {
            var order=snapshots.docs[0].data();
            getUserReview(order);
            append_procucts_list=document.getElementById('order_products');
            append_procucts_list.innerHTML='';
            append_procucts_total=document.getElementById('order_products_total');
            append_procucts_total.innerHTML='';
            if(order.address.name) {
                $("#billing_name").text(order.address.name);
            } else {
                $("#billing_name").text(order.author.firstName+' '+order.author.lastName);
            }
            $("#trackng_number").text(id);
            var billingAddressstring='';
            if(order.address.hasOwnProperty('address')) {
                $("#billing_line1").text(order.address.address);
            }
            if(order.address.hasOwnProperty('locality')) {
                billingAddressstring=billingAddressstring+order.address.locality;
            }
            if(order.address.hasOwnProperty('landmark')) {
                billingAddressstring=billingAddressstring+" "+order.address.landmark;
            }
            $("#billing_line2").text(billingAddressstring);
            if(order.author.hasOwnProperty('phoneNumber')) {
                $("#billing_phone").text(order.author.phoneNumber);
            }
            if(order.address.hasOwnProperty('country')) {
                $("#billing_country").text(order.address.country);
            }
            if(order.author.hasOwnProperty('email')) {
                $("#billing_email").html('<a href="mailto:'+order.author.email+'">'+order
                    .author.email+'</a>');
            }
            if(order.createdAt) {
                var date1=order.createdAt.toDate().toDateString();
                var date=new Date(date1);
                var dd=String(date.getDate()).padStart(2,'0');
                var mm=String(date.getMonth()+1).padStart(2,'0'); //January is 0!
                var yyyy=date.getFullYear();
                var createdAt_val=yyyy+'-'+mm+'-'+dd;
                var time=order.createdAt.toDate().toLocaleTimeString('en-US');
                $('#createdAt').text(createdAt_val+' '+time);
            }
            var payment_method='';
            if(order.payment_method) {
                if(order.payment_method=="stripe") {
                    image='{{ asset('images/stripe.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="cod") {
                    image='{{ asset('images/cashondelivery.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="razorpay") {
                    image='{{ asset('images/razorpay.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="paypal") {
                    image='{{ asset('images/paypal.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="payfast") {
                    image='{{ asset('images/payfast.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '" width="30%" height="30%">';
                } else if(order.payment_method=="paystack") {
                    image='{{ asset('images/paystack.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="flutterwave") {
                    image='{{ asset('images/flutterwave.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="mercado pago") {
                    image='{{ asset('images/marcadopago.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="wallet") {
                    image='{{ asset('images/foodie_wallet.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%" >';
                } else if(order.payment_method=="paytm") {
                    image='{{ asset('images/paytm.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="cancelled order payment") {
                    image='{{ asset('images/cancel_order.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="refund amount") {
                    image='{{ asset('images/refund_amount.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else if(order.payment_method=="referral amount") {
                    image='{{ asset('images/reffral_amount.png') }}';
                    payment_method='<img alt="image" src="'+image+
                        '"  width="30%" height="30%">';
                } else {
                    payment_method=order.payment_method;
                }
            }
            $('#payment_method').html(payment_method);
            if(order.hasOwnProperty('takeAway')&&order.takeAway) {
                $('#driver_pending').hide();
                $('#driver_rejected').hide();
                $('#order_shipped').hide();
                $('#in_transit').hide();
                $('#order_placed').hide();
                $('#order_completed').show();
                $('#order_type').text('{{ trans('lang.order_takeaway') }}');
                $('.payment_method').show();
                orderTakeAwayOption=true;
            } else {
                $('#order_type').text('{{ trans('lang.order_delivery') }}');
                $('#driver_pending').hide();
                $('#driver_rejected').hide();
                $('#order_shipped').hide();
                $('#order_placed').hide();
                $('#in_transit').hide();
                $('.payment_method').show();
                $('#order_completed').hide();
            }
            if((order.driver!=''&&order.driver!=undefined)&&order.takeAway==false) {
                $('#driver_carName').text(order.driver.carName);
                $('#driver_carNumber').text(order.driver.carNumber);
                $('#driver_email').html('<a href="mailto:'+order.driver.email+'">'+order
                    .driver.email+'</a>');
                $('#driver_firstName').text(order.driver.firstName);
                $('#driver_lastName').text(order.driver.lastName);
                $('#driver_phone').text(order.driver.phoneNumber);
            } else {
                $('.order_edit-genrl').removeClass('col-md-7').addClass('col-md-7');
                $('.order_addre-edit').removeClass('col-md-5').addClass('col-md-5');
                $('.driver_details_hide').empty();
            }
            if(order.driverID!=''&&order.driverID!=undefined) {
                driverId=order.driverID;
            }
            if(order.vendor&&order.vendor.author!=''&&order.vendor.author!=undefined) {
                vendorAuthor=order.vendor.author;
            }
            var scheduleTime='';
            if(order.hasOwnProperty('scheduleTime')&&order.scheduleTime!=null&&order
                .scheduleTime!='') {
                scheduleTime=order.scheduleTime;
                var scheduleDate=scheduleTime.toDate().toDateString();
                var time=order.scheduleTime.toDate().toLocaleTimeString('en-US');
                var scheduleDate=new Date(scheduleDate);
                var dd=String(scheduleDate.getDate()).padStart(2,'0');
                var mm=String(scheduleDate.getMonth()+1).padStart(2,'0'); //January is 0!
                var yyyy=scheduleDate.getFullYear();
                var scheduleDate=yyyy+'-'+mm+'-'+dd;
                var scheduleDateTime=scheduleDate+' '+time;
                $('.schedule_date').append(
                    '<label class="col-12 control-label"><strong>{{ trans('lang.schedule_date_time') }}:</strong><span id=""> '+
                    scheduleDateTime+'</span></label>')
            }
            if(order.hasOwnProperty('estimatedTimeToPrepare')&&order.estimatedTimeToPrepare!=
                null) {
                prepareTime=order.estimatedTimeToPrepare;
                var [h,m]=prepareTime.split(":");
                var hour=h;
                if(h.charAt(0)=="0") {
                    hour=h.charAt(1);
                }
                time=(h=="00")? m+" minutes":hour+" hours "+m+" minutes";
                $('.prepare_time').append(
                    '<label class="col-12 control-label "><strong>{{ trans('lang.prepare_time') }}:</strong><span id=""> '+
                    time+'</span></label>')
            }
            fcmToken=order.author.fcmToken;
            vendorname=order.vendor.title;
            fcmTokenVendor=order.vendor.fcmToken;
            customername=order.author.firstName;
            vendorId=order.vendor.id;
            old_order_status=order.status;
            if(order.payment_shared!=undefined) {
                payment_shared=order.payment_shared;
            }
            var productsListHTML=buildHTMLProductsList(order.products);
            var productstotalHTML=buildHTMLProductstotal(order);
            if(productsListHTML!='') {
                append_procucts_list.innerHTML=productsListHTML;
            }
            if(productstotalHTML!='') {
                append_procucts_total.innerHTML=productstotalHTML;
            }
            orderPreviousStatus=order.status;
            if(order.hasOwnProperty('payment_method')) {
                orderPaymentMethod=order.payment_method;
            }
            $("#order_status option[value='"+order.status+"']").attr("selected","selected");
            if(order.status=="Order Rejected"||order.status=="Driver Rejected") {
                $("#order_status").prop("disabled",true);
            }
            var price=0;
            if(order.authorID) {
                orderCustomerId=order.authorID;
            }
            if(order.vendorID) {
                var vendor=database.collection('vendors').where("id","==",order.vendorID);
                vendor.get().then(async function(snapshotsnew) {
                    var vendordata=snapshotsnew.docs[0].data();
                    if(subscriptionModel) {
                        if(vendordata.hasOwnProperty('subscriptionTotalOrders')&&vendordata.subscriptionTotalOrders!=null&&vendordata.subscriptionTotalOrders!='') {
                            subscriptionTotalOrders=vendordata.subscriptionTotalOrders;
                        }
                    }
                    if(vendordata.id) {
                        var route_view='{{ route('user.profile') }}';
                        $('#resturant-view').attr('data-url',route_view);
                    }
                    if(vendordata.photo!=null&&vendordata.photo!="") {
                        $('.resturant-img').attr('src',vendordata.photo);
                    } else {
                        $('.resturant-img').attr('src',place_image);
                    }
                    if(vendordata.title) {
                        $('.vendor-title').html(vendordata.title);
                    }
                    if(vendordata.phonenumber) {
                        $('#vendor_phone').text(vendordata.phonenumber);
                    }
                    if(vendordata.location) {
                        $('#vendor_address').text(vendordata.location);
                    }
                });
                tip_amount=order.tip_amount;
            }
            jQuery("#data-table_processing").hide();
        })
        function getTwentyFourFormat(h,timeslot) {
            if(h<10&&timeslot=="PM") {
                h=parseInt(h)+12;
            } else if(h<10&&timeslot=="AM") {
                h='0'+h;
            }
            return h;
        }
        $('#add-prepare-time-btn').click(function() {
            if(parseInt(subscriptionTotalOrders)==0) {
                alert('{{trans("lang.can_not_accept_more_orders")}}');
                return false;
            } else {
                var preparationTime=$('#prepare_time').val();
                if(preparationTime=='') {
                    $('#add_prepare_time_error').text('{{ trans('lang.add_prepare_time_error') }}');
                    return false;
                }
                var date=firebase.firestore.FieldValue.serverTimestamp();
                database.collection('restaurant_orders').doc(id).update({
                    'status': "Order Accepted",
                    'estimatedTimeToPrepare': preparationTime
                }).then(async function(result) {
                    var wId=database.collection('temp').doc().id;
                    database.collection('wallet').doc(wId).set({
                        'amount': parseFloat(basePrice),
                        'date': date,
                        'id': wId,
                        'isTopUp': true,
                        'order_id': "<?php echo $id; ?>",
                        'payment_method': 'Wallet',
                        'payment_status': 'success',
                        'transactionUser': 'vendor',
                        'user_id': vendorAuthor
                    }).then(async function(result) {
                        var vendorAmount=basePrice;
                        if(total_tax_amount!=0||total_tax_amount!='') {
                            var wId=database.collection('temp').doc().id;
                            database.collection('wallet').doc(wId).set({
                                'amount': parseFloat(total_tax_amount),
                                'date': date,
                                'id': wId,
                                'isTopUp': true,
                                'order_id': "<?php echo $id; ?>",
                                'payment_method': 'tax',
                                'payment_status': 'success',
                                'transactionUser': 'vendor',
                                'user_id': vendorAuthor,
                                'note': 'Order Tax credited'
                            }).then(async function(result) {})
                        }
                        database.collection('users').where('id','==',vendorAuthor)
                            .get().then(async function(snapshotsnew) {
                                var vendordata=snapshotsnew.docs[0]
                                    .data();
                                if(vendordata) {
                                    if(parseInt(subscriptionTotalOrders)!=-1) {
                                        subscriptionTotalOrders=parseInt(subscriptionTotalOrders)-1;
                                        await database.collection('vendors').doc(vendordata.vendorID).update({'subscriptionTotalOrders': subscriptionTotalOrders.toString()})
                                    }
                                    if(isNaN(vendordata.wallet_amount)||
                                        vendordata.wallet_amount==
                                        undefined) {
                                        vendorWallet=0;
                                    } else {
                                        vendorWallet=parseFloat(vendordata
                                            .wallet_amount);
                                    }
                                    newVendorWallet=vendorWallet+vendorAmount+parseFloat(total_tax_amount);
                                    database.collection('users').doc(
                                        vendorAuthor).update({
                                            'wallet_amount': parseFloat(
                                                newVendorWallet)
                                        }).then(async function(result) {
                                            callAjax();
                                        })
                                } else {
                                    callAjax();
                                }
                            });
                    });
                });
            }
        });
        async function callAjax() {
            await $.ajax({
                type: 'POST',
                url: "<?php echo route('order-status-notification'); ?>",
                data: {
                    _token: '<?php echo csrf_token(); ?>',
                    'fcm': manfcmTokenVendor,
                    'vendorname': manname,
                    'orderStatus': "Order Accepted",
                    'subject': orderAcceptedSubject,
                    'message': orderAcceptedMsg
                },
                success: function(data) {
                    window.location.href='{{ route('orders') }}';
                }
            });
        }
        $(".save_order_btn").click(async function() {
            var clientName=$(".client_name").val();
            var orderStatus=$("#order_status").val();
            if(old_order_status!=orderStatus) {
                if(orderStatus=="Order Placed") {
                    manfcmTokenVendor=fcmTokenVendor;
                    manname=customername;
                } else {
                    manfcmTokenVendor=fcmToken;
                    manname=vendorname;
                }
                if(orderStatus=="Order Accepted") {
                    ref.get().then(async function(snapshot) {
                        order=snapshot.docs[0].data();
                        id=order.id;
                        var scheduleTime='';
                        if(order.hasOwnProperty('scheduleTime')&&order
                            .scheduleTime!=null&&order.scheduleTime!='') {
                            scheduleTime=order.scheduleTime;
                            var scheduleDate=scheduleTime.toDate().toDateString();
                            var OrderTime=order.scheduleTime.toDate()
                                .toLocaleTimeString('en-US');
                            var scheduleDate=new Date(scheduleDate);
                            var dd=String(scheduleDate.getDate()).padStart(2,'0');
                            var mm=String(scheduleDate.getMonth()+1).padStart(2,
                                '0'); //January is 0!
                            var yyyy=scheduleDate.getFullYear();
                            var scheduleDate=yyyy+'-'+mm+'-'+dd;
                            today=new Date();
                            var dd=String(today.getDate()).padStart(2,'0');
                            var mm=String(today.getMonth()+1).padStart(2,
                                '0'); //January is 0!
                            var yyyy=today.getFullYear();
                            var todayDate=yyyy+'-'+mm+'-'+dd;
                            var currentTime=today.toLocaleTimeString('en-US');
                            var [h,m,s]=currentTime.split(":");
                            var timeslot=s.split(" ")[1];
                            h=getTwentyFourFormat(h,timeslot);
                            var currentTime=(h+":"+m+":"+s);
                            var [h,m,s]=OrderTime.split(":");
                            var timeslot=s.split(" ")[1];
                            h=getTwentyFourFormat(h,timeslot);
                            var orderTime=(h+":"+m+":"+s);
                            if(todayDate>scheduleDate) {
                                $('#addPreparationTimeModal').modal('show');
                            } else if(todayDate==scheduleDate) {
                                if(currentTime>=orderTime) {
                                    $('#addPreparationTimeModal').modal('show');
                                } else {
                                    alert(
                                        "{{ trans('lang.accept_before_time_error') }}"
                                    );
                                    return false;
                                }
                            } else {
                                alert("{{ trans('lang.accept_before_date_error') }}");
                                return false;
                            }
                        } else {
                            $('#addPreparationTimeModal').modal('show');
                        }
                    })
                } else {
                    database.collection('restaurant_orders').doc(id).update({
                        'status': orderStatus
                    }).then(async function(result) {
                        var subject='';
                        var message='';
                        if(orderStatus=="Order Completed"&&orderTakeAwayOption==
                            true) {
                            subject=takeAwayOrderSubject;
                            message=takeAwayOrderMsg;
                        } else if(orderStatus=="Order Completed"&&
                            orderTakeAwayOption==false) {
                            subject=orderCompletedSubject;
                            message=orderCompletedMsg;
                        } else if(orderStatus=="Order Rejected") {
                            subject=orderRejectedSubject;
                            message=orderRejectedMsg;
                        }
                        if(orderStatus!=orderPreviousStatus&&payment_shared==
                            false) {
                            if(orderStatus=='Order Completed') {
                                driverAmount=parseFloat(deliveryCharge)+parseFloat(
                                    tip_amount);
                                if(driverId&&driverAmount) {
                                    var driver=database.collection('users').where(
                                        "id","==",driverId);
                                    await driver.get().then(async function(
                                        snapshotsdriver) {
                                        var driverdata=snapshotsdriver
                                            .docs[0].data();
                                        if(driverdata) {
                                            if(isNaN(driverdata
                                                .wallet_amount)||
                                                driverdata.wallet_amount==
                                                undefined) {
                                                driverWallet=0;
                                            } else {
                                                driverWallet=driverdata
                                                    .wallet_amount;
                                            }
                                            if(orderPaymentMethod==
                                                'cod'&&
                                                orderTakeAwayOption==true
                                            ) {
                                                driverWallet=parseFloat(
                                                    driverWallet)-
                                                    parseFloat(total_price);
                                            } else {
                                                driverWallet=parseFloat(
                                                    driverWallet)+
                                                    parseFloat(
                                                        driverAmount);
                                            }
                                            if(!isNaN(driverWallet)) {
                                                await database.collection(
                                                    'users').doc(
                                                        driverdata.id)
                                                    .update({
                                                        'wallet_amount': parseFloat(
                                                            driverWallet
                                                        )
                                                    }).then(async function(
                                                        result) {});
                                            }
                                        }
                                    })
                                }
                            }
                            await $.ajax({
                                type: 'POST',
                                url: "<?php echo route('order-status-notification'); ?>",
                                data: {
                                    _token: '<?php echo csrf_token(); ?>',
                                    'fcm': manfcmTokenVendor,
                                    'vendorname': manname,
                                    'orderStatus': orderStatus,
                                    'subject': subject,
                                    'message': message
                                },
                                success: function(data) {
                                    if(orderPreviousStatus!=
                                        'Order Rejected'&&
                                        orderPreviousStatus!=
                                        'Driver Rejected'&&
                                        orderPaymentMethod!='cod'&&
                                        orderTakeAwayOption==false) {
                                        if(orderStatus==
                                            'Order Rejected'||
                                            orderStatus=='Driver Rejected'
                                        ) {
                                            var walletId=database
                                                .collection('temp').doc()
                                                .id;
                                            var canceldateNew=new Date();
                                            var orderCancelDate=new Date(
                                                canceldateNew.setHours(
                                                    23,59,59,999));
                                            database.collection('wallet')
                                                .doc(walletId).set({
                                                    'amount': parseFloat(
                                                        orderPaytableAmount
                                                    ),
                                                    'date': canceldateNew,
                                                    'id': walletId,
                                                    'payment_status': 'success',
                                                    'user_id': orderCustomerId,
                                                    'payment_method': 'Cancelled Order Payment'
                                                }).then(function(result) {
                                                    database.collection(
                                                        'users')
                                                        .where("id",
                                                            "==",
                                                            orderCustomerId
                                                        ).get()
                                                        .then(async function(
                                                            userSnapshots
                                                        ) {
                                                            if(userSnapshots
                                                                .docs
                                                                .length>
                                                                0
                                                            ) {
                                                                data=
                                                                    userSnapshots
                                                                        .docs[
                                                                        0
                                                                    ]
                                                                        .data();
                                                                var wallet_amount=
                                                                    0;
                                                                if(data
                                                                    .wallet_amount!=
                                                                    undefined&&
                                                                    data
                                                                        .wallet_amount!=
                                                                    ''&&
                                                                    data
                                                                        .wallet_amount!=
                                                                    null&&
                                                                    !
                                                                    isNaN(
                                                                        data
                                                                            .wallet_amount
                                                                    )
                                                                ) {
                                                                    wallet_amount
                                                                        =
                                                                        parseFloat(
                                                                            data
                                                                                .wallet_amount
                                                                        );
                                                                }
                                                                var newWalletAmount=
                                                                    wallet_amount+
                                                                    parseFloat(
                                                                        orderPaytableAmount
                                                                    );
                                                                database
                                                                    .collection(
                                                                        'users'
                                                                    )
                                                                    .doc(
                                                                        orderCustomerId
                                                                    )
                                                                    .update({
                                                                        'wallet_amount': parseFloat(
                                                                            newWalletAmount
                                                                        )
                                                                    })
                                                                    .then(
                                                                        function(
                                                                            result
                                                                        ) {
                                                                            window
                                                                                .location
                                                                                .href=
                                                                                '{{ route('orders') }}';
                                                                        }
                                                                    )
                                                            } else {
                                                                window
                                                                    .location
                                                                    .href=
                                                                    '{{ route('orders') }}';
                                                            }
                                                        });
                                                })
                                        } else {
                                            window.location.href=
                                                '{{ route('orders') }}';
                                        }
                                    } else {
                                        window.location.href=
                                            '{{ route('orders') }}';
                                    }
                                }
                            });
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: "<?php echo route('order-status-notification'); ?>",
                                data: {
                                    _token: '<?php echo csrf_token(); ?>',
                                    'fcm': manfcmTokenVendor,
                                    'vendorname': manname,
                                    'orderStatus': orderStatus,
                                    'subject': subject,
                                    'message': message
                                },
                                success: function(data) {
                                    if(orderPreviousStatus!=
                                        'Order Rejected'&&
                                        orderPreviousStatus!=
                                        'Driver Rejected'&&
                                        orderPaymentMethod!='cod'&&
                                        orderTakeAwayOption==false) {
                                        if(orderStatus==
                                            'Order Rejected'||
                                            orderStatus=='Driver Rejected'
                                        ) {
                                            var walletId=
                                                "<?php echo uniqid(); ?>";
                                            var canceldateNew=new Date();
                                            var orderCancelDate=new Date(
                                                canceldateNew.setHours(
                                                    23,59,59,999));
                                            database.collection('wallet')
                                                .doc(walletId).set({
                                                    'amount': parseFloat(
                                                        orderPaytableAmount
                                                    ),
                                                    'date': orderStatus,
                                                    'id': walletId,
                                                    'payment_status': 'success',
                                                    'user_id': orderCustomerId,
                                                    'payment_method': 'Cancelled Order Payment'
                                                }).then(function(result) {
                                                    database.collection(
                                                        'users')
                                                        .where("id",
                                                            "==",
                                                            orderCustomerId
                                                        ).get()
                                                        .then(async function(
                                                            userSnapshots
                                                        ) {
                                                            if(userSnapshots
                                                                .docs
                                                                .length>
                                                                0
                                                            ) {
                                                                data=
                                                                    userSnapshots
                                                                        .docs[
                                                                        0
                                                                    ]
                                                                        .data();
                                                                var wallet_amount=
                                                                    0;
                                                                if(data
                                                                    .wallet_amount!=
                                                                    undefined&&
                                                                    data
                                                                        .wallet_amount!=
                                                                    ''&&
                                                                    data
                                                                        .wallet_amount!=
                                                                    null&&
                                                                    !
                                                                    isNaN(
                                                                        data
                                                                            .wallet_amount
                                                                    )
                                                                ) {
                                                                    wallet_amount
                                                                        =
                                                                        parseFloat(
                                                                            data
                                                                                .wallet_amount
                                                                        );
                                                                }
                                                                var newWalletAmount=
                                                                    wallet_amount+
                                                                    parseFloat(
                                                                        orderPaytableAmount
                                                                    );
                                                                database
                                                                    .collection(
                                                                        'users'
                                                                    )
                                                                    .doc(
                                                                        orderCustomerId
                                                                    )
                                                                    .update({
                                                                        'wallet_amount': parseFloat(
                                                                            newWalletAmount
                                                                        )
                                                                    })
                                                                    .then(
                                                                        function(
                                                                            result
                                                                        ) {
                                                                            window
                                                                                .location
                                                                                .href=
                                                                                '{{ route('orders') }}';
                                                                        }
                                                                    )
                                                            } else {
                                                                window
                                                                    .location
                                                                    .href=
                                                                    '{{ route('orders') }}';
                                                            }
                                                        });
                                                })
                                        } else {
                                            window.location.href=
                                                '{{ route('orders') }}';
                                        }
                                    } else {
                                        window.location.href=
                                            '{{ route('orders') }}';
                                    }
                                }
                            });
                        }
                    });
                }
            }
        })
    })
    function buildHTMLProductsList(snapshotsProducts) {
        var html='';
        var alldata=[];
        var number=[];
        var totalProductPrice=0;
        snapshotsProducts.forEach((product) => {
            getProductInfo(product);
            var val=product;
            var product_id=(val.variant_info&&val.variant_info.variant_id)? val.variant_info.variant_id:
                val.id;
            html=html+'<tr>';
            var extra_html='';
            if(product.extras!=undefined&&product.extras!=''&&product.extras!=null&&product.extras.length>0) {
                extra_html=extra_html+'<span>';
                var extra_count=1;
                try {
                    product.extras.forEach((extra) => {
                        if(extra_count>1) {
                            extra_html=extra_html+','+extra;
                        } else {
                            extra_html=extra_html+extra;
                        }
                        extra_count++;
                    })
                } catch(error) {
                }
                extra_html=extra_html+'</span>';
            }
            html=html+'<td class="order-product"><div class="order-product-box">';
            if(val.photo!=''&&val.photo!=null) {
                html=html+'<img onerror="this.onerror=null;this.src=\''+place_image+
                    '\'" class="img-circle img-size-32 mr-2" style="width:60px;height:60px;" src="'+val
                        .photo+'" alt="image">';
            } else {
                html=html+'<img class="img-circle img-size-32 mr-2" style="width:60px;height:60px;" src="'+
                    place_image+'" alt="image">';
            }
            html=html+'</div><div class="orders-tracking"><h6>'+val.name+
                '</h6><div class="orders-tracking-item-details">';
            if(val.variant_info) {
                html=html+'<div class="variant-info">';
                html=html+'<ul>';
                $.each(val.variant_info.variant_options,function(label,value) {
                    html=html+'<li class="variant"><span class="label">'+label+
                        '</span><span class="value">'+value+'</span></li>';
                });
                html=html+'</ul>';
                html=html+'</div>';
            }
            if(extra_count>1||product.size) {
                html=html+'<strong>{{ trans('lang.extras') }} :</strong>';
            }
            if(extra_count>1) {
                html=html+
                    '<div class="extra"><span>{{ trans('lang.extras') }} :</span><span class="ext-item">'+
                        extra_html+'</span></div>';
            }
            if(product.size) {
                html=html+
                    '<div class="type"><span>{{ trans('lang.type') }} :</span><span class="ext-size">'+
                        product.size+'</span></div>';
            }
            var final_price='';
            if(val.discountPrice!=0&&val.discountPrice!=""&&val.discountPrice!=null&&!isNaN(val
                .discountPrice)) {
                final_price=parseFloat(val.discountPrice);
            } else {
                final_price=parseFloat(val.price);
            }
            price_item=parseFloat(final_price).toFixed(2);
            totalProductPrice=parseFloat(price_item)*parseInt(val.quantity);
            var extras_price=0;
            if(product.extras!=undefined&&product.extras!=''&&product.extras.length>0) {
                extras_price_item=(parseFloat(val.extras_price)*parseInt(val.quantity)).toFixed(2);
                if(parseFloat(extras_price_item)!=NaN&&val.extras_price!=undefined) {
                    extras_price=extras_price_item;
                }
                totalProductPrice=parseFloat(extras_price)+parseFloat(totalProductPrice);
            }
            totalProductPrice=parseFloat(totalProductPrice).toFixed(2);
            if(currencyAtRight) {
                price_val=parseFloat(price_item).toFixed(decimal_degits)+""+currentCurrency;
                extras_price_val=parseFloat(extras_price).toFixed(decimal_degits)+""+currentCurrency;
                totalProductPrice_val=parseFloat(totalProductPrice).toFixed(decimal_degits)+""+
                    currentCurrency;
            } else {
                price_val=currentCurrency+""+parseFloat(price_item).toFixed(decimal_degits);
                extras_price_val=currentCurrency+""+parseFloat(extras_price).toFixed(decimal_degits);
                totalProductPrice_val=currentCurrency+""+parseFloat(totalProductPrice).toFixed(
                    decimal_degits);
            }
            html=html+'</div></div></td>';
            html=html+'<td class="text-green text-center"><span class="item-price">'+price_val+
                '</span><br><span class="base-price-'+product_id+' text-muted"></span></td><td> × '+val
                    .quantity+'</td><td class="text-green"> + '+extras_price_val+
                '</td><td class="text-green">  '+totalProductPrice_val+'</td>';
            html=html+'</tr>';
            total_price+=parseFloat(totalProductPrice);
        });
        totalProductPrice=0;
        return html;
    }
    function getProductInfo(product) {
        database.collection('vendor_products').doc(product.id).get().then(async function(snapshots) {
            if(snapshots.exists) {
                var productData=snapshots.data();
                if(product.variant_info&&product.variant_info.variant_id) {
                    var variant_info=$.map(productData.item_attribute.variants,function(v,i) {
                        if(v.variant_sku==product.variant_info.variant_sku) {
                            return v;
                        }
                    });
                    base_price=parseFloat(variant_info[0].variant_price);
                    var product_id=product.variant_info.variant_id;
                } else {
                    if(parseFloat(productData.disPrice)!=0) {
                        var base_price=productData.disPrice;
                    } else {
                        var base_price=productData.price;
                    }
                    var product_id=product.id;
                }
                if(currencyAtRight) {
                    base_price_format=parseFloat(base_price).toFixed(decimal_degits)+""+
                        currentCurrency;
                } else {
                    base_price_format=currentCurrency+""+parseFloat(base_price).toFixed(
                        decimal_degits);
                }
                $(".base-price-"+product_id).text('(Base Price: '+base_price_format+')');
            }
        });
    }
    function buildHTMLProductstotal(snapshotsProducts) {
        var html='';
        var alldata=[];
        var number=[];
        adminCommissionValue=snapshotsProducts.adminCommission;
        var adminCommissionType=snapshotsProducts.adminCommissionType;
        var discount=snapshotsProducts.discount;
        var couponCode=snapshotsProducts.couponCode;
        var extras=snapshotsProducts.extras;
        var extras_price=snapshotsProducts.extras_price;
        var rejectedByDrivers=snapshotsProducts.rejectedByDrivers;
        var takeAway=snapshotsProducts.takeAway;
        var tip_amount=snapshotsProducts.tip_amount;
        var notes=snapshotsProducts.notes;
        var tax_amount=snapshotsProducts.vendor.tax_amount;
        var status=snapshotsProducts.status;
        var products=snapshotsProducts.products;
        deliveryCharge=snapshotsProducts.deliveryCharge;
        var specialDiscount=snapshotsProducts.specialDiscount;
        var intRegex=/^\d+$/;
        var floatRegex=/^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
        if(products) {
            products.forEach((product) => {
                var val=product;
            });
        }
        total_price=parseFloat(total_price);
        if(currencyAtRight) {
            var sub_total=parseFloat(total_price).toFixed(decimal_degits)+""+currentCurrency;
        } else {
            var sub_total=currentCurrency+""+parseFloat(total_price).toFixed(decimal_degits);
        }
        html=html+'<tr><td class="seprater" colspan="2"><hr><span>{{ trans('lang.sub_total') }}</span></td></tr>';
        html=html+
            '<tr class="final-rate"><td class="label">{{ trans('lang.sub_total') }}</td><td class="sub_total" style="color:green">('+
                sub_total+')</td></tr>';
        var priceWithCommision=total_price;
        if(intRegex.test(discount)||floatRegex.test(discount)) {
            html=html+
                '<tr><td class="seprater" colspan="2"><hr><span>{{ trans('lang.discount') }}</span></td></tr>';
            discount=parseFloat(discount).toFixed(decimal_degits);
            total_price-=parseFloat(discount);
            if(currencyAtRight) {
                discount_val=discount+""+currentCurrency;
            } else {
                discount_val=currentCurrency+""+discount;
            }
            couponCode_html='';
            if(couponCode) {
                couponCode_html='</br><small>{{ trans('lang.coupon_codes') }} :'+couponCode+'</small>';
            }
            html=html+'<tr><td class="label">{{ trans('lang.discount') }}'+couponCode_html+
                '</td><td class="discount text-danger">(-'+discount_val+')</td></tr>';
        }
        if(specialDiscount!=undefined) {
            special_discount=parseFloat(specialDiscount.special_discount).toFixed(decimal_degits);
            total_price-=parseFloat(special_discount);
            if(currencyAtRight) {
                special_discount_val=special_discount+""+currentCurrency;
            } else {
                special_discount_val=currentCurrency+""+special_discount;
            }
            special_html='';
            if(specialDiscount.specialType=="percentage") {
                special_html='</br><small>('+specialDiscount.special_discount_label+'%)</small>';
            }
            html=html+'<tr><td class="label">{{ trans('lang.special_offer') }} {{ trans('lang.discount') }}'+
                special_html+'</td><td class="special_discount text-danger">(-'+special_discount_val+
                ')</td></tr>';
        }
        var tax=0;
        taxlabel='';
        taxlabeltype='';
        if(snapshotsProducts.hasOwnProperty('taxSetting')&&snapshotsProducts.taxSetting.length>0) {
            html=html+
                '<tr><td class="seprater" colspan="2"><hr><span>{{ trans('lang.tax_calculation') }}</span></td></tr>';
            for(var i=0;i<snapshotsProducts.taxSetting.length;i++) {
                var data=snapshotsProducts.taxSetting[i];
                if(data.type&&data.tax) {
                    if(data.type=="percentage") {
                        tax=(data.tax*total_price)/100;
                        taxlabeltype="%";
                        var taxvalue=data.tax;
                    } else {
                        tax=data.tax;
                        taxlabeltype="";
                        if(currencyAtRight) {
                            var taxvalue=parseFloat(data.tax).toFixed(decimal_degits)+""+currentCurrency;
                        } else {
                            var taxvalue=currentCurrency+""+parseFloat(data.tax).toFixed(decimal_degits);
                        }
                    }
                    taxlabel=data.title;
                }
                total_tax_amount+=parseFloat(tax);
                if(!isNaN(tax)&&tax!=0) {
                    if(currencyAtRight) {
                        html=html+'<tr><td class="label">'+taxlabel+" ("+taxvalue+taxlabeltype+
                            ')</td><td class="tax_amount" id="greenColor">+'+parseFloat(tax).toFixed(decimal_degits)+
                            ''+currentCurrency+'</td></tr>';
                    } else {
                        html=html+'<tr><td class="label">'+taxlabel+" ("+taxvalue+taxlabeltype+
                            ')</td><td class="tax_amount" id="greenColor">+'+currentCurrency+parseFloat(tax)
                                .toFixed(decimal_degits)+'</td></tr>';
                    }
                }
            }
            total_price=parseFloat(total_price)+parseFloat(total_tax_amount);
        }
        var totalAmount=total_price;
        if(intRegex.test(deliveryCharge)||floatRegex.test(deliveryCharge)) {
            html=html+
                '<tr><td class="seprater" colspan="2"><hr><span>{{ trans('lang.delivery_charge') }}</span></td></tr>';
            deliveryCharge=parseFloat(deliveryCharge).toFixed(decimal_degits);
            totalAmount+=parseFloat(deliveryCharge);
            if(currencyAtRight) {
                deliveryCharge_val=deliveryCharge+""+currentCurrency;
            } else {
                deliveryCharge_val=currentCurrency+""+deliveryCharge;
            }
            if(takeAway==''||takeAway==false) {
                deliveryChargeVal=deliveryCharge;
                html=html+
                    '<tr><td class="label">{{ trans('lang.deliveryCharge') }}</td><td class="deliveryCharge " id="greenColor">+'+
                        deliveryCharge_val+'</td></tr>';
            }
        }
        if(intRegex.test(tip_amount)||floatRegex.test(tip_amount)) {
            html=html+'<tr><td class="seprater" colspan="2"><hr><span>{{ trans('lang.tip') }}</span></td></tr>';
            tip_amount=parseFloat(tip_amount).toFixed(decimal_degits);
            totalAmount+=parseFloat(tip_amount);
            total_price=parseFloat(total_price).toFixed(decimal_degits);
            if(currencyAtRight) {
                tip_amount_val=tip_amount+""+currentCurrency;
            } else {
                tip_amount_val=currentCurrency+""+tip_amount;
            }
            if(takeAway==''||takeAway==false) {
                tip_amount_val=tip_amount_val;
                html=html+
                    '<tr><td class="label">{{ trans('lang.tip_amount') }}</td><td class="tip_amount_val " id="greenColor">+'+
                        tip_amount_val+'</td></tr>';
            }
        }
        html+='<tr><td class="seprater" colspan="2"><hr></td></tr>';
        orderPaytableAmount=totalAmount;
        if(currencyAtRight) {
            total_price_val=parseFloat(totalAmount).toFixed(decimal_degits)+""+currentCurrency;
        } else {
            total_price_val=currentCurrency+""+parseFloat(totalAmount).toFixed(decimal_degits);
        }
        total_price_val=total_price_val;
        html=html+
            '<tr class="grand-total"><td class="label">{{ trans('lang.total_amount') }}</td><td class="total_price_val " id="greenColor">'+
                total_price_val+'</td></tr>';
        var adminCommHtml="";
        if(adminCommissionType=="Percent") {
            basePrice=(priceWithCommision/(1+(parseFloat(adminCommissionValue)/100)));
            adminCommission=parseFloat(priceWithCommision-basePrice);
            adminCommHtml="("+adminCommissionValue+"%)";
        } else {
            basePrice=priceWithCommision-adminCommissionValue;
            adminCommission=parseFloat(priceWithCommision-basePrice);
        }
        if(currencyAtRight) {
            adminCommission_val=parseFloat(adminCommission).toFixed(decimal_degits)+""+currentCurrency;
        } else {
            adminCommission_val=currentCurrency+""+parseFloat(adminCommission).toFixed(decimal_degits);
        }
        html=html+'<tr><td class="label"><small>{{ trans('lang.admin_commission') }} '+adminCommHtml+
            '</small> </td><td style="color:red"><small>( '+adminCommission_val+' )</small></td></tr>';
        //}
        if(notes) {
            html=html+'<tr><td class="label">{{ trans('lang.notes') }}</td><td class="adminCommission_val">'+
                notes+'</td></tr>';
        }
        return html;
    }
    function PrintElem(elem) {
        jQuery('#'+elem).printThis({
            debug: false,
            importStyle: true,
            loadCSS: [
                '<?php echo asset('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>',
                '<?php echo asset('css/style.css'); ?>',
                '<?php echo asset('css/colors/blue.css'); ?>',
                '<?php echo asset('css/icons/font-awesome/css/font-awesome.css'); ?>',
                '<?php echo asset('assets/plugins/toast-master/css/jquery.toast.css'); ?>',
            ],
        });
    }
    //Review code GA
    var refReviewAttributes=database.collection('review_attributes');
    refReviewAttributes.get().then(async function(snapshots) {
        if(snapshots!=undefined) {
            snapshots.forEach((doc) => {
                var data=doc.data();
                reviewAttributes[data.id]=data.title;
            });
        }
    });
    function getUserReview(vendorOrder,reviewAttr) {
        var refUserReview=database.collection('foods_review').where('orderid',"==",vendorOrder.id);
        refUserReview.limit(page_size).get().then(async function(userreviewsnapshot) {
            var reviewHTML='';
            reviewHTML=buildRatingsAndReviewsHTML(vendorOrder,userreviewsnapshot);
            if(userreviewsnapshot.docs.length>0) {
                jQuery("#customers_rating_and_review").append(reviewHTML);
            } else {
                jQuery("#customers_rating_and_review").html('<h4>No Reviews Found</h4>');
            }
        });
    }
    function buildRatingsAndReviewsHTML(vendorOrder,userreviewsnapshot) {
        var allreviewdata=[];
        var reviewhtml='';
        userreviewsnapshot.docs.forEach((listval) => {
            var reviewDatas=listval.data();
            reviewDatas.id=listval.id;
            allreviewdata.push(reviewDatas);
        });
        reviewhtml+='<div class="user-ratings">';
        allreviewdata.forEach((listval) => {
            var val=listval;
            vendorOrder.products.forEach((productval) => {
                if(productval.id==val.productId) {
                    rating=val.rating;
                    reviewhtml=reviewhtml+
                        '<div class="reviews-members py-3 border mb-3"><div class="media">';
                    if(productval.photo!=''&&productval.photo!=null) {
                        reviewhtml=reviewhtml+
                            '<a href="javascript:void(0);"><img onerror="this.onerror=null;this.src=\''+
                            place_image+'\'" alt="#" src="'+productval.photo+
                            '" class=" img-circle img-size-32 mr-2" style="width:60px;height:60px"></a>';
                    } else {
                        reviewhtml=reviewhtml+'<a href="javascript:void(0);"><img alt="#" src="'+
                            place_image+
                            '" class=" img-circle img-size-32 mr-2" style="width:60px;height:60px"></a>';
                    }
                    reviewhtml=reviewhtml+
                        '<div class="media-body d-flex"><div class="reviews-members-header"><h6 class="mb-0"><a class="text-dark" href="javascript:void(0);">'+
                        productval.name+
                        '</a></h6><div class="star-rating"><div class="d-inline-block" style="font-size: 14px;">';
                    reviewhtml=reviewhtml+' <ul class="rating" data-rating="'+rating+'">';
                    reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                    reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                    reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                    reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                    reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                    reviewhtml=reviewhtml+'</ul>';
                    reviewhtml=reviewhtml+'</div></div>';
                    reviewhtml=reviewhtml+'</div>';
                    reviewhtml=reviewhtml+'<div class="review-date ml-auto">';
                    if(val.createdAt!=null&&val.createdAt!="") {
                        var review_date=val.createdAt.toDate().toLocaleDateString('en',{
                            year: "numeric",
                            month: "short",
                            day: "numeric"
                        });
                        reviewhtml=reviewhtml+'<span>'+review_date+'</span>';
                    }
                    reviewhtml=reviewhtml+'</div>';
                    var photos='';
                    if(val.photos.length>0) {
                        photos+='<div class="photos"><ul>';
                        $.each(val.photos,function(key,img) {
                            photos+='<li><img src="'+img+'" width="100"></li>';
                        });
                        photos+='</ul></div>';
                    }
                    reviewhtml=reviewhtml+
                        '</div></div><div class="reviews-members-body w-100"><p class="mb-2">'+val
                            .comment+'</p>'+photos+'</div>';
                    if(val.hasOwnProperty('reviewAttributes')&&val.reviewAttributes!=null) {
                        reviewhtml+='<div class="attribute-ratings feature-rating mb-2">';
                        var label_feature="{{ trans('lang.byfeature') }}";
                        reviewhtml+='<h3 class="mb-2">'+label_feature+'</h3>';
                        reviewhtml+='<div class="media-body">';
                        $.each(val.reviewAttributes,function(aid,data) {
                            var at_id=aid;
                            var at_title=reviewAttributes[aid];
                            var at_value=data;
                            reviewhtml+=
                                '<div class="feature-reviews-members-header d-flex mb-3">';
                            reviewhtml+='<h6 class="mb-0">'+at_title+'</h6>';
                            reviewhtml=reviewhtml+
                                '<div class="rating-info ml-auto d-flex">';
                            reviewhtml=reviewhtml+'<div class="star-rating">';
                            reviewhtml=reviewhtml+' <ul class="rating" data-rating="'+
                                at_value+'">';
                            reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                            reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                            reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                            reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                            reviewhtml=reviewhtml+'<li class="rating__item"></li>';
                            reviewhtml=reviewhtml+'</ul>';
                            reviewhtml+='</div>';
                            reviewhtml+='<div class="count-rating ml-2">';
                            reviewhtml+='<span class="count">'+at_value+'</span>';
                            reviewhtml+='</div>';
                            reviewhtml+='</div></div>';
                        });
                        reviewhtml+='</div></div>';
                    }
                    reviewhtml+='</div>';
                }
                reviewhtml+='</div>';
            });
        });
        reviewhtml+='</div>';
        return reviewhtml;
    }
</script>
@endsection