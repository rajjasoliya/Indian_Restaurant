<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing</title>
</head>
<body>
<div id="ajax_manu"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {

    const loadManu = (page) => {
                     $.ajax({
                         url:"ajax_load.php",
                         type:"post",
                         data:{page:page},
                         success:function(data) {
                            //  alert(data);
                            if(data){
                                $(".load_more").remove();
                             $("#ajax_manu").append(data);
                         }else{
                             $(".load_more").prop("disabled",true);
                         }
                        }
                     });
                 }
                 loadManu();
                 $(document).on("click",".load_more",function(e) {
                     e.preventDefault();
                     var page = $(this).attr("id");
                     loadManu(page);
                 })
            });
    </script>
</body>
</html>