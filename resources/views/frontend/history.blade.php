@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Riwayat</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row g-4 justify-content-center">
        @forelse ($order as $item)
        <div class="card p-2">
            <div class="col-lg-6">
                <div class="d-flex align-items-center">
                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$item->menu->image) }}" alt="" style="width: 80px;">
                    <div class="w-100 d-flex flex-column text-start ps-4">
                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                            <span>{{ $item->menu->title }} (x {{ $item->quantity }})</span>
                            <span class="text-primary">Rp. {{ $item->total_price }}</span>
                        </h5>
                        <small class="fst-italic">{{ $item->menu->description }}</small>
                    </div>
                </div>
            </div>
            @if ($item->status == 'dibatalkan')
            <div class="text-end">
                <a href="" class="btn btn-danger">{{ $item->status }}</a>
            </div>
            @else
            <div class="text-end">
                <a href="" class="btn btn-success">{{ $item->status }}</a>
            </div> 
            @endif
        </div>
        {{ $order->links() }}
        @empty
        <div class="alert alert-danger rounded" role="alert">
            Riwayat Tidak Tersedia!
        </div>
        @endforelse
    </div>
</div>

@endsection