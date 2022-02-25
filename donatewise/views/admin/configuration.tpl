<style>
.donateWise__card{
    background: #FFF;
    padding: 20px;
    -webkit-box-shadow: 0px 0px 5px 0px rgb(0 0 0 / 10%);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 5px 0px rgb(0 0 0 / 10%);
    border-radius: 5px;
}
.donateWise__title{
	font-size: 22px;
	display: block;
}
.donateWise__description{
	display: block;
	margin-top: 10px;
	margin-bottom: 30px;
}


.product-quantity{
	flex-wrap: wrap;
}
.widget_donateWise--container{
	opacity: 0;
	width: 100%;
	display: flex;
	flex-direction: column;
	flex-basis: 100%;
	transition: .5s all;
	margin-top: 15px;
	margin-bottom: 15px;
	max-width: 440px;
}
.widget_donateWise--container.widget-visible{
	opacity: 1;
}
.widget_donateWise--footer{
    display: flex;
    justify-content: center;
}
.widget_donateWise--footer span{
    margin-right: 8px;
}
.widget_donateWise--content{
	display: flex;
	flex-direction: row;
}
.widget_donateWise--logo{
	width: 100px;
}
.widget_donateWise--logo_foundation{
	width: 12.5%;
}
@media(max-width: 992px){
    .widget_donateWise--logo_foundation{
        height: max-content;
    }
}
#widget_donateWise--shop{
	font-weight: 700;
}
.widget_donateWise--more{
	display: block;
	text-decoration: underline;
	cursor: pointer;
}
.widget_donateWise--popup{
	display: none;
    visibility: hidden;
    background: rgba(0,0,0,.8);
    z-index: 99998;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    justify-content: center;
    align-items: center;
}
.widget_donateWise--popup-wrapper{
	display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    position: relative;
    background: transparent;
    padding: 40px 40px 10px;
}
.widget_donateWise--popup-content{
	display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 15px;
    background: #fff;
}	
.widget_donateWise--popup-footer{
	display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
}
.widget_donateWise--popup-close{
	position: absolute;
    width: 20px;
    height: 20px;
    top: 10px;
    right: 10px;
    cursor: pointer;
    color: transparent;
}
.widget_donateWise--popup-close::before{
	content: "";
    position: absolute;
    top: 10px;
    right: 2px;
    width: 20px;
    height: 2px;
    background-color: #fff;
    transform: rotate(45deg);
}
.widget_donateWise--popup-close::after{
	content: "";
    position: absolute;
    top: 10px;
    right: 2px;
    width: 20px;
    height: 2px;
    background-color: #fff;
    transform: rotate(135deg);
}
.widget_donateWise--title{
	font-size: 25px;
    text-align: center!important;
}
.widget_donateWise--popup-container{
	display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    margin: 30px 0;
}
.widget_donateWise--popup-subtitle{
	font-size: 22px;
    margin-bottom: 20px;
    text-align: center!important;
}
.widget_donateWise--popup-box{
	display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
}
.widget_donateWise--popup-cart{
	height: 80px;
    margin-bottom: 15px;
}
.widget_donateWise--popup-text{
	font-size: 14px;
}
.widget_donateWise--popup-logo-foundation{
	height: 80px;
    margin-bottom: 15px;
}
.widget_donateWise--popup-logo-white{
	height: 30px
}
#widget_donateWise--foundation{
    white-space: nowrap;
    font-weight: 700;
}

