<div class="container">
  <center><h4 class="page-title">
          Data Jabatan
      </h4></center>
    
    <div class="mb-3"><?php echo $this->session->flashdata('msg')?></div>    

            </div>
            <div class="container">
            <div class="col-md-12">
          <div class="card">
             <div class="card-body">
           
       <a href="#" class="btn bg-gradient-info mb-3 text-white" id="tambah">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
Tambah Data
</a>
              <table class="table table-striped table-bordered" id="tabeljabatan">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID jabatan</th>
                    <th>Nama jabatan</th>
               <th>gaji</th>
                 
                         
               
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($all_jabatan as $cacah):
                      echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$cacah['id_jabatan']."</td>";
                        echo "<td>".$cacah['nama_jabatan']."</td>";
                        echo "<td  style=text-align:right>Rp.".number_format($cacah['gaji'])."</td>";
                        echo "<td>";
                  ?>
                  <center>
                    <button onclick="location.href = '<?php echo site_url('jabatan/edit_form/'.$cacah['id_jabatan']) ?>';" type="button" class="btn btn-success btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
            		
                    </button></center>
                  <?php
                        echo "</td>";
                      echo "</tr>";
                    endforeach;
                  ?>
                </tbody>
            </table>
            <div class="modal modal-blur fade" id="modaljabatan" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Input jabatan</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="loadforminputjabatan"></div>
            </div>          
            </div>
          </div></div>
        </div></div>
            <script>
              $(document).ready(function() {
                $('#example').DataTable( {
                  "pagingType": "full_numbers"
                } );
              } );
            </script>
              <script>
        $(function(){
            $("#tambah").click(function(){
                $("#modaljabatan").modal("show");
                $("#loadforminputjabatan").load("<?php echo base_url(); ?>jabatan/tambah");
            });
            
            $('#tabeljabatan').DataTable();
        });
    </script>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>        