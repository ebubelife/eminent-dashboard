<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$member_id_segment = $this->uri->segment(3);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Assign Account Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Activation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="card">
		  <div class="card-header">
                <h3 class="card-title">&nbsp;</h3>

       

               
              </div>
		 
            <!-- /.card-header -->
            <div class="card-body">

          
              
            </div>

            


            <div class="row">

          
                 <div class="col-md-12 col-xs-12 text-center ">

               <!--  <i class="fa fa-check" style="font-size:40px; color:#32cd32;"></i>-->

               <h4 style="color:#357ec7"> Search and select an account officer</h4>

             <form id="search1">
             <div class="input-group">
         

                <input type="text" class="form-control" placeholder="Search" id="search1-input" autocomplete="off"  >

                <div class='input-group-btn'>

                <button class="btn btn-default" type="submit" id="search1-submit">
                <i class="fas fa-search"></i>

              
                </button>

                </div>

             </div>
            

              <!--account officers list-->

           <div class="account-managers">
           <ul class="list-group" id="account-manager-list">
            
          
           </ul>



            </div>

         
<br>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
  /*  $(document).ready(function() {
      $("#profileMainNav").addClass('active');
    });*/

 
    var val; var singleResult ="";
    $(document).ready(function(){

        $('#search1-input').on("keyup input", function(){

            /* Get input value on change */
          
             var inputVal = $(this).val();
             if(inputVal.length>0){
            $.get("<?php echo base_url("members/accountManagers/") ?>"+inputVal, {term: inputVal}).done(function(data){
                // Display the returned data in browser
                val = JSON.parse(data);
                singleResult  = "";

               val.forEach(iterate);
             
               document.getElementById("account-manager-list").innerHTML = singleResult;


              //  resultDropdown.html(data);
            });

        }

        if(inputVal.length<1)
        document.getElementById("account-manager-list").innerHTML = "";
        

        });

    });

    function iterate(item, index){
                
          
                 console.log(item);
                 var url_segment = "<?php echo base_url('members/assign_Officer/'.$member_id_segment."/");?>"+item.id;
                 var url = "<a href='"+url_segment+"' class='btn btn-default' style='position:relative; float:right;'><i class='fa fa-check'></i></a> </li> <br>";
                
                 singleResult += "<li class='list-group-item'>" +item.firstname + "  " +item.firstname+"  " +item.lastname + url ;

              
    }

   
  </script>

