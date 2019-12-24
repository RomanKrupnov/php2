function addGoods(id)
{
    jQuery.ajax({
        type: "POST",
        url: "/basket/ajaxAdd?id=" + id,
        success: function(data) {
            jQuery("#basket").html(data);
        }
    });
}