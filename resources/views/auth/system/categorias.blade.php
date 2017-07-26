@extends('layouts.admin')

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
                  Crear categoria
                </div>
                <div class="panel-body">
                        <?php echo $form; ?><br>
                        <div class="form-group">
                            <div class="col-md-4 pull-right">
                                <button type="button" id="btn_save" data-action="save" class="btn btn-warning blue-alt">
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
    <div class="row" id="content_table_info">
        <div class="row">
          <a  id="add_p" class="btn-floating btn-small elegant-color-dark  pull-right"><i class="fa fa-plus"></i></a>
        </div>
        <table class="table table-hover">
          <thead class="thead-inverse">
              <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>

          </tbody>
      </table>
    </div>
</div>
@endsection
@section('js')
  <script src="/assets/js/categorias.js"></script>
@endsection
