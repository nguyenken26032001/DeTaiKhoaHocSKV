function handleFileSelect(){
    var file = document.getElementById("file-input").files;
    if (file.length > 0) {
      var fileReader = new FileReader();
  
      fileReader.onload = function (event) {
        document.getElementById("img-admin").setAttribute("src", event.target.result);
      };
      fileReader.readAsDataURL(file[0]);
    }

}
