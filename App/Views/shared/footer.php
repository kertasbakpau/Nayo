        <footer class="main-footer">    
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                  <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-3">
                  <p>Periode : <?= "period"?></p>
                </div>
                <div class="col-sm-3">
                  <p>Database : </p>
                </div>
                <div class="col-sm-3 text-right">
                  <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                </div>
            </div>
            </div>
        </footer>
    </div>
    <!-- <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/jquery/jquery.min.js');?>"></script> -->
    <script src="<?= baseUrl('assets/js/popper.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/bootstrap-select.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/bootstrap-datepicker.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/bootstrap-datepicker.id.min.js');?>"></script>
    <!-- <script src="<?= baseUrl('assets/bootstrapdashboard/js/file/custom-file-input.js');?>"></script> -->
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/popper.js/umd/popper.min.js');?>"> </script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/js/grasp_mobile_progress_circle-1.0.0.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/jquery.cookie/jquery.cookie.js');?>"> </script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/chart.js/Chart.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/jquery-validation/jquery.validate.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/moment.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/jquery.dataTables.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/bootstrap-notify.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/bootbox.min.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/jquery.mask.js');?>"></script>
    <script src="<?= baseUrl('assets/bootstrapdashboard/vendor/bootstrap/js/plugins/jasny-bootstrap.min.js');?>"></script>
    <!-- Main File-->
    <script src="<?= baseUrl('assets/bootstrapdashboard/js/front.js');?>"></script>
</body>
</html>
<script>
  $('.datepicker').datepicker({
    language: 'id'
  });

  // $(function () {
  //   $('[data-toggle="popover"]').popover()
  // });

  $('.popover-dismiss').popover({
    trigger: 'focus'
  })

  
  $('.yearperiod').datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
  });
</script>
<script type = "text/javascript">
        $(document).ready(function(e){
          
        })

        function setNotification(message, title, position, align){

          if(title == 1){
            var titlestr = "WRNING";
            var type = "warning";
          }
          else if(title == 2){
            var titlestr = "SUCCESS";
            var type = "success";
          }
          else if(title == 3){
            var titlestr = "DANGER";
            var type = "danger";
          }
          else{
            var titlestr = "INFO";
            var type = "info";
          }

          $.notify({
            // options
            // icon: 'glyphicon glyphicon-warning-sign',
            title: titlestr + " : ",//'Bootstrap notify',
            message: message //'Turning standard Bootstrap alerts into "notify" like notifications',
            //url: 'https://github.com/mouse0270/bootstrap-notify',
            //target: '_blank'
          },{
            // settings
            element: 'body',
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
              from: position,
              align: align
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            url_target: '_blank',
            mouse_over: 'pause',
            animate: {
              enter: 'animated fadeInRight',
              exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
              '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
              '<span data-notify="icon"></span> ' +
              '<span data-notify="title"><b>{1}</b></span> ' +
              '<span data-notify="message">{2}</span>' +
              '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
              '</div>' +
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>' 
          });
        }

        function deleteData(name, callback){
          bootbox.confirm({
          //title: "Destroy planet?",
          message: "AAA " + name + " ?",
            buttons: {
                cancel: {
                    label: "CANCEL"
                },
                confirm: {
                    label: "CONFIRM"
                }
            },
            callback: function (result) {
              callback(result);
            }
          });
        }

        function makeAlert(message, size = ""){
          bootbox.alert({
            message: message,
            backdrop: true,
            size: size
          });
        }
      </script>
      <script>

      $('.transnumberformat').inputmask({
        mask: 'aaa/{YYYY}{MM}/9'
      });

      $('.itemdimention').inputmask({
        mask: '99 x 99 x 99'
      });


      // $(document).ready(function() {
      //   $('.date').mask('00/00/0000');
      //   $('.time').mask('00:00:00');
      //   $('.date_time').mask('00/00/0000 00:00:00');
      //   $('.cep').mask('00000-000');
      //   $('.membernumformat').mask('AAA/{YYYY}{MM}/0', {placeholder: "AAA/{YY}{MM}/0"});
      //   $('.submissionnumformat').mask('AAA/{YYYY}{MM}/0', {placeholder: "AAA/{YY}{MM}/0"});
      //   $('.phone').mask('0000-0000');
      //   $('.phone_with_ddd').mask('(00) 0000-0000');
      //   $('.phone_us').mask('(000) 000-0000');
      //   $('.mixed').mask('AAA 000-S0S');
      //   $('.cpf').mask('000.000.000-00', {reverse: true});
      //   $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
      $('.money').mask('000.000.000.000.000,00', {reverse: true});
      $('.money2').mask("#.##0,00", {reverse: true});
      //   $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      //     translation: {
      //       'Z': {
      //         pattern: /[0-9]/, optional: true
      //       }
      //     }
      //   });
      //   $('.ip_address').mask('099.099.099.099');
      $('.percent').mask('##0,00 %', {reverse: true});
      //   $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
      //   $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
      //   $('.fallback').mask("00r00r0000", {
      //       translation: {
      //         'r': {
      //           pattern: /[\/]/,
      //           fallback: '/'
      //         },
      //         placeholder: "__/__/____"
      //       }
      //     });
      //   $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
      // });
      </script>
      <script>
        function init(){
          <?php 
              if($this->session->isFlashExist('success_msg'))
              {
                  $msg = $this->session->getFlash('success_msg');
                  for($i=0 ; $i<count($msg); $i++)
                  {
          ?>
                      setNotification("<?= lang($msg[$i]); ?>", 2, "bottom", "right");
          <?php 
                  }
              }

          ?>
          <?php 
              if($this->session->isFlashExist('add_warning_msg'))
              {
                  $msg = $this->session->getFlash('add_warning_msg');
                  for($i=0 ; $i<count($msg); $i++)
                  {
          ?>
                      setNotification("<?= lang($msg[$i]); ?>", 3, "bottom", "right");
          <?php 
                  }
              }
          
              if($this->session->isFlashExist('edit_warning_msg'))
              {
                  $msg = $this->session->getFlash('edit_warning_msg');
                  for($i=0 ; $i<count($msg); $i++)
                  {
          ?>
              setNotification("<?= lang($msg[$i]); ?>", 2, "bottom", "right");
          <?php 
                  }
              }

          ?>
        }
      
      </script>

      