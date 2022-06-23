$(document).ready(function() {
    $("#nama").change(function() {

      var title = $("#nama").val();
      var arrTitle = title.split(" ");
      var slug="";

      for(var i=0;i<arrTitle.length;i++){
        if(i>0){
          slug = slug+"-"+arrTitle[i];
        }else{
          slug = arrTitle[i];
        }
      }
      
      
      slug = slug.toLowerCase();

      var specialChars = "!@#$^&%*()+=;`~[]\/{}|:<>?,.";

      for (var i = 0; i < specialChars.length; i++) {
        slug = slug.replace(new RegExp("\\" + specialChars[i], "gi"), '')
      }

      $("#slug").val(slug);
    });
  });

  document.addEventListener('trix-file-accept',function(e){
    e.preventDefault();
  })