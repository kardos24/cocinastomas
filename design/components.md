# Componentes visuales

## Botones
- **Primario:** fondo `--color-primary`, texto blanco. Hover: fondo acento + elevación 2px.
- **Outline:** borde primario 2px, texto primario. Hover: fondo primario + texto blanco.
- **Ghost:** solo texto, sin fondo. Hover: color acento.
- Radio: 8px · Padding: 0.85rem 1.75rem · Peso: 600.

## Cards (servicios)
- Fondo blanco, borde redondeado 16px.
- Imagen 4:3 arriba.
- Sombra sutil, elevación en hover.

## Galería
- Grid 3 columnas (2 en tablet, 1 en móvil).
- Aspect-ratio 4:3.
- Hover: zoom 5% sobre la imagen.
- Click: abre lightbox.

## Slider antes/después
- Aspect-ratio 16:10, máx 900px.
- Input range que controla `clip-path` sobre la imagen "después".
- Etiquetas "Antes" / "Después" en esquinas superiores.

## Formulario
- Inputs: fondo blanco, borde `--color-border`, radio 8px.
- Focus: borde acento + sombra 3px `rgba(184,134,11,0.15)`.
- Honeypot oculto y nonce WordPress.

## Hero
- Pantalla completa menos header (calc(100vh - header)).
- Slider de imágenes con crossfade (5s).
- Overlay oscuro 30%→55% para legibilidad del texto.
- Indicador de scroll animado.

## Scroll reveal
- Atributo `[data-reveal]` → fade + translateY 24px.
- Variantes `fade`, `left`, `right`.
- Respeta `prefers-reduced-motion`.

## Espaciado

Escala basada en múltiplos de 0.5rem:
`--space-1` 0.5rem · `--space-2` 1rem · `--space-3` 1.5rem · `--space-4` 2rem ·
`--space-5` 3rem · `--space-6` 4rem · `--space-7` 6rem.

Secciones grandes: padding vertical `--space-7`.
Secciones medianas: `--space-6`.
