<!-- <script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<script>
    $(function () {
        //Delete Confirmation
        $(document).on("click",".confirm1",function(event) {
            event.preventDefault();
            let form_id = '';
            let link = '';
            var text='';
            if($(event.target).is('button')){
                form_id = '#form_'+ $(this).attr('id');
                //text=$(this).attr('data-text');
               
            }else if($(event.target).is('span')){
                console.log('span clicked');
                form_id = '#form_'+ $(this).closest('button').attr('id');
            }else if($(event.target).is('svg')){
                form_id = '#form_'+ $(this).closest('button').attr('id');
                console.log('svg clicked');

            }
            else if($(event.target).is('i')){
                form_id = '#form_'+ $(this).closest('button').attr('id');
                 //text=$(this).attr('data-text');

            }else{
                link = $(this).attr('href');
                text=$(this).attr('data-text');
            }
            if(text=='')
            {
                let check = [null , undefined , ""]
                text = (check.includes(event.target.dataset.text) ? "Are you sure? to Delete it" : "Are you sure you want to award the contract") 
                // text="Are you sure? to Delete it.";
            }
            swal({
                    title: text,
                    // text: "You will not be able to recover this record!",
                    type: "warning",
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes!',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    //closeOnCancel: false
                }).then(function(isConfirm) {
                  if (isConfirm.value) {
                    if (link){
                        window.location = link;
                    }
                    if (form_id){
                        $(form_id).submit();
                    }
                  } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                  }
                });
                // function(isConfirm){
                //     alert(isConfirm);
                //     if (link){
                //         window.location = link;
                //     }
                //     alert(form_id);
                //     if (form_id){
                //         swal("Deleted!", "Record has been deleted!", "success");
                //         $(form_id).submit();
                //     }
                // });
        });
    });
</script>
