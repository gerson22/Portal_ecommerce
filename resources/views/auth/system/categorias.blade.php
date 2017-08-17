@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Form proveedores -->
    <div class="row" style="display:none;" id="form-card">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color">
                  <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Crear categoria
                </div>
                <div class="card-body">
                        <?php echo $form; ?><br>
                        <div class="form-group">
                            <div class="col-md-5 pull-right">
                                <button type="button" id="btn_save" data-action="save" class="btn elegant-color">
                                    Guardar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
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
        <div class="col-md-12">
          <h2>Categorias</h2>
        </div>
        <div class="row">
          <a  id="add_p" class="btn-floating btn-small elegant-color-dark  pull-right tooltips" data-toggle="tooltip" data-placement="right" title="Agregar nueva categoria"><i class="fa fa-plus"></i></a>
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
