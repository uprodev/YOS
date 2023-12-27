@@include('files/utils.js');
@@include('files/dynamic_adapt.js');

class App {
	constructor() {
		this.utils = new Utils();
		this.dynamicAdapt = new DynamicAdapt('min');
	}

	init() {
		window.addEventListener('DOMContentLoaded', () => {
			document.body.classList.add('page-loaded');

			if (this.utils.isMobile()) {
				document.body.classList.add('mobile');
			}

			if (this.utils.iOS()) {
				document.body.classList.add('mobile-ios');
			}

			if (this.utils.isSafari()) {
				document.body.classList.add('safari');
			}

			this.utils.replaceToInlineSvg('.img-svg');
			this.dynamicAdapt.init();
			this.utils.initCollapse();

			// ==== components =====================================================
			@@include('../components/popup/popup.js')
			@@include('../components/inputs/inputs.js')
			@@include('../components/product-card/product-card.js')
			@@include('../components/category-links/category-links.js')
			@@include('../components/special-offer-card/special-offer-card.js')
			// ==== // components =====================================================


			// ==== widgets =====================================================
			@@include('../widgets/header/header.js');
			@@include('../widgets/home-intro/home-intro.js');
			@@include('../widgets/carousel/carousel.js');
			@@include('../widgets/ticker-logos/ticker-logos.js');
			@@include('../widgets/instagram/instagram.js');
			@@include('../widgets/banner/banner.js');
			// ==== // widgets =====================================================
		});



		window.addEventListener('load', () => {

		});

	}
}

let app = new App();
app.init();


