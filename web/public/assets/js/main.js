(function () {
  "use strict";
  
  function toggleScrolled() {
    const selectBody = document.querySelector("body");
    const selectHeader = document.querySelector("#header");
    if (
      !selectHeader.classList.contains("scroll-up-sticky") &&
      !selectHeader.classList.contains("sticky-top") &&
      !selectHeader.classList.contains("fixed-top")
    )
      return;
    window.scrollY > 100
      ? selectBody.classList.add("scrolled")
      : selectBody.classList.remove("scrolled");
  }

  window.addEventListener('scroll', function () {
    const header = document.querySelector('.header');
    if (window.scrollY > 100) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  document.addEventListener("scroll", toggleScrolled);
  window.addEventListener("load", toggleScrolled);

  // Mobile nav toggle
  const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");

  function mobileNavToogle() {
    document.querySelector("body").classList.toggle("mobile-nav-active");
    mobileNavToggleBtn.classList.toggle("bi-list");
    mobileNavToggleBtn.classList.toggle("bi-x");
  }
  mobileNavToggleBtn.addEventListener("click", mobileNavToogle);

  // mobile nav on same-page/hash links
  document.querySelectorAll("#navmenu a").forEach((navmenu) => {
    navmenu.addEventListener("click", () => {
      if (document.querySelector(".mobile-nav-active")) {
        mobileNavToogle();
      }
    });
  });

  // Toggle mobile nav dropdowns
  document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
    navmenu.addEventListener("click", function (e) {
      e.preventDefault();
      this.parentNode.classList.toggle("active");
      this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
      e.stopImmediatePropagation();
    });
  });

  // Preloader
  const preloader = document.querySelector("#preloader");
  if (preloader) {
    document.addEventListener("DOMContentLoaded", () => {
      preloader.remove();
    });
  }

  // Scroll top button
  let scrollTop = document.querySelector(".scroll-top");

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100
        ? scrollTop.classList.add("active")
        : scrollTop.classList.remove("active");
    }
  }
  scrollTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  window.addEventListener("load", toggleScrollTop);
  document.addEventListener("scroll", toggleScrollTop);

  // Animation on scroll function and init
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: "ease-in-out",
      once: true,
      mirror: false,
    });
  }
  window.addEventListener("load", aosInit);

  // Initiate glightbox
  const glightbox = GLightbox({
    selector: ".glightbox",
  });

  // Frequently Asked Questions Toggle
  document
    .querySelectorAll(".faq-item h3, .faq-item .faq-toggle")
    .forEach((faqItem) => {
      faqItem.addEventListener("click", () => {
        faqItem.parentNode.classList.toggle("faq-active");
      });
    });

  // Init swiper sliders
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  // Correct scrolling position upon page load for URLs containing hash links.
  window.addEventListener("load", function (e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: "smooth",
          });
        }, 100);
      }
    }
  });

  // Navmenu Scrollspy
  let navmenulinks = document.querySelectorAll(".navmenu a");

  function navmenuScrollspy() {
    navmenulinks.forEach((navmenulink) => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (
        position >= section.offsetTop &&
        position <= section.offsetTop + section.offsetHeight
      ) {
        document
          .querySelectorAll(".navmenu a.active")
          .forEach((link) => link.classList.remove("active"));
        navmenulink.classList.add("active");
      } else {
        navmenulink.classList.remove("active");
      }
    });
  }
  window.addEventListener("load", navmenuScrollspy);
  document.addEventListener("scroll", navmenuScrollspy);
})();

// Initialize Isotope for filtering
document.querySelectorAll(".isotope-layout").forEach(function (isotopeItem) {
  let layout = isotopeItem.getAttribute("data-layout") ?? "masonry";
  let filter = isotopeItem.getAttribute("data-default-filter") ?? "*";
  let sort = isotopeItem.getAttribute("data-sort") ?? "original-order";
  const itemsPerPage = 6; // Maximum cards per page
  let currentPage = 1;

  let initIsotope;
  imagesLoaded(isotopeItem.querySelector(".isotope-container"), function () {
    initIsotope = new Isotope(isotopeItem.querySelector(".isotope-container"), {
      itemSelector: ".isotope-item",
      layoutMode: layout,
      filter: filter,
      sortBy: sort,
      transitionDuration: "0.6s",
    });

    const checkEmptyResult = () => {
      const filteredItems = initIsotope.filteredItems.length;
      const noDataMessage = isotopeItem.querySelector(".no-data-message");
      if (filteredItems === 0) {
        noDataMessage.style.display = "block";
      } else {
        noDataMessage.style.display = "none";
      }
    };

    checkEmptyResult();

    // Filter functionality
    isotopeItem
      .querySelectorAll(".isotope-filters li")
      .forEach(function (filters) {
        filters.addEventListener(
          "click",
          function () {
            isotopeItem
              .querySelector(".isotope-filters .filter-active")
              .classList.remove("filter-active");
            this.classList.add("filter-active");
            initIsotope.arrange({
              filter: this.getAttribute("data-filter"),
            });

            if (typeof aosInit === "function") {
              aosInit();
            }

            checkEmptyResult();
            updatePagination();
          },
          false
        );
      });

    // Search functionality
    const searchButton = document.querySelector(
      ".input-group button#button-addon2"
    );
    const searchInput = document.querySelector(
      '.input-group input[placeholder="Ketik di sini..."]'
    );

    searchButton.addEventListener("click", function () {
      executeSearch();
    });

    searchInput.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
        executeSearch();
      }
    });

    function executeSearch() {
      const searchText = searchInput.value.toLowerCase();
      const items = initIsotope.getFilteredItemElements();

      initIsotope.arrange({
        filter: function (itemElem) {
          const title = itemElem
            .querySelector(".card-title")
            .textContent.toLowerCase();
          return title.includes(searchText);
        },
      });

      if (searchText.length === 0) {
        initIsotope.arrange({ filter: "*" });
      }

      checkEmptyResult();
      currentPage = 1;
      updatePagination();
    }



  });
});

