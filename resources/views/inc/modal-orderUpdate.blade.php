<!-- Modal -->
<div class="modal fade modal-order" id="OrderUpdate" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Назовите причину отмены заказа</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="order_id d-none" name="order_id" aria-label="order_id" value="order_id">
                <input class="status_id d-none" name="status_id" aria-label="status_id" value="status_id">
                <input type="text" class="form-control" name="reason" id="reason" aria-label="reason"
                       placeholder="Сообщение">
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
