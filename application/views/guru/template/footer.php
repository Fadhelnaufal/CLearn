  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script> -->
  <script src="https://www.jdoodle.com/assets/jdoodle-pym.min.js" type="text/javascript"></script>
  
  <script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/chartjs.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assets/js/soft-ui-dashboard.js?v=1.0.3"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <!-- <script src="<?= base_url() ?>assets/summernote/summernote.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js
"></script>
  <script src="<?= base_url() ?>assets/js/user.js"></script>
  


  </body>

  </html>

  <script>
    $(document).ready(function() {
      $('#add_question').summernote({
        placeholder: 'Masukkan Informasi yang anda ingin sampaikan',
        tabsize: 2,
        height: 500
      });
    });
  </script>

  <script>
    $("#add-quiz").submit(function(event) {

      var amount = $('#jumlah').val();

      for (let i = 0; i <= amount; i++) {

        $('#div-input').append('');
      }
    });
  </script>

  <script>
    function changeAction(CompetenciesID) {

      var action = document.getElementById('formEdit').action + '/' + CompetenciesID;
      document.getElementById('formEdit').action = action;
      console.log(action);
    }
  </script>