/**
 * Init swiper sliders
 */
function initSwiper() {
  document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
    let config = JSON.parse(
      swiperElement.querySelector(".swiper-config").innerHTML.trim()
    );

    if (swiperElement.classList.contains("swiper-tab")) {
      initSwiperWithCustomPagination(swiperElement, config);
    } else {
      new Swiper(swiperElement, config);
    }
  });
}

window.addEventListener("load", initSwiper);


// Light and dark mode

function setMode(mode) {
  const setVar = (varName, value) => {document.documentElement.style.setProperty(varName, value)};
  // dark mode
  if (mode === 'dark') {    
    setVar('--background-color', '#1e1e1e');
    setVar('--default-color', '#ffffff');
    setVar('--heading-color', '#ffffff');
    setVar('--surface-color', '#252525');
    setVar('--filter-color', '#ffff');
    setVar('--filter-hover-color', '#1e1e1e');
    setVar('--nav-color', '#ffff');
    setVar('--nav-hover-color', '#c1ceea');
    setVar('--nav-mobile-background-color', '#1E1E1E');
    setVar('--nav-dropdown-background-color', '#252525');
    setVar('--nav-dropdown-color', '#ffffff');
    setVar('--nav-dropdown-hover-color', '#c1ceea');
    setVar('--nav-mobile-text-color', '#000000b5');
    setVar('--background-transparent-color', '#000000ab');
    setVar('--title-color', '#4870B7');
    setVar('--nav-shadow', '#ffffff1c');
    setVar('--table-bg-color', '#2b2b2b');
    setVar('--table-text-color', '#eeeeee');
    setVar('--thead-bg-color', '#272626');
    setVar('--thead-text-color', '#eeeeee');

    // dark asset
    const aboutImage = document.querySelector('.about-image');
    if (aboutImage)
      aboutImage.src = 'assets/img/asset-dark.svg';

    const aboutImageMobile = document.querySelector('.about-image-mobile');
    if (aboutImageMobile)
      aboutImageMobile.src = 'assets/img/asset-dark-mobile.svg';

    const assetHeroImage = document.querySelector('.asset-hero-image');
    if (assetHeroImage)
      assetHeroImage.src = 'assets/img/asset-dark-hero.svg';

  } else {
    // light mode
    setVar('--background-color', '#f8fafc');
    setVar('--default-color', '#3d4348');
    setVar('--heading-color', '#3e5055');
    setVar('--surface-color', '#ffffff');
    setVar('--filter-color', '#02287A');
    setVar('--filter-hover-color', '#f8fafc');
    setVar('--nav-color', '#000000');
    setVar('--nav-hover-color', '#02287A');
    setVar('--nav-mobile-background-color', '#ffffff');
    setVar('--nav-dropdown-background-color', '#ffffff');
    setVar('--nav-dropdown-color', '#313336');
    setVar('--nav-dropdown-hover-color', '#02287A');
    setVar('--nav-mobile-text-color', '#ffffffb5');
    setVar('--background-transparent-color', '#a7bfd7da ');
    setVar('--title-color', '#02287A');
    setVar('--nav-shadow', '#0000001a');
    setVar('--table-bg-color', '#ffffff');
    setVar('--table-text-color', '#000000');
    setVar('--thead-bg-color', '#f8f9fa');
    setVar('--thead-text-color', '#000000');

    // light asset
    const aboutImage = document.querySelector('.about-image');
    if (aboutImage)
      aboutImage.src = 'assets/img/asset-light.svg';

    const aboutImageMobile = document.querySelector('.about-image-mobile');
    if (aboutImageMobile)
      aboutImageMobile.src = 'assets/img/asset-light-mobile.svg';

    const assetHeroImage = document.querySelector('.asset-hero-image');
    if (assetHeroImage)
      assetHeroImage.src = 'assets/img/asset-light-hero.svg';
  }

  localStorage.setItem('themeMode', mode);
}

function toggleMode() {
  const currentMode = localStorage.getItem('themeMode') || 'light';
  const newMode = currentMode === 'light' ? 'dark' : 'light';
  setMode(newMode);

  const themeIcon = document.getElementById('theme-icon');
  themeIcon.classList.add('rotating');

  setTimeout(() => {
    themeIcon.classList.remove('rotating');
    themeIcon.className = newMode === 'light' ? 'bi bi-brightness-high' : 'bi bi-moon';
  }, 500);
}


function loadMode() {
  const savedMode = localStorage.getItem('themeMode') || 'light';
  setMode(savedMode);

  const themeIcon = document.getElementById('theme-icon');
  themeIcon.className = savedMode === 'light' ? 'bi bi-brightness-high' : 'bi bi-moon';
}

window.addEventListener('DOMContentLoaded', loadMode);


// Init typed

const selectTyped = document.querySelector('.typed');
if (selectTyped) {
  let typed_strings = selectTyped.getAttribute('data-typed-items');
  typed_strings = typed_strings.split(',');
  new Typed('.typed', {
    strings: typed_strings,
    loop: true,
    typeSpeed: 100,
    backSpeed: 50,
    backDelay: 2000
  });
}