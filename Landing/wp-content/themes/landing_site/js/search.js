const ssSearch = function () {
    const searchWrap = document.querySelector('.s-header__search');
    const searchTrigger = document.querySelector('.s-header__search-trigger');

    if (!(searchWrap && searchTrigger)) return;

    const searchField = searchWrap.querySelector('.s-header__search-field');
    const closeSearch = searchWrap.querySelector('.s-header__search-close');
    const siteBody = document.querySelector('body');

    searchTrigger.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        siteBody.classList.add('search-is-visible');

        scrollLock.getScrollState()
            ? scrollLock.disablePageScroll(searchWrap)
            : scrollLock.enablePageScroll(searchWrap);

        setTimeout(function () {
            searchWrap.querySelector('.s-header__search-field').focus();
        }, 100);
    });

    closeSearch.addEventListener('click', function (e) {
        e.stopPropagation();

        if (siteBody.classList.contains('search-is-visible')) {
            siteBody.classList.remove('search-is-visible');
            setTimeout(function () {
                searchWrap.querySelector('.s-header__search-field').blur();
            }, 100);

            scrollLock.getScrollState()
                ? scrollLock.disablePageScroll(searchWrap)
                : scrollLock.enablePageScroll(searchWrap);
        }
    });

    searchWrap.addEventListener('click', function (e) {
        if (!e.target.matches('.s-header__search-inner')) {
            closeSearch.dispatchEvent(new Event('click'));
        }
    });

    searchField.addEventListener('click', function (e) {
        e.stopPropagation();
    });

    searchField.setAttribute('placeholder', 'Search for...');
    searchField.setAttribute('autocomplete', 'off');
}; // end ssSearch

document.addEventListener('DOMContentLoaded', ssSearch);
