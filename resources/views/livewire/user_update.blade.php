
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="UpdateStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <input type="hidden" class="form-control" placeholder="Name :" wire:model="ids" value="{{$ids}}">
                        @error('ids')
                        <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name :" wire:model="name" value="{{$name}}">
                        @error('name')
                        <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email :" wire:model="email" value="{{$email}}">
                        @error('email')
                        <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Password :" wire:model="password" value="{{$password}}">
                        @error('password')
                        <span class="text-danger mt-3">{{$message}}</span>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <input type="file" wire:model="file" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="update()">Save changes</button>
            </div>
        </div>
    </div>
</div>
