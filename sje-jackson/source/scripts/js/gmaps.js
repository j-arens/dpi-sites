let instance = undefined;

/* eslint-disable */

export default class DpiMaps {
    constructor() {
        if (!instance) {
            instance = this;
            this.apiKey = 'AIzaSyCYCgRB1M8tpaZ3KFjs3XM2nH2u_hhuppA';
            this.callback = 'googleMapInit';
            this.endpoint = `https://maps.googleapis.com/maps/api/js?key=${this.apiKey}&callback=${this.callback}`;
            this.queue = [];
            window[this.callback] = this.mapInit.bind(this);
            this.loadGoogleServices();
        }

        return instance;
    }

    loadGoogleServices() {
        const script = document.createElement('script');
        script.src = this.endpoint;
        script.async = true;
        script.defer = true;
        document.querySelector('head').appendChild(script);
    }

    cycleQueue() {
        if (!this.queue.length) return;

        this.queue.forEach(map => this.mapInit(map));
        this.queue = [];
    }

    mapInit(obj = null) {

        // google will call this func once the library is loaded
        // using this as an opportunity to run through the queue
        if (obj === null) {
            return this.cycleQueue();
        }

        const map = new window.google.maps.Map(obj.root, {
            zoom: 15,
            center: {lat: obj.lat, lng: obj.lng},
            scrollwheel: false,
            disableDoubleClickZoom: true
        });

        new window.google.maps.Marker({position: {lat: obj.lat, lng: obj.lng}, map});

        google.maps.event.trigger(map, 'resize');

        if (!window.hasOwnProperty('maps')) {
            window.maps = [];
        }

        window.maps.push(map);
    }

    createMap(root, lat, lng) {
        // google maps api is loaded async so waiting for everything to setup is tricky
        // let the if statement error out and push to queue if the library isn't FULLY loaded
        try {
            if (window.google.maps.Map) {
                return this.mapInit({root, lat, lng});
            }
        } catch(e) {
            this.queue.push({root, lat, lng, e});
        }
    }
} 