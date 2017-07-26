var __initial = {
  boot:function(){

    $("#descuento").mask("99%",{inverse:false});

    var boot = this;
    boot.tableInfo.fill();

    $('tbody').on('click','.ta_update',function(){
      $('.mdb-select').material_select('destroy');
      let info = $(this).data('info');
        $.each(info,function(key,val){
          let element;
          element = $(boot.form.id).children('div').children('.md-form');
          element.children('#'+key).eq(0).val(val);
          if(element.children('div').children('#'+key).is('select')){
            element.children('option').each(function(){
              if($(this).val() === val){
                $(this).prop('selected',true);
              }
            });
          }
        });
      $('.mdb-select').material_select();
      $(boot.form.btn_submit).data('action','update');
      $(boot.form.btn_submit).data('info',JSON.stringify(info));
      boot.form.open();
      boot.tableInfo.close();
    });

    $('tbody').on('click','.ta_delete',function(){
      let info = $(this).data('info');
      let dta = {
        id : info.id
      }
      swal({
        title: '¿Estas seguro?',
        text: "Esta acción no se puede revertir",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FFB400',
        cancelButtonColor: '#2994B2',
        confirmButtonText: 'Si, eliminarlo.'
      }).then(function () {
        boot.producto.delete(dta,function(r,s){
          switch(s) {
            case 200:
              __initial.form.notice({
                    title:'¡Borrada!',
                    title:'La información del producto ha sido eliminada.',
                    type:'success'
                  });
              boot.tableInfo.fill();
              break;
            case 500:
              console.log(r);
              __initial.form.notice({
                    title:'¡Ups!',
                    title:'Ha ocurrido un problema.',
                    type:'error'
              });
              break;
            default:
              break;
          }
        });
      })
    });

    boot.categoria.get(function(r,s){
      switch(s) {
        case 200:
          $.each(r.data,(i,c)=>{
            console.log($("#categoria_id"));
            $("#categoria_id").append($("<option/>").val(c.id).text(c.nombre));
          });
          break;
        default:
          break;
      }
    });

    boot.proveedor.get(function(r,s){
      switch(s) {
        case 200:
          $.each(r.data,(i,p)=>{
            $("#proveedor_id").append($("<option/>").val(p.id).text(p.nombre));
          });
          break;
        default:
          break;
      }
      $('.mdb-select').material_select();
    });

    $(boot.form.btn_submit).click(function(){
      boot.form.submit();
    });
    $(".close").click(function(){
      __initial.form.close();
      __initial.tableInfo.open();
    });
    $("#add_p").click(function(){
      $(boot.form.btn_submit).data('action','save');
      __initial.form.open();
      __initial.tableInfo.close();
    });

  },
  tableInfo:{
    id:'#content_table_info',
    close:function(){
      $(this.id).hide('slow');
    },
    open:function(){
      $(this.id).show('slow');
    },
    action:function(info){
      let infoObject = JSON.stringify(info);
      let td = `<td>
                <a class="text-blue-alt ta_update" data-info='${infoObject}'><i class="fa fa-pencil"></i></a>
                <a class="red-text ta_delete" data-info='${infoObject}'><i class="fa fa-times"></i></a>
            </td>`;
      return td;
    },
    fill:function(){
      __initial.producto.get(function(r,s){
        switch(s) {
          case 200:
            $('.table tbody').empty();
            r.data.map(function(c){
              var $tdActions,$tr = $("<tr/>");
              $.each(c,function(i,o){
                var $td;
                switch(i) {
                  case 'nombre_table':
                    $td = $("<th/>").addClass('row');
                    console.log(o);
                    var names = o.split(',');
                    var productName = $("<h5/>").append(`<strong>${names[0]}</strong>`);
                    var providerName = $("<p/>").addClass('text-muted').append(`Proveedor: ${names[1]}`);
                    $td.append(productName);
                    $td.append(providerName);
                  break;
                  case 'precio':
                  case 'inventario':
                  case 'descuento':
                      $td = $("<td/>");
                      $td.append(o);
                    break;
                  case 'id':
                      $tdActions = __initial.tableInfo.action(c);
                    console.log($tdActions);
                    break;
                  default:
                    break;
                }
                 $tr.append($td);
              });
              $tr.append($tdActions);
              $('.table tbody').data('info',c).append($tr);
            });
            break;
          case 500:
            console.log(r);
            break;
          default:
            break;
        }
      });
      $('.table tbody').empty();
    }
  },
  form:{
    id:'#frm_productos',
    btn_submit:"#btn_save",
    action:{
      self:function(){
        return JSON.parse($(__initial.form.id).attr('action'))
      },
      update:function(){
        return this.self().update
      },
      save:function(){
        return this.self().save
      },
      delete:function(){
        return this.self().delete
      }
    },
    close:function(){
      $("#form-card").hide('slow');
    },
    open:function(){
      $("#form-card").show('slow');
    },
    data:function(){
      var formData = new FormData();
      formData.append('nombre', $("#nombre").val());
      formData.append('descripcion', $("#descripcion").val());
      formData.append('inventario', $("#inventario").val());
      formData.append('precio', $("#precio").val());
      formData.append('descuento', $("#descuento").val().replace('%',''));
      formData.append('proveedor_id', $("#proveedor_id").val());
      formData.append('categoria_id', $("#categoria_id").val());
      formData.append('imagen', $('input[type=file]')[0].files[0]);
      return formData;
    },
    notice:function(dts){
      PNotify.removeAll();
      swal.close();
      let notify = swal({
        title: dts.title,
        text: dts.text,
        type: dts.type
      });
      return notify;
    },
    load:function(text) {
      new PNotify({
          title: 'Cargando..',
          text: text,
          info:'info'
      });
    },
    submit:function(){
      switch($(this.btn_submit).data('action')){
        case 'save':
          __initial.producto.save(function(r,s){
            switch(s){
              case 200:
                __initial.form.notice({
                  title:'¡Hecho!',
                  title:'La información del producto se ha guardado',
                  type:'success'
                });
                $(__initial.form.id).trigger('reset');
                __initial.tableInfo.fill();
                __initial.form.close();
                __initial.tableInfo.open();
                break;
              case 'P-101':
                PNotify.removeAll();
                $.each(r.data,function(i,m){
                  new PNotify({
                      title: 'Error de validación',
                      text: m
                  });
                });
                break;
              case 500:
                console.error(r);
                break;
            }
          });
          break;
        case 'update':
          let info = JSON.parse($(this.btn_submit).data('info'));
          var dta = __initial.form.data();
          dta.append('id',info.id);
           __initial.producto.update(dta,function(r,s){
            switch(s){
              case 200:
                __initial.form.notice({
                  title:'¡Hecho!',
                  title:'La información del producto se ha actualizado',
                  type:'success'
                });
                $(__initial.form.id).trigger('reset');
                __initial.tableInfo.fill();
                __initial.form.close();
                __initial.tableInfo.open();
                break;
              case 'P-101':
                $.each(r.data,function(i,m){
                  PNotify.removeAll();
                  $.each(r.data,function(i,m){
                    new PNotify({
                        title: 'Error de validación',
                        text: m
                    });
                  });
                });
                break;
              case 500:
                console.error(r);
                break;
            }
          });

        break;
      }

    }
  },
  producto:{
    object:{
      name:'producto'
    },
    get:function(cbk){
      let object = this;
      $.ajax({
        url:'productos/all',
        method:'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType:'JSON'
      }).done(function(response){
        cbk(response,response.status);
      }).fail(function(error){
        cbk(error,500);
      });
    },
    save:function(cbk){
      $.ajax({
        url:__initial.form.action.save(),
        method:'POST',
        dataType:'JSON',
        contentType: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:__initial.form.data(),
        beforeSend:function(xhr){
          __initial.form.load(`Se esta guardando la ${__initial.producto.object.name}`);
        },
        cache : false,
        processData: false
      }).done(function(response){
        cbk(response,response.status);
      }).fail(function(error){
        cbk(error,500);
      });
    },
    update:function(dta,cbk){
      $.ajax({
        url:__initial.form.action.update(),
        method:'POST',
        dataType:'JSON',
        contentType: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:dta,
        beforeSend:function(xhr){
          __initial.form.load(`Se esta actualizando la información de la ${__initial.producto.object.name}`);
        },
        cache : false,
        processData: false
      }).done(function(response){
        cbk(response,response.status);
      }).fail(function(error){
        cbk(error,500);
      });
    },
    delete:function(dta,cbk){
      $.ajax({
        url:__initial.form.action.delete(),
        method:'POST',
        dataType:'JSON',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:dta,
        beforeSend:function(xhr){
          __initial.form.load(`Se esta eliminando la ${__initial.producto.object.name}`);
        }
      }).done(function(response){
        cbk(response,response.status);
      }).fail(function(error){
        cbk(error,500);
      });
    }
  },
  proveedor:{
    get:function(cbk){
      let object = this;
      $.ajax({
        url:'proveedores/all',
        method:'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType:'JSON'
      }).done(function(response){
        cbk(response,response.status);
      }).fail(function(error){
        cbk(error,500);
      });
    }
  },
  categoria:{
    get:function(cbk){
      let object = this;
      $.ajax({
        url:'categorias/all',
        method:'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType:'JSON'
      }).done(function(response){
        cbk(response,response.status);
      }).fail(function(error){
        cbk(error,500);
      });
    }
  }
}
$(__initial.boot());
