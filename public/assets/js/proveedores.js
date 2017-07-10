var __initial = {
  boot:function(){
    var boot = this;
    $(boot.form.btn_submit).click(function(){
      boot.form.submit();
    });
    $(".close").click(function(){
      __initial.form.close();
      __initial.tableInfo.open();
    });
    $("#add_p").click(function(){
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
    }
  },
  form:{
    id:'#frm_proveedores',
    btn_submit:"#btn_save_p",
    action:{
      self:function(){
        return JSON.parse($(__initial.form.id).attr('action'))
      },
      update:function(){
        return this.self().update
      },
      save:function(){
        return this.self().save
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
      formData.append('name', $("#name").val());
      formData.append('email', $("#email").val());
      formData.append('password', $("#password").val());
      formData.append('password_confirmation', $("#password_confirmation").val());
      // Attach file
      formData.append('imagen_contacto', $('input[type=file]')[0].files[0]);
      return formData;
    },
    notice:function(){
      let notify = new PNotify({
            text: "Espere por favor",
            type: 'info',
            icon: 'fa fa-spinner fa-spin',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            shadow: false,
            width: "170px"
      });
      return notify;
    },
    load:function() {
        PNotify.removeAll();
        var percent = 0;
        var ntfy = __initial.form.notice();
        setTimeout(function() {
            ntfy.update({
                title: false
            });
            var interval = setInterval(function() {
                percent += 2;
                var options = {
                    text: percent + "% complete."
                };
                if (percent == 80) options.title = "Casí listo";
                if (percent >= 98) {
                    window.clearInterval(interval);
                }
                ntfy.update(options);
            }, 120);
        }, 2000);
    },
    submit:function(){
      switch($(this.btn_submit).data('action')){
        case 'save':
          __initial.proveedor.save(function(r,s){
            switch(s){
              case 200:
                var options = {
                    text: "100% completado."
                };
                options.title = r.message;
                options.type = "success";
                options.hide = true;
                options.buttons = {
                    closer: true,
                    sticker: true
                };
                options.icon = 'fa fa-check';
                options.shadow = true;
                options.width = PNotify.prototype.options.width;
                PNotify.removeAll();
                __initial.form.notice().update(options);
                $(__initial.form.id).trigger('reset');
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
      }

    }
  },
  proveedor:{
    get:function(cbk){
      let object = this;
      $.ajax({
        url:'proveedores/all',
        method:'POST',
        dataType:'JSON'
      }).done(function(response){
        cbk(response,200);
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
          __initial.form.load();
        },
        cache : false,
        processData: false
      }).done(function(response){
        cbk(response,response.status);
      }).fail(function(error){
        cbk(error,500);
      });
    }
  }
}
$(__initial.boot());
