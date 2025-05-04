{{-- resources/views/components/particles/green.blade.php --}}

<div id="tsparticles" wire:ignore></div>

<script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>

<script wire:ignore>
    document.addEventListener("DOMContentLoaded", function() {
        if (!document.getElementById("tsparticles")) {
            console.error("Element dengan id 'tsparticles' tidak ditemukan");
            return;
        }

        const config = {
            fullScreen: {
                enable: true,
                zIndex: -1
            },
            background: {
                color: {
                    value: "#14B8A6"
                }
            },
            fpsLimit: 60,
            particles: {
                number: {
                    value: 30,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#FFFFFF"
                },
                shape: {
                    type: "circle"
                },
                opacity: {
                    value: 0.6,
                    random: true
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 0.3,
                        sync: false
                    }
                },
                links: {
                    enable: true,
                    distance: 150,
                    color: "#FFFFFF",
                    opacity: 0.5,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1.5,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "out",
                    bounce: false,
                    attract: {
                        enable: true,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "grab"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    push: {
                        particles_nb: 4
                    }
                }
            },
            detectRetina: true
        };

        try {
            if (window.tsParticles) {
                window.tsParticles.load("tsparticles", config)
            }
        } catch (error) {
            console.error("Error saat menginisialisasi tsParticles:", error);
        }
    });
</script>
