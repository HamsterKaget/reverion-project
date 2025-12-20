import './bootstrap';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

// Countdown Timer for Beta Launch
document.addEventListener('DOMContentLoaded', function() {
    // Set launch date: December 6, 00:00
    let launchDate = new Date(new Date().getFullYear(), 11, 6, 0, 0, 0).getTime();
    
    // If December 6 has passed this year, set for next year
    if (launchDate < Date.now()) {
        launchDate = new Date(new Date().getFullYear() + 1, 11, 6, 0, 0, 0).getTime();
    }
    
    const countdownElement = document.getElementById('countdown');
    if (!countdownElement) return;
    
    function updateCountdown() {
        const now = new Date().getTime();
        const distance = launchDate - now;
        
        if (distance < 0) {
            countdownElement.innerHTML = '<div class="text-2xl font-bold text-red-500">Launched!</div>';
            return;
        }
        
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        const daysEl = countdownElement.querySelector('[data-days]');
        const hoursEl = countdownElement.querySelector('[data-hours]');
        const minutesEl = countdownElement.querySelector('[data-minutes]');
        const secondsEl = countdownElement.querySelector('[data-seconds]');
        
        if (daysEl) daysEl.textContent = String(days).padStart(2, '0');
        if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
        if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
        if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
    }
    
    updateCountdown();
    setInterval(updateCountdown, 1000);
});

// Counter Animation for Stats
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('[data-counter]');
    
    const animateCounter = (element) => {
        const target = parseInt(element.getAttribute('data-counter'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                element.textContent = Math.floor(current).toLocaleString();
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString();
            }
        };
        
        updateCounter();
    };
    
    // Intersection Observer for counter animation on scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                animateCounter(entry.target);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
});

// Initialize Flowbite components
document.addEventListener('DOMContentLoaded', function() {
    // Flowbite will auto-initialize, but we can add custom initialization here if needed
});

// GSAP Scroll Animations for Sections
document.addEventListener('DOMContentLoaded', function() {
    // Animate sections on scroll
    const sections = document.querySelectorAll('.section-animate');
    
    sections.forEach((section) => {
        gsap.fromTo(
            section,
            {
                opacity: 0,
                y: 30
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.6,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: section,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none none'
                }
            }
        );
    });

    // Animate feature cards with stagger
    const featureCards = document.querySelectorAll('#features .backdrop-blur-xl');
    if (featureCards.length > 0) {
        gsap.fromTo(
            featureCards,
            {
                opacity: 0,
                y: 30,
                scale: 0.95
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.5,
                ease: 'power2.out',
                stagger: 0.1,
                scrollTrigger: {
                    trigger: '#features',
                    start: 'top 75%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }

    // Animate top-up cards with stagger
    const topUpCards = document.querySelectorAll('#top-up .backdrop-blur-xl');
    if (topUpCards.length > 0) {
        gsap.fromTo(
            topUpCards,
            {
                opacity: 0,
                y: 30,
                scale: 0.95
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.5,
                ease: 'power2.out',
                stagger: 0.15,
                scrollTrigger: {
                    trigger: '#top-up',
                    start: 'top 75%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }

    // Animate how-to-play steps
    const steps = document.querySelectorAll('#how-to-play .flex');
    if (steps.length > 0) {
        gsap.fromTo(
            steps,
            {
                opacity: 0,
                x: -30
            },
            {
                opacity: 1,
                x: 0,
                duration: 0.6,
                ease: 'power2.out',
                stagger: 0.2,
                scrollTrigger: {
                    trigger: '#how-to-play',
                    start: 'top 75%',
                    toggleActions: 'play none none none'
                }
            }
        );
    }
});
