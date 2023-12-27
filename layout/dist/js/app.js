class Utils {
	slideUp(target, duration = 500) {
		target.style.transitionProperty = 'height, margin, padding';
		target.style.transitionDuration = duration + 'ms';
		target.style.height = target.offsetHeight + 'px';
		target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		window.setTimeout(() => {
			target.style.display = 'none';
			target.style.removeProperty('height');
			target.style.removeProperty('padding-top');
			target.style.removeProperty('padding-bottom');
			target.style.removeProperty('margin-top');
			target.style.removeProperty('margin-bottom');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
			target.classList.remove('_slide');
		}, duration);
	}
	slideDown(target, duration = 500) {
		target.style.removeProperty('display');
		let display = window.getComputedStyle(target).display;
		if (display === 'none')
			display = 'block';

		target.style.display = display;
		let height = target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.offsetHeight;
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + 'ms';
		target.style.height = height + 'px';
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		window.setTimeout(() => {
			target.style.removeProperty('height');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
			target.classList.remove('_slide');
		}, duration);
	}
	slideToggle(target, duration = 500) {
		if (!target.classList.contains('_slide')) {
			target.classList.add('_slide');
			if (window.getComputedStyle(target).display === 'none') {
				return this.slideDown(target, duration);
			} else {
				return this.slideUp(target, duration);
			}
		}
	}

	isSafari() {
		let isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
		return isSafari;
	}

	Android() {
		return navigator.userAgent.match(/Android/i);
	}
	BlackBerry() {
		return navigator.userAgent.match(/BlackBerry/i);
	}
	iOS() {
		return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	}
	Opera() {
		return navigator.userAgent.match(/Opera Mini/i);
	}
	Windows() {
		return navigator.userAgent.match(/IEMobile/i);
	}
	isMobile() {
		return (this.Android() || this.BlackBerry() || this.iOS() || this.Opera() || this.Windows());
	}

	scrollTrigger(el, value, callback) {
		let triggerPoint = document.documentElement.clientHeight / 100 * (100 - value);
		const trigger = () => {
			if(el.getBoundingClientRect().top <= triggerPoint && !el.classList.contains('is-show')) {
				if(typeof callback === 'function') {
					callback();
					el.classList.add('is-show')
				}
			}
		}
	
		trigger();
	
		window.addEventListener('scroll', trigger);
	}

	numberCounterAnim() {
		let counterItems = document.querySelectorAll('[data-number-counter-anim]');
		if (counterItems) {
	
			counterItems.forEach(item => {
				let animation = anime({
					targets: item,
					textContent: [0, item.innerText],
					round: 1,
					easing: 'linear',
					autoplay: false,
					duration: 1000
				});
	
				window.addEventListener('load', () => {
					this.scrollTrigger(item, 15, () => {animation.play()})
				})
			})
		}
	}

	initTruncateString() {
		function truncateString(el, stringLength = 0) {
			let str = el.innerText;
			if (str.length <= stringLength) return;
			el.innerText = str.slice(0, stringLength) + '...';
		}

		let truncateItems = document.querySelectorAll('[data-truncate-string]');
		if(truncateItems.length) {
			truncateItems.forEach(truncateItem => {
				truncateString(truncateItem, truncateItem.dataset.truncateString);
			})
		}
	}

	replaceToInlineSvg(query) {
		const images = document.querySelectorAll(query);

		if(images.length) {
			images.forEach(img => {
					let xhr = new XMLHttpRequest();
					xhr.open('GET', img.src);
					xhr.onload = () => {
						if (xhr.readyState === xhr.DONE) {
							if (xhr.status === 200) {
								let svg = xhr.responseXML.documentElement;
								svg.classList.add('_svg');
								img.parentNode.replaceChild(svg, img);
							}
						}
					}
					xhr.send(null);
			})
		}
	}

	initCollapse() {
		const collapseActionElements = document.querySelectorAll('[data-collapse]');
		if(collapseActionElements.length) {
			collapseActionElements.forEach(actionEl => {

				const id = actionEl.getAttribute('data-collapse');
				if(!id) return;

				const targetElements = document.querySelectorAll(`[data-collapse-target="${id}"]`);
				if(!targetElements.length) return;

				actionEl.addEventListener('click', (e) => {
					e.preventDefault();
					
					if(actionEl.classList.contains('open')) {
						actionEl.classList.remove('open');
						targetElements.forEach(targetEl => {
							this.slideUp(targetEl, 300)
						})
					} else {
						actionEl.classList.add('open');
						targetElements.forEach(targetEl => {
							this.slideDown(targetEl, 300)
						})
					}
				})
			})
		}
	}

	initInputMask() {
		let items = document.querySelectorAll('[data-mask]');
		if (items.length) {
			items.forEach(item => {
				let maskValue = item.dataset.mask;
	
				Inputmask(maskValue, {
					clearIncomplete: false,
					clearMaskOnLostFocus: false,
				}).mask(item);
			})
		}
	}
}


