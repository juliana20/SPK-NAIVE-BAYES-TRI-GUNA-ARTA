<form  method="POST" action="{{ url($submit_url) }}" class="form-horizontal" name="form_crud">
  {{ csrf_field() }}
  <div class="form-group">
    <label class="col-lg-3 control-label">Kode Kriteria *</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="f[kode_kriteria]" id="kode_kriteria" value="{{ @$item->kode_kriteria }}" placeholder="Kode Kriteria" required="" readonly>
    </div>
  </div>
  <div class="form-group">
      <label class="col-lg-3 control-label">Nama Kriteria *</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" name="f[nama_kriteria]" id="nama_kriteria" value="{{ @$item->nama_kriteria }}" placeholder="Nama Kriteria" required="">
      </div>
  </div>
  <div class="form-group">
      <div class="col-lg-offset-3 col-lg-9">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button id="submit_form" type="submit" class="btn btn-success btn-save">@if($is_edit) Perbarui @else Simpan @endif <i class="fas fa-spinner fa-spin spinner" style="display: none"></i></button> 
      </div>
  </div>
</form>
      

<script type="text/javascript">
  $('form[name="form_crud"]').on('submit',function(e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
            url: $(this).prop('action'),
            type: 'POST',              
            data: formData,
            contentType : false,
            processData : false,
            success: function(response, status, xhr)
            {
                if( response.success == false){
                    $.alert_error(response.message);
                    return false
                }
                $.alert_success(response.message);
                setTimeout(function(){
                  document.location.href = "{{ url("$nameroutes") }}";
                }, 500);  
            }
    });
  });
</script>