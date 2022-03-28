<div class="container p-3">
    @include('livewire.user_create')
    @include('livewire.user_update')
    <style>
        nav svg{
            height: 15px;
        }
    </style>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                  User Manage
                  <button type="button" class="btn btn-primary ml-2 " data-bs-toggle="modal" data-bs-target="#AddStudent">
                      Launch demo modal
                  </button>

                      <form>
                          <div class="form-group">
                              <input type="text" wire:model="search" class="form-control">
                          </div>
                         </form>
              </div>
              <div class="card-body">
                  @if(session('msg'))
                      <div class="alert alert-success mb-3">
                          {{session('msg')}}
                      </div>
                   @endif
                  <table class="table">
                      <tr>
                          <th>id</th>
                          <th>name</th>
                          <th>email</th>
                          <th>image</th>
                          <td>process</td>
                      </tr>
                      @foreach($users as $user)
                      <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                              <img src="@if(\Illuminate\Support\Facades\File::exists(public_path('storage/'.$user->file))){{'/storage/'.$user->file}}@else{{$user->file}}@endif" alt="" width="50">
                          </td>
                          <td>
                              <a  class="btn btn-danger btn-sm" wire:click.prevent="delete({{$user->id}})">del</a>
                              <a wire:click.prevent="edit({{$user->id}})" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#UpdateStudent">edit</a>
                          </td>
                      </tr>
                      @endforeach
                  </table>
              </div>
          </div>
      </div>
      <div>
          {{$users->links()}}
      </div>
  </div>
</div>