;
// HTML data-da="where(uniq class name),when(breakpoint),position(digi)"
// e.x. data-da=".content__column-garden,992,2"
// https://github.com/FreelancerLifeStyle/dynamic_adapt

class DynamicAdapt {
	constructor(type) {
	  this.type = type;
	}
  
	init() {
	  this.оbjects = [];
	  this.daClassname = '_dynamic_adapt_';
	  this.nodes = [...document.querySelectorAll('[data-da]')];
  
	  this.nodes.forEach((node) => {
		const data = node.dataset.da.trim();
		const dataArray = data.split(',');
		const оbject = {};
		оbject.element = node;
		оbject.parent = node.parentNode;
		оbject.destination = document.querySelector(`${dataArray[0].trim()}`);
		оbject.breakpoint = dataArray[1] ? dataArray[1].trim() : '767';
		оbject.place = dataArray[2] ? dataArray[2].trim() : 'last';
		оbject.index = this.indexInParent(оbject.parent, оbject.element);
		this.оbjects.push(оbject);
	  });
  
	  this.arraySort(this.оbjects);
  
	  this.mediaQueries = this.оbjects
		.map(({
		  breakpoint
		}) => `(${this.type}-width: ${breakpoint}px),${breakpoint}`)
		.filter((item, index, self) => self.indexOf(item) === index);
  
	  this.mediaQueries.forEach((media) => {
		const mediaSplit = media.split(',');
		const matchMedia = window.matchMedia(mediaSplit[0]);
		const mediaBreakpoint = mediaSplit[1];
  
		const оbjectsFilter = this.оbjects.filter(
		  ({
			breakpoint
		  }) => breakpoint === mediaBreakpoint
		);
		matchMedia.addEventListener('change', () => {
		  this.mediaHandler(matchMedia, оbjectsFilter);
		});
		this.mediaHandler(matchMedia, оbjectsFilter);
	  });
	}
  
	mediaHandler(matchMedia, оbjects) {
	  if (matchMedia.matches) {
		оbjects.forEach((оbject) => {
		  оbject.index = this.indexInParent(оbject.parent, оbject.element);
		  this.moveTo(оbject.place, оbject.element, оbject.destination);
		});
	  } else {
		оbjects.forEach(
		  ({ parent, element, index }) => {
			if (element.classList.contains(this.daClassname)) {
			  this.moveBack(parent, element, index);
			}
		  }
		);
	  }
	}
  
	moveTo(place, element, destination) {
	  element.classList.add(this.daClassname);
	  if (place === 'last' || place >= destination.children.length) {
		destination.append(element);
		return;
	  }
	  if (place === 'first') {
		destination.prepend(element);
		return;
	  }
	  destination.children[place].before(element);
	}
  
	moveBack(parent, element, index) {
	  element.classList.remove(this.daClassname);
	  if (parent.children[index] !== undefined) {
		parent.children[index].before(element);
	  } else {
		parent.append(element);
	  }
	}
  
	indexInParent(parent, element) {
	  return [...parent.children].indexOf(element);
	}
  
	arraySort(arr) {
	  if (this.type === 'min') {
		arr.sort((a, b) => {
		  if (a.breakpoint === b.breakpoint) {
			if (a.place === b.place) {
			  return 0;
			}
			if (a.place === 'first' || b.place === 'last') {
			  return -1;
			}
			if (a.place === 'last' || b.place === 'first') {
			  return 1;
			}
			return a.place - b.place;
		  }
		  return a.breakpoint - b.breakpoint;
		});
	  } else {
		arr.sort((a, b) => {
		  if (a.breakpoint === b.breakpoint) {
			if (a.place === b.place) {
			  return 0;
			}
			if (a.place === 'first' || b.place === 'last') {
			  return 1;
			}
			if (a.place === 'last' || b.place === 'first') {
			  return -1;
			}
			return b.place - a.place;
		  }
		  return b.breakpoint - a.breakpoint;
		});
		return;
	  }
	}
}
;

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
			// ==== Popup form handler====

