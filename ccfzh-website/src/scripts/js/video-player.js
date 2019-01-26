const dpiVideoPlayer = (function() {

    let videoPreview;

    function ready(fn) {
        if (document.readyState != 'loading'){
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    function injectModal(videoSrc) {
        document.body.insertAdjacentHTML('beforeend', `
            <div class="dpi-videoPlayer__overlay">
                <button onclick="(function() {document.body.removeChild(document.querySelector('.dpi-videoPlayer__overlay'))})()" class="dpi-videoPlayer__exit">X Close</button>
                <div class="dpi-videoPlayer__container">
                    <iframe class="dpi-videoPlayer__video" src="${videoSrc}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        `);
    }

    function handlePreviewClick(e) {
        if (e.target.tagName === 'A' && !/^#|\s+$/.test(e.target.getAttribute('href'))) {
            e.preventDefault();
            injectModal(e.target.getAttribute('href'));
        }
    }

    function bindEvents() {
        try {
            videoPreview.addEventListener('click', handlePreviewClick);
        } catch(err) {
            console.error('DPI Video Player: Unable to bind events!');
        }
    }

    function injectStyles() {
        document.head.insertAdjacentHTML('beforeend', `
            <style>

                .dpi-videoPlayer__overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100vh;
                    z-index: 9999;
                    background: rgba(0, 0, 0, 0.95);
                }

                .dpi-videoPlayer__container {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    padding: 1em;
                    box-shadow: 0 0 50px 2px rgba(255, 255, 255, 0.1);
                    width: 100%;
                    height: 100%;
                    max-width: 940px;
                    max-height: 470px;
                }

                .dpi-videoPlayer__video {
                    width: 100%;
                    height: 100%;
                }

                .dpi-videoPlayer__exit {
                    position: absolute;
                    top: 1em;
                    right: 1em;
                    color: #fff;
                    border: none;
                    background: none;
                    padding: 0;
                    font-size: 2.2em;
                }

            </style>
        `);
    }

    function cacheDom() {
        videoPreview = document.querySelector('.dpi-videoPlayer__preview');
    }

    function init() {
        injectStyles();
        cacheDom();
        bindEvents();
    }

    return {
        init() {
            ready(init);
        }
    }

})();

export default dpiVideoPlayer;