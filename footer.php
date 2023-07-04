  <!-- Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal header -->
        <div class="modal-header">
          <h5 class="modal-title">Are you sure?</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <p>Do you really want to logout?</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button"  class="btn btn-success"  data-dismiss="modal">No</button>

        <div>
    <button  onclick="redirectToPage()" type="button"  class="btn btn-danger"  data-dismiss="modal">Yes</button>
        </div>
        </div>
        
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
    // JavaScript to show the modal when the button is clicked
    document.getElementById('myButton').addEventListener('click', function() {
      $('#myModal').modal('show');
    });
  </script>
</body>
</html>

<script>
function redirectToPage() {
  window.location.href = "logout.php";
}
</script>