const popupLinks = document.querySelectorAll('[data-popup="open-popup"]');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll('[data-popup="lock-padding"]');

let unlock = true;

const timeout = 400;

if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
        const popupLink = popupLinks[index];
        popupLink.addEventListener('click', function (e) {
            const popupName = popupLink.getAttribute('href').replace('#', '');
            const curentPopup = document.getElementById(popupName);
            popupOpen(curentPopup);
            e.preventDefault();
        });
    }
}


const popupCloseIcon = document.querySelectorAll('[data-popup="close-popup"]');
if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
        const el = popupCloseIcon[index];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));
            e.preventDefault();
        });
    }
}

function popupOpen(curentPopup) {
    if (curentPopup && unlock) {
        const popupActive = document.querySelector('.popup.popup--open');
        if (popupActive) {
            popupClose(popupActive, false);
        } else {
            bodyLock();
        }
        curentPopup.classList.add('popup--open');
        curentPopup.addEventListener('click', function (e) {
            if (!e.target.closest('.popup__content')) {
                popupClose(e.target.closest('.popup'));
            }
        });

    }
}

function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
        popupActive.classList.remove('popup--open');
        if (doUnlock) {
            bodyUnlock();
        }
    }
}

function bodyLock() {
    const lockPaddingValue = window.innerWidth - document.querySelector('body').offsetWidth + 'px';
    let targetPadding = document.querySelectorAll('[data-popup="add-right-padding"]');
    if (targetPadding.length) {
        for (let index = 0; index < targetPadding.length; index++) {
            const el = targetPadding[index];
            el.style.paddingRight = lockPaddingValue;
        }
    }

    if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
            const el = lockPadding[index];
            el.style.paddingRight = lockPaddingValue;
        }
    }

    body.style.paddingRight = lockPaddingValue;
    body.classList.add('overflow-hidden');

    unlock = false;
    setTimeout(function () {
        unlock = true;
    }, timeout);
}

function bodyUnlock() {
    let targetPadding = document.querySelectorAll('[data-popup="add-right-padding"]');

    setTimeout(function () {
        if (targetPadding.length) {
            for (let index = 0; index < targetPadding.length; index++) {
                const el = targetPadding[index];
                el.style.paddingRight = '0px';
            }
        }

        for (let index = 0; index < lockPadding.length; index++) {
            const el = lockPadding[index];
            el.style.paddingRight = '0px';
        }

        body.style.paddingRight = '0px';
        body.classList.remove('overflow-hidden');
    }, timeout);

    unlock = false;
    setTimeout(function () {
        unlock = true;
    }, timeout);
}

document.addEventListener('keydown', function (e) {
    if (e.which === 27) {
        const popupActive = document.querySelector('.popup.popup--open');
        popupClose(popupActive);
    }
});

// === Polyfill ===
(function () {
    if (!Element.prototype.closest) {
        Element.prototype.closest = function (css) {
            var node = this;
            while (node) {
                if (node.matches(css)) return node;
                else node == node.parentElement;
            }
            return null;
        };
    }
})();

(function () {
    if (!Element.prototype.matches) {
        Element.prototype.matches = Element.prototype.matchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.mozMatchesSelector;
    }
})();
// === AND Polyfill ===

// добавление API попапа в глобалную видимость
window.popup = {
    open(id) {
        if (!id) return;

        let popup = document.querySelector(id);

        if (!popup) return;

        popupOpen(popup);
    },
    close(id) {
        if (!id) return;

        let popup = document.querySelector(id);

        if (!popup) return;

        popupClose(popup);
    }
}

			// Fields labels animation
const inputsWrap = document.querySelectorAll('[data-input]');
if (inputsWrap.length) {
    inputsWrap.forEach(inputWrap => {
        const input = inputWrap.querySelector('input');
        input.addEventListener('focus', () => {
            inputWrap.classList.add('using');
        });

        input.addEventListener('blur', () => {
            if (input.value.length === 0) inputWrap.classList.remove('using');
        });
    })
}
			document.addEventListener('click', (e) => {
    if(e.target.closest('[data-product-card-option]')) {
        const radio = e.target;
        const productCard = radio.closest('[data-product-card]');
        if(!productCard) return;

        const priceItems = productCard.querySelectorAll('.product-card__price[data-index]');
        const index = radio.getAttribute('data-index');
        
        priceItems.forEach(item => {
            const itemIndex = item.getAttribute('data-index');
            if(itemIndex === index) {
                item.classList.add('show');
            } else {
                item.classList.remove('show');
            }
        });
    }
})
			const categoryLinksElements = document.querySelectorAll('[data-slider="category-links-list"]');
