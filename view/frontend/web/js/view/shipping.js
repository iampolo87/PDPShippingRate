define(["jquery"], function (e) {
    "use strict";
    let s = e("#btn-estimate-shipping"),
        i = e("#pdpshippingrate_product_id").val();
    s.on("click", function () {
        let s = e(".improntus-pdpshippingrate").find("#shipping-estimate-results"),
            t = e("#pdpshippingrate-postcode"),
            n = t.val();
        s.slideUp(),
            void 0 !== n && "" != n
                ? (t.removeClass("has-error"),
                    e.ajax({
                        type: "post",
                        url: BASE_URL + "improntuspdpshippingrate/product/estimate/",
                        data: "cep=" + n + "&product=" + i + "&qty=1",
                        showLoader: !0,
                        success: function (i) {
                            let t = JSON.parse(i);
                            t.error
                                ? s.html("<li>" + t.error.message + "</li>").slideDown()
                                : e.map(t, function (i, t) {
                                    let hr = e("<p></p>");
                                    let n = e('<div><span class="title">' + t + "</span></div>");
                                    if (i.length > 0) {
                                        var a = e("<div></div>");
                                        e.map(i, function (s) {
                                            let i = e(s.price);
                                            "" != s.message && i.append("- " + s.message), a.append(i);
                                        });
                                    }
                                n.prepend(hr) && n.append(a),s.html(n).slideDown();
                                });
                        },
                    }))
                : t.focus().addClass("has-error");
    });
});
