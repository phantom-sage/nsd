@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card box-shadow border-left">
                <div class="card-header en-font-600">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <x-alert type="success" :message="session('status')" />
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <ul class="list-group en-font-600">
                                @if(Auth::user()->is_admin)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Posts
                                    <span class="badge @if($posts_count > 0)badge-primary @else badge-danger @endif badge-pill">{{ $posts_count }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Teammates
                                    <span class="badge @if($teams_count > 0)badge-primary @else badge-danger @endif badge-pill">{{ $teams_count }}</span>
                                </li>
                                @else
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Posts
                                    <span class="badge @if($posts_count > 0)badge-primary @else badge-danger @endif badge-pill">{{ $posts_count }}</span>
                                </li>
                                @endif
                            </ul><!-- ul -->    
                        </div><!-- col -->
                    </div><!-- row -->

                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
    </div><!-- row -->
</div><!-- container -->
@endsection