if (categoryLinksElements.length) {
    categoryLinksElements.forEach(categoryLinks => {
        const slider = categoryLinks;
        let mySwiper;

        function mobileSlider() {
            if (document.documentElement.clientWidth <= 767 && slider.dataset.mobile == 'false') {
                mySwiper = new Swiper(slider, {
                    slidesPerView: 'auto',
                    freeMode: true,
                    scrollbar: {
                        el: slider.querySelector('.swiper-scrollbar'),
                    },
                });

                slider.dataset.mobile = 'true';
            }

            if (document.documentElement.clientWidth > 767) {
                slider.dataset.mobile = 'false';

                if (slider.classList.contains('swiper-initialized')) {
                    mySwiper.destroy();
                }
            }
        }

        mobileSlider();

        window.addEventListener('resize', () => {
            mobileSlider();
        })
    })
}
			const specialOfferCards = document.querySelectorAll('[data-special-offer-card]');
if (specialOfferCards.length) {
    document.addEventListener('click', (e) => {
        if (e.target.closest('[data-action="show-full-text-by-index"]')) {
            e.preventDefault();
            const btn = e.target.closest('[data-action="show-full-text-by-index"]');

            const index = btn.getAttribute('data-index');
            if (!index) return;

            const parent = e.target.closest('[data-special-offer-card]');
            if (!parent) return;


            const fullTextElements = parent.querySelectorAll('.special-offer-card__full-text');
            console.log(fullTextElements);
            fullTextElements.forEach(fullTextEl => {
                const elIndex = fullTextEl.getAttribute('data-index');
                if (!elIndex) return;

                if (elIndex === index) {
                    fullTextEl.classList.add('show');
                } else {
                    fullTextEl.classList.remove('show');
                }
            })
        } else if(e.target.closest('[data-action="hide-full-text-by-index"]')) {
            e.preventDefault();
            const btn = e.target;
            const parent = btn.closest('.special-offer-card__full-text');
           
            if(!parent) return;
            parent.classList.remove('show');
        }

    })
}
			// ==== // components =====================================================


			// ==== widgets =====================================================
			// header
const header = document.querySelector('[data-header]');
if(header) {
    window.addEventListener('scroll', () => {
        header.classList.toggle('header--is-scrolling', window.pageYOffset > 50);
    })
}


// categories
const headerMobCategoriesSlider = document.querySelector('[data-slider="header-mob-categories"]');
if (headerMobCategoriesSlider) {
    const swiperSlider = new Swiper(headerMobCategoriesSlider, {
        freeMode: true,
        slidesPerView: 'auto',
        scrollbar: {
            el: headerMobCategoriesSlider.querySelector('.swiper-scrollbar'),
        },
    })
}

// Mobile menu
const mobileMenu = document.querySelector('[data-mobile-menu]');
if (mobileMenu) {
    const buttonsOpen = document.querySelectorAll('[data-action="open-mobile-menu"]');
    const buttonsClose = document.querySelectorAll('[data-action="close-mobile-menu"]');

    buttonsOpen.forEach(button => {
        button.addEventListener('click', () => {
            document.body.classList.add('overflow-hidden');
            mobileMenu.classList.add('open')
        });
    })

    buttonsClose.forEach(button => {
        button.addEventListener('click', () => {
            document.body.classList.remove('overflow-hidden');
            mobileMenu.classList.remove('open')
        });
    })
}


// Categories
class CategoryItems {
    _items = null;
    _header = null;

    static setHeight() {
        if(!this._header) return;
        this._items.forEach(item => {
            item.style.maxHeight = document.documentElement.clientHeight - this._header.clientHeight + 'px';
        })
    }

    static init() {
        this._items = Array.from(categoriesEl.querySelectorAll('[data-category-tab]'));
        this._header = document.querySelector('[data-header]');
        this.setHeight();

        window.addEventListener('resize', this.setHeight.bind(this))
    }
}

