window.dpiPPF = (function() {

    let donationID,
        namespace,
        root,
        paypalBtn,
        dynamicModalWrapper,
        submitBtn;


    /**
     * Inject an alert dialog
     * @param {string} type 
     * @param {string} message 
     */
    function userMessage(type, message) {
        document.body.insertAdjacentHTML('beforeend', `
            <div class="dpi-forms__user-message dpi-forms__slide-in">
                <div class="dpi-forms__user-message_content dpi-forms__user-message_${type}">
                    <p class="dpi-forms__user-message_text">${message}</p>
                    <button onclick="(function() {document.body.removeChild(document.querySelector('.dpi-forms__user-message'))}())" class="dpi-forms__user-message_control">
                        <svg class="dpi-forms__user-message_control-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.4 62.4"><path d="M39.7 31.2l21-21c2.3-2.3 2.3-6.1 0-8.5 -2.3-2.3-6.1-2.3-8.5 0L31.2 22.7 10.2 1.8C7.9-0.6 4.1-0.6 1.8 1.8c-2.3 2.3-2.3 6.1 0 8.5L22.7 31.2 1.8 52.2c-2.3 2.3-2.3 6.1 0 8.5C2.9 61.8 4.5 62.4 6 62.4s3.1-0.6 4.2-1.8L31.2 39.7l21 21c1.2 1.2 2.7 1.8 4.2 1.8s3.1-0.6 4.2-1.8c2.3-2.3 2.3-6.1 0-8.5L39.7 31.2z"/></svg>
                    </button>
                </div>
            </div>
        `);
    }


    /**
     * Append paypal passthrough vars
     */
    function appendPaypalVars() {
        const donationAmount = root.querySelector('input[name="donationAmount"]').value;
        const returnURL = `${window.location.href}?paymentSuccess=1&donationID=${donationID}`;

        paypalBtn.insertAdjacentHTML('beforeend', `
            <input type="hidden" name="amount" value="${donationAmount}">
            <input type="hidden" name="return" value="${returnURL}">
        `);
    }


    /**
     * Extract form field labels and values into an object
     * @param {nodelist} fields 
     */
    function getValues(node) {
        const fields = [
            ...node.querySelectorAll(`${namespace}input`),
            ...node.querySelectorAll(`${namespace}select`),
            ...node.querySelectorAll(`${namespace}checkbox`)
        ];

        return fields.reduce((obj, field) => {
            const key = field.getAttribute('name');

            switch (field.tagName) {
                case 'INPUT':
                case 'SELECT':
                    obj[key] = field.value;
                    break;
                case 'CHECKBOX':
                    obj[key] = field.checked;
                    break;
            }

            return obj;
        }, {});
    }


    /**
     * Gather form values and store them in localStorage
     */
    function storeFormValues() {
        const formSection_1 = root.querySelector('div[data-formsection="1"]');
        const formSection_2 = root.querySelector('div[data-formsection="2"]');
        const formSection_3 = root.querySelector('div[data-formsection="3"]');
        const dynamicModals = Array.from(formSection_2.querySelectorAll(`${namespace}dynamic-modal_wrapper`));

        const data = {
            1: getValues(formSection_1),
            2: dynamicModals.map(modal => getValues(modal)),
            3: getValues(formSection_3)
        }

        window.localStorage.setItem(donationID, JSON.stringify(data));
    }


    /**
     * Validate form fields
     */
    function validateFields() {
        let valid = true;
        const inputs = root.querySelectorAll(`${namespace}input`);

        inputs.forEach(input => {

            // check that required fields are filled
            if (input.hasAttribute('required') && input.value === '') {
                valid = false;
                input.classList.add(`${namespace.replace(/[.|#]/g, '')}invalid-field`);
                input.placeholder = 'this field is required';
                input.addEventListener('focus', () => {
                    input.classList.remove(`${namespace.replace(/[.|#]/g, '')}invalid-field`);
                    input.placeholder = '';
                });
            }
        });

        return valid;
    }


    /**
     * Validate fields and submit form
     */
    function handleSubmit() {
        if (validateFields()) {
            storeFormValues();
            appendPaypalVars();
            paypalBtn.submit();
        } else {
            userMessage(
                'danger',
                'Some fields are invalid. Please check over the form and try re-submitting.'
            );
        }
    }


    /**
     * Remove a dynamic person modal
     * @param {node} target 
     */
    function removeModal(target) {
        target.parentNode.removeChild(target);
    }


    /**
     * Inject a new dynamic person modal
     * @param {node} context 
     */
    function appendModal(context) {
        const wrapper = context.querySelector(`${namespace}fields-wrapper`);
        wrapper.insertAdjacentHTML('beforeend', `
            <div class="dpi-forms__dynamic-modal_wrapper">
                <button class="dpi-forms__dynamic-modal_control dpi-forms__dynamic-modal_control-danger" data-action="remove_person">
                    <svg class="dpi-forms__dynamic-modal_control-icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 80.7 85.7"><path d="M66.8 23.2c-2.2 0-4 1.8-4 4v50.5H17.9V27.2c0-2.2-1.8-4-4-4s-4 1.8-4 4v54.5c0 2.2 1.8 4 4 4h52.9c2.2 0 4-1.8 4-4V27.2C70.8 25 69 23.2 66.8 23.2z"/><path d="M76.7 10.4H52.9V2.5c0-1.4-1.1-2.5-2.5-2.5H30.3c-1.4 0-2.5 1.1-2.5 2.5v7.9H4c-2.2 0-4 1.8-4 4s1.8 4 4 4h72.7c2.2 0 4-1.8 4-4S78.9 10.4 76.7 10.4zM32.8 5h15.1v5.4H32.8V5z"/><path d="M30.8 69.3V29.9c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5v39.4c0 1.4 1.1 2.5 2.5 2.5S30.8 70.7 30.8 69.3z"/><path d="M42.9 69.4V30c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5v39.4c0 1.4 1.1 2.5 2.5 2.5S42.9 70.8 42.9 69.4z"/><path d="M54.7 69.5V30.1c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5v39.4c0 1.4 1.1 2.5 2.5 2.5S54.7 70.9 54.7 69.5z"/></svg>
                </button>
                <label class="dpi-forms__label dpi-forms__label-full_width">
                    <p class="dpi-forms__label-title">Full Name</p>
                    <input type="text" class="dpi-forms__input" name="name" />
                </label>
                <label class="dpi-forms__label dpi-forms__label-full_width">
                    <p class="dpi-forms__label-title">Zip</p>
                    <input type="number" min="0" step="1" class="dpi-forms__input" name="zipCode" />
                </label>
                <label class="dpi-forms__label dpi-forms__label-full_width">
                    <p class="dpi-forms__label-title">City</p>
                    <input type="text" class="dpi-forms__input" name="city" />
                </label>
                <label class="dpi-forms__label dpi-forms__label-full_width">
                    <p class="dpi-forms__label-title">State</p>
                    <select class="dpi-forms__input dpi-forms__select" name="state" required >
                        <option disabled selected value=""></option>
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Arizonia">Arizonia</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="Dist. of Columbia">Dist. of Columbia</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Indiana">Indiana</option>
                        <option value="Iowa">Iowa</option>
                        <option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option>
                        <option value="Louisiana">Louisiana</option>
                        <option value="Maine">Maine</option>
                        <option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option>
                        <option value="Michigan">Michigan</option>
                        <option value="Minnesota">Minnesota</option>
                        <option value="Mississippi">Mississippi</option>
                        <option value="Missouri">Missouri</option>
                        <option value="Montana">Montana</option>
                        <option value="Nebraska">Nebraska</option>
                        <option value="Nevada">Nevada</option>
                        <option value="New Hampshire">New Hampshire</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New Mexico">New Mexico</option>
                        <option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option>
                        <option value="North Dakota">North Dakota</option>
                        <option value="Ohio">Ohio</option>
                        <option value="Oklahoma">Oklahoma</option>
                        <option value="Oregon">Oregon</option>
                        <option value="Pennsylvania">Pennsylvania</option>
                        <option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option>
                        <option value="South Dakota">South Dakota</option>
                        <option value="Tennessee">Tennessee</option>
                        <option value="Texas">Texas</option>
                        <option value="Utah">Utah</option>
                        <option value="Vermont">Vermont</option>
                        <option value="Virginia">Virginia</option>
                        <option value="Washington">Washington</option>
                        <option value="West Virginia">West Virginia</option>
                        <option value="Wisconsin">Wisconsin</option>
                        <option value="Wyoming">Wyoming</option>
                    </select>
                </label>
                <label class="dpi-forms__label dpi-forms__label-full_width">
                    <p class="dpi-forms__label-title">Address</p>
                    <input type="text" class="dpi-forms__input" name="address" />
                </label>
            </div>
        `);
    }


    /**
     * Route modal wrapper clicks
     * @param {event} e 
     */
    function handleModalWrapperClick(e) {
        if (e.target.dataset.action) {
            switch (e.target.dataset.action) {
                case 'add_person':
                    appendModal(this);
                    break;
                case 'remove_person':
                    removeModal(e.target.parentNode);
                    break;
            }
        }
    }

    
    /**
     * Setup event listeners
     */
    function bindEvents() {
        try {
            dynamicModalWrapper.addEventListener('click', handleModalWrapperClick);
            submitBtn.addEventListener('click', handleSubmit);
        } catch(err) {
            console.error('DPI PPF: Unable to bind events!');
        }
    }


    /**
     * Cache nodes that we're gonna need to reference
     */
    function cacheDom() {
        root = document.getElementById('dpi-forms__root');
        paypalBtn = root.querySelector(`${namespace}paypal-submit`);
        dynamicModalWrapper = root.querySelector(`${namespace}dynamic-modals`);
        submitBtn = root.querySelector(`${namespace}submit`);
    }


    /**
     * Entry point
     */
    function main() {
        cacheDom();
        bindEvents();
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
            ready(main);
        }
    }

})();