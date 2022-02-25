window.onload = function(){
    let uuid = document.getElementById('widget_donateWise--product').dataset.uuid;
    let admin = document.getElementById('widget_donateWise--product').dataset.admin;
    if(uuid != ''){
        const urlApi = "https://api.donate-wise.org/v1/merchant/status?key="+uuid;
        let amount = 0;
        let currency = ' zł';
        if(document.getElementById("widget_donateWise--price") != undefined){
            let amount_str = document.getElementById("widget_donateWise--price").innerHTML;
            amount = parseFloat(amount_str);
        }
        let x = 0;
        let amount_show = '';

        function openModal_DonateWise(){
            document.getElementById('widget_donateWise--popup').style.display = "flex";
            document.getElementById('widget_donateWise--popup').style.visibility = "visible";
        }
        function closeModal_DonateWise(){
            document.getElementById('widget_donateWise--popup').style.display = "none";
            document.getElementById('widget_donateWise--popup').style.visibility = "hidden";
        }

        var isIE = !!window.MSInputMethodContext && !!document.documentMode;
        if(isIE){
            var xmlhttpUser = new XMLHttpRequest();
            (xmlhttpUser.onreadystatechange = function () {
                4 == this.readyState &&
                    200 == this.status &&
                    JSON.parse(this.responseText).status == 'active' &&
                    (document.getElementById("widget_donateWise--product").classList.add("widget-visible")),(x = Math.round((amount * JSON.parse(this.responseText).donationPercentage) * 100) / 100),(amount_show = x.toFixed(2).toString()),(amount_show = amount_show.replace(/\./g,","),(document.getElementById('widget_donateWise--foundation').innerHTML = JSON.parse(this.responseText).donatees[0].name),(document.getElementById('widget_donateWise--logo_foundation').src = JSON.parse(this.responseText).donatees[0].logoUrl),(document.getElementById('widget_donateWise--popup-shop').innerHTML = JSON.parse(this.responseText).merchantName),(document.getElementById('widget_donateWise--popup-shop_sec').innerHTML = JSON.parse(this.responseText).merchantName),(document.getElementById('widget_donateWise--popup-amount').innerHTML = amount_show),(document.getElementById('widget_donateWise--popup-foundation').innerHTML = JSON.parse(this.responseText).donatees[0].name),(document.getElementById('widget_donateWise--popup-logo-foundation').src = JSON.parse(this.responseText).donatees[0].logoUrl),(document.getElementById('anchor-popup').href = 'https://donate-wise.org/pl/?utm_medium=widget&utm_source='+JSON.parse(this.responseText).merchantName),(document.getElementById('anchor-popup_1').href = 'https://donate-wise.org/pl/?utm_medium=widget&utm_source='+JSON.parse(this.responseText).merchantName),(document.getElementById('currency_w').innerHTML = currency), (document.getElementById('currency_p').innerHTML = currency));
            }),
                xmlhttpUser.open("GET", urlApi, !0),
                xmlhttpUser.send();
        }else{
            fetch(urlApi, {cache: "force-cache"})
                .then(function (e) {
                    return e.json();
                })
                .then(function (e) {
                    if(e.status == 'active'){
                        var el = document.getElementById('widget_donateWise--product');
                        el.classList.add('widget-visible');
                        x = Math.round((amount * e.donationPercentage) * 100) / 100;
                        amount_show = x.toFixed(2).toString();
                        if(currency == ' zł')
                            amount_show = amount_show.replace(/\./g,",");
                        document.getElementById('widget_donateWise--amount').innerHTML = amount_show;
                        document.getElementById('widget_donateWise--foundation').innerHTML = e.donatees[0].name;
                        document.getElementById('widget_donateWise--logo_foundation').src = e.donatees[0].logoUrl;
                        document.getElementById('widget_donateWise--popup-shop').innerHTML = e.merchantName;
                        document.getElementById('widget_donateWise--popup-shop_sec').innerHTML = e.merchantName;
                        document.getElementById('widget_donateWise--popup-amount').innerHTML = amount_show;
                        document.getElementById('widget_donateWise--popup-foundation').innerHTML = e.donatees[0].name;
                        document.getElementById('widget_donateWise--popup-logo-foundation').src = e.donatees[0].logoUrl;
                        document.getElementById('currency_w').innerHTML = currency;
                        document.getElementById('currency_p').innerHTML = currency;
                        document.getElementById('anchor-popup').href = 'https://donate-wise.org/pl/?utm_medium=widget&utm_source='+e.merchantName;
                        document.getElementById('anchor-popup_1').href = 'https://donate-wise.org/pl/?utm_medium=widget&utm_source='+e.merchantName;
                    }
                    else if(e.status != 'active' && admin == 'yes'){
                        document.getElementById('card-body-widget_donateWise').innerHTML = '<span style="font-size: 22px; color: #bb0202;">Please enter a valid UUID number to continue</span>';
                        document.getElementById('donateWise__status').innerHTML = '<span style="font-size: 22px; color: #bb0202;">The specified UUID number is invalid</span>';
                    }
                });
        }


        let p = document.getElementById("widget_donateWise--popup-close");
        p.onclick = closeModal_DonateWise;
        let d = document.getElementById("widget_donateWise--more");
        d.onclick = openModal_DonateWise;

        document.getElementById('widget_donateWise--popup').onclick = function(e) {
            if(e.target == document.getElementById('widget_donateWise--popup')) {
                closeModal_DonateWise();
            } 
          }
    }
};