const categoriesEl = document.querySelector('[data-categories]');
if(categoriesEl) {
    const navItems = categoriesEl.querySelectorAll('[data-action="show-category-tab-by-index"]');
    const targetItems = Array.from(categoriesEl.querySelectorAll('[data-category-tab]'));

    const resetNavItems = () => {
        navItems.forEach(navItem => navItem.classList.remove('active'))
    }
    const resetTargetItems = () => {
        if(document.documentElement.clientWidth < 992) {
            document.documentElement.classList.remove('overflow-hidden');
        }
        targetItems.forEach(targetItem => targetItem.classList.remove('show'));
    }

    navItems.forEach(navItem => {
        navItem.addEventListener('mouseenter', () => {
            const index = navItem.getAttribute('data-index');
            resetNavItems();
            resetTargetItems();

            navItem.classList.add('active');
            if(!index) return;

            const [targetItem] = targetItems.filter(targetItem => targetItem.dataset?.index === index);
            if(!targetItem) return;
            targetItem.classList.add('show');
            if(document.documentElement.clientWidth < 992) {
                document.documentElement.classList.add('overflow-hidden');
            }
        })
    })

    categoriesEl.addEventListener('mouseleave', () => {
        resetNavItems();
        resetTargetItems();
    })

    CategoryItems.init();
}

// category-tabs collapse sublist handler
const categoryTabs = document.querySelectorAll('[data-category-tab]');
if(categoryTabs.length) {
    categoryTabs.forEach(categoryTab => {
        const listTitles = categoryTab.querySelectorAll('.categories__list-title');
        listTitles.forEach(listTitle => {
            const sublist = listTitle.nextElementSibling;
            if(!sublist || !sublist.closest('.categories__sublist')) return;
            listTitle.classList.add('icon')
            
            listTitle.addEventListener('click', (e) => {
                e.preventDefault();

                if(listTitle.classList.contains('active')) {
                    listTitle.classList.remove('active');
                    this.utils.slideUp(sublist, 300);
                } else {
                    listTitle.classList.add('active');
                    this.utils.slideDown(sublist, 300);
                }
            })
        })
    })
}

// Top offer
const topOffers = document.querySelectorAll('[data-top-offer]');
if (topOffers.length) {
    topOffers.forEach(topOffer => {
        const parrentEl = topOffer.parentElement;
        const delay = topOffer.getAttribute('data-delay') || 2000;

        const setPaddingTop = (value) => {
            parrentEl.style.transition = 'padding-top .3s ease';
            parrentEl.style.paddingTop = value + 'px';
        }

        const setPaddingTopWithouTransition = () => {
            parrentEl.style.transition = '';
            parrentEl.style.paddingTop = topOffer.clientHeight + 'px';
        }

        setTimeout(() => {
            topOffer.classList.add('show');
            setPaddingTop(topOffer.clientHeight);

            setTimeout(() => {
                CategoryItems.setHeight();
            }, 300);
        }, 300);

        window.addEventListener('resize', setPaddingTopWithouTransition);

        topOffer.addEventListener('click', (e) => {
            if(e.target.closest('[data-action="close-top-offer"]')) {
                e.preventDefault();

                topOffer.classList.remove('show');
                setPaddingTop(0);
    
                setTimeout(() => {
                    CategoryItems.setHeight();
                }, 300);
    
                window.removeEventListener('resize', setPaddingTopWithouTransition);
            }
        })
    })
}
;
			const homeIntro = document.querySelector('[data-slider="home-intro"]');
if(homeIntro) {
    const swiperSlider = new Swiper(homeIntro.querySelector('.swiper'), {
        slidesPerView: 1,
        speed: 600,
        scrollbar: {
            el: homeIntro.querySelector('.swiper-scrollbar'),
        },
        navigation: {
            nextEl: homeIntro.querySelector('.slider-btn.right'),
            prevEl: homeIntro.querySelector('.slider-btn.left'),
        },
    })
};
			const carousels = document.querySelectorAll('[data-slider="carousel"]');
if (carousels.length) {
    carousels.forEach(carousel => {
        const swiperSlider = new Swiper(carousel, {
            speed: 600,
            observer: true,
            observeParents: true,
            scrollbar: {
                el: carousel.querySelector('.carousel__navigation .swiper-scrollbar'),
            },
            navigation: {
                nextEl: carousel.querySelector('.carousel__navigation .slider-btn.right'),
                prevEl: carousel.querySelector('.carousel__navigation .slider-btn.left'),
            },
            pagination: {
                el: carousel.querySelector('.carousel__navigation .slider-pagination'),
                type: 'custom',
                renderCustom: function (swiper, current, total) {
                    let currentValue = current > 9 ? current : '0' + current;
                    let currentTotal = total > 9 ? total : '0' + total;
                    return currentValue + '/' + currentTotal;
                }
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                    //autoHeight: true,
                    freeMode: false,
                },
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    freeMode: true,
                }
            },
        })
    })
}

