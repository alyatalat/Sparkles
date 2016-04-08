/**
 * Created by alyatalat on 2016-04-04.
 */


    $(document).ready(function(){
        $(".delete").click(function(e){
            if(!confirm('Are you sure you want to delete this item?')){
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
