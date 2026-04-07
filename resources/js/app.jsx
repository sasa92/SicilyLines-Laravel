import './bootstrap.js';
import React from 'react';
import ReactDOM from 'react-dom/client';
import HeroCarousel from './components/HeroCarousel.jsx';

// Vérifie si l'élément existe sur la page HTML
if (document.getElementById('hero-carousel')) {
    const root = ReactDOM.createRoot(document.getElementById('hero-carousel'));
    
    root.render(
        <React.StrictMode>
            <HeroCarousel />
        </React.StrictMode>
    );
}





