<div>
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Időpontok</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Műszerfal</a></li>
              <li class="breadcrumb-item active">Időpontok</li>
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
                <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Új időpont hozzáadása</button>
              </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
                <caption>Felhasználók</caption>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kliens Név</th>
                    <th scope="col">Dátum</th>
                    <th scope="col">Idő</th>
                    <th scope="col">Státusz</th>
                    <th scope="col">Opciók</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                    <th scope="row">1</th>
                    <td>Client</td>
                    <td>Dátum</td>
                    <td>Idő</td>
                    <td>Státusz</td>
                    <td>
                        <a href="" ><i class="fa fa-edit mr-2"></i></a>
                        <a href="" ><i class="fa fa-trash text-danger"></i></a>
                    </td>
                    </tr>

                </tbody>
                </table>

              </div>
              <div class="card-footer d-flex justify-content-end"> 
                  
              </div>
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
