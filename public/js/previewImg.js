function previewImage(){
    
    var img = document.querySelector('#foto');
    var imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display= 'block';

    var oFReader = new FileReader();
    oFReader.readAsDataURL(img.files[0]);

    oFReader.onload = function(OFREvent){
        imgPreview.src = OFREvent.target.result;
    }

}