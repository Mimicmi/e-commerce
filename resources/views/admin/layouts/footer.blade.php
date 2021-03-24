<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
        <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
      </span>
    </div>
  </div>
</footer>

<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('admin/js/ruang-admin.min.js')}}"></script>
<script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>  
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
// <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
<script>
$(document).ready(function() {
  $('#summernote1').summernote();
});
</script>
<script>
function confirmDelete() {
  return confirm ('Are you sure you want to delete this category ?')
}

function confirmDeleteSub() {
  return confirm ('Are you sure you want to delete this subcategory ?')
}

function confirmDeleteProd() {
  return confirm ('Are you sure you want to delete this product ?')
}
</script>
<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); 
      $('#dataTableHover').DataTable();
    });
  </script>