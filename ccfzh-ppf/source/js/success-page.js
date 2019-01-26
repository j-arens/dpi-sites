window.dpiPPFSuccessPage = (function() {

    let namespace,
        donationID,
        homeURL,
        ajaxURL,
        root,
        counterContainer;


    /**
     * Redirect to homepage after the counter reaches 0
     */
    function startRedirectCounter() {
        setInterval(target => {
            if (parseInt(target.textContent) > 0) {
                target.textContent = parseInt(target.textContent) - 1;
            } else {
                window.location.replace(homeURL);
            }
        }, 1000, counterContainer);
    }


    /**
     * Get form values from localstorage
     */
    function retrieveFormValues() {
        const values = window.localStorage.getItem(donationID);

        if (values) {
            return 'action=dpi_ppf_form_values&formValues=' + encodeURIComponent(values);
        }

        return false;
    }


    /**
     * Post form values to backend for processing
     */
    function postFormValues() {
        const data = retrieveFormValues();

        if (data) {
            const req = new XMLHttpRequest();
            req.open('POST', ajaxURL, true);
            req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            req.send(data);
            window.localStorage.removeItem(donationID);
        }
    }


    /**
     * Cache important nodes
     */
    function cacheDom() {
        root = document.getElementById('dpi-forms__root');
        counterContainer = root.querySelector(`${namespace}success-page_redirect-counter`);
    }


    /**
     * Entry point
     */
    function main() {
        cacheDom();
        postFormValues();
        startRedirectCounter();
    }


    /**
     * Wait for DOM to load before running module
     * @param {function} fn 
     */
    function ready(fn) {
        if (document.readyState != 'loading') {
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    return {
        init(config) {
            namespace = config.namespace || '.dpi-forms__';
            donationID = config.id || 1;
            homeURL = config.homeURL;
            ajaxURL = config.ajaxURL || false;
            ready(main);
        }
    }

})();