@extends('layout.template-base')

@section('headerTitle')
    <div class="header-info ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">

                    <a href="{{ url()->previous() }}" class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list" style="position: absolute; left: 0; top: 27px;">
                        <i style="color:#545454!important;" class="color-bg--success left arrow icon color" ></i>
                        @lang('provider.import.back')
                    </a>

                    <p>
                        @lang('provider.import.title')
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('provider.import') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type='file' name='file'   class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list">
                            <input type='submit' name='submit' value='Import'  class="ui left labeled icon button inverted admin-bp-btn--info button back-to-list">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
