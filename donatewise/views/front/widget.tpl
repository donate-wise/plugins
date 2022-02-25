<span style="display: none;" id="widget_donateWise--price" data-currency="{$currency.sign}">{$product.rounded_display_price}</span>
<div class="widget_donateWise--container" id="widget_donateWise--product" data-uuid="{$uuid}">
	<div class="widget_donateWise--content">
        <div style="padding-right: 10px">
            <span><b><span id="widget_donateWise--amount"></span> <span id="currency_w"></span></b> z tego zakupu przekazujemy do <span id="widget_donateWise--foundation"></span></span></span>
            <span class="widget_donateWise--more" id="widget_donateWise--more">Dowiedz się więcej</span>
        </div>
        <div style="width: 12.5%; display: flex; align-self: center;">
        	<img src="" style="width: 100%; max-width: 55px; align-self: center;" class="widget_donateWise--logo_foundation" id="widget_donateWise--logo_foundation" alt="logo_foundation" />
        </div>
    </div>
    <div class="widget_donateWise--footer">
        <span>Powered by</span>
        <div>
	        <img src="https://assets.donate-wise.org/widget-big/images/logo.png" class="widget_donateWise--logo" alt="logo_DonateWise" />
	    </div>
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
						<span id="widget_donateWise--popup-amount"></span> <span id="currency_p"></span> od
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