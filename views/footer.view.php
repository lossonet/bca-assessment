</main><!-- /.container -->

<footer class="mt-5 mb-3">
  <p class="text-center">&copy; 2020 - <a href="https://github.com/lossonet/" target="_blank" title="Senior PHP Developer">Ricardo Losso</a></p>
</footer>

<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
  $(document).ready(function(){
      var date_input=$('input[name="expected_date"]');
      date_input.datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true,
          startDate: '+1d',
      });
      
      $("#country").change(function(){
        if ('USA' == $("#country").val()) {
          $("#zipcode").prop('required',true);
        } else {
          $("#zipcode").prop('required',false);
        }
      })
  })
</script>

<script src="assets/js/form-validation.js"></script>
</body>
</html>