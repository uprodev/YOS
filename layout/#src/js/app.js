@@include('files/utils.js');
@@include('files/dynamic_adapt.js');

class App {
	constructor() {
		this.utils = new Utils();
		this.dynamicAdapt = new DynamicAdapt('min');
	}

	init() {
		window.addEventListener('DOMContentLoaded', () => {

			if (this.utils.isMobile()) {
				document.body.classList.add('mobile');
			}

			if (this.utils.iOS()) {
				document.body.classList.add('mobile-ios');
			}

			if (this.utils.isSafari()) {
				document.body.classList.add('safari');
			}

			this.utils.replaceImageToInlineSvg('.img-svg');
			this.dynamicAdapt.init();
			this.utils.initTruncateString();
			this.utils.initCollapse();
			this.utils.initSpoller();
			this.utils.initInputMask();
			this.utils.initSmoothScroll();
			this.utils.initTabs();

			// ==== components =====================================================
			@@include('../components/popup/popup.js')
			@@include('../components/inputs/inputs.js')
			@@include('../components/product-card/product-card.js')
			@@include('../components/category-links/category-links.js')
			@@include('../components/special-offer-card/special-offer-card.js')
			@@include('../components/filter-brands/filter-brands.js')
			@@include('../components/selected-filters/selected-filters.js')
			@@include('../components/price-range/price-range.js')
			@@include('../components/product-images/product-images.js')
			@@include('../components/rating/rating.js')
			@@include('../components/product-card-sm/product-card-sm.js')
			@@include('../components/quantity/quantity.js')
			@@include('../components/select/select.js')
			// ==== // components =====================================================


			// ==== widgets =====================================================
			@@include('../widgets/header/header.js');
			@@include('../widgets/home-intro/home-intro.js');
			@@include('../widgets/carousel/carousel.js');
			@@include('../widgets/ticker-logos/ticker-logos.js');
			@@include('../widgets/instagram/instagram.js');
			@@include('../widgets/banner/banner.js');
			@@include('../widgets/catalog/catalog.js');
			@@include('../widgets/product/product.js');
			@@include('../widgets/product-reviews/product-reviews.js');
			@@include('../widgets/side-basket/side-basket.js');
			@@include('../widgets/brands/brands.js');
			@@include('../widgets/faq/faq.js');
			// ==== // widgets =====================================================
		
			document.body.classList.add('page-loaded');
		});



		window.addEventListener('load', () => {

		});

	}
}

let app = new App();
app.init();


