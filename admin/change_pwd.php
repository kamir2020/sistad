<div class="row layout-spacing">
<div class="col-lg-12">
		<div class="statbox widget box box-shadow">
		<div class="widget-header">
        
		<div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
        <h4>TUKAR KATALALUAN BARU</h4>
        </div>
        </div>


		<form class="needs-validation" novalidate action="index.php?core=change_pwd1" method="post">
						
		<div class="col-sm-6">
        <div class="form-group">
        <label for="fullName">Katalaluan Baru</label>
		<input type="password" class="form-control" id="password" name="password"  required>
		<div class="valid-feedback">Ok</div>
		<div class="invalid-feedback">
		Masukkan katalaluan yang baru
		</div>
        </div>
        </div>

		<div class="col-sm-6">
        <div class="form-group">
        <button class="btn btn-primary submit-fn mt-2" name="submit" type="submit">Simpan</button>
        </div>
        </div>
					
		</form>

		</div>
        </div>
</div>
</div>

<script>
window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
}, false);
</script>