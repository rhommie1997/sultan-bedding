


$(document).ready(function() {

    var count = $("#totalVarian").val(),count_2 = $("#totalLink").val();

    var varian = "",links = "";

    // $("#totalLink").val();
    // $("#totalVarian").val();

    $("#varianPlus").click(function() {


        count++;
        varian =    "<div class='row' id='varian_"+count+"'>"+
                        "<div class='col'>"+
                            "<label class='form-label'>"+count+". Varian</label>"+
                            "<input type='text' class='form-control' id='varianName_"+count+"' name='varianName_"+count+"' required>"+
                        "</div>"+
                        "<div class='col'>"+
                            "<label  class='form-label'>Harga</label>"+
                            "<input type='number' class='form-control' id='varianHarga_"+count+"' name='varianHarga_"+count+"' required>"+
                        "</div>"+
                        "<div class='col'>"+
                            "<label  class='form-label'>Need Bedcover ?</label>"+
                            "<select class='form-select' name='varianIsBedcover_"+count+"'>"+
                                "<option value='0'>No Bedcover</option>"+
                                "<option value='1'>With Bedcover</option>"+
                            "</select>"+
                        "</div>"+
                        "<div class='col'>"+
                            "<label  class='form-label'>Description</label>"+
                            "<textarea class='form-control' id='varianDescription_"+count+"' name='varianDescription_"+count+"' required></textarea>"+
                        "</div>"+
                    "</div>";
        $("#varianForm").append(varian);


        $("#totalVarian").val(count)

    });

    $("#varianMinus").click(function() {
        if(count>0){
            $("#varian_"+count+"").remove();
            count--;
        }
        
        $("#totalVarian").val(count);
    });

    $("#linkPlus").click(function() {
        
        count_2++;
        links=      "<div class='row' id='link_"+count_2+"'>"+
                        "<div class='col'>"+
                            "<label class='form-label'>"+count_2+". Link</label>"+
                            "<input type='text' class='form-control' id='linkName_"+count_2+"' name='linkName_"+count_2+"' required>"+
                        "</div>"+
                        "<div class='col'>"+
                            "<label  class='form-label'>Link Type</label>"+
                            "<select class='form-select' name='linkType_"+count_2+"'>"+
                                "<option value='Tokopedia'>Tokopedia</option>"+
                                "<option value='Shopee'>Shopee</option>"+
                            "</select>"+
                        "</div>"+
                        "<div class='col'>"+
                            "<label class='form-label'> Link URL</label>"+
                            "<textarea class='form-control' id='linkURL_"+count_2+"' name='linkURL_"+count_2+"' required></textarea>"+
                        "</div>"+
                        "<div class='col'>"+
                            "<label  class='form-label'>Link Description</label>"+
                            "<textarea class='form-control' id='linkDescription_"+count_2+"' name='linkDescription_"+count_2+"' required></textarea>"+
                        "</div>"+
                    "</div>";

        $("#linkForm").append(links);


        $("#totalLink").val(count_2)
            

    });

    $("#linkMinus").click(function() {

        if(count_2>0){
            $("#link_"+count_2+"").remove();
            count_2--;
        }
        
        $("#totalLink").val(count_2);

    });

});