@extends('app')

@section('content')
    <section data-section="purchase-sucess">
        <div class="container">
            <div class="row">
                <div class="col col-lg-12">
                    <div class="alert alert-success text-center">
                        <h4>Uspešno ste opravili nakup!</h4>
                        <a href="{{ url('home') }}">Domov</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection