@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Ulasan</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
      <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
      @forelse ($comment as $item)
      <div class="clearfix">
      <h5 class="card-title float-start">{{ $item->user->name }}</h5>
      <p class="card-text float-end">{{ $item->updated_at->diffForHumans() }}</p>
      </div>
      <p class="card-text">{{ $item->message }}</p>
      <hr>
      @empty
        <div class="alert alert-danger rounded" role="alert">
          Belum Ada Ulasan!
        </div> 
      @endforelse
    </div>
    <form action="{{ route('comment.store') }}" method="post">
      @csrf
      @method('POST')
      <div class="d-flex m-2">
          <input type="text" placeholder="Masukkan Komentar / Ulasan Anda" style="width: 100%" name="message">
          <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
          <input type="hidden" value="{{ $menu->id }}" name="menu_id">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
      </div>
    </form>
  </div>
</div>
@endsection