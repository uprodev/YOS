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
			if (el.getBoundingClientRect().top <= triggerPoint && !el.classList.contains('is-show')) {
				if (typeof callback === 'function') {
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
					this.scrollTrigger(item, 15, () => { animation.play() })
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
		if (truncateItems.length) {
			truncateItems.forEach(truncateItem => {
				truncateString(truncateItem, truncateItem.dataset.truncateString);
			})
		}
	}

	replaceImageToInlineSvg(query) {
		const images = document.querySelectorAll(query);

		if (images.length) {
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
		if (collapseActionElements.length) {
			collapseActionElements.forEach(actionEl => {

				const id = actionEl.getAttribute('data-collapse');
				if (!id) return;

				const targetElements = document.querySelectorAll(`[data-collapse-target="${id}"]`);
				if (!targetElements.length) return;

				actionEl.addEventListener('click', (e) => {
					if (actionEl.tagName === 'INPUT') return;
					e.preventDefault();

					if (actionEl.classList.contains('open')) {
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

				actionEl.addEventListener('change', (e) => {
					if (actionEl.checked) {
						actionEl.classList.add('open');
						targetElements.forEach(targetEl => {
							this.slideDown(targetEl, 300)
						})
					} else {
						actionEl.classList.remove('open');
						targetElements.forEach(targetEl => {
							this.slideUp(targetEl, 300)
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

	initSpoller() {
		let spollers = document.querySelectorAll('[data-spoller]');
		if (spollers.length) {
			spollers.forEach(spoller => {
				let isOneActiveItem = spoller.dataset.spoller.trim() === 'one' ? true : false;
				let triggers = spoller.querySelectorAll('[data-spoller-trigger]');
				if (triggers.length) {
					triggers.forEach(trigger => {
						let parent = trigger.parentElement;
						let content = trigger.nextElementSibling;

						// init
						if (trigger.classList.contains('active')) {
							content.style.display = 'block';
							parent.classList.add('active');
						}

						trigger.addEventListener('click', (e) => {
							e.preventDefault();
							parent.classList.toggle('active');
							trigger.classList.toggle('active');
							content && this.slideToggle(content);

							if (isOneActiveItem) {
								triggers.forEach(i => {
									if (i === trigger) return;

									let parent = i.parentElement;
									let content = i.nextElementSibling;

									parent.classList.remove('active');
									i.classList.remove('active');
									content && this.slideUp(content);
								})
							}
						})
					})
				}
			})
		}
	}

	initSmoothScroll() {
		let anchors = document.querySelectorAll('a[href^="#"]:not([data-popup="open-popup"])');
		if (anchors.length) {
			let header = document.querySelector('.header');
			anchors.forEach(anchor => {
				anchor.addEventListener('click', (e) => {
					const href = anchor.getAttribute('href')
					const id = href.length > 1 ? href : null;
					if(!id) return;
					let el = document.querySelector(href);

					if (el) {
						e.preventDefault();
						let top = Math.abs(document.body.getBoundingClientRect().top) + el.getBoundingClientRect().top;

						if (header) {
							top = top - header.clientHeight;
						}

						window.scrollTo({
							top: top - 20,
							behavior: 'smooth',
						})
					}
				})

			})
		}

	}

	initTabs() {
		let tabsContainers = document.querySelectorAll('[data-tabs]');
		if (tabsContainers.length) {
			tabsContainers.forEach(tabsContainer => {
				let triggerItems = tabsContainer.querySelectorAll('[data-tab-trigger]');
				let contentItems = Array.from(tabsContainer.querySelectorAll('[data-tab-content]'));
				let select = tabsContainer.querySelector('[data-tab-select]');

				const getContentItem = (id) => {
					if (!id.trim()) return;
					return contentItems.filter(item => item.dataset.tabContent === id)[0];
				}

				if (triggerItems.length && contentItems.length) {
					// init
					let activeItem = tabsContainer.querySelector('.tab-active[data-tab-trigger]');
					if (activeItem) {
						activeItem.classList.add('tab-active');
						getContentItem(activeItem.dataset.tabTrigger).classList.add('tab-active');
					} else {
						triggerItems[0].classList.add('tab-active');
						getContentItem(triggerItems[0].dataset.tabTrigger).classList.add('tab-active');
					}

					triggerItems.forEach(item => {
						item.addEventListener('click', () => {
							item.classList.add('tab-active');
							getContentItem(item.dataset.tabTrigger).classList.add('tab-active');

							triggerItems.forEach(i => {
								if (i === item) return;

								i.classList.remove('tab-active');
								getContentItem(i.dataset.tabTrigger).classList.remove('tab-active');
							})
						})
					})
				}

				if (select) {
					select.addEventListener('change', (e) => {
						getContentItem(e.target.value).classList.add('tab-active');

						contentItems.forEach(item => {
							if (getContentItem(e.target.value) === item) return;

							item.classList.remove('tab-active');
						})
					})
				}
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
			parent.children[index].after(element);
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

        if(input.required) {
            inputWrap.classList.add('required')
        }

        input.addEventListener('focus', () => {
            inputWrap.classList.add('using');
        });

        input.addEventListener('blur', (e) => {
            if (input.value.length === 0) inputWrap.classList.remove('using');
        });
    })
}

const textareasWrap = document.querySelectorAll('[data-textarea]');
if (textareasWrap.length) {
    textareasWrap.forEach(textareaWrap => {
        const textarea = textareaWrap.querySelector('textarea');

        textarea.addEventListener('focus', () => {
            textareaWrap.classList.add('using');
        });

        textarea.addEventListener('blur', (e) => {
            if (textarea.value.length === 0) textareaWrap.classList.remove('using');
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
                        draggable: true
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

            fullTextElements.forEach(fullTextEl => {
                const elIndex = fullTextEl.getAttribute('data-index');
                if (!elIndex) return;

                if (elIndex === index) {
                    fullTextEl.classList.add('show');
                } else {
                    fullTextEl.classList.remove('show');
                }
            })

            const slide = e.target.closest('.swiper-slide');
            if(!slide) return;
            slide.classList.add('z-index-100');
        } else if(e.target.closest('[data-action="hide-full-text-by-index"]')) {
            e.preventDefault();
            const btn = e.target;
            const fullTextEl = btn.closest('.special-offer-card__full-text');

            if(!fullTextEl) return;
            fullTextEl.classList.remove('show');

            const slide = e.target.closest('.swiper-slide');
            if(!slide) return;
            slide.classList.remove('z-index-100');
        }

    })
}
			function filterBrandsHandler(filterBrandsEl) {
    if(!filterBrandsEl) return;

    const input = filterBrandsEl.querySelector('.filter-brands__search-input input');
    if (!input) return;

    const list = filterBrandsEl.querySelector('.filter-brands__list');
    if (!list) return;

    const listData = Array.from(list.children).map(listRow => {
        const rowItemsBlock = listRow.querySelector('.filter__block');
        const rowItemsData = rowItemsBlock?.children
            ? Array.from(rowItemsBlock.children).map(rowItem => {
                const text = rowItem.querySelector('.filter-checkbox-radio__text');
                return {
                    el: rowItem,
                    text: rowItem.querySelector('.filter-checkbox-radio__text').innerText.trim().toLowerCase()
                }
            })
            : null
        return {
            letter: listRow.getAttribute('data-letter').toLowerCase(),
            el: listRow,
            children: rowItemsData
        }
    })

    input.addEventListener('input', (e) => {
        const inputValue = e.target.value.trim().toLowerCase();
        const firstLetter = inputValue.at(0);

        listData.forEach(listRowData => {
            if (inputValue.length) {

                if (firstLetter !== listRowData.letter) {

                    listRowData.el.classList.add('d-none');

                } else {
                    listRowData.children.forEach(rowItem => {

                        if (!rowItem.text.startsWith(inputValue)) {
                            rowItem.el.classList.add('d-none');
                        } else {
                            rowItem.el.classList.remove('d-none');
                        }

                    })
                }

            } else {
                listRowData.el.classList.remove('d-none');
            }
        })
    });

    return {
        reset: () => {
            input.parentElement.classList.remove('using');

            listData.forEach(listRowData => {
                listRowData.el.classList.remove('d-none');
                listRowData.children.forEach(rowItem => {
                    rowItem.el.classList.remove('d-none');
                })
            })
        }
    }
}
			function selectedFiltersHandler(containers) {
    if(!containers.length) return;
    const subscriptions = [];

    const removeItem = (id) => {
        if(!id) return;
        const items = Array.from(containers).map(container => {
            const [el] = Array.from(container.children).filter(item => {
                const itemId = item.getAttribute('data-selected-filter-id');
                if(itemId == id) return item;
            })
            if(el) return el;
        });

        if(!items.length) return;
        items.forEach(item => item?.remove());

        containers.forEach(container => {
            if(!container.children.length) {
                container.parentElement.classList.add('d-none');
            }
        })

        subscriptions.forEach(fun => fun(id));
    }

    document.addEventListener('click', (e) => {
        if(e.target.closest('[data-action="remove-selected-filter"]')) {
            e.preventDefault();
            const item = e.target.closest('.selected-filters__item');
            const itemId = item.getAttribute('data-selected-filter-id');
            removeItem(itemId)
        }
    })

    return {
        addItem: (id, text) => {
            containers.forEach(container => {
                container.parentElement.classList.remove('d-none');

                container.insertAdjacentHTML('beforeend', `
                <div class="selected-filters__item" data-selected-filter-id="${id}">
                    ${text}
                    <button type="button" data-action="remove-selected-filter">
                        <span class="icon-close"></span>
                    </button>
                </div>
                `)
            });
        },

        removeItem,

        onRemoveItem: (callback) => {
            subscriptions.push(callback);
        },

        removeAll: () => {
            const ids = Array.from(new Set(
                Array.from(containers).map(container => {
                    container.parentElement.classList.add('d-none');
    
                    return Array.from(container.children).map(item => {
                        return item.getAttribute('data-selected-filter-id');
                    })
                }).flat()
            ))

            ids.forEach(id => {
                removeItem(id);
            });
        }
    }
}
			function priceRangeHandler(priceRangeContainer) {
    if (!priceRangeContainer) return;

    const min = priceRangeContainer.dataset.min;
    const max = priceRangeContainer.dataset.max;
    const start = priceRangeContainer.dataset.start;
    const end = priceRangeContainer.dataset.end;
    const step = priceRangeContainer.dataset.step;
    const slider = priceRangeContainer.querySelector('.price-range__slider');
    const inputStart = priceRangeContainer.querySelector('.price-range__input--start');
    const inputEnd = priceRangeContainer.querySelector('.price-range__input--end');

    const priseRange = noUiSlider.create(slider, {
        start: [+start, +end],
        connect: true,
        range: {
            'min': [+min],
            'max': [+max],
        },
        step: +step,
        tooltips: false,
        format: wNumb({
            decimals: 0,
        })
    });

    priseRange.on('update', function (values, handle) {
        let value = values[handle];

        if (handle) {
            inputEnd.value = value;
        } else {
            inputStart.value = value;
        }
    });

    priseRange.on('change', (values, handle) => {
        if (handle) {
            let event = new Event("change", { bubbles: true });
            inputEnd.dispatchEvent(event);
        } else {
            let event = new Event("change", { bubbles: true });
            inputStart.dispatchEvent(event);
        }
    })

    inputStart.addEventListener('change', function () {
        priseRange.set([this.value, null]);
    });
    inputEnd.addEventListener('change', function () {
        priseRange.set([null, this.value]);
    });

    return {
        reset: () => {
            priseRange.set([+start, +end]);
            let event = new Event("change", { bubbles: true });
            inputEnd.dispatchEvent(event);
            inputStart.dispatchEvent(event);
        }
    }
}
			const productImages = document.querySelector('[data-product-images]');
if (productImages) {
    const thumbsSlider = new Swiper(productImages.querySelector('[data-slider="product-images-thumbs"]'), {
        slidesPerView: 'auto',
        freeMode: true,
        direction: 'vertical',
        observer: true,
        observeParents: true,
        slideToClickedSlide: true,
        navigation: {
            nextEl: productImages.querySelector('.product-images__btn.bottom'),
            prevEl: productImages.querySelector('.product-images__btn.top'),
        },
    })
    const mainSlider = new Swiper(productImages.querySelector('[data-slider="product-images-main"]'), {
        effect: document.documentElement.clientWidth < 992 ? 'slide' : 'fade',
        speed: 400,
        slidesPerView: 1,
        spaceBetween: 20,
        observer: true,
        observeParents: true,
        slideToClickedSlide: true,
        thumbs: {
            swiper: thumbsSlider,
        },
        scrollbar: {
            el: productImages.querySelector('[data-slider="product-images-main"] .swiper-scrollbar'),
        }
    })
}
			{
    let ratings = document.querySelectorAll('[data-rating]');
    if(ratings.length) {
        ratings.forEach(rating => {
            let count = rating.dataset.rating > 5 ? 5
                        : rating.dataset.rating ? rating.dataset.rating
                        : 0;
                        
            let starsLine = rating.querySelector('.rating__stars-1');

            starsLine.style.width = `calc(${count / 5 * 100}% - ${0.5}rem)`;
        })
    }
}
			
			document.addEventListener('click', (e) => {
    if(e.target.closest('.quantity__btn')) {
        const btn = e.target.closest('.quantity__btn');
        const parent = btn.parentElement;
        const input = parent.querySelector('.quantity__value');

        if(btn.classList.contains('minus')) {
            if(input.value <= 1) return;
            
            input.value--;

            if(input.value == 1) {
                btn.classList.add('disabled');
            }
        } else if(btn.classList.contains('plus')) {
            input.value++;

            const btnMinus = parent.querySelector('.quantity__btn.minus');
            if(!btnMinus) return;
            btnMinus.classList.remove('disabled');
        }
    }
})

const quantityElements = document.querySelectorAll('[data-quantity]');
if(quantityElements.length) {
    quantityElements.forEach(quantityElement => {
        const btnMinus = quantityElement.querySelector('.quantity__btn.minus');
        const input = quantityElement.querySelector('.quantity__value');

        if(input.value == 1) {
            btnMinus.classList.add('disabled')
        }
    })
}
			{
    function _slideUp(target, duration = 400) {
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
    function _slideDown(target, duration = 400) {
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
    function _slideToggle(target, duration = 400) {
        if (!target.classList.contains('_slide')) {
            target.classList.add('_slide');
            if (window.getComputedStyle(target).display === 'none') {
                return _slideDown(target, duration);
            } else {
                return _slideUp(target, duration);
            }
        }
    }

    //Select
    let selects = document.querySelectorAll('.select-wrap select');
    if (selects.length > 0) {
        selects_init();
    }
    function selects_init() {
        for (let index = 0; index < selects.length; index++) {
            const select = selects[index];
            select_init(select);
        }
        //select_callback();
        document.addEventListener('click', function (e) {
            selects_close(e);
        });
        document.addEventListener('keydown', function (e) {
            if (e.which == 27) {
                selects_close(e);
            }
        });
    }
    function selects_close(e) {
        const selects = document.querySelectorAll('.select');
        if (!e.target.closest('.select')) {
            for (let index = 0; index < selects.length; index++) {
                const select = selects[index];
                const select_body_options = select.querySelector('.select__options');
                select.classList.remove('_active');
                _slideUp(select_body_options, 100);
            }
        }
    }
    function select_init(select) {
        const select_parent = select.parentElement;
        const select_modifikator = select.getAttribute('class');
        const select_selected_option = select.querySelector('option:checked');
        select.setAttribute('data-default', select_selected_option.value);
        select.style.display = 'none';

        select_parent.insertAdjacentHTML('beforeend', '<div class="select select_' + select_modifikator + '"></div>');

        let new_select = select.parentElement.querySelector('.select');
        new_select.appendChild(select);
        select_item(select);
    }
    function select_item(select) {
        const select_parent = select.parentElement;
        const select_items = select_parent.querySelector('.select__item');
        const select_options = select.querySelectorAll('option');
        const select_selected_option = select.querySelector('option:checked');
        const select_selected_text = select_selected_option.innerHTML;
        const select_type = select.getAttribute('data-type');
        const label = '<span class="select__label">Price:</span>';

        if(select.required) {
            select_parent.classList.add('required');
        }

        if (select_items) {
            select_items.remove();
        }

        let select_type_content = '';
        if (select_type == 'input') {
            select_type_content = '<div class="select__value"><input autocomplete="off" type="text" name="form[]" value="' + select_selected_text + '" data-error="Ошибка" data-value="' + select_selected_text + '" class="select__input"></div>';
        } else {
            select_type_content = '<div class="select__value"><span>' + select_selected_text + '</span></div>';
        }


        select_parent.insertAdjacentHTML('beforeend',
            '<div class="select__item">' +
            `<div class="select__title">${(select.dataset.select === 'price') ? label : ''}` + select_type_content + '</div>' +
            '<div class="select__options">' + select_get_options(select_options) + '</div>' +
            '</div></div>');

        select_actions(select, select_parent);
    }
    function select_actions(original, select) {
        const select_item = select.querySelector('.select__item');
        const select_body_options = select.querySelector('.select__options');
        const select_options = select.querySelectorAll('.select__option');
        const select_type = original.getAttribute('data-type');
        const select_input = select.querySelector('.select__input');

        select_item.addEventListener('click', function () {
            let selects = document.querySelectorAll('.select');
            for (let index = 0; index < selects.length; index++) {
                const select = selects[index];
                const select_body_options = select.querySelector('.select__options');
                if (select != select_item.closest('.select')) {
                    select.classList.remove('_active');
                    _slideUp(select_body_options, 100);
                } 
            }
            _slideToggle(select_body_options, 100);
            select.classList.toggle('_active');
        });

        for (let index = 0; index < select_options.length; index++) {
            const select_option = select_options[index];
            const select_option_value = select_option.getAttribute('data-value');
            const select_option_text = select_option.innerHTML;

            if (select_type == 'input') {
                select_input.addEventListener('keyup', select_search);
            } else {
                if (select_option.getAttribute('data-value') == original.value) {
                    select_option.style.display = 'none';
                }
            }
            select_option.addEventListener('click', function () {
                for (let index = 0; index < select_options.length; index++) {
                    const el = select_options[index];
                    el.style.display = 'block';
                }
                if (select_type == 'input') {
                    select_input.value = select_option_text;
                    original.value = select_option_value;
                } else {
                    select.querySelector('.select__value').innerHTML = '<span>' + select_option_text + '</span>';
                    original.value = select_option_value;
                    select_option.style.display = 'none';
                    select.classList.add('selected');

                    let event = new Event("change", { bubbles: true });
                    original.dispatchEvent(event);
                }
            });
        }
    }
    function select_get_options(select_options) {
        if (select_options) {
            let select_options_content = '';
            for (let index = 0; index < select_options.length; index++) {
                const select_option = select_options[index];
                const select_option_value = select_option.value;
                if (select_option_value != '') {
                    const select_option_text = select_option.text;
                    select_options_content = select_options_content + '<div data-value="' + select_option_value + '" class="select__option">' + select_option_text + '</div>';
                }
            }
            return select_options_content;
        }
    }
    function select_search(e) {
        let select_block = e.target.closest('.select ').querySelector('.select__options');
        let select_options = e.target.closest('.select ').querySelectorAll('.select__option');
        let select_search_text = e.target.value.toUpperCase();

        for (let i = 0; i < select_options.length; i++) {
            let select_option = select_options[i];
            let select_txt_value = select_option.textContent || select_option.innerText;
            if (select_txt_value.toUpperCase().indexOf(select_search_text) > -1) {
                select_option.style.display = "";
            } else {
                select_option.style.display = "none";
            }
        }
    }
    window.select = {
        updateAll: () => {
            let selects = document.querySelectorAll('select');
            if (selects) {
                for (let index = 0; index < selects.length; index++) {
                    const select = selects[index];
                    select_item(select);
                }
            }
        }
    }
}
			document.addEventListener('click', (e) => {
    if(e.target.closest('[data-action="show-full-description-card-text"]')) {
        e.preventDefault();
        e.target.closest('[brand-description-card]')?.classList.add('show-full-text');
    }
    if(e.target.closest('[data-action="hide-full-description-card-text"]')) {
        e.preventDefault();
        e.target.closest('[brand-description-card]')?.classList.remove('show-full-text');
    }
})
			// categories
const headerMobCategoriesSlider = document.querySelector('[data-slider="header-mob-categories"]');
if (headerMobCategoriesSlider) {
    const swiperSlider = new Swiper(headerMobCategoriesSlider, {
        freeMode: true,
        slidesPerView: 'auto',
        scrollbar: {
            el: headerMobCategoriesSlider.querySelector('.swiper-scrollbar'),
            hide: true,
            draggable: true
        },
    })
}

class CategoryItems {
    _items = null;
    _header = null;
    _categories = null;

    static setHeight() {
        if(!this._header) return;
        
        this._items.forEach(item => {
            item.style.maxHeight = document.documentElement.clientHeight - this._header.clientHeight - this._categories.clientHeight + 'px';
        })
    }

    static init() {
        this._items = Array.from(categoriesEl.querySelectorAll('[data-category-tab]'));
        this._header = document.querySelector('[data-header]');
        this._categories = document.querySelector('[data-categories]');
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
			// ==== // components =====================================================


			// ==== widgets =====================================================
			



// Mobile menu
const mobileMenu = document.querySelector('[data-mobile-menu]');
if (mobileMenu) {
    const buttonsOpen = document.querySelectorAll('[data-action="open-mobile-menu"]');
    const buttonsClose = document.querySelectorAll('[data-action="close-mobile-menu"]');
    const mainLayer = mobileMenu.querySelector('.mobile-menu__main-layer');

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

    document.addEventListener('click', (e) => {
        if(
            e.target.closest('[data-action]')
            || e.target.closest('[data-side-basket]')
            || e.target.closest('[data-filter]')
            || e.target.closest('[data-add-comment]')
            ) return;

        if(!e.target.closest('.mobile-menu')) {
            document.body.classList.remove('overflow-hidden');
            mobileMenu.classList.remove('open')
        }
    })

    mobileMenu.addEventListener('click', (e) => {
        if(e.target.closest('[data-action="show-layer-by-id"]')) {
            const btn = e.target.closest('[data-action="show-layer-by-id"]');
            const id = btn.getAttribute('data-id');
            if(!id) return;
            
            const layer = mobileMenu.querySelector(`[data-layer="${id}"]`);
            if(!layer) return;
            layer.classList.add('show');
            mainLayer.classList.add('overflow-hidden');
        }

        if(e.target.closest('[data-action="hide-layer"]')) {
            const layer = e.target.closest('[data-layer]');
            if(!layer) return;
            layer.classList.remove('show');
            mainLayer.classList.remove('overflow-hidden');
        }
    })
}

// Top offer
const topOffers = document.querySelectorAll('[data-top-offer]');
if (topOffers.length) {
    const headHeightCompensation = document.querySelector('.head-height-compensation');

    topOffers.forEach(topOffer => {
        const parrentEl = topOffer.parentElement;

        const setPaddingTop = (value, isTransition = false) => {
            parrentEl.style.transition = isTransition ? 'padding-top .15s ease' : '';
            parrentEl.style.paddingTop = value + 'px';
        }

        const setPaddingWrapper = () => {
            setPaddingTop(topOffer.clientHeight);
        }

        topOffer.classList.add('show');
        setPaddingTop(topOffer.clientHeight);
        CategoryItems.setHeight();


        window.addEventListener('resize', setPaddingWrapper);

        topOffer.addEventListener('click', (e) => {
            if(e.target.closest('[data-action="close-top-offer"]')) {
                e.preventDefault();
                const topOfferHeight = topOffer.clientHeight;
                topOffer.classList.remove('show');
                setPaddingTop(0, true);

                setTimeout(() => {
                    CategoryItems.setHeight();
                }, 300);
    
                window.removeEventListener('resize', setPaddingWrapper);

                if(!headHeightCompensation) return;
                headHeightCompensation.style.transition = 'padding-top .15s ease';
                headHeightCompensation.style.paddingTop = (headHeightCompensation.clientHeight - topOfferHeight) + 'px';
            }
        })
    })
}


const header = document.querySelector('[data-header]');
if(header) {

    // header scrool animation
    window.addEventListener('scroll', () => {
        header.classList.toggle('header--is-scrolling', window.pageYOffset > 50);
    })


    // header height compensation
    const headHeightCompensation = document.querySelector('.head-height-compensation');
    if(!headHeightCompensation) return;

    const setPaddingTop = (value, isTransition = false) => {
        headHeightCompensation.style.transition = isTransition ? 'padding-top .15s ease' : '';
        headHeightCompensation.style.paddingTop = value + 'px';
    }

    setPaddingTop(header.clientHeight);
    

    window.addEventListener('resize', () => setPaddingTop(header.clientHeight));
}


// main search
const mainSearchElements = document.querySelectorAll('[data-main-search]');
if(mainSearchElements.length) {
    mainSearchElements.forEach(mainSearch => {
        const searchId = mainSearch.getAttribute('data-id');
        if(!searchId) return;
        const buttonsShow = document.querySelectorAll(`[data-action="show-search-by-id"][data-id="${searchId}"]`);
        const buttonClose = mainSearch.querySelector('.main-search__btn-close');
        const input = mainSearch.querySelector('input.input');

        buttonsShow.forEach(buttonShow => {
            buttonShow.addEventListener('click', (e) => {
                e.preventDefault();
                mainSearch.classList.add('show');
                input.focus();
            })
        })

        input.addEventListener('blur', () => {
            if (input.value.length === 0) mainSearch.classList.remove('show');
        })

        buttonClose.addEventListener('click', (e) => {
            e.preventDefault();
            mainSearch.classList.remove('show');
        })
    })
};
			const homeIntro = document.querySelector('[data-slider="home-intro"]');
if(homeIntro) {
    const swiperSlider = new Swiper(homeIntro.querySelector('.swiper'), {
        slidesPerView: 1,
        speed: 600,
        scrollbar: {
            el: homeIntro.querySelector('.swiper-scrollbar'),
            draggable: true,
        },
        navigation: {
            nextEl: homeIntro.querySelector('.slider-btn.right'),
            prevEl: homeIntro.querySelector('.slider-btn.left'),
        },
    })

    const scrollbar = homeIntro.querySelector('.swiper-scrollbar');
    if(!scrollbar) return;
    const clickLine = document.createElement('div');
    clickLine.className = 'click-line';
    scrollbar.append(clickLine);
    
    clickLine.addEventListener('pointerdown', (e) => {
        e.preventDefault();
        e.stopPropagation();
        const countOfSlides = swiperSlider.slides.length;
        const step = clickLine.clientWidth / countOfSlides
        swiperSlider.slideTo(Math.floor(e.layerX / step));
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
                draggable: true
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
			const tickerLogosSections = document.querySelectorAll('[data-ticker-logos]');
if (tickerLogosSections.length) {
    tickerLogosSections.forEach(tickerLogosSection => {
        const sliderLtr = tickerLogosSection.querySelector('.swiper[dir="ltr"]');
        const sliderRtl = tickerLogosSection.querySelector('.swiper[dir="rtl"]');
        
        const options = {
            speed: 6000,
            autoplay: {
                delay: 1,
                disableOnInteraction: false
            },
            loop: true,
            freeMode: true,
            breakpoints: {
                0: {
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                },
            },
        }
        
        

        if(document.documentElement.clientWidth < 992) {
            new Swiper(sliderRtl, options);
        } else {
            sliderLtr.firstElementChild.append(...sliderRtl.firstElementChild.children)
        }

        new Swiper(sliderLtr, options);
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
			const banners = document.querySelectorAll('[data-banner]');
if (banners.length) {
    banners.forEach(banner => {
        const links = banner.querySelector('[data-slider="category-links-list-banner"]');
        const images = banner.querySelector('[data-slider="banner-images"]');
        const slider = links;
        let linksSlider;

        function mobileSlider() {
            if (document.documentElement.clientWidth <= 767 && slider.dataset.mobile == 'false') {
                linksSlider = new Swiper(slider, {
                    slidesPerView: 'auto',
                    //freeMode: true,
                    scrollbar: {
                        el: slider.querySelector('.swiper-scrollbar'),
                    },
                });

                slider.dataset.mobile = 'true';
            }

            if (document.documentElement.clientWidth > 767) {
                slider.dataset.mobile = 'false';

                if (slider.classList.contains('swiper-initialized')) {
                    linksSlider.destroy();
                }
            }
        }

        mobileSlider();

        window.addEventListener('resize', () => {
            mobileSlider();
        })

        const swiperSlider = new Swiper(images, {
            effect: 'fade',
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 400,
            touchRatio: 0,
            // thumbs: {
            //     swiper: linksSlider,
            // },
        });

        if(linksSlider?.controller) {
            linksSlider.controller.control = swiperSlider
        }

        const triggers = banner.querySelectorAll('.category-links__list [data-action="change-banner-image-by-index"]');

        triggers.forEach(trigger => {
            const index = trigger.getAttribute('data-index');
            if (!index) return;

            trigger.addEventListener('mouseenter', () => {
                swiperSlider.slideTo(index);
            })
        })
    })
}
;
			const catalogFilter = document.querySelector('[data-filter]');
if (catalogFilter) {
    const filterBrands = filterBrandsHandler(document.querySelector('[data-filter-brands]'));
    const selectedFilters = selectedFiltersHandler(document.querySelectorAll('.selected-filters'));
    const form = catalogFilter.querySelector('.filter__form');
    const priceRage = priceRangeHandler(document.querySelector('[data-range]'));
    const openButtons = document.querySelectorAll('[data-action="open-filter"]');
    const closeButtons = document.querySelectorAll('[data-action="close-filter"]');
    const mobileOpenFilterButtonCount = document.querySelector('.catalog__mobile-open-filter-button span');
    const buttonReset = document.querySelector('.filter__reset');

    const setCountOfSelectedFilters = (value) => {
        mobileOpenFilterButtonCount.innerHTML = value;

        if (value) {
            buttonReset.removeAttribute('disabled', '');
        } else {
            buttonReset.setAttribute('disabled', '');
        }
    }

    form.addEventListener('reset', (e) => {
        e.preventDefault();
        filterBrands?.reset();
        selectedFilters?.removeAll();
        priceRage?.reset();
    })

    form.addEventListener('change', (e) => {
        const result = Array.from(form.elements).reduce((value, el) => {
            if (el.nodeName === 'INPUT' && el.checked) {
                return ++value
            } else {
                return value;
            }
        }, 0);
        setCountOfSelectedFilters(result);

        if (e.target.nodeName === 'INPUT' && e.target.type === 'checkbox') {
            const checkbox = e.target;

            if (checkbox.checked) {
                const id = Date.now();
                const text = checkbox.parentElement.querySelector('.filter-checkbox-radio__text')?.innerText.trim() || null;
                if (!text) return;

                checkbox.setAttribute('data-id', id);
                selectedFilters.addItem(id, text);
            } else {
                const id = checkbox.getAttribute('data-id');
                if (!id) return;

                selectedFilters.removeItem(id);
            }
        } else if (e.target.nodeName === 'INPUT' && e.target.type === 'radio') {
            const radio = e.target;

            if(radio.checked) {
                const groupEl = radio.closest('.spoller__item-colapse-content')?.parentElement?.closest('li');
                const groupTitle = groupEl?.querySelector('.spoller__item-title')?.innerText || null;
                const text = radio.parentElement.querySelector('.filter-checkbox-radio__text')?.innerText.trim() || null;
                if (!text) return;

                const id = Date.now();
                radio.setAttribute('data-id', id);
                selectedFilters.addItem(id, `${groupTitle ? groupTitle + ': ' : ''}${text}`);

                const parentBlock = radio.closest('.filter__block');
                const allRadiosOfGroup = parentBlock.querySelectorAll(`input[type="radio"][name="${radio.name}"]`);
                allRadiosOfGroup.forEach(r => {
                    if(r === radio) return;
    
                    const id = r.getAttribute('data-id');
                    if (!id) return;
    
                    selectedFilters.removeItem(id);
                });
            } 
        }
    });

    selectedFilters.onRemoveItem((id) => {
        const el = form.querySelector(`[data-id="${id}"]`);

        el.checked = false;
        el.removeAttribute('data-id');

        const event = new Event('change', { bubbles: true });
        el.dispatchEvent(event);
    });

    closeButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            catalogFilter.classList.remove('open');
            document.body.classList.remove('overflow-hidden');
        })
    });

    openButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            catalogFilter.classList.add('open');
            document.body.classList.add('overflow-hidden');
        })
    })
}
;
			//toggle button as disabled by id handler
document.addEventListener('change', (e) => {
    if(e.target.closest('input[type="checkbox"][data-action="toggle-button-as-disabled-by-id"]')) {
        const checkbox = e.target;

        const id = checkbox.getAttribute("data-id");
        if(!id) return;

        const el = document.querySelector(`[data-target="toggle-button-as-disabled-by-id"][data-id="${id}"]`);
        if(!el) return;
        
        if(checkbox.checked) {
            el.removeAttribute('disabled');
        } else {
            el.setAttribute('disabled', '');
        }
    }
});

;
			const setStartsElements = document.querySelectorAll('[data-set-stars]');
if (setStartsElements.length) {
    setStartsElements.forEach((setStartsElement) => {
        const input = setStartsElement.querySelector('input');
        if (!input) return;

        const items = setStartsElement.querySelectorAll('.set-stars__item');

        items.forEach((item, index) => {

            item.addEventListener('click', () => {
                input.value = index + 1;
                items.forEach((i, ind) => {
                    if (ind > index) {
                        i.classList.remove('active');
                    } else {
                        i.classList.add('active');
                    }
                })
            });

            item.addEventListener('mouseenter', () => {
                items.forEach((i, ind) => {
                    if (ind > index) {
                        i.classList.remove('hover');
                    } else {
                        i.classList.add('hover');
                    }
                })
            })
        })

        setStartsElement.addEventListener('mouseleave', () => {
            items.forEach((i, ind) => {
                i.classList.remove('hover');
            })
        })
    })
}

const addCommentEl = document.querySelector('[data-add-comment]');
if (addCommentEl) {
    const openButtons = document.querySelectorAll('[data-action="opne-add-comment"]');
    const closeButtons = document.querySelectorAll('[data-action="close-add-comment"]');

    closeButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            addCommentEl.classList.remove('open');
            document.body.classList.remove('overflow-hidden');
        })
    });

    openButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            addCommentEl.classList.add('open');
            document.body.classList.add('overflow-hidden');
        })
    })
};
			const sideBasket = document.querySelector('[data-side-basket]');
if (sideBasket) {

    document.addEventListener('click', (e) => {
        if(e.target.closest('[data-action="open-side-basket"]')) {
            e.preventDefault();
            bodyLock();
            sideBasket.classList.add('open');
            document.body.classList.add('overflow-hidden');
        } else if(e.target.closest('[data-action="close-side-basket"]')) {
            e.preventDefault();
            sideBasket.classList.remove('open');
            bodyUnlock();
        }
    })

    sideBasket.addEventListener('click', (e) => {
        if (e.target.closest('.side-basket__container')) return;

        sideBasket.classList.remove('open');
        bodyUnlock();
    })

    window.sideBasket = {
        open: () => {
            bodyLock();
            sideBasket.classList.add('open');
            document.body.classList.add('overflow-hidden');
        },

        close: () => {
            sideBasket.classList.remove('open');
            bodyUnlock();
        }
    }
};
			
const brandsNavSlider = document.querySelector('[data-slider="brands-nav"]');
if (brandsNavSlider) {
    new Swiper(brandsNavSlider, {
        slidesPerView: 'auto',
        freeMode: true
    });
}

const brandsSection = document.querySelector('[data-brands]');
if (brandsSection) {
    const navItems = brandsSection.querySelectorAll('[data-action="filter-by-letter"]');
    const inputSearch = brandsSection.querySelector('.brands__search input');
    const list = brandsSection.querySelector('.brands__list');

    const listData = Array.from(list.children).map(listRow => {
        const rowItemsBlock = listRow.querySelector('.brands__list-block');
        const rowItemsData = rowItemsBlock?.children
            ? Array.from(rowItemsBlock.children).map(rowItem => {
                return {
                    el: rowItem,
                    text: rowItem.querySelector('.brands__list-block-item').innerText.trim().toLowerCase()
                }
            })
            : null
        return {
            letter: listRow.getAttribute('data-letter').toLowerCase(),
            el: listRow,
            children: rowItemsData
        }
    });

    const filter = (value) => {
        const text = value.trim().toLowerCase();
        const firstLetter = text.at(0);

        listData.forEach(listRowData => {
            if (text.length) {

                if (firstLetter !== listRowData.letter) {

                    listRowData.el.classList.add('d-none');

                } else {
                    listRowData.el.classList.remove('d-none');
                    listRowData.children && listRowData.children.forEach(rowItem => {

                        if (!rowItem.text.startsWith(text)) {
                            rowItem.el.classList.add('d-none');
                        } else {
                            rowItem.el.classList.remove('d-none');
                        }

                    })
                }

            } else {
                listRowData.el.classList.remove('d-none');
            }
        })
    }

    inputSearch.addEventListener('input', (e) => {
        filter(e.target.value);
    });

    navItems.forEach(navItem => {
        const letter = navItem.getAttribute('data-letter');
        if(!letter) return;

        navItem.addEventListener('click', () => {
            if(letter === '#') {
                inputSearch.parentElement.classList.remove('using');
                inputSearch.value = '';
                filter('');
            } else {
                inputSearch.parentElement.classList.add('using');
                inputSearch.value = letter;
                filter(letter);
            }
            navItems.forEach(n => {
                if(n === navItem) {
                    n.classList.add('active');
                } else {
                    n.classList.remove('active');
                }
            })
        })
    })
};
			const faqNavSlider = document.querySelector('[data-slider="faq-nav"]');
if (faqNavSlider) {
    const slider = faqNavSlider;
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
};
			// ==== // widgets =====================================================
		
			document.body.classList.add('page-loaded');
		});



		window.addEventListener('load', () => {

		});

	}
}

let app = new App();
app.init();