const carouselsTabs = document.querySelectorAll('[data-carousel-tabs]');
if (carouselsTabs.length) {
    carouselsTabs.forEach(carouselTabs => {
        const triggers = carouselTabs.querySelectorAll('[data-action="show-carousel-tab"]');
        const tabs = carouselTabs.querySelectorAll('[data-carousel-tab-content]');

        triggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                if (trigger.classList.contains('active')) return;

                const currentIndex = trigger.getAttribute('data-index');
                if (!currentIndex) return;

                carouselTabs.style.minHeight = carouselTabs.clientHeight + 'px';

                setTimeout(() => carouselTabs.style.minHeight = 'auto',600)

                triggers.forEach(t => {
                    const index = t.getAttribute('data-index');
                    if (!index) return;

                    if (index === currentIndex) {
                        t.classList.add('active');
                    } else {
                        t.classList.remove('active');
                    }
                })

                tabs.forEach(tab => {
                    const index = tab.getAttribute('data-index');
                    if (!index) return;

                    if (index === currentIndex) {
                        
                        setTimeout(() => {
                            tab.classList.remove('exit', 'active');
                            tab.classList.add('show', 'enter');
                            setTimeout(() => tab.classList.add('active'), 1)
                            
                        }, 600)
                    } else {
                        tab.classList.remove('enter', 'active')
                        tab.classList.add('exit');
                        setTimeout(() => tab.classList.add('active'), 1)
                        setTimeout(() => {
                            tab.classList.remove('show')
                        }, 600)
                    }

                    
                    // if (index === currentIndex) {
                        
                    //     setTimeout(() => {
                    //         tab.classList.remove('exit', 'active');
                    //         tab.classList.add('show');
                    //         target.style.transitionProperty = 'opacity';
                    //         target.style.transitionDuration = 300 + 'ms';
                    //         tab.style.opacity = 0;
                    //         tab.style.opacity = 1;
                    //     }, 300)
                    // } else {
                    //     tab.classList.add('exit', 'active');
                    //     setTimeout(() => {
                    //         tab.classList.remove('show')
                    //     }, 300)
                    // }
                })
            })
        })
    })
};
			const tickerLogosSections = document.querySelectorAll('[data-slider="ticker-logos"]');
if (tickerLogosSections.length) {
    tickerLogosSections.forEach(tickerLogosSection => {
        const swiperSlider = new Swiper(tickerLogosSection, {
            speed: 6000,
            autoplay: {
                delay: 1,
            },
            loop: true,

            breakpoints: {
                320: {
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                    grid: {
                        rows: 2,
                    },
                },
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    grid: {
                        rows: 1,
                    },
                },
            },
        })
    })
};
			const instagramSliders = document.querySelectorAll('[data-slider="instagram"]');
if (instagramSliders.length) {
    instagramSliders.forEach(instagramSlider => {
        const swiperSlider = new Swiper(instagramSlider, {
            observer: true,
            observeParents: true,
            speed: 600,
            breakpoints: {
                320: {
                    slidesPerView: 'auto',
                    spaceBetween: 14,
                    freeMode: true,
                },
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    freeMode: true,
                }
            },
        })
    })
}
;
			const bannerImagesSliders = document.querySelectorAll('[data-slider="banner-images"]');
if (bannerImagesSliders.length) {
    bannerImagesSliders.forEach(bannerImagesSlider => {
        const swiperSlider = new Swiper(bannerImagesSlider, {
            effect: 'fade',
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 400,
            touchRatio: 0,
        });

        const parent = bannerImagesSlider.closest('[data-banner]');
        if(!parent) return;

        const triggers = parent.querySelectorAll('.category-links__list [data-action="change-banner-image-by-index"]');
        
        triggers.forEach(trigger => {
            const index = trigger.getAttribute('data-index');
            if(!index) return;

            trigger.addEventListener('mouseenter', () => {
                swiperSlider.slideTo(index);
            })
        })
    })
};
			// ==== // widgets =====================================================
		});



		window.addEventListener('load', () => {

		});

	}
}

let app = new App();
app.init();


