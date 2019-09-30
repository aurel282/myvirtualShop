@if (Session::has('flash_notification.messages'))
    @foreach(session::get('flash_notification.messages') as $flash )
        @foreach($flash as $type => $message)
            <div class="ui {{ $type }} icon message">
                <i class="close icon"></i>
                <div class="content">
                    <div class="header">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endif