</style>
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">My account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="widgets-tab" data-toggle="tab" href="#widgets" role="tab" aria-controls="widgets" aria-selected="false">Widgets</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="account" role="tabpanel" aria-labelledby="account-tab">
  	<div class="card donateWise__card">
	  <div class="card-body">
	    <span class="donateWise__title">
	    	Thank you for choosing DonateWise - the all-in-one charity platform for e-commerce.
	    </span>
	    <span class="donateWise__description">We help online stores boost their revenue by enabling recurring donations to reputable charities via an easy-to-use automated platform.<br/>	    	In order to continue using the plugin first register at <a href="https://donate-wise.org">https://donate-wise.org</a> and get your unique ID. Once received - simply paste it in the form below.
	    </span>
	    <p id="donateWise__status"></p>
	    {if isset($form_uuid)}
		    {$form_uuid}
		{/if}
	  </div>
	</div>
  </div>
  <div class="tab-pane" id="widgets" role="tabpanel" aria-labelledby="widgets-tab">
  	<div class="card donateWise__card">
	  <div class="card-body" style="padding: 20px;" id="card-body-widget_donateWise">
	    <!-- WIDGET -->
			<div class="widget_donateWise--container" id="widget_donateWise--product" style="margin-bottom: 40px;" data-uuid="{$uuid}" data-admin="yes">
				<div class="widget_donateWise--content">
			        <div>
			            <span><b><span id="widget_donateWise--amount"></span> <span id="currency_w"></span></b> z tego zakupu przekazujemy do <span id="widget_donateWise--foundation"></span></span></span>
			            <span class="widget_donateWise--more" id="widget_donateWise--more">Dowiedz się więcej</span>
			        </div>
			        <img src="" class="widget_donateWise--logo_foundation" id="widget_donateWise--logo_foundation" alt="logo_foundation" />
			    </div>
			    <div class="widget_donateWise--footer">
			        <span>Powered by</span>
			        <img src="https://assets.donate-wise.org/widget-big/images/logo.png" class="widget_donateWise--logo" alt="logo_DonateWise" />
			    </div>
			</div>
			<div class="widget_donateWise--popup" id="widget_donateWise--popup">
				<div class="widget_donateWise--popup-wrapper">
					<div class="widget_donateWise--popup-content" id="widget_donateWise--popup-content">
						<span class="widget_donateWise--title">
							Każdy zakup ma znaczenie
						</span>
						<div class="widget_donateWise--popup-container">
							<div class="widget_donateWise--popup-box">
								<img class="widget_donateWise--popup-cart" src="https://assets.donate-wise.org/woocommerce/widget-product/images/shopping-cart.png" alt="cart" />
								<span class="widget_donateWise--popup-text">
									Kupujesz wybrany produkt od
									<span id="widget_donateWise--popup-shop"> </span>
								</span>
							</div>
							<div class="widget_donateWise--popup-box">
								<img class="widget_donateWise--popup-logo-foundation" id="widget_donateWise--popup-logo-foundation" src="" alt="logo foundation" />
								<span class="widget_donateWise--popup-text">
									Przekazujemy
									<span id="widget_donateWise--popup-amount"> </span> <span id="currency_p"></span> od
									<span id="widget_donateWise--popup-shop_sec"> </span>
									do
									<span id="widget_donateWise--popup-foundation"> </span>
								</span>
							</div>
						</div>
						<span class="widget_donateWise--popup-subtitle">
							100% środków trafia na konto fundacji
						</span>
					</div>
					<div class="widget_donateWise--popup-footer">
						<span>
							<a id="anchor-popup" href="https://donate-wise.org/pl" target="_blank" style="text-decoration: none; color: #FFF">Powered by</a>
						</span>
						<a id="anchor-popup_1" href="https://donate-wise.org/pl" target="_blank">
							<img src="https://assets.donate-wise.org/woocommerce/widget-product/images/logo_donateWise_white.png" alt="logo-DonateWise" class="widget_donateWise--popup-logo-white">
						</a>
					</div>
					<span class="widget_donateWise--popup-close" id="widget_donateWise--popup-close">
						x
					</span>
				</div>
			</div>
	    <!-- / WIDGET -->
	    {if isset($form_widget_product)}
		    {$form_widget_product}
		{/if}
	  </div>
	</div>
  </div>
</div>
<script type="text/javascript" src="../modules/donatewise/views/js/main.js" ></script>  
<script>
	$('#myTab a').on('click', function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
</script>