<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-light">
            <div class="modal-header text-black">
                <h5 class="modal-title text-black" id="staticBackdropLabel">Здравствуйте, {{Auth::user()->name}}!</h5>
            </div>
            <div class="modal-body">
                <div id="info" class="text-black"></div>
            </div>
            <div class="modal-footer">
                <a class="book-a-table-btn" href="{{route('index')}}" data-dismiss="modal">Хорошо</a>
            </div>
        </div>
    </div>
</div>
