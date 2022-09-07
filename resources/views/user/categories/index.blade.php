@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <x-new-category-user />

                <div class="card mt-4">
                    <div class="card-header">  <strong>الاصناف</strong></div>

                    <div class="card-body">
                        <x-categories-table-user :categories="$categories"/>
                    {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


