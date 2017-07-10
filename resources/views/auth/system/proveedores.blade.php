@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Form proveedores -->
    <div class="row" style="display:none;" id="form-card">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading yellow-main">
                  <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Crear Proveedor
                </div>
                <div class="panel-body">
                        <?php echo $form; ?><br>
                        <div class="form-group">
                            <div class="col-md-4 pull-right">
                                <button type="button" id="btn_save_p" data-action="save" class="btn btn-warning blue-alt">
                                    <i class="fa fa-btn fa-user"></i> Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->
    <div class="row">
      <a  id="add_p" class="btn-floating btn-small blue pull-right"><i class="fa fa-plus"></i></a>
    </div>
    <div class="row" id="content_table_info">
        <table class="table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <th scope="row">1</th>
                  <td>Abby</td>
                  <td>Barrett</td>
                  <td>@abbeme</td>
                  <td>
                      <a class="blue-text"><i class="fa fa-user"></i></a>
                      <a class="teal-text"><i class="fa fa-pencil"></i></a>
                      <a class="red-text"><i class="fa fa-times"></i></a>
                  </td>
              </tr>
              <tr>
                  <th scope="row">2</th>
                  <td>Danny</td>
                  <td>Collins</td>
                  <td>@dennis</td>
                  <td>
                      <a class="blue-text"><i class="fa fa-user"></i></a>
                      <a class="teal-text"><i class="fa fa-pencil"></i></a>
                      <a class="red-text"><i class="fa fa-times"></i></a>
                  </td>
              </tr>
              <tr>
                  <th scope="row">3</th>
                  <td>Clara</td>
                  <td>Ericson</td>
                  <td>@claris</td>
                  <td>
                     <a class="blue-text"><i class="fa fa-user"></i></a>
                      <a class="teal-text"><i class="fa fa-pencil"></i></a>
                      <a class="red-text"><i class="fa fa-times"></i></a>
                  </td>
              </tr>

          </tbody>
      </table>
    </div>
</div>
@endsection
@section('js')
  <script src="/assets/js/proveedores.js"></script>
@endsection
