<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Master</li>
    </ul>
  </div>
</div>
<section>
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
          <h1 class="h3 display"><?= lang('Form.master_groupuser')?> </h1>
      </tr>
    </header>
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class = "row">
              <div class="col-6">
                <h4><?= lang('Form.data')?></h4>
              </div>
              <div class="col-6 text-right">
                <a href="<?= baseUrl('mgroupuser/add')?>"><i class = "fa fa-plus"></i> Tambah</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id = "tableGroupUser" style="width: 100%;" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed " role="grid">
                <thead class=" text-primary">
                  <tr role = "row">
                    <!-- <th># </th> -->
                    <th><?=  lang('Form.name')?></th>
                    <th><?=  lang('Form.description')?></th>
                    <th><?=  lang('Form.createat')?></th>
                    <th class="disabled-sorting text-right"><?=  lang('Form.actions')?></th>
                  </tr>
                </thead>
                <tfoot class=" text-primary">
                  <tr role = "row">
                    <!-- <th># </th> -->
                    <th><?=  lang('Form.name')?></th>
                    <th><?=  lang('Form.description')?></th>
                    <th><?=  lang('Form.createat')?></th>
                    <th class="disabled-sorting text-right"><?=  lang('Form.actions')?></th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                  foreach ($model as $value)
                  {
                ?>
                    <tr role = "row" id = <?= $value->Id?>>
                      <td><a href= "<?= baseUrl('mgroupuser/edit/'.$value->Id);?>" class = "text-muted"><?= $value->GroupName?></a></td>
                      <td><?= $value->Description?></td>
                      <td><?= $value->Created?></td>
                      <td class = "td-actions text-right">
                        <a href="#" rel="tooltip" title="<?=  lang('Form.role')?>" class="btn-just-icon link-action role"><i class="fa fa-user"></i></a>
                        <a href="#" rel="tooltip" title="<?=  lang('Form.reportrole')?>" class="btn-just-icon link-action reportrole"><i class="fa fa-list"></i></a>
                        <a href="#" rel="tooltip" title="<?=  lang('Form.delete')?>" class="btn-just-icon link-action delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                <?php
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<script>

  $(document).ready(function() {   
    
    init();
    dataTable();
  });

  function dataTable(){
    var table = $('#tableGroupUser').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      "order" : [[2, "desc"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      "search": "<?= lang('Form.search')?>"+" : "
      },
      "columnDefs": [ 
        {
          targets: 'disabled-sorting', 
          orderable: false
        }
      ],
      columns: [
        { responsivePriority: 1 },
        { responsivePriority: 3 },
        { responsivePriority: 4 },
        { responsivePriority: 2 }
      ],
    }); 

     // Delete a record
     table.on( 'click', '.delete', function (e) {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        var id = $tr.attr('id')
        deleteData(data[0], function(result){
          if (result==true)
          {
            
            $.ajax({
              type : "POST",
              url : "<?= baseUrl('mgroupuser/delete/');?>",
              data : {id : id},
              success : function(data){
                console.log(data);
                // var status = $.parseJSON(data);
                // if(status['isforbidden']){
                //   window.location = "<?= baseUrl('Forbidden');?>";
                // } else {
                //   if(!status['status']){
                //     for(var i=0 ; i< status['msg'].length; i++){
                //       var message = status['msg'][i];
                //       setNotification(message, 3, "bottom", "right");
                //     }
                //   } else {
                //     for(var i=0 ; i< status['msg'].length; i++){
                //       var message = status['msg'][i];
                //       setNotification(message, 2, "bottom", "right");
                //     }
                //     table.row($tr).remove().draw();
                //     e.preventDefault();
                //   }
                // }
              }
            });
          }
        });
     });

    //Like record
    table.on( 'click', '.role', function () {
        $tr = $(this).closest('tr');
        var id = $tr.attr('id');
        window.location = "<?= baseUrl('mgroupuser/editrole/');?>" + id;
    });

    table.on( 'click', '.reportrole', function () {
        $tr = $(this).closest('tr');
        var id = $tr.attr('id');
        window.location = "<?= baseUrl('mgroupuser/editreportrole/');?>" + id;
    });
  }

  function init(){
    
  }
</script>
      