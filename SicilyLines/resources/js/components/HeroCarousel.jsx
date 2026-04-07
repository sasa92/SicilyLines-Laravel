import React, { useState, useEffect } from 'react';

const slides = [
    { 
        id: 1, 
        title: "Cefalù", 
        // Une vue classique de la plage et des maisons de Cefalù
        img: "https://upload.wikimedia.org/wikipedia/commons/7/7d/View_of_Cefalu_from_above_%2844945905581%29.jpg" 
    },
    { 
        id: 3, 
        title: "Palerme", 
        // La cathédrale de Palerme (architecture typique)
        img: "https://www.siciletourisme.com/wp-content/uploads/2024/01/Que-voir-a-Palerme-1024x768.webp" 
    },
    { 
        id: 4, 
        title: "Vignobles", 
        // Vignobles au pied de l'Etna
        img: "https://www.licata.be/images/regions/header/SI.jpg" 
    },
    { 
        id: 5,
        title: "Cuisine", 
        // Les Cannolis siciliens
        img: "https://lesgourmandsvoyagent.fr/wp-content/uploads/2017/04/IMG_5216-1024x683.jpg" 
    },
];

export default function HeroCarousel() {
    const [activeIndex, setActiveIndex] = useState(0);

    useEffect(() => {
        const interval = setInterval(() => {
            setActiveIndex((current) => (current + 1) % slides.length);
        }, 5000);
        return () => clearInterval(interval);
    }, []);

    const currentImage = slides[activeIndex].img;

    return (
        <div className="hero-background" style={{ backgroundImage: `url(${currentImage})` }}>
            <div className="hero-overlay"></div>
            
            <div className="hero-content">
                <h1 className="hero-title">{slides[activeIndex].title}</h1>
                
                <div className="cards-wrapper">
                    {slides.map((slide, index) => (
                        <div 
                            key={slide.id} 
                            onClick={() => setActiveIndex(index)}
                            className={`card-slide ${index === activeIndex ? 'active' : ''}`}
                        >
                            <img src={slide.img} alt={slide.title} />
                            
                            {index !== activeIndex && (
                                <div className="card-label">{slide.title}</div>
                            )}
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
}