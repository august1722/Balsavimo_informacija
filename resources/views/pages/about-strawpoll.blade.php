@extends('layouts.app')
@section('content')

    @foreach($strawpoll as $item)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card big-font">
                        <div class="card-header text-center">{{ $item->name }}</div>

                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">Balsavimo Klausimas -</div>
                                <div class="col-md-6">
                                    {{ $item->question }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">Galimi Atsakymai  -</div>
                                <div class="col-md-6">
                                    {{ $item->answers }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">Balsų Skaičius -</div>
                                <div class="col-md-6">
                                    {{ $item->votes }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">Kūrėjas -</div>
                                <div class="col-md-6">
                                    {{ $item->creator }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">Sukūrimo Data -</div>
                                <div class="col-md-6">
                                    {{ $item->created_at }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">Paskutinis Atnaujinimas -</div>
                                <div class="col-md-6">
                                    {{ $item->updated_at }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
