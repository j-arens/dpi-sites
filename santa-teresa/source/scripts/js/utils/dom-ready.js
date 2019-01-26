export function domReady(...fnx) {
    if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
        fnx.forEach(fn => fn());
    } else {
        document.addEventListener('DOMContentLoaded', () => fnx.forEach(fn => fn()));
    }
}