<div>
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Felhasználók</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Műszerfal</a></li>
              <li class="breadcrumb-item active">Felhasználók</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">
              <div class="d-flex justify-content-end mb-2">
                <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Új felhasználó hozzáadása</button>
              </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
                <caption>Felhasználók</caption>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Név</th>
                    <th scope="col">Email</th>
                    <th scope="col">Opciók</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user ) 
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td>
                        <a href="" wire:click.prevent="edit({{ $user }})"><i class="fa fa-edit mr-2"></i></a>
                        <a href="" wire:click.prevent="confirmUserRemoval({{$user->id}})"><i class="fa fa-trash text-danger"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>

              </div>
              <div class="card-footer d-flex justify-content-end"> 
                  {{ $users->links() }}
              </div>
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog">
  <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          @if($showEditModal)
            <span>Felhasználó módosítása</span>
          @else
          <span>Új felhasználó hozzáadása</span>
          @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="name" class="form-label">Név</label>
            <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" placeHolder="Enter full name">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="passwordConfirmation" class="form-label">Jelszó megerősítése</label>
            <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="passwordConfirmation" placeHolder="Confirm password">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>Mégsem</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
            @if( $showEditModal )
              <span>Módosítás</span>
            @else
              <span>Mentés</span>
            @endif
        </button>
      </div>
    </div>
</form>
</div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4>Felhasználó törlés</h4></div>

      <div class="modal-body"><h5>Biztosan törölni szeretnéd a felhasználót?</h5></div>

      <div class="modal-footer"> 
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>Mégsem</button>
        <button type="submit" wire:click.prevent="deleteUser" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Törlés</button>

      </div>

    </div>
  </div>
</div>


</div>
