(function ($) {
  var colorOptions = $("#pa_color option");

  $("#pa_color")
    .closest("td.value")
    .append('<div class="color-swatches"></div>');

  $.each(colorOptions, function (i, option) {
    var colorName = $(option).val();

    var colorSwatchBtn;

    if (colorName != "") {
      jQuery.ajax({
        method: "GET",
        url: WPWooVsData.ajaxurl,
        data: {
          action: "get_swatches_color_code",
          color_name: colorName,
        },
        success: function (res) {
          console.log(res);
          let colorCode = (res == '') ? colorName : res;

          colorSwatchBtn =
            '<button title="' +
            colorName +
            '" value="' +
            colorName +
            '"  class="color-swatch" style="background:' +
            colorCode +
            '"> </button>';

          $(".color-swatches").append(colorSwatchBtn);
        },
        error: function (err) {
          console.log(err);
        },
      });
    }
  });

  $(document).on("click", ".color-swatches button", function (e) {
    e.preventDefault();

    $(".color-swatches button").removeClass("active");
    $(this).addClass("active");

    $("#pa_color").val($(this).val()).trigger("change");
  });

  $(document).on("click", "a.reset_variations", function () {
    $(".color-swatches button").removeClass("active");
    $("#pa_color").val("");
  });
})(jQuery);
