@extends('layouts.user')

@section('head')
  @vite('resources/css/orders/index.css')
@endsection

@section('content')

<div class="orders-list" style="padding: 20px 40px 30px;">

    <div class="order-row" style="display:flex;align-items:center;justify-content:space-between;padding:18px 0;border-bottom:1px solid #eeeeee;">
        <div class="order-left" style="display:flex;align-items:center;gap:25px;">
            <div style="font-size:12px;">1.</div>
            <div style="width:60px;height:90px;border:1px solid #cccccc;display:flex;align-items:center;justify-content:center;font-size:9px;color:#999999;">
                WATCH
            </div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;">
                WATCH DESCRIPTION
            </div>
        </div>
        <button style="padding:6px 14px;font-size:11px;background-color:#ffffff;border:1px solid #bbbbbb;border-radius:4px;cursor:pointer;">
            BUY AGAIN
        </button>
    </div>

    <div class="order-row" style="display:flex;align-items:center;justify-content:space-between;padding:18px 0;border-bottom:1px solid #eeeeee;">
        <div class="order-left" style="display:flex;align-items:center;gap:25px;">
            <div style="font-size:12px;">2.</div>
            <div style="width:60px;height:90px;border:1px solid #cccccc;display:flex;align-items:center;justify-content:center;font-size:9px;color:#999999;">
                WATCH
            </div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;">
                WATCH DESCRIPTION
            </div>
        </div>
        <button style="padding:6px 14px;font-size:11px;background-color:#ffffff;border:1px solid #bbbbbb;border-radius:4px;cursor:pointer;">
            BUY AGAIN
        </button>
    </div>

    <div class="order-row" style="display:flex;align-items:center;justify-content:space-between;padding:18px 0;border-bottom:1px solid #eeeeee;">
        <div class="order-left" style="display:flex;align-items:center;gap:25px;">
            <div style="font-size:12px;">3.</div>
            <div style="width:60px;height:90px;border:1px solid:#cccccc;display:flex;align-items:center;justify-content:center;font-size:9px;color:#999999;">
                WATCH
            </div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;">
                WATCH DESCRIPTION
            </div>
        </div>
        <button style="padding:6px 14px;font-size:11px;background-color:#ffffff;border:1px solid #bbbbbb;border-radius:4px;cursor:pointer;">
            BUY AGAIN
        </button>
    </div>

    <div class="order-row" style="display:flex;align-items:center;justify-content:space-between;padding:18px 0;border-bottom:1px solid #eeeeee;">
        <div class="order-left" style="display:flex;align-items:center;gap:25px;">
            <div style="font-size:12px;">4.</div>
            <div style="width:60px;height:90px;border:1px solid:#cccccc;display:flex;align-items:center;justify-content:center;font-size:9px;color:#999999;">
                WATCH
            </div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;">
                WATCH DESCRIPTION
            </div>
        </div>
        <button style="padding:6px 14px;font-size:11px;background-color:#ffffff;border:1px solid #bbbbbb;border-radius:4px;cursor:pointer;">
            BUY AGAIN
        </button>
    </div>

</div>


@stop
