@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="responsive-table">
                <caption></caption>
                <thead>
                <tr>
                    <th scope="col">Film Title</th>
                    <th scope="col">Released</th>
                    <th scope="col">Studio</th>
                    <th scope="col">Worldwide Gross</th>
                    <th scope="col">Domestic Gross</th>
                    <th scope="col">Foreign Gross</th>
                    <th scope="col">Budget</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Frozen</th>
                    <td data-title="Released">2013</td>
                    <td data-title="Studio">Disney</td>
                    <td data-title="Worldwide Gross" data-type="currency">$1,287,000,000</td>
                    <td data-title="Domestic Gross" data-type="currency">$400,738,009	</td>
                    <td data-title="Foreign Gross" data-type="currency">$875,742,326</td>
                    <td data-title="Budget" data-type="currency">$150,000,000</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
