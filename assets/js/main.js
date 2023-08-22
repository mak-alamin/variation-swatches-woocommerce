(function($){
    var colorOptions = $("#pa_color option");

    var colorSwatches = '<div class="color-swatches">';
    $.each(colorOptions, function(i, option){
        var colorName = $(option).val();

        if(colorName != ''){
            colorSwatches += '<button title="'+colorName+'" value="'+colorName+'"  class="color-swatch" style="background:'+colorName+'"> </button>';
        }
    });

    colorSwatches += '</div>';

    $("#pa_color").closest("td.value").append(colorSwatches);


    $(document).on("click", ".color-swatches button", function(e){
        e.preventDefault();

        $(".color-swatches button").removeClass("active");
        $(this).addClass("active");

        $("#pa_color").val($(this).val()).trigger('change');
    });

    $(document).on("click", "a.reset_variations", function(){
        $(".color-swatches button").removeClass("active");
        $("#pa_color").val('');
    });
})(jQuery)