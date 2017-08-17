
var __initial = {
  boot:function(){
    let boot = this;
    let producto = boot.producto;
    let categoria = boot.categoria;
    let proveedor = boot.proveedor;

    $("#max-price,#min-price").change(function(){
      $('#'+$(this).attr('id')+'-l').find('span').eq(0).text($(this).val());
      var uri;
      let id = $(this).data('id');
      if($(this).data('self') == "category"){uri='/productos-categoria-'+id;}else{uri='/productos-marca-'+id;}
      producto.object().taskAsync({
        uri:uri,
        method:'POST',
        dataType:'JSON',
        data:{
          min: $("#min-price").val(),
          max: $("#max-price").val()
        }
      }).done(function(r){
        console.log(r);
        switch(r.status) {
          case 200:
            let section = $("<section/>").addClass("section pb-3 animated bounce");
            var countP = 0;
            var row = $('<div/>').addClass('row');
            $.each(r.data,function(i,p){
                countP++;
                row.append(producto.layouts.finded(p));
                if(r.data.length == countP){
                  section.append(row);
                }
            });
            /* Initial  tooltips */
            $('body').find('.tooltips').tooltip();
            let container = $("#productos").children('.jumbotron').eq(1).children('div').eq(1);
            container.empty();
            if(r.data.length == 0){container.append("Sin resultados");}
            container.append(section);
            break;
          default:
            break;
        }
      }).fail(function(e){

      });
    });
    $(".close-sc").click(function(e){
      e.preventDefault();
      boot.layout.finded.hide();
      boot.layout.main.show();

    });
    $("body").on('click','.addCart',function(){
      console.log($(this).data('info'));
      producto.addCart($(this));
    });
    $("#btn_remove_item").click(function(){
      boot.producto.removeCart($(this).data('id'));
    });
    $("#countAdd,#countSubstract").click(function(){
      let id = $(this).parent().data('id');
      console.log(id)
      var cantidad;
      console.log($(this).attr('id'));
      switch($(this).attr('id')) {
        case "countAdd":
          cantidad = parseFloat($("#qty_"+id).text()) + 1;
          break;
        default:
          cantidad = parseFloat($("#qty_"+id).text()) - 1;
          break;
      }
      $(`#qty_${id}`).text(cantidad);
      boot.producto.updateCart.count(id,cantidad);
    })
    $("#form-autocomplete").keyup(function(e){
      if(e.keyCode == 13){
        let nombre = $(this).val();
        let objRequest = {method:'POST', nombre:nombre};
        let limit = 4;
        boot.layout.main.hide();
        boot.layout.finded.show();
        producto.object().name = "producto";
        producto.object().findByName(objRequest,function(r,s){
              console.log(r);
              switch(s) {
                case 200:
                  let section = $("<section/>").addClass("section pb-3 animated bounce");
                  var countP = 0;
                  var row = $('<div/>').addClass('row');
                  $.each(r.data,function(i,p){
                      countP++;
                      row.append(producto.layouts.finded(p));
                      if(r.data.length == countP){
                        section.append(row);
                      }
                  });
                  /* Initial  tooltips */
                  $('body').find('.tooltips').tooltip();
                  $(".body_products .jumbotron").empty();
                  if(r.data.length == 0){$(".body_products .jumbotron").append("Sin resultados");}
                  $(".body_products .jumbotron").append(section);
                  break;
                default:
                  break;
              }
          });
        categoria.object().name = "categoria";
        categoria.object().findByName(objRequest,function(r,s){
          switch(s) {
              case 200:
                let section = $("<section/>").addClass("section pb-3 wow bounce");
                  var countP = 0;
                  var row = $('<div/>').addClass('row');
                  $.each(r.data,function(i,p){
                    countP++;
                      row.append(categoria.layouts.finded(p));
                      if(r.data.length == countP){
                        section.append(row);
                      }
                  });
                  /* Initial  tooltips */
                  $('body').find('.tooltips').tooltip();
                  $(".body_category .jumbotron").empty();
                  if(r.data.length == 0){$(".body_category .jumbotron").append("Sin resultados");}
                  $(".body_category .jumbotron").append(section);
                break;
              default:
                break;
          }
        });
        proveedor.object().name = "proveedore";
        proveedor.object().findByName(objRequest,function(r,s){
            switch(s) {
              case 200:
                let section = $("<section/>").addClass("section pb-3 wow bounce");
                  var countP = 0;
                  var row = $('<div/>').addClass('row');
                  $.each(r.data,function(i,p){
                    countP++;
                      row.append(proveedor.layouts.finded(p));
                      if(countP == r.data.length){
                        section.append(row);
                      }
                  });
                  $(".body_provider .jumbotron").empty();
                  /* Initial  tooltips */
                  $('body').find('.tooltips').tooltip();
                  if(r.data.length == 0){$(".body_provider .jumbotron").append("Sin resultados");}
                  $(".body_provider .jumbotron").append(section);
                break;
              default:
                break;
            }
        });
      }
    });
  },
  producto:{
    object:function(){
        return __initial.object;
    },
    layouts:{
      finded:function(dta){
        let discountApplied = parseFloat(dta.precio*((100-dta.descuento)*.01)).toFixed(2);
        let shortDescription = dta.descripcion.substr(0,100);
        let container = `<!--Card-->
            <div class="card col-md-3 col-sm-5 col-xs-12 hoverable card-finded card-body-l" data-info='${JSON.stringify(dta)}' >

                <!--Card image-->
                <div class="view overlay hm-black-slight z-depth-1">
                    <img src="${dta.imagen}" class="img-fluid" style="height:100%;" alt="Imagen del producto ${dta.nombre}">
                    <a>
                        <div class="mask"></div>
                    </a>
                </div>
                <!--Card image-->

                <!--Card content-->
                <div class="card-body text-center no-padding elegant-color">
                    <!--Category & Title-->
                    <a href="" class="text-muted"><h5>${dta.nombreCategoria}</h5></a>
                    <h4 class="card-title black"><strong><a href="">${dta.nombre}</a></strong></h4>

                    <!--Description-->
                    <p class="card-text">${(dta.descripcion)?shortDescription+"...":"Sin descripción"}
                    </p>

                    <!--Card footer-->
                    <div class="card-footer">
                        <span class="left">
                            <div class="row">
                              <span class="${(dta.descuento > 0)?"":"hide"}">$${discountApplied}
                                    <span class="discount"> $${dta.precio}</span>
                              </span>
                              <span class="${(dta.descuento > 0)?"hide":""}"> $${dta.precio}</span>
                            </div>
                        </span>
                        <span class="right">
                          <div class="row">
                            <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Vista rápida"><i class="fa fa-eye" data-info='${JSON.stringify(dta)}' ></i></a>
                            <a data-toggle="tooltip" data-placement="top" data-info='${JSON.stringify(dta)}' class="tooltips addCart" title="Agregar al carrito"><span class="fa fa-shopping-cart"></span></a>
                          </div>
                        </span>
                    </div>

                </div>
                <!--Card content-->

            </div>
            <!--Card-->`;
        return container;
      }
    },
    addCart:function(p){
      console.log(p.data('info'));
      let producto = this;
      producto.object().taskAsync({
        uri:'/mi-carrito/save',
        method:'POST',
        dataType:'JSON',
        data:p.data('info')
      }).done(function(r){
        switch(r.status) {
          case 200:
            console.log(r.data);
            swal({
              title: "Producto agregado.",
              text: "El productos ha sido agregado al carrito.",
              type: "success"
            });
            break;
          default:
            break;
        }
      }).fail(function(e){
        console.error(e);
      });
    },
    updateCart:{
      count:function(id,c){
        __initial.producto.object().taskAsync({
          uri:'/mi-carrito/update',
          method:'POST',
          dataType:'JSON',
          data:{count:c,id:id}
        }).done(function(r){
          switch(r.status) {
            case 200:
              let mainRow = $(`#tr_${id}`);
              mainRow.data('count',c);
              mainRow.children('td').eq(3).text('$'+(c*mainRow.data('precio')));
              $("#total_neto").text('$'+__initial.producto.total_neto());
              break;
            default:
              break;
          }
        }).fail(function(e){
          console.error(e);
        });
      }
    },
    removeCart:function(id){
      let producto = this;
        producto.object().taskAsync({
          uri:'/mi-carrito/remove',
          method:'POST',
          dataType:'JSON',
          data:{id:id}
        }).done(function(r){
          switch(r.status) {
            case 200:
              $(".product-table").children("tbody").children('tr').each(function(){
                if($(this).data('id') == id){
                  $(this).remove();
                }
              });
              $("#total_neto").text('$'+__initial.producto.total_neto());
              break;
            default:
              break;
          }
        }).fail(function(e){
          console.error(e);
        });
    },
    total_neto:function(){
      var total_neto = 0;
      $(".product-table").children("tbody").children('tr').each(function(){
        console.log($(this).data('id'));
        if($(this).data('id') !== undefined)
          total_neto = total_neto + parseFloat($(this).data('count'))*parseFloat($(this).data('precio'));
      });
      return total_neto;
    }

  },
  categoria:{
    object:function(){
      return __initial.object
    },
    layouts:{
      finded:function(dta){
        let container = `<!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-r card-finded card-body-l" data-info=${JSON.stringify(dta)}>

            <!--Collection card-->
            <div class="card collection-card z-depth-1-half">
                <!--Card image-->
                <div class="view  hm-zoom">
                    <img src="http://cdn2.actitudfem.com/media/files/images/2014/11/notajoyas.jpg" class="img-fluid" alt="">
                    <div class="stripe light">
                        <a href="/productos-categoria-${dta.nombre.trim()}-${dta.id}">
                            <p>${dta.nombre} <i class="fa fa-chevron-right"></i></p>
                        </a>
                    </div>
                </div>
                <!--Card image-->
            </div>
            <!--Collection card-->

        </div>
        <!--Grid column-->`;
        return container;
      }
    }
  },
  proveedor:{
    object:function(){
      return __initial.object
    },
    layouts:{
      finded:function(dta){
        let container = `<!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-r card-finded card-body-l" data-info=${JSON.stringify(dta)}>

            <!--Collection card-->
            <a href="/productos-marca-${dta.nombre.trim()}-${dta.id}"><div class="card collection-card z-depth-1-half">
                <!--Card image-->
                <div class="view  hm-zoom">
                    <img src="${dta.imagen_contacto}" class="img-fluid" alt="">
                    <div class="stripe light">
                        <a>
                            <p>${dta.nombre} <i class="fa fa-chevron-right"></i></p>
                        </a>
                    </div>
                </div>
                <!--Card image-->
            </div></a>
            <!--Collection card-->

        </div>
        <!--Grid column-->`;
        return container;
      }
    }
  },
  object:{
    name:this.name,
    collection:function(){
      return `${__initial.object.name}s`;
    },
    findByName:function(_jsonObject,_fnCallback){
      let _uri = `/${this.collection()}/findByName/${_jsonObject.nombre}`;
      $.ajax({
        url:_uri,
        method:_jsonObject.method,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType:'JSON'
      }).done(function(response){
        _fnCallback(response,200);
      }).fail(function(error){
        _fnCallback(error,500)
      });
    },
    taskAsync:function(_jsonObject,_fnCallback){
      var task = $.ajax({
        url:_jsonObject.uri,
        method:_jsonObject.method,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType:_jsonObject.dataType,
        data:(_jsonObject.data !== undefined) ? _jsonObject.data : {}
      });
      if(typeof _fnCallback === 'function'){
        task.done(function(response){
          _fnCallback(response,200);
        }).fail(function(error){
          _fnCallback(error,500);
        });
        return;
      }
      return task;
    }
  },
  layout:{
    main:{
      id:'.main',
      hide:function(){
        $(this.id).hide('slow');
      },
      show:function(){
        $(this.id).show('slow');
      },
    },
    finded:{
      id:'.finded',
      hide:function(){
        $(this.id).hide('slow');
      },
      show:function(){
        $(this.id).show('slow');
      },
    }
  }
}
$(__initial.boot());






