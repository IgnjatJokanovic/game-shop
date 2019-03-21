<div class="shopcart-x modal fade bd-example-modal-lg" id="shopcart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Shoping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="checkout">
                </div>
                <div class="modal-footer" id="buy">
                        <a href="{{asset('/checkout')}}" class="btn btn-outline-success col-lg-12 my-2 my-sm-0 ml-3 expand-lg-ml-0">
                        Checkout
                        </a>
                </div>
            </div>
    </div>
</div>