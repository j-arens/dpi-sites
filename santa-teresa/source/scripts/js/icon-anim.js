'use-strict';

import anime from 'animejs';
import { domReady } from './utils/dom-ready';

export default class IconAnim {
    constructor() {
        this.icons = {
            bulletin: {
                root: null,
                running: false
            },
            bell: {
                root: null,
                running: false
            },
            calendar: {
                root: null,
                running: false
            }
        };
        
        this.rotation = {
            translateY: [{ value: -10, duration: 200, easing: 'linear'}, { value: 0, duration: 200, easing: 'linear' }],
            rotateY: ['1turn', 0],
            duration: 400
        }
    }
    
    /**
    * Bulletin Animation
    */
    animateBulletin() {
        const bulletin = this.icons.bulletin;
        const svg = bulletin.root.querySelector('.svg-icon__bulletin');
        const lines = svg.querySelectorAll('.svg-icon__bulletin-lines rect');
        
        const revealLines = () => {
            lines.forEach((line, i) => {
               line.style.opacity = 0;
               setTimeout(() => {
                   anime({
                      targets: line,
                      duration: 250,
                      opacity: 1,
                      easing: 'linear',
                      width: () => i === lines.length - 1 ? [0, 30] : [0, 60],
                      complete: () => i === lines.length - 1 ? bulletin.running = false : false
                   });
               }, i * 50);
            });
        }
        
        const rotateBulletin = () => {
            anime({
               targets: svg, 
               translateY: this.rotation.translateY,
               rotateY: this.rotation.rotateY,
               duration: this.rotation.duration,
               begin: () => revealLines()
            });
        }
        
        bulletin.running = true;
        rotateBulletin();
    }
    
    /**
    * Bell Animation 
    */
    animateBell() {
        const bell = this.icons.bell;
        const svg = bell.root.querySelector('.svg-icon__bell');
        const bellContainer = svg.querySelector('.svg-icon__bell-container');
        
        const ringBell = () => {
            bellContainer.style.transformOrigin = 'center center';
            anime({
               targets: bellContainer,
               duration: 250,
               easing: 'easeInSine',
               rotateZ: [-25, 25, 0],
               complete: () => bell.running = false
            });
        }
        
        const rotateBell = () => {
            anime({
               targets: svg, 
               translateY: this.rotation.translateY,
               rotateY: this.rotation.rotateY,
               duration: this.rotation.duration,
               begin: () => ringBell()
            });
        }
        
        bell.running = true;
        rotateBell();
    }
    
    /**
    * Calendar Animation 
    */
    animateCalendar() {
        const calendar = this.icons.calendar;
        const svg = calendar.root.querySelector('.svg-icon__calendar');
        const ovals = Array.from(svg.querySelectorAll('circle')).reverse();
        const mark = svg.querySelector('.svg-icon__calendar-mark');
        
        const revealMark = () => {
            anime({
                targets: mark,
                duration: 25,
                opacity: 1,
                complete: () => calendar.running = false
            });
        }
        
        const revealOvals = () => {
            ovals.forEach((oval, i) => {
               oval.style.opacity = 0;
               setTimeout(() => {
                   anime({
                       targets: oval,
                       duration: 25,
                       opacity: 1,
                       begin: () => mark.style.opacity = 0,
                       complete: () => i === ovals.length - 1 ? revealMark() : false
                   })
               }, i * 35);
            });
        }
        
        const rotateCalendar = () => {
            anime({
               targets: svg,
               translateY: this.rotation.translateY,
               rotateY: this.rotation.rotateY,
               duration: this.rotation.duration,
               begin: () => revealOvals()
            });
        }
        
        calendar.running = true;
        rotateCalendar();
    }
    
    /**
    * Run the corresponding animation on event trigger 
    */
    runAnim(icon) {
        if (this.icons[icon].running) return;
        
        switch(icon) {
            case 'bulletin':
                return this.animateBulletin();
            case 'bell':
                return this.animateBell();
            case 'calendar':
                return this.animateCalendar();
        }
    }
    
    /**
    * Bind event listeners 
    */
    bindEvents() {
        try {
            Object.keys(this.icons).forEach(key => {
               this.icons[key].root.addEventListener('mouseenter', this.runAnim.bind(this, key)); 
            });
        } catch(e) {
            console.error('ICON_ANIM: Unable to bind events!', e);
        }
    }
    
    /**
    * Cache working nodes 
    */
    cacheDom() {
        this.icons.bulletin.root = document.getElementById('js-anim-bulletin');
        this.icons.bell.root = document.getElementById('js-anim-bell');
        this.icons.calendar.root = document.getElementById('js-anim-calendar');
    }
    
    /**
    * Kick it off 
    */
    init() {
        domReady(this.cacheDom.bind(this), this.bindEvents.bind(this));
    }
}