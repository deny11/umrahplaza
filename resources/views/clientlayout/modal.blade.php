    <div class="remodal" data-remodal-id="notif" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <div class="col-md-12">
            <h2 id="modal1Title">Notifikasi</h2>
            <p id="modal1Desc">
                @if(Session::has('notif'))
                    {{Session::get('notif')}}
                @endif
            </p>
        </div>
        <br>
        {{--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>--}}
        {{--<button data-remodal-action="confirm" class="remodal-confirm">OK</button>--}}
    </div>