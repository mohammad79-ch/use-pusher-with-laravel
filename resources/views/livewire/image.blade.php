<div class="container">
    <div class="row">
        <div class="col-6 offset-4">
            <div class="card m-3">
                <div class="card-header">
                   Select  Images
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="uploadImage" id="resetFormImages" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control"  wire:model="image" multiple>